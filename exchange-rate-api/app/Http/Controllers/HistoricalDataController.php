<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HistoricalDataController extends Controller
{
    public function show() {
        return View::make("historical_data", []);
    }
}
