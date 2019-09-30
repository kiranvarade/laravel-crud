<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Hash;
use Illuminate\Support\Facades\Validator;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::all();
       // return $employees;
       return view('employees/employees',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('employees/create-emp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'name' => ['required', 'min:2','max:10'],
            'email'=>['required','email'],
            'password'=>['required']
            
        ]);
        $name = $request->input('name');
        $password = $request->input('password');
        $email = $request->input('email');
        $hash_password=Hash::make($password);
         
        //return $name .$email.$hash_password;
        Employee::create([
            'emp_name'=>$name,
            'emp_email'=>$email,
            'password'=>$hash_password,
        ]);
        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employees/edit-emp', ['employee' => Employee::findOrFail($id)]);
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
        $validatedData = $request->validate([
            'name' => ['required', 'min:2','max:10'],
            'email'=>['required','email'],
            'password'=>['required']
            
        ]);
        $name = $request->input('name');
        $password = $request->input('password');
        $email = $request->input('email');
        $hash_password=Hash::make($password);
        Employee::where('emp_id',$id)->update([
            'emp_name'=>$name,
            'emp_email'=>$email,
            'password'=>$hash_password
       ]);
       return redirect('/employees');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $em = Employee::findOrFail($id);
        //echo $em;
        $em->delete();

        return redirect('/employees/');

    }
}
