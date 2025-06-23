<?php

namespace App\Http\Controllers;

use App\Models\AddressInfo;
use Illuminate\Http\Request;

class AddressInfoController extends Controller
{
    /**
     * Display a listing of the address infos.
     */
    public function index()
    {
        $addressinfos = AddressInfo::all();
        return view('addressinfo.index', compact('addressinfos'));
    }

    /**
     * Show the form for creating a new address info.
     */
    public function create()
    {
        return view('addressinfo.create');
    }

    /**
     * Store a newly created address info in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id'      => 'required|integer',
            'province'        => 'required|string|max:255',
            'district'        => 'required|string|max:255',
            'ward_or_vdc'     => 'required|string|max:255',
            'tole_or_street'  => 'required|string|max:255',
            // Removed 'is_permanent' from validation
        ]);

        // Set is_permanent manually as boolean
        $validated['is_permanent'] = $request->has('is_permanent');

        AddressInfo::create($validated);

        return redirect()->route('addressinfo.index')->with('success', 'Address Info added successfully.');
    }

    /**
     * Show the form for editing the specified address info.
     */
    public function edit($id)
    {
        $addressinfo = AddressInfo::findOrFail($id);
        return view('addressinfo.edit', compact('addressinfo'));
    }

    /**
     * Update the specified address info in storage.
     */
    public function update(Request $request, $id)
    {
        $addressinfo = AddressInfo::findOrFail($id);

        $validated = $request->validate([
            'student_id'      => 'required|integer',
            'province'        => 'required|string|max:255',
            'district'        => 'required|string|max:255',
            'ward_or_vdc'     => 'required|string|max:255',
            'tole_or_street'  => 'required|string|max:255',
            // Removed 'is_permanent' from validation
        ]);

        // Set is_permanent manually as boolean
        $validated['is_permanent'] = $request->has('is_permanent');

        $addressinfo->update($validated);

        return redirect()->route('addressinfo.index')->with('success', 'Address Info updated successfully.');
    }

    /**
     * Remove the specified address info from storage.
     */
    public function destroy($id)
    {
        $addressinfo = AddressInfo::findOrFail($id);
        $addressinfo->delete();

        return redirect()->route('addressinfo.index')->with('success', 'Address Info deleted successfully.');
    }
}
