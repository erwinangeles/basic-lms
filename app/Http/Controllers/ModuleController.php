<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;
Use Image;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $module = new Module;
        $module->module_name = $request->module_name;
        $module->course_id = $request->course_id;
        $module->module_slug = $request->module_slug;
        $module->module_content = $request->module_content;
        if($request->hasFile('module_image')) {

            $image       = $request->file('module_image');
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(240, 140);
            $image_resize->save('images/' .$filename);
            $module->module_image = $filename;
        }
        else {
            $module->module_image = 'noimage.jpg';
        }
        $module->save();

        return redirect('dashboard')->with('message', 'Module successfully created!');
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
        return view('modules.edit', compact('module'));
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
        $module->update($request->all());
        $module->module_name = $request->module_name;
        $module->module_slug = $request->module_slug;
        $module->module_content = $request->module_content;
        if($request->hasFile('module_image')) {

            $image       = $request->file('module_image');
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(240, 140);
            $image_resize->save('images/' .$filename);
            $module->module_image = $filename;
        }
        $module->save();
        return redirect()->back()->with('message', 'Module successfully updated!');
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
        return redirect('dashboard')->with('danger-message', 'Module successfully deleted!');
    }
}
