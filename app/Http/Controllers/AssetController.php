<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        return view('frontend.asset.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        dd($data);
    }
}
