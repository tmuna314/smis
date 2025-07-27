<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::all();
        return view('leave.index', compact('leaves'));
    }

    public function create()
    {
        return view('leave.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'reason' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Leave::create($request->all());

        return redirect()->route('leaves.index')->with('success', 'Leave request submitted!');
    }

    public function edit($id)
    {
        $leave = Leave::findOrFail($id);
        return view('leave.edit', compact('leave'));
    }

    public function update(Request $request, $id)
    {
        $leave = Leave::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $leave->update($request->only('status'));

        return redirect()->route('leaves.index')->with('success', 'Leave updated!');
    }

    public function destroy($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->delete();

        return redirect()->route('leaves.index')->with('success', 'Leave deleted!');
    }
}