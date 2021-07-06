<?php


namespace App\Exceptions;


use Exception;
use Illuminate\Http\Response;

abstract class BaseException extends Exception
{

    /**
     * @return mixed
     */
    public abstract function getData();

    /**
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function render()
    {
        return response()->json(
            [
                'message' => $this->getMessage(),
                'data' => $this->getData()
            ]
        )->setStatusCode($this->getCode());
    }

}
