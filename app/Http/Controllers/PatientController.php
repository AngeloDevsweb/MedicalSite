<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PatientController extends Controller
{
   public function index()
   {
       $patients = User::patients()->paginate(10);
       return view('patients.index',compact('patients'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view('patients.create');
   }

 
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
        'name.required' => 'El nombre del paciente es obligatorio',
        'name.min' => 'El nombre del paciente debe de tener mas de 3 caracteres',
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
        'role' => 'paciente',
        'password' => bcrypt($request->input('password'))
    ]
        );
    $notification = 'El paciente se ha registrado correctamente';
        return redirect ('/pacientes')->with(compact('notification'));
   }

   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($id)
   {
    $patient = User::Patients()->findOrFail($id);
    return view('patients.edit', compact('patient'));
   }

   /**
    * Update the specified resource in storage.
    */
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
        'name.required' => 'El nombre del paciente es obligatorio',
        'name.min' => 'El nombre del paciente debe de tener mas de 3 caracteres',
        'email.required' => 'El correo es obligatorio',
        'email.email' => 'Ingresa un correo valido',
        'cedula.required' => 'El CI es obligatorio',
        'cedula.digits' => 'El CI Debe de tener al menos 7 digitos',
        'address.min' => 'La dirección debe de tener al menos 6 caracteres',
        'phone.required' => 'El numero de telefono es obligatorio',
    ];

    $this->validate($request, $rules, $messages);
    $user = User::Patients()->findOrFail($id);
    $data = $request->only('name','email','cedula','address','phone');
    $password = $request->input('password');

    if($password)
    $data['password'] = bcrypt($password);

    $user->fill($data);
    $user->save();
    
    $notification = 'Informacion Actualizada';
    return redirect ('/pacientes')->with(compact('notification'));

   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($id)
   {
    $user = User::Patients()->findOrFail($id);
    $PacienteName = $user->name;
    $user->delete();

    $notification = "El medico  $PacienteName se ha eliminado";
    return redirect('/pacientes')->with(compact('notification'));

   }
}
