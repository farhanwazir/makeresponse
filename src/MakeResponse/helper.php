<?php
/**
 * Project: MakeResponse
 *
 * Author: Farhan Wazir
 * Email: farhan.wazir@gmail.com, seejee1@gmail.com
 *
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

if(!function_exists('makeResponse')){
    /**
     * Make response
     *
     * @param null $status
     * @param null $result
     * @param null $errors
     * @param null $message
     * @return $this|\FarhanWazir\MakeResponse\Response
     */
    function makeResponse($status = null, $result = null, $errors = null, $message = null, $return_array = true){
        if($status){
            $output = (new FarhanWazir\MakeResponse\Response())->set($status, $result, $errors, $message);
            if($return_array) $output = $output->getArray();
            else $output = $output->get();
            return $output;
        }

        return new FarhanWazir\MakeResponse\Response();
    }
}