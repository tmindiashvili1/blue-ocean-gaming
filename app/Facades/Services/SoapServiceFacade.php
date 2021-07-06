<?php


namespace App\Facades\Services;


use Illuminate\Support\Facades\Facade;

class SoapServiceFacade  extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SoapService';
    }
}
