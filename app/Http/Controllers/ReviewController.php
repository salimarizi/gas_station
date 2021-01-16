<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $transaction = Transaction::find($request->transaction_id)->update($request->all());

        return redirect()->back();
    }
}
