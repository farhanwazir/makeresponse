<?php
/**
 * Project: MakeResponse
 *
 * Author: Farhan Wazir
 * Email: farhan.wazir@gmail.com, seejee1@gmail.com
 * Date: 4/2/2017
 * Time: 1:21 AM
 *
 *
 *
 * This project file is not redistributeable without permissions.
 * For more details about redistribution and reselling, contact to provided author details.
 */

namespace FarhanWazir\MakeResponse;

use Illuminate\Support\ServiceProvider;

class MakeResponseServiceProvider extends ServiceProvider
{

    public function register(){
        $this->app->bind('make.response', function ($app){
            return new Response();
        });
    }

}