<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    // Show all notices
    public function index()
    {
        $notices = Notice::with('creator')->latest()->get(); 
        return view('notice.index', compact('notices'));
    }

    // Show form to create a new notice
    public function create()
    {
        return view('notice.create');
    }

    // Store a new notice
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'isTuRelated' => 'boolean',
            'desciption' => 'description',
            'isHoliday' => 'boolean',
            'isForAll' => 'boolean',
            'isFor' => 'nullable|string|max:255',
        ]);

        Notice::create([
            'title' => $request->title,
            'description' => $request->description,
            'isTuRelated' => $request->has('isTuRelated'),
            'isHoliday' => $request->has('isHoliday'),
            'isForAll' => $request->has('isForAll'),
            'isFor' => $request->isFor,
            'created_by' => Auth::id(), 
        ]);

        return redirect()->route('notice.index')->with('success', 'Notice created successfully.');
    }

    // Show form to edit a notice
    public function edit($id)
    {
        $notice = Notice::findOrFail($id);
        return view('notice.edit', compact('notice'));
    }

    // Update an existing notice
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'isTuRelated' => 'boolean',
            'isHoliday' => 'boolean',
            'isForAll' => 'boolean',
            'isFor' => 'nullable|string|max:255',
        ]);

        $notice = Notice::findOrFail($id);
        $notice->update([
            'title' => $request->title,
            'description' => $request->description,
            'isTuRelated' => $request->has('isTuRelated'),
            'isHoliday' => $request->has('isHoliday'),
            'isForAll' => $request->has('isForAll'),
            'isFor' => $request->isFor,
        ]);

        return redirect()->route('notice.index')->with('success', 'Notice updated successfully.');
    }

    // Delete a notice
    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);
        $notice->delete();

        return redirect()->route('notice.index')->with('success', 'Notice deleted successfully.');
    }

    // Show a single notice
    public function show($id)
    {
        $notice = Notice::with('creator')->findOrFail($id);
        return view('notice.show', compact('notice'));
    }
}
