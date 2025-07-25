<?php

namespace App\Http\Controllers;

use App\Models\AddressInfo;
use Illuminate\Http\Request;

class AddressInfoController extends Controller
{
    public function index()
    {
        $addresses = AddressInfo::all();
        return view('addressinfo.index', compact('addresses'));
    }

    public function create()
    {
        return view('addressinfo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'province_name' => 'required|string',
            'district_name' => 'required|string',
            'ward_vdc' => 'required|string',
            'tole_street' => 'required|string',
            'is_permanent' => 'required|boolean',
        ]);

        AddressInfo::create($request->all());

        return redirect()->route('addressinfo.index')->with('success', 'Address Info created successfully!');
    }

    public function edit($id)
    {
        $address = AddressInfo::findOrFail($id);
        return view('addressinfo.edit', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'province_name' => 'required|string',
            'district_name' => 'required|string',
            'ward_vdc' => 'required|string',
            'tole_street' => 'required|string',
            'is_permanent' => 'required|boolean',
        ]);

        $address = AddressInfo::findOrFail($id);
        $address->update($request->all());

        return redirect()->route('addressinfo.index')->with('success', 'Address Info updated successfully!');
    }

    public function destroy($id)
    {
        $address = AddressInfo::findOrFail($id);
        $address->delete();

        return redirect()->route('addressinfo.index')->with('success', 'Address deleted successfully.');
    }
}
