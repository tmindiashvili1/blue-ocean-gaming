<?php


namespace App\Services;


use App\Exceptions\GetPeopleException;
use App\Exceptions\ItemsNotFoundException;
use App\Exceptions\XmlParseException;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use SoapClient;

/**
 * @property array people
 */
class SoapService
{

    /**
     * @var array
     */
    protected $people = [];

    /**
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetchPeoples()
    {
        try {
            $client = new SoapClient('https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL', array("trace" => 1, "exception" => 0));
            $result = $client->__soapCall('GetByName', [], null);
        } catch (\Exception $ex) {
            throw new GetPeopleException($ex->getMessage(),$ex->getCode());
        }

       $items = xmlParseToArray($result->GetByNameResult->any);

        if ($items === null) {
            throw new XmlParseException('XML_PARSE_ERROR', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        if (empty($items['ListByName']['SQL'])) {
            throw new ItemsNotFoundException('ITEMS_NOT_FOUND',Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $this->people = $items['ListByName']['SQL'];

        return $this;
    }

    /**
     * @param string $firstCharacter
     * @return $this
     */
    public function filterPeople($firstCharacter = 'A')
    {
        $this->people = collect($this->people)->filter(function($person) use($firstCharacter){
            return !empty($person['Name']) && $person['Name'][0] == $firstCharacter;
        });

        return $this;
    }

    /**
     * @return array
     */
    public function getPeople()
    {
        return $this->people;
    }


}
