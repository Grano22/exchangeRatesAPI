<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

const API_URL = 'localhost:9082/';

class RateExchangeProvider extends ServiceProvider
{
    private static $exceptions = [];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public static function fetchHistory(array $options=[]) : ?array
    {
        try {
            $res = Http::get(API_URL . "fetch");
            return $res->json();
        } catch(\Exception $exc) {
            array_push(self::$exceptions, $exc);
            return null;
        }
    }

    public static function fetchNew(array $options=[]) : ?array
    {
        try {
            $res = Http::get(API_URL . "fetch");
            return $res->json();
        } catch(\Exception $exc) {
            array_push(self::$exceptions, $exc);
            return null;
        }
    }

    public static function getExceptionsMessages() : string
    {
        $mess = "";
        foreach(self::getExceptions() as $exc) {
            $mess .= (string)$exc;
        }
        return $mess;
    }

    public static function getExceptions() : array
    {
        return self::$exceptions;
    }
}
