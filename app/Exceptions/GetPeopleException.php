<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Throwable;

/**
 * @property array|mixed data
 */
class GetPeopleException extends BaseException
{

    /**
     * @var array
     */
    protected $data;

    /**
     * XmlParseException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     * @param array $data
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null, $data = [])
    {
        parent::__construct($message, $code, $previous);
        $this->data = $data;
    }

    /**
     * @return array|mixed
     */
    public function getData()
    {
        return $this->data;
    }

}
