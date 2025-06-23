<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getStudent(){
        $Student=Student::all();
        return $Student;   
    }
     public function saveStudent(Request $request)
    {
        // Validate input based on fields from the table
        $validated = $request->validate([
            'registration_number' => 'required|unique:students,registration_number|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'college_email' => 'required|email|unique:students,college_email',
            'mobile' => 'nullable|string|max:20',
            'landline' => 'nullable|string|max:20',
            'blood_group' => 'nullable|string|max:10',
            'date_of_birth' => 'required|date',
        ]);
    }
}