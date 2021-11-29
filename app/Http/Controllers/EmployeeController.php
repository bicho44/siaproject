<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Date;

class EmployeeController extends Controller
{
    public function showEmployees()
    {
        $employee = Employee::all();
        return view('empleados.index', compact('employee'));
    }

    public function show(Employee $employee)
    {
        return view('empleados.show', compact('employee'));
    }

    // Generate PDF
    public function pdf(Employee $employee)
    {
        // retreive all records from db
        // $employee = Employee::find(
        //     $employee->id
        // );
        $title = __('Empleado ' . $employee->name);
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
    // Generate PDF
    public function createPDF()
    {
        // retreive all records from db
        $data = Employee::all();
        $title = __('Empleados');
        $copy =
            '@Copyright ' .
            date('Y') .
            ' - <a href="https://imgdigital.com.ar">IMGDigital</a>';

        // share data to view
        view()->share([
            'employee' => $data,
            'title' => $title,
            'pie' => $copy,
        ]);

        $pdf = App::make('dompdf.wrapper');
        $pdf->getDomPDF()->set_option('enable_php', true);

        $pdf->loadView('empleados.pdf_view', [
            'employee' => $data,
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

        // return view('empleados.index', compact('employee'));

        //return
    }
}
