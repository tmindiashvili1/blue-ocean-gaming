<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use XmlService;

class XmlController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function parse(Request $request)
    {
        $sumAmount = XmlService::parse()->getSumAmount();

        return response()->json([
            'data' => [
                'sum_amount' => $sumAmount
            ]
        ]);
    }

}
