<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;

class ToolController extends Controller
{
    public function index() {
        $tools = Tool::all();
        return view('tools.index', ['tools' => $tools]);
    }

    public function create() {
        return view('tools.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'Name' => 'required',
            'Description' => 'required',

        ]);

        $newTool = Tool::create($data);
        \Log::info('About to redirect to tool.index');
        return redirect(route("tool.index"));

    }

    public function edit(Tool $tool) {
        return view('tools.edit', ['tool' => $tool]);
     }

     public function update(Tool $tool, Request $request){
        $data = $request->validate([
            'Name' => 'required',
            'Description' => 'required',
        ]);

        $tool->update($data);
        return redirect(route("tool.index"))->with('Sucess', 'Tool Updated Successfully !');
     }

     public function delete(Tool $tool){
        $tool->delete();
        return redirect(route("tool.index"))->with('Sucess', 'Skill Delete Successfully !');
     }
}
