<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = User::doctors()->paginate(10);
        return view('doctors.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules =[
            'name' => 'required|min:3',
            'email' => 'required|email',       
            'cedula' => 'required|digits:7',
            'address' => 'required|min:6',
            'phone' => 'required',
        ];
        $messages =[
            'name.required' => 'El nombre del médico es obligatorio',
            'name.min' => 'El nombre del médico debe de tener mas de 3 caracteres',
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'Ingresa un correo valido',
            'cedula.required' => 'El CI es obligatorio',
            'cedula.digits' => 'El CI Debe de tener al menos 7 digitos',
            'address.min' => 'La dirección debe de tener al menos 6 caracteres',
            'phone.required' => 'El numero de telefono es obligatorio',
        ];

        $this->validate($request, $rules, $messages);
        User::create(
             $request->only('name','email','cedula','address','phone')
        + [
            'role' => 'doctor',
            'password' => bcrypt($request->input('password'))
        ]
            );
        $notification = 'El medico se ha registrado correctamente';
            return redirect ('/medicos')->with(compact('notification'));
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit( $id)
    {
        $doctor = User::doctors()->findOrFail($id);
        return view('doctors.edit', compact('doctor'));
    }

 
    public function update(Request $request, string $id)
    {
        $rules =[
            'name' => 'required|min:3',
            'email' => 'required|email',       
            'cedula' => 'required|digits:7',
            'address' => 'required|min:6',
            'phone' => 'required',
        ];
        $messages =[
            'name.required' => 'El nombre del médico es obligatorio',
            'name.min' => 'El nombre del médico debe de tener mas de 3 caracteres',
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'Ingresa un correo valido',
            'cedula.required' => 'El CI es obligatorio',
            'cedula.digits' => 'El CI Debe de tener al menos 7 digitos',
            'address.min' => 'La dirección debe de tener al menos 6 caracteres',
            'phone.required' => 'El numero de telefono es obligatorio',
        ];

        $this->validate($request, $rules, $messages);
        $user = User::doctors()->findOrFail($id);
        $data = $request->only('name','email','cedula','address','phone');
        $password = $request->input('password');

        if($password)
        $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();
        
        $notification = 'Informacion Actualizada';
        return redirect ('/medicos')->with(compact('notification'));
    }

    
    public function destroy($id)
    {
        $user = User::doctors()->findOrFail($id);
        $doctorName = $user->name;
        $user->delete();

        $notification = "El medico  $doctorName se ha eliminado";
        return redirect('/medicos')->with(compact('notification'));

    }
}
