<?php

namespace App\Http\Controllers;

use App\Models\GuardianInfo;
use Illuminate\Http\Request;

class GuardianInfoController extends Controller
{
  public function index()
    {
        $guardianInfos = GuardianInfo::all();
        return view('guardianInfo.index', compact('guardianInfos'));
    }

    public function create()
    {
        return view('guardianInfo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'name' => 'required|string|max:100',
            'mobile' => ['required', 'regex:/^\d{10,}$/'],
            'email' => 'nullable|email',
            'contact_no' => ['nullable', 'regex:/^\d{10,}$/'],
            'contact_address' => 'nullable|string|max:255',
            'relation' => 'required|string|max:50',
        ], [
            'mobile.regex' => 'Number must be at least 10 digits!',
            'contact_no.regex' => 'Number must be at least 10 digits!'
        ]);

        GuardianInfo::create($request->all());

        return redirect('/guardian-info')->with('success', 'Guardian info added successfully.');
    }

    public function edit($id)
    {
        $guardianInfo = GuardianInfo::findOrFail($id);
        return view('guardianInfo.edit', compact('guardianInfo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'name' => 'required|string|max:100',
            'mobile' => ['required', 'regex:/^\d{10,}$/'],
            'email' => 'nullable|email',
            'contact_no' => ['nullable', 'regex:/^\d{10,}$/'],
            'contact_address' => 'nullable|string|max:255',
            'relation' => 'required|string|max:50',
        ], [
            'mobile.regex' => 'Number must be at least 10 digits!',
            'contact_no.regex' => 'Number must be at least 10 digits!'
        ]);

        $guardianInfo = GuardianInfo::findOrFail($id);
        $guardianInfo->update($request->all());

        return redirect('/guardian-info')->with('success', 'Guardian info updated successfully.');
    }

    public function destroy($id)
    {
        $guardianInfo = GuardianInfo::findOrFail($id);
        $guardianInfo->delete();

        return redirect('/guardian-info')->with('success', 'Guardian info deleted successfully.');
    }
}
