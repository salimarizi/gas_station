<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use DB;
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
        $startDate = Transaction::orderBy('created_at')->first()->created_at->format('Y-m-d');
        $endDate = Transaction::orderBy('created_at', 'desc')->first()->created_at->format('Y-m-d');

        $begin = new \DateTime($startDate);
        $end = new \DateTime(date('Y-m-d', strtotime('+1 day', strtotime($endDate))));

        $interval = \DateInterval::createFromDateString('1 day');
        $period = new \DatePeriod($begin, $interval, $end);

        $chart_datas = [];
        foreach ($period as $dt) {
            $cost = 0; $price = 0;

            foreach (Transaction::whereDate('created_at', $dt->format("Y-m-d"))->get() as $transaction) {
              $cost += $transaction->price->cost * $transaction->liters;
              $price += $transaction->price->price * $transaction->liters;
            }

            array_push($chart_datas, [
              'date' => $dt->format("Y-m-d"),
              'cost' => $cost,
              'price' => $price
            ]);
        }

        return view('admin/index', compact('prices', 'chart_datas'));
    }

    public function index_employee()
    {
        $prices = [
          'solar' => Price::where('type', 'Solar')->orderBy('created_at', 'desc')->first()->price,
          'pertalite' => Price::where('type', 'Pertalite')->orderBy('created_at', 'desc')->first()->price,
          'pertamax' => Price::where('type', 'Pertamax')->orderBy('created_at', 'desc')->first()->price,
          'pertamax_turbo' => Price::where('type', 'Pertamax Turbo')->orderBy('created_at', 'desc')->first()->price
        ];

        $employees = DB::select("
          SELECT users.id, users.outlet_id, outlets.name AS outlet_name, users.name, ROUND(IFNULL(AVG(transactions.stars), 0), 2) AS average_points
          FROM users
          INNER JOIN outlets ON users.outlet_id = outlets.id
          LEFT JOIN transactions ON users.id = transactions.employee_id
          WHERE users.role = 'employee'
          GROUP BY users.id
          ORDER BY average_points DESC
        ");

        $best_employees = [];

        for ($i=0; $i < count($employees); $i++) {
          if ($i != 0) {
            if ($employees[$i-1]->outlet_id != $employees[$i]->outlet_id) {
              array_push($best_employees, $employees[$i]);
            }elseif (($employees[$i-1]->outlet_id == $employees[$i]->outlet_id) && ($employees[$i-1]->average_points == $employees[$i]->average_points)) {
              array_push($best_employees, $employees[$i]);
            }else {
              continue;
            }
          }else {
            array_push($best_employees, $employees[$i]);
          }
        }

        return view('home', compact('prices', 'best_employees'));
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
