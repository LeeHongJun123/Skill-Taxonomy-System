<?php

// app/Http/Controllers/CareerHistoryController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareerHistory;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\Skill;
use App\Models\Tool;
use App\Models\Profile;
use App\Models\User;
use  PDF;

class CareerHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $skills = Skill::all();
        $tools = Tool::all();
        $history = CareerHistory::where('user_id', $user->id)->get();

        return view('erole.viewcareer', [
            'history' => $history,
            'skills' => $skills,
            'tools' => $tools
        ]);
    }

    public function showUserCareerHistory($id)
    {
        $user = User::with(['careerHistories.skills', 'careerHistories.tools'])->findOrFail($id);
        return view('manager.viewhistory', compact('user'));
    }

    public function create()
    {
        $skills = Skill::all();
        $tools = Tool::all();

        return view('erole.history', compact('skills', 'tools'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'years' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'skills' => 'array',
            'tools' => 'array',
        ]);

        $careerHistory = CareerHistory::create([
            'user_id' => auth()->id(),
            'company_name' => $data['company_name'],
            'job_title' => $data['job_title'],
            'years' => $data['years'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
        ]);

        $careerHistory->skills()->sync($request->input('skills', []));
        $careerHistory->tools()->sync($request->input('tools', []));

        return redirect()->route('history.index')->with('success', 'Career history added successfully!');
    }

    public function edit(CareerHistory $history)
    {
        $skills = Skill::all();
        $tools = Tool::all();

        return view('erole.history_edit', compact('history', 'skills', 'tools'));
    }

    public function update(Request $request, CareerHistory $history)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'years' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'skills' => 'array',
            'tools' => 'array',
        ]);

        $history->update([
            'company_name' => $data['company_name'],
            'job_title' => $data['job_title'],
            'years' => $data['years'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
        ]);

        $history->skills()->sync($request->input('skills', []));
        $history->tools()->sync($request->input('tools', []));

        return redirect()->route('history.index')->with('success', 'Career history updated successfully!');
    }

    public function delete(CareerHistory $history)
    {
        try {
            $history->delete();
            return redirect()->route('history.index')->with('success', 'History deleted successfully!');
        } catch (\Exception $e) {
            \Log::error('Failed to delete history: ' . $e->getMessage());
            return redirect()->route('history.index')->with('error', 'Failed to delete history: ' . $e->getMessage());
        }
    }

    public function generatePdf($id)
    {
        $user = User::with('careerHistories.skills', 'careerHistories.tools')->findOrFail($id);

        $pdf = PDF::loadView('manager.pdfhistory', compact('user'))->setPaper('a4', 'landscape');
        

        return $pdf->download('career_history.pdf');
    }

    public function HRgeneratePdf($id)
    {
        $user = User::with('careerHistories.skills', 'careerHistories.tools')->findOrFail($id);

        $pdf = PDF::loadView('hr.pdfhistory', compact('user'))->setPaper('a4', 'landscape');
        

        return $pdf->download('career_history.pdf');
    }
}

