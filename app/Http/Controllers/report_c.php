<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\report;

class report_c extends Controller
{
  public static function show() {

    $var = report::show();
    return view('reader', compact('var'));
    
  }


}
