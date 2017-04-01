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


class Response
{

    protected $status;

    protected $message;

    protected $errors;

    protected $result;

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
        $this->errors = (array) $errors;

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
        $this->result = (array) $result;

        return $this;
    }

    /**
     * Get status
     *
     * @return int|mixed
     */
    public function getStatus(){
        return $this->status;
    }

    /**
     * Get message
     *
     * @return null|string
     */
    public function getMessage(){
        return is_string($this->message) ? $this->message : null;
    }

    /**
     * Get errors
     *
     * @return array|null
     */
    public function getErrors(){
        return is_array($this->errors) ? $this->errors : null;
    }

    /**
     * Get result
     *
     * @return array|null
     */
    public function getResult(){
        return is_array($this->result) ? $this->result : null;
    }

    /**
     * Get response in json
     *
     * @return string
     */
    public function get(){
        return json_encode($this->makeRawResponse());
    }

    /**
     * Get response in array
     *
     * @return array
     */
    public function getArray(){
        return $this->makeRawResponse();
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

        return $output;
    }

}