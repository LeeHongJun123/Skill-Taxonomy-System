<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Tool;
use App\Models\Role;


class HrsController extends Controller
{
    public function register() {
        return view('hrs.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'], //Hash::make($data['password']),
        ]);
    }

    public function index() {
        return view('hr.home');
    }

    public function viewEmp()
{
    $profiles = Profile::with('user')->get();
    return view('hr.view', compact('profiles'));
}

    public function showEmployeeProfile($id)
    {
        $user = User::with(['profile', 'skills', 'tools'])->findOrFail($id);
        return view('hr.showprofile', compact('user'));
    }

    public function showUserCareerHistory($id)
    {
        $user = User::with(['careerHistories.skills', 'careerHistories.tools'])->findOrFail($id);
        return view('hr.viewhistory', compact('user'));
    }

    public function view_tax() {
        $roles = Role::all();
        $skills = Skill::all();
        $tools = Tool::all();
        return view('hr.viewtaxonomy', [
            'roles' => $roles,
            'skills' => $skills,
            'tools' => $tools
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->status = $request->input('status');
        $profile->save();

        return redirect()->route('Hrview.profile')->with('Sucess', 'Profile status updated successfully!');
    }

}
