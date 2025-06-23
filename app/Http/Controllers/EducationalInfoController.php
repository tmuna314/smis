<?php

namespace App\Http\Controllers;

use App\Models\EducationalInfo;
use Illuminate\Http\Request;

class EducationalInfoController extends Controller
{
    
    public function index()
    {
        $educationalInfos = EducationalInfo::all();
        return view('educationalInfo.index', compact('educationalInfos'));
    }

    public function create()
    {
        return view('educationalInfo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'symbol_no' => 'required|string|max:50',
            'board' => 'required|string|max:100',
            'passed_year' => 'required|digits:4|integer',
            'marks_obtained' => 'required|integer',
        ]);

        EducationalInfo::create($request->all());

        return redirect('/educational-info')->with('success', 'Educational info added successfully.');
    }

    public function edit($id)
    {
        $educationalInfo = EducationalInfo::findOrFail($id);
        return view('educationalInfo.edit', compact('educationalInfo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'symbol_no' => 'required|string|max:50',
            'board' => 'required|string|max:100',
            'passed_year' => 'required|digits:4|integer',
            'marks_obtained' => 'required|integer',
        ]);

        $educationalInfo = EducationalInfo::findOrFail($id);
        $educationalInfo->update($request->all());

        return redirect('/educational-info')->with('success', 'Educational info updated successfully.');
    }

    public function destroy($id)
    {
        $educationalInfo = EducationalInfo::findOrFail($id);
        $educationalInfo->delete();

        return redirect('/educational-info')->with('success', 'Educational info deleted successfully.');
    }
}

