<?php

namespace App\Http\Controllers;

use App\Course;
use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
Use Image;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->input('course_id')){
            $modules = Module::where("course_id", $request->input('course_id'))->get();
        }else
            $modules = Module::all();
        return view('admin.modules.index')->with('modules',$modules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'module_name' => 'required|max:255',
            'module_slug' => 'required|unique:modules|max:50',
            'module_type' => 'required',
            'video_url' => 'max:100',
            'module_content' => 'max:5000',
            'module_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //
        $module = new Module;
        $module->module_name = $request->module_name;
        $module->course_id = $request->course_id;
        $module->module_slug = $request->module_slug;
        $module->module_type = $request->module_type;
        $module->video_url = $request->video_url;
        $module->module_content = $request->module_content;
        if($request->hasFile('module_image')) {

            $image       = $request->file('module_image')->store('modules');
            $module->module_image = Storage::url($image);
            $module->module_image = $filename;
        }
        $module->save();
        return redirect('admin/modules?course_id='. $module->course_id)->with('message', 'Module successfully created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
        return view('admin.modules.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        //
        $request->validate([
            'module_name' => 'required|max:255',
            'module_slug' => 'required|max:50',
            'module_type' => 'required',
            'video_url' => 'max:100',
            'module_content' => 'max:5000',
            'module_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $module->update($request->all());
        $module->module_name = $request->module_name;
        $module->module_slug = $request->module_slug;
        $module->module_content = $request->module_content;
        $module->module_type = $request->module_type;
        $module->video_url = $request->video_url;
        if($request->hasFile('module_image')) {
            $image = $request->file('module_image')->store('modules');
            $module->module_image = Storage::url($image);
        }
        $module->save();
        return redirect('admin/modules?course_id='. $module->course_id)->with('message', 'Module successfully created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        //
        $module->delete();
        return redirect('admin/modules?course_id='. $module->course_id)->with('danger-message', 'Module successfully deleted!');
    }
}
