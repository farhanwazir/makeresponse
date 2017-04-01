<?php
/**
 * Project: ApiResponse
 *
 * Author: Farhan Wazir
 * Email: farhan.wazir@gmail.com, seejee1@gmail.com
 * Date: 4/2/2017
 * Time: 1:15 AM
 *
 *
 *
 * This project file is not redistributeable without permissions.
 * For more details about redistribution and reselling, contact to provided author details.
 */

namespace FarhanWazir\MakeResponse\Facade;

use Illuminate\Support\Facades\Facade;


class MakeResponse extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'make.response';
    }

}