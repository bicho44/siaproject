<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class SIAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = 'SIA';
        return view('sia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data=json_decode($request->getContent(),true);

        dump($request->getContent());
        return view('sia.view', compact('data'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Crear un PDF
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Barryvdh\Snappy\Facades\PDF
     */  
    public function createpdf(Request $request)
    {
         //
    }
}
