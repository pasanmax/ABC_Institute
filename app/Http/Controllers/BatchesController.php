<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::all();
        $courses = Course::all();

        return view('batches.index',[
            'batches' => $batches,
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('batches.create',[
            'courses' => $courses
        ]);
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
            'batchName' => ['required', 'regex:/^[a-zA-Z_ ]+$/'],
            'course_id' => 'required|integer|unique:courses'
        ]);

        $batches = Batch::make([
            'batchName' => $request->input('batchName'),
            'course_id' => $request->input('course_id')
        ]);
        $batches->save();

        return redirect('/batches');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $batch = Batch::find($id);
        $courses = Course::all();

        return view('batches.show',[
            'batch' => $batch,
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $batch = Batch::find($id);
        $courses = Course::all();
        //dd($batch);
        return view('batches.edit',[
            'batch' => $batch,
            'courses' => $courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'batchName' => ['required', 'regex:/^[a-zA-Z_ ]+$/'],
            'course_id' => 'required|integer'
        ]);

        $batch = Batch::where('id', $id)
                ->update([
                    'batchName' => $request->input('batchName'),
                    'course_id' => $request->input('course_id')
        ]);

        return redirect('/batches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();

        return redirect('/batches');
    }
}
