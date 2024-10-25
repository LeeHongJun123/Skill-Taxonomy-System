<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;
use App\Models\User;
use App\Models\Skill;
use App\Models\Tool;
use PDF;


class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->profile;

        // Create a profile if it doesn't exist
        if (!$profile) {
            $profile = Profile::create([
                'user_id' => $user->id, // Ensure user_id is set
                'first_name' => '',
                'last_name' => '',
                'Current_role' => '',
                'Education' => '',
                'Current_comp' => 'PCCW SOLUTION sdn.bhd',
                'status' => 'Active',
            ]);
        }

        $skills = Skill::all();
        $tools = Tool::all();

        return view('erole.profile', compact('profile', 'skills', 'tools'));
    }


    public function viewEmp()
{
    $profiles = Profile::with('user')->get();
    return view('manager.view', compact('profiles'));
}

    public function showEmployeeProfile($id)
    {
        $user = User::with(['profile', 'skills', 'tools'])->findOrFail($id);
        return view('manager.showprofile', compact('user'));
    }

    public function update(Request $request, Profile $profile)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'Current_role' => 'nullable|string|max:255',
            'Education' => 'nullable|string|max:255',
            'skills' => 'array',
            'tools' => 'array',
        ]);

        $profile->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'Current_role' => $request->input('Current_role'),
            'Education' => $request->input('Education'),
            'Current_comp' => 'PCCW SOLUTION sdn.bhd', // Fixed value
            // 'status' => $profile->status, // Keep the current status value
        ]);

        // Update skills and tools
        $profile->user->skills()->sync($request->input('skills', []));
        $profile->user->tools()->sync($request->input('tools', []));

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }

    public function generatePdf($id)
    {
        $user = User::with('profile', 'skills', 'tools')->findOrFail($id);

        $pdf = PDF::loadView('manager.showpdf', compact('user'));
        return $pdf->download('profile.pdf');
    }

    public function HRgeneratePdf($id)
    {
        $user = User::with('profile', 'skills', 'tools')->findOrFail($id);

        $pdf = PDF::loadView('hr.showpdf', compact('user'));
        return $pdf->download('profile.pdf');
    }
}