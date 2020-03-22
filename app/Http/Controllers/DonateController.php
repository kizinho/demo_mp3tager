<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers\Traits\HasError;

class DonateController extends Controller {

    use HasError;

    public function donate() {


        return view('donate.donate');
    }

    public function donatePost(Request $request) {

        $input = $request->all();
        $rules = ([
            'amount' => 'required|numeric|min:2',
            'payment_method' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        if ($request->payment_method == 'btc') {
            try {
                $all = file_get_contents("https://blockchain.info/ticker");
                $res = json_decode($all);
                $btcrate = $res->USD->last;
                $amount = $request->amount;
                $cut = $amount / $btcrate;
                $data['amount_convert'] = number_format(floatval($cut), 8, '.', '');
            } catch (\Exception $e) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Bitcoin Server Very Busy , Try Again');
                return redirect()->back();
            }
            return view('donate.donate-view', $data);
        }
    }

}
