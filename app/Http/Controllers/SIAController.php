<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;

class SIAController extends Controller
{
    //public $siaapi = "https://sistematizar.ar/api/siaweb/datosBoletas.php";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = 'SIA';
        //https://sistematizar.ar/api/siaweb/
        return view('sia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $employee = Http::get(config('services.siaapi.url').'?c='.$id)->json()['results'][0];
        
        // dump($employee);

        return view('sia.view', compact('employee'));
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
     public function pdf(Sia $sia)
    {
        $siaData=json_decode($request->getContent(),true);

        $title = __('SIA ' . $sia->name);
        $copy =
            '@Copyright ' .
            date('Y') .
            ' - <a href="https://imgdigital.com.ar">IMGDigital</a>';

        // share data to view
        view()->share([
            'employee' => $employee,
            'title' => $title,
            'pie' => $copy,
        ]);

        $pdf = App::make('dompdf.wrapper');
        $pdf->getDomPDF()->set_option('enable_php', true);

        $pdf->loadView('empleados.pdf2', [
            'employee' => $employee,
            'title' => $title,
            'pie' => $copy,
        ]);

        $file = Str::slug($title) . '-' . today()->format('Y-m-d') . '.pdf';

        // download PDF file with download method
        // return $pdf->download($file . '.pdf');

        //$pdf->render();

        $archivo = $pdf->output();

        // Crea el PDF file with escribiendo el archivo en el directorio /pdf method
        if (file_put_contents('pdf/' . $file, $archivo) === false) {
            session()->flash(
                'error',
                'Error al exportar el PDF "' . $file . '"'
            );
        } else {
            session()->flash(
                'success',
                'Export PDF "' . $file . '", realizado correctamente'
            );
        }
        return redirect('/empleados');
    }
}