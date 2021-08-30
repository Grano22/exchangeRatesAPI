<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\View;
use \App\Providers\RateExchangeProvider;

final class TrackerController extends Controller
{
    public function show() {
        return View::make('tracker', [ "fetchedData" => $this->prepareRequestedData()  ]);
    }

    private function prepareRequestedData() : string
    {
        $his = RateExchangeProvider::fetchHistory();
        if($his===null) {
            $his = "Nie można pobrać danych, błąd po stronie serwera. Prosimy spróbować później";
            if(config('app.debug')) {
                $his .= "<h3>Dane dla dewelopera</h3>" . RateExchangeProvider::getExceptionsMessages();
            }
        }
        return $his;
    }
}