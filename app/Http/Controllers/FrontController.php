<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use DB;
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

        $prices = [
          'solar' => Price::where('type', 'Solar')->orderBy('created_at', 'desc')->first()->price,
          'pertalite' => Price::where('type', 'Pertalite')->orderBy('created_at', 'desc')->first()->price,
          'pertamax' => Price::where('type', 'Pertamax')->orderBy('created_at', 'desc')->first()->price,
          'pertamax_turbo' => Price::where('type', 'Pertamax Turbo')->orderBy('created_at', 'desc')->first()->price
        ];

        return view('welcome', compact('prices', 'best_employees'));
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

        if ($request->has('member_id') && $request->has('use_point')) {
          $member = User::find($request->member_id);
          $point_member = $member->points()->whereDate('date', '>' , now()->subYear())->sum('point');
          $data['discount'] = floor($point_member / 150) * 10000;

          Point::create([
            'user_id' => $request->member_id,
            'date' => date('Y-m-d H:i:s'),
            'point' => -($point_member - ($point_member % 150))
          ]);
        }

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

            if (!$request->has('use_point')) {
              Point::create([
                'user_id' => $request->member_id,
                'date' => date('Y-m-d H:i:s'),
                'point' => $point
              ]);
            }
        }

        return redirect('invoice/' . $transaction->id);
    }

    public function invoice($transaction_id)
    {
        $transaction = Transaction::find($transaction_id);
        return view('after_transaction', compact('transaction'));
    }
}
