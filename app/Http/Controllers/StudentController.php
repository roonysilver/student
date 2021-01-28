<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\ClassName;
use App\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        return view('student.view', array("student" => $student));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $className = ClassName::all();
        return view('student.create')->with(['className' => $className]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required|min:10|starts_with:0'
        ]);
        $student = new Student;
        $student->firstName = $request->firstName;
        $student->lastName = $request->lastName;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->dob = $request->dob;
        $student->class_names_id = $request->className;

        $student->save();
        return redirect("/student")->with('success', 'New Student has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('student.show', array('student' => $student));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $className = ClassName::all();
        return view('student.edit' , array('student' => $student))->with(['className' => $className]);
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
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required|min:10|starts_with:0'
        ]);
        $student = Student::find($id);
        $student->firstName = $request->firstName;
        $student->lastName = $request->lastName;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->dob = $request->dob;
        $student->class_names_id = $request->className;

        $student->save();
        return redirect("/student")->with('success', 'New Student has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect("/student")->with('success', 'New Student has been deleted!');
    }
}
