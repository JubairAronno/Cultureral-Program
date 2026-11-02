<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = DB::table('programs')->get();
        return view('programs.index', ['programs' => $programs]);
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_name' => 'required',
            'type' => 'required',
            'venue' => 'required',
            'date' => 'required|date'
        ]);

        DB::table('programs')->insert([
            'program_name' => $request->program_name,
            'type' => $request->type,
            'venue' => $request->venue,
            'date' => $request->date,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('programs.index')
            ->with('success', 'Program added successfully.');
    }

    public function show($id)
    {
        $program = DB::table('programs')->where('id', $id)->first();
        
        if (!$program) {
            return redirect()->route('programs.index')
                ->with('error', 'Program not found.');
        }

        return view('programs.show', compact('program'));
    }

    public function edit($id)
    {
        $program = DB::table('programs')->where('id', $id)->first();
        
        if (!$program) {
            return redirect()->route('programs.index')
                ->with('error', 'Program not found.');
        }

        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'program_name' => 'required',
            'type' => 'required',
            'venue' => 'required',
            'date' => 'required|date'
        ]);

        DB::table('programs')
            ->where('id', $id)
            ->update([
                'program_name' => $request->program_name,
                'type' => $request->type,
                'venue' => $request->venue,
                'date' => $request->date,
                'updated_at' => now(),
            ]);

        return redirect()->route('programs.index')
            ->with('success', 'Program updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('programs')->where('id', $id)->delete();

        return redirect()->route('programs.index')
            ->with('success', 'Program deleted successfully.');
    }
}