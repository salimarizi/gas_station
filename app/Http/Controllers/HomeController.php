<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\User;
use App\Price;
use App\Point;
use App\Vehicle;
use App\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
          return $this->index_admin();
        }elseif (Auth::user()->role == 'employee') {
          return $this->index_employee();
        }else {
          return $this->index_member();
        }
    }

    public function index_admin()
    {
        $prices = Price::orderBy('created_at', 'desc')->get();

        return view('admin/index', compact('prices'));
    }

    public function index_employee()
    {
        $prices = [
          'solar' => Price::where('type', 'Solar')->first()->price,
          'pertalite' => Price::where('type', 'Pertalite')->first()->price,
          'pertamax' => Price::where('type', 'Pertamax')->first()->price,
          'pertamax_turbo' => Price::where('type', 'Pertamax Turbo')->first()->price
        ];

        $employees = User::where('role', 'employee')->get();
        foreach ($employees as $employee) {
          $employee->point = round(Transaction::where('employee_id', $employee->id)->avg('stars'), 2);
        }

        return view('home', compact('prices', 'employees'));
    }

    public function index_member()
    {
        $points = Point::where('user_id', Auth::user()->id)->sum('point');
        $police_numbers = Vehicle::where('user_id', Auth::user()->id)->pluck('police_number')->toArray();
        $transactions = Transaction::whereIn('police_number', $police_numbers)->get();

        $motocycle = Vehicle::where('type', 'motocycle')
                            ->where('user_id', Auth::user()->id)
                            ->first();

        $car = Vehicle::where('type', 'car')
                      ->where('user_id', Auth::user()->id)
                      ->first();

        return view('members', compact('points', 'transactions', 'motocycle', 'car'));
    }
}
