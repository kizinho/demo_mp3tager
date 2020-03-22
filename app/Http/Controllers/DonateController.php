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
            'amount' => 'required|numeric|max:2',
            'payment_method' => 'required'
        ]);
        $error = static::getErrorMessageSweet($input, $rules);
        if ($error) {
            return $error;
        }
        if ($request->payment_method == 'btc') {
            return view('donate.donate-view');
        }
    }

}
