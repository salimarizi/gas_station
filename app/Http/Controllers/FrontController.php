<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\User;
use App\Price;
use App\Transaction;
use App\Vehicle;
use App\Point;

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

    public function getMemberFromPoliceNumber($police_number)
    {
        $vehicle = Vehicle::where('police_number', $police_number)->first();

        if ($vehicle) {
          return [
            'member_id' => $vehicle->user->id,
            'member_name' => $vehicle->user->name,
            'point_member' => $vehicle->user->points()->whereDate('date', '>' , now()->subYear())->sum('point')
          ];
        }
        return 0;
    }

    public function store_transactions(Request $request)
    {
        $data = $request->all();
        $data['employee_id'] = Auth::user()->id;
        $data['outlet_id'] = Auth::user()->outlet_id;
        $data['price_id'] = Price::where('type', $request->type == 'pertamax_turbo' ? "Pertamax Turbo" : ucwords($request->type))->first()->id;

        $transaction = Transaction::create($data);

        if ($request->member_id) {
            if ($transaction->price->type == 'Pertamax') {
              $point = round($transaction->liters * 2);
            }else if ($transaction->price->type == 'Pertamax Turbo') {
              $point = round($transaction->liters * 2.5);
            }else if ($transaction->price->type == 'Pertalite') {
              $point = round($transaction->liters * 1);
            }else {
              $point = round($transaction->liters * 2);
            }

            $member = User::find($request->member_id);
            $unformated = explode('-', $member->dob);
            $birthday = date('Y-m-d', strtotime(date('Y').'-'.$unformated[1].'-'.$unformated[2]));
            $startDate = date('Y-m-d', strtotime('-3 day', strtotime($birthday)));
            $endDate = date('Y-m-d', strtotime('+3 day', strtotime($birthday)));

            $today = date('Y-m-d');

            if (($today >= $startDate) && ($today <= $endDate)){
              $point *= 2;
            }

            Point::create([
              'user_id' => $request->member_id,
              'date' => date('Y-m-d H:i:s'),
              'point' => $point
            ]);
        }

        return redirect('invoice/' . $transaction->id);
    }

    public function invoice($transaction_id)
    {
        $transaction = Transaction::find($transaction_id);
        return view('after_transaction', compact('transaction'));
    }
}
