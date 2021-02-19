<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClassName;
use Illuminate\Http\Request;

class ClassNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $className = ClassName::all()->orderBy('id', 'DESC');
        return response()->json([
            'success' => true,
            'message' => 'Class Name List',
            'data' => $className
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required'
        ]);

        $className = New ClassName;
        $className->name = $request->name;
        $className = ClassName::create($className);
        return response()->json([
            'success' => true,
            'message' => "Class Name create Successfully",
            'data' => $className
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassName  $className
     * @return \Illuminate\Http\Response
     */
    public function show(ClassName $className)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassName  $className
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassName $className)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassName  $className
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassName $className)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $className->name = $request->name;
        $className->save();
        return response()->json([
            'success' => true,
            'message' => 'Student update successfully',
            'data' => $className
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassName  $className
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassName $className)
    {
        $className->delete();
        return response()->json([
            'success' => true,
            'message' => 'Student deleted successfully',
            'data' => $className
        ]);
    }
}
