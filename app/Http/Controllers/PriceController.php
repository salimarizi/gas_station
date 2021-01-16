<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Price;

class PriceController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $data['date'] = date('Y-m-d');
        
        Price::create($data);
        return redirect()->back();
    }

    public function update(Request $request, Price $price)
    {
        $price->update($request->all());
        return redirect()->back();
    }

    public function destroy(Price $price)
    {
        $price->delete();
        return redirect()->back();
    }
}
