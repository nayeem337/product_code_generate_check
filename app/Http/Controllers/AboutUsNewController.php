<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsNewController extends Controller
{

    public function aboutUsNew()
    {
        return view('frontend.about.about-us-new');
    }

}
