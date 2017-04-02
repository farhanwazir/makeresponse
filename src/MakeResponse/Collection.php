<?php
/**
 * Project: makeresponse
 *
 * Author: Farhan Wazir
 * Email: farhan.wazir@gmail.com
 * License: MIT
 * Copyright 2017 Farhan Wazir
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute,
 * sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or
 * substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING
 * BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace FarhanWazir\MakeResponse;


use FarhanWazir\MakeResponse\Contract\MakeResponse;

class Collection
{

    /**
     * @var MakeResponse
     */
    protected $response;

    public function __construct(MakeResponse $response)
    {
        $this->response = $response;
    }

    public function toArray(){
        return $this->response->output;
    }

    public function toJson(){
        return json_encode($this->response->output);
    }

    public function __toString()
    {
        return $this->toJson();
    }

}