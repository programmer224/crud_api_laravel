<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return [
            "status" => 1,
            "data" => $students
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'qualification' => 'required',
            'gender' => 'required',
        ]);
 
        $student = Student::create($request->all());
        return [
            "status" => 1,
            "data" => $student
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return [
            "status" => 1,
            "data" =>$student
        ];
    }
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'qualification' => 'required',
            'gender' => 'required',
        ]);
 
        $student->update($request->all());
 
        return [
            "status" => 1,
            "data" => $student,
            "msg" => "Student data updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return [
            "status" => 1,
            "data" => $student,
            "msg" => "Student data deleted successfully"
        ];
    }
}
