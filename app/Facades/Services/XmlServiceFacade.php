<?php


namespace App\Facades\Services;


use Illuminate\Support\Facades\Facade;

class XmlServiceFacade  extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'XmlService';
    }
}
