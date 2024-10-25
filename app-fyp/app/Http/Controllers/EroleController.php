<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Tool;
use App\Models\Role;
use App\Models\Profile;
use App\Models\CareerHistory;

class EroleController extends Controller
{
    public function index() {
        return view('erole.home');
    }

    public function profile() {
        return view('erole.profile');
    }

    public function skill() {
        $skills = Skill::all();
        return view('erole.skill', ['skills' => $skills]);
    }

    public function tool() {
        $tools = Tool::all();
        return view('erole.tool', ['tools' => $tools]);
    }

    public function view_tax() {
        $roles = Role::all();
        $skills = Skill::all();
        $tools = Tool::all();
        return view('erole.viewtaxonomy', [
            'roles' => $roles,
            'skills' => $skills,
            'tools' => $tools
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $profiles = Profile::where('first_name', 'LIKE', "%{$query}%")
            ->orWhere('last_name', 'LIKE', "%{$query}%")
            ->orWhereHas('user.skills', function ($q) use ($query) {
                $q->where('Name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('user.careerHistories.skills', function ($q) use ($query) {
                $q->where('Name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('user.tools', function ($q) use ($query) {
                $q->where('Name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('user.careerHistories.tools', function ($q) use ($query) {
                $q->where('Name', 'LIKE', "%{$query}%");
            })
            ->with('user.skills', 'user.tools', 'user.careerHistories.skills', 'user.careerHistories.tools')
            ->get();

        return view('manager.view', compact('profiles'));
    }

    public function HRsearch(Request $request)
    {
        $query = $request->input('query');

        $profiles = Profile::where('first_name', 'LIKE', "%{$query}%")
            ->orWhere('last_name', 'LIKE', "%{$query}%")
            ->orWhereHas('user.skills', function ($q) use ($query) {
                $q->where('Name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('user.careerHistories.skills', function ($q) use ($query) {
                $q->where('Name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('user.tools', function ($q) use ($query) {
                $q->where('Name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('user.careerHistories.tools', function ($q) use ($query) {
                $q->where('Name', 'LIKE', "%{$query}%");
            })
            ->with('user.skills', 'user.tools', 'user.careerHistories.skills', 'user.careerHistories.tools')
            ->get();

        return view('hr.view', compact('profiles'));
    }

}
