<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\report;

class report_c extends Controller
{
  public static function show() {
    $report_object = new report;
    $GET = $_GET;

    $result = $report_object->show($GET);

    return view('welcome', compact('result'));

  }


}
