<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\User;
use App\Price;
use App\Transaction;

class FrontController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
          return redirect('home');
        }

        $employees = User::where('role', 'employee')->get();
        foreach ($employees as $employee) {
          $employee->point = round(Transaction::where('employee_id', $employee->id)->avg('stars'), 2);
        }

        $prices = [
          'solar' => Price::where('type', 'Solar')->first()->price,
          'pertalite' => Price::where('type', 'Pertalite')->first()->price,
          'pertamax' => Price::where('type', 'Pertamax')->first()->price,
          'pertamax_turbo' => Price::where('type', 'Pertamax Turbo')->first()->price
        ];

        return view('welcome', compact('prices', 'employees'));
    }

    public function transactions($type)
    {
        $price = Price::where('type', $type == 'pertamax_turbo' ? "Pertamax Turbo" : ucwords($type))->first();

        return view('transactions', compact('price', 'type'));
    }

    public function store_transactions(Request $request)
    {
        $data = $request->all();
        $data['employee_id'] = Auth::user()->id;
        $data['outlet_id'] = Auth::user()->outlet_id;
        $data['price_id'] = Price::where('type', $request->type == 'pertamax_turbo' ? "Pertamax Turbo" : ucwords($request->type))->first()->id;

        Transaction::create($data);
        return redirect('/');
    }
}
