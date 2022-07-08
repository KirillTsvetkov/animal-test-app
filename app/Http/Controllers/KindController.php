<?php

namespace App\Http\Controllers;

use App\Http\Resources\KindResource;
use Illuminate\Http\Request;
use App\Models\Kind;

class KindController extends Controller
{
    public function getKinds(Request $request)
    {
        $kinds = Kind::get()->all();
        return KindResource::collection($kinds);
        //return Kind::get()->all();
    }
}
