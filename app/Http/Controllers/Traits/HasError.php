<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
trait HasError {

    public function getErrorMessage($input, $rules) {
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return ([
                'status' => 401,
                'message' => $validator->errors()
            ]);
        }
    }

    public function getErrorMessageSweet($input, $rules) {
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = implode("</p><br/>", $validator->messages()->all());
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', $message);
            return Redirect::back()->withInput();
        }
    }

}
