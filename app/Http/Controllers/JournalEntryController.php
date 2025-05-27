<?php

namespace App\Http\Controllers;

use App\Models\JournalEntry;
use Illuminate\Http\Request;

class JournalEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journalEntries = JournalEntry::where('user_id', auth()->id())
            ->orderBy('entry_date', 'desc')
            ->get();
        return view('journal_entries.index', compact('journalEntries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("journal_entries.create"); // Kita akan buat view ini selanjutnya
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'entry_date' => 'required|date',
        ]);

        $journalEntry = new JournalEntry();
        $journalEntry->user_id = auth()->id();
        $journalEntry->title = $validated['title'];
        $journalEntry->content = $validated['content'];
        $journalEntry->entry_date = $validated['entry_date'];
        $journalEntry->save();

        return redirect()->route('journal_entries.index')
            ->with('success', 'Jurnal berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JournalEntry $journalEntry)
    {
        if ($journalEntry->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        return view('journal_entries.show', compact('journalEntry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JournalEntry $journalEntry)
    {
        if ($journalEntry->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        return view('journal_entries.edit', compact('journalEntry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JournalEntry $journalEntry)
    {
        if ($journalEntry->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'entry_date' => 'required|date',
        ]);
        $journalEntry->update($validated);
        return redirect()->route('dashboard')->with('success', 'Jurnal berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JournalEntry $journalEntry)
    {
        if ($journalEntry->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        $journalEntry->delete();
        return redirect()->route('dashboard')->with('success', 'Jurnal berhasil dihapus!');
    }
}
