<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Skill;
use App\Models\Tool;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $skills = Skill::all();
        $tools = Tool::all();
        return view('roles.index', [
            'roles' => $roles,
            'skills' => $skills,
            'tools' => $tools
        ]);
    }

    public function create()
    {
        $roles = Role::all();
        $skills = Skill::all();
        $tools = Tool::all();
        return view('roles.create', [
            'roles' => $roles,
            'skills' => $skills,
            'tools' => $tools
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'Role' => 'required',
            'skills' => 'required|array',
            'tools' => 'required|array',
        ]);

        $newRole = Role::create(['Role' => $request->Role]);
        $newRole->skills()->attach($request->skills);
        $newRole->tools()->attach($request->tools);

        \Log::info('About to redirect to role.index');
        return redirect(route("role.index"))->with('success', 'Role created successfully.');
    }

    public function edit(Role $role) {
        $skills = Skill::all();
        $tools = Tool::all();
        return view('roles.edit', [
            'role' => $role,
            'skills' => $skills,
            'tools' => $tools
        ]);
    }

    public function update(Request $request, Role $role){
        $data = $request->validate([
            'Role' => 'required|string|max:255',
            'skills' => 'required|array',
            'tools' => 'required|array',
        ]);
    
        $role->update(['role_name' => $request->Role]);
    
        $role->skills()->sync($request->skills);
        $role->tools()->sync($request->tools);
    
        return redirect()->route('role.index')->with('success', 'Role updated successfully.');
    }
    


    public function delete(Role $role){
        $role->delete();
        return redirect(route("role.index"))->with('Sucess', 'Role Delete Successfully !');
    }
}
