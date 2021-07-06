<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SoapService;

class SoapController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $people = SoapService::fetchPeoples()->filterPeople($request->get('firs_character','A'))->getPeople();

        return response()->json([
            'data' => [
                'people' => $people
            ]
        ]);
    }

}
