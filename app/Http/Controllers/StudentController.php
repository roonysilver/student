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
        // $student = Student::all();
        $student = Student::orderBy('id','DESC')->paginate(10);
        // dd($student);

        // dd($student->links());
        return view('student.view')->with(["student" => $student]);
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
        // dd($request->all());
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required|min:10|starts_with:0',
            'class_names_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $student = new Student;
        $student->firstName = $request->firstName;
        $student->lastName = $request->lastName;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->dob = $request->dob;
        $student->class_names_id = $request->class_names_id;
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $student->image = '\images\\'.$imageName;
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
        try {
            $student = Student::findOrFail($id); 
            return view('student.show', array('student' => $student));   
        } catch (\Throwable $th) {
            return redirect('student');
        }
           
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {      try {
        $student = Student::findOrFail($id);
            $className = ClassName::all();
            return view('student.edit' , array('student' => $student))->with(['className' => $className]);  
    } catch (\Throwable $th) {
       return redirect('student');
    }
           
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
            'phone' => 'required|min:10|starts_with:0',
            'class_names_id' => 'required'
        ]);
        
        $student = Student::find($id);
        
        $student->firstName = $request->firstName;
        $student->lastName = $request->lastName;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->dob = $request->dob;
        $student->class_names_id = $request->class_names_id;
            if($request->image == null){  
                $student->update();
                return redirect("/student")->with('success', 'New Student has been updated!');
            } else {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);
                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('images'), $imageName);
                $student->image = '\images\\'.$imageName;
                $student->update();
                return redirect("/student")->with('success', 'New Student has been updated!'); 
            }                  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $student = Student::find($id);
            $student->delete();
            return redirect("/student")->with('success', 'New Student has been deleted!');
        } catch (\Exception $e) {
            return redirect('/student')->with('success', 'Opp, Something wrong!!');
        }
       
    }
}
