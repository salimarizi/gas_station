<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Vehicle;

class VehicleController extends Controller
{
    public function store(Request $request)
    {
        $check = Vehicle::where('type', $request->type)
                        ->where('user_id', Auth::user()->id)
                        ->first();
                        
        if ($check) {
          $check->update($request->all());
        }else {
          $data = $request->all();
          $data['user_id'] = Auth::user()->id;
          Vehicle::create($data);
        }

        return redirect()->back();
    }
}
