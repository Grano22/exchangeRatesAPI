<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DataTrackerController extends Controller
{
    public function show() {
        return View::make("data_tracker", ["fetchedData"=>null]);
    }
}
