<?php

namespace App\Http\Controllers;
use App\Course;
use App\Module;
use Illuminate\Http\Request;
Use Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function admin(){
        return view('admin.index');
     }
    public function index()
    {
        //
        $courses = Course::all();
        return view('admin.courses.index')->with('courses',$courses);
    }

    public function homepage()
    {
        //
        $courses = Course::all();
        return view('dashboard')->with('courses',$courses);
    }


    public function course($course)
    {
//loads a specific course by direct url
        $course = Course::where('course_slug', '=', $course)->firstOrFail();
        $modules = Module::where("course_id", "=", $course->id)->get();
        return view('courses.tutorial', compact('course'))->with('modules', $modules);
    }

    public function module($course, $module)
    {
//loads a specific lesson's module by direct url
        $course = Course::where('course_slug', '=', $course)->firstOrFail();
        $module = Module::where('module_slug', '=', $module)->firstOrFail();
        $modules = Module::where("course_id", "=", $course->id)->get();
        return view('courses.index', compact('course'))->with('module', $module)->with('modules', $modules);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.courses.create');
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
        $request->validate([
            'course_name' => 'required|max:255',
            'course_slug' => 'required|unique:courses|max:50',
            'course_description' => 'max: 800',
            'course_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $course = new Course;
        $course->course_name = $request->course_name;
        $course->course_slug = $request->course_slug;
        $course->course_description = $request->course_description;
        if($request->hasFile('course_image')) {

            $image  = $request->file('course_image')->store('courses');
            $course->course_image = Storage::url($image);          
        }
        $course->save();
        return redirect()->route('admin.courses.index')->with('message', 'Course successfully updated!');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        $request->validate([
            'course_name' => 'max:255',
            'course_slug' => 'max:50',
            'course_description' => 'max: 800',
            'course_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $course->update($request->all());
        $course->course_name = $request->course_name;
        $course->course_slug = $request->course_slug;
        $course->course_description = $request->course_description;
        if($request->hasFile('course_image')) {
            $image       = $request->file('course_image')->store('courses');
            $course->course_image = Storage::url($image);
        }
        $course->save();
        return redirect()->route('admin.courses.index')->with('message', 'Course successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        $course->delete();
        return redirect()->route('admin.courses.index')->with('danger-message', 'Course successfully deleted!');
    }

    public function summary($course)
    {
//loads a specific course's lessons by direct url - this is the lesson summary
        $course = Course::where('course_slug', '=', $course)->firstOrFail();
        $modules = Module::where("course_id", "=", $course->id)->get();
        return view('courses.summary', compact('course'))->with('modules', $modules)->with('course', $course);
    }

}
