<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\report;

class report_c extends Controller
{
  public static function show() {
    $report_object = new report;
    $result = $report_object->show();
    return view('reader', compact('result'));

  }


}
