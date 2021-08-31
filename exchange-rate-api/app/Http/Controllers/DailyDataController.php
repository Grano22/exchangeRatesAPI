<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DailyDataController extends Controller
{
    public function show() {
        return View::make("daily_data", ["fetchedData"=>null]);
    }
}
