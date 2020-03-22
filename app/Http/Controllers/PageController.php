<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller {

    public function pp() {
        return view('pages.privacy-policy');
    }

    public function tos() {
        return view('pages.tos');
    }

    public function aboutUs() {
        return view('pages.about');
    }
  public function contactUs() {
        return view('pages.contact');
    }
      public function how() {
        return view('pages.how-it-works');
    }
}
