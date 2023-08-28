<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $citas = Cita::all();
        return view('citas.index', compact('citas'));
    }

    public function create(){
        return view('citas.create');
    }

    public function sendData(Request $request){

        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre del paciente es obligatorio.',
            'name.min' => 'El nombre del paciente debe tener mas de tres caracteres.'
        ];

        $this->validate($request, $rules, $messages);

        $cita = new Cita();
        $cita ->paciente = $request->input('name');
        $cita ->especialidad = $request->input('especialty');
        $cita ->doctor = $request->input('doctor');
        $cita ->horario = $request->input('hours');
        $cita ->description = $request->input('description');
        $cita ->save();

        $notification = 'La reserva se ha creado correctamente.';

        return redirect('/citas')->with(compact('notification'));
    }
}
