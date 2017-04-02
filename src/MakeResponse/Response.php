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

namespace FarhanWazir\MakeResponse;


use FarhanWazir\MakeResponse\Contract\MakeResponse;

class Response extends Model implements MakeResponse
{

    /**
     * Set response status code
     *
     * @param int $status
     * @return $this
     */
    public function setStatus($status){
        $this->status = $status;

        return $this;
    }

    /**
     * Set response message
     *
     * @param string $message
     * @return $this
     */
    public function setMessage($message){
        $this->message = $message;

        return $this;
    }

    /**
     * Set response errors
     *
     * @param string|array $errors
     * @return $this
     */
    public function setErrors($errors){
        //String and array both are supported in parameter.
        //Convert string into array
        $this->errors = !is_null($errors) ? (array) $errors : null;

        return $this;
    }

    /**
     * Set response result
     *
     * @param string|array $result
     * @return $this
     */
    public function setResult($result){
        //String and array both are supported in parameter.
        //Convert string into array
        $this->result = !is_null($result)? (array) $result : null;

        return $this;
    }

    /**
     * Set response at once
     *
     * @param $status
     * @param null $result
     * @param null $errors
     * @param null $message
     * @return $this
     */
    public function set($status, $result = null, $errors = null, $message = null){
        $this->setStatus($status);
        $this->setResult($result);
        $this->setErrors($errors);
        $this->setMessage($message);

        return $this;
    }

}