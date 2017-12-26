<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class XCollection extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Helpers\XCollection';
    }
}