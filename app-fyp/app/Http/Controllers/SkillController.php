<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index() {
        $skills = Skill::all();
        return view('skills.index', ['skills' => $skills]);
    }

    public function create() {
        return view ('skills.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'Name' => 'required',
            'Description' => 'required',
        ]);

        $newSkill = Skill::create($data);
        \Log::info('About to redirect to skill.index');
        return redirect(route("skill.index"));
     }

     public function edit(Skill $skill) {
        return view('skills.edit', ['skill' => $skill]);
     }

     public function update(Skill $skill, Request $request){
        $data = $request->validate([
            'Name' => 'required',
            'Description' => 'required',
            
        ]);

        $skill->update($data);
        return redirect(route("skill.index"))->with('Sucess', 'Skill Updated Successfully !');
     }

     public function delete(Skill $skill){
        $skill->delete();
        return redirect(route("skill.index"))->with('Sucess', 'Skill Delete Successfully !');
     }
}
