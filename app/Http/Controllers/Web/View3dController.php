<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\View3d;
use Illuminate\Http\Request;

class View3dController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $data['items'] = View3d::orderBy('id','desc')
            ->paginate($request->get('per_page',25),['*'],'page',$request->get('page',1));

        return view('web.view_3d.index',$data);
    }

}
