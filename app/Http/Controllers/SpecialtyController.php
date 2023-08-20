<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;

class SpecialtyController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    
    public function index(){
        $specialties = Specialty::all();
        return view('specialties.index',compact('specialties'));
    }

    public function create(){
        return view('specialties.create');
    }

    public function sendData(Request $request){

        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre de la especialidad es obligatorio.',
            'name.min' => 'El nombre de la especialidad debe tener mas de tres caracteres.'
        ];

        $this->validate($request, $rules, $messages);

        $specialty = new Specialty();
        $specialty ->name = $request->input('name');
        $specialty ->description = $request->input('description');
        $specialty ->save();

        return redirect('/especialidades');
    }
}
