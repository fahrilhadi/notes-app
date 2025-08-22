<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::latest()->get();
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'content' => 'required',
        ],
        [
            'title.required' => 'Title is required',
            'content.required' => 'Content is required',
        ]);

        if (empty($request->title) && empty($request->content)) {
            return back()
                ->withErrors(['both' => 'Title & Content are required'])
                ->withInput();
        }

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Note::create([
            'title'  => $request->title,
            'content' => $request->content,
        ]);

        return redirect()
            ->route('notes.index')
            ->with([
                'success' => 'Note added successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $note = Note::findOrFail($id);
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $note = Note::findOrFail($id);
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $note = Note::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required',
        ], [
            'title.required'  => 'Title is required',
            'content.required' => 'Content is required',
        ]);

        if (empty($request->title) && empty($request->content)) {
            return back()
                ->withErrors(['both' => 'Title & Content are required'])
                ->withInput();
        }

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $note->update([
            'title'  => $request->title,
            'content' => $request->content,
        ]);

        return redirect()
            ->route('notes.index')
            ->with('success', 'Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::findOrFail($id);

        $note->delete();

        return redirect()
            ->route('notes.index')
            ->with([
                'success' => 'Note deleted successfully',
                'icon' => 'check',
        ]);
    }
}
