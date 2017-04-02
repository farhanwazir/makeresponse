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


abstract class Model
{

    /**
     * @var int|bool
     */
    protected $status;

    /**
     * @var null|string
     */
    protected $message;

    /**
     * @var null|string|array
     */
    protected $errors;

    /**
     * @var null|string|array
     */
    protected $result;

    /**
     * @var null|array
     */
    protected $output;

    /**
     * Get status
     *
     * @return int|mixed
     */
    protected function getStatus(){
        return $this->status;
    }

    /**
     * Get message
     *
     * @return null|string
     */
    protected function getMessage(){
        return is_string($this->message) ? $this->message : null;
    }

    /**
     * Get errors
     *
     * @return array|null
     */
    protected function getErrors(){
        return is_array($this->errors) ? $this->errors : null;
    }

    /**
     * Get result
     *
     * @return array|null
     */
    protected function getResult(){
        return is_array($this->result) ? $this->result : null;
    }

    /**
     * Get final output
     *
     * @return mixed
     */
    protected function getOutput(){
        return $this->output;
    }

    /**
     * Get response in json
     *
     * @return string
     */
    public function get(){
        $this->makeRawResponse();
        return new Collection($this);
    }

    /**
     * Make response in raw array form
     *
     * @return array
     * @throws \HttpInvalidParamException
     * @throws \LogicException
     */
    protected function makeRawResponse(){
        //Status should not be null
        if(is_null($this->getStatus())){
            throw new \HttpInvalidParamException("Required parameter status is missing.");
        }

        //If status is 1 then errors not allowed in response. It should be 0 or in negative value like -1, -2 or any
        if($this->getStatus() == 1 && !is_null($this->getErrors())){
            throw new \LogicException('If error exists in request then status must not be 1.');
        }

        $output = [];

        $output['status'] = $this->getStatus();

        if($this->getMessage()) $output['message'] = $this->getMessage();

        if($this->getErrors()) $output['errors'] = $this->getErrors();

        if($this->getResult()) $output['result'] = $this->getResult();

        $this->output = $output;
    }

    /**
     * Dynamic call of protected method
     *
     * @param $name
     * @return mixed
     * @throws \ErrorException
     */
    public function __get($name)
    {
        if($name == 'output') return $this->getOutput();

        throw new \ErrorException('Invalid property '. $name);
    }

}