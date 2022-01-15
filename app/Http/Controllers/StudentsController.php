<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('students.index',[
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
            'title' => 'required',
            'fname' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'lname' => ['required','regex:/^[a-zA-Z]+$/'],
            'nic' => 'required|min:10|max:12|unique:students',
            'dob' => 'required',
            'contactNo' => ['required','min:9','max:10','regex:/^7{1}(0|1|2|5|6|7|8){1}[0-9]{7}$/'],
            'gender' => 'required',
            'email' => ['required','unique:students','regex:/^(.+)@(.+)$/']
        ]);

        $student = Student::make([
            'title' => $request->input('title'),
            'firstName' => $request->input('fname'),
            'lastName' => $request->input('lname'),
            'nic' => $request->input('nic'),
            'dob' => $request->input('dob'),
            'contactNo' => $request->input('contactNo'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email')
        ]);
        $student->save();

        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $student = Student::find($id);
        // $courses = DB::table('courses')
        //     ->where('id', $id)
        //     ->get();
        // $batches = DB::table('batches')
        //     ->get();
        $studentCoursesWithBatches = DB::table('batches')
            ->join('courses', 'courses.id', '=', 'batches.course_id')
            ->join('students', 'students.batch_id', '=', 'batches.id')
            ->where('students.id', $id)
            ->select('courseName','batchName')
            ->get();
        //dd($studentCoursesWithBatches);
        return view('students.show',[
            'student' => $student,
            'studentCoursesWithBatches' => $studentCoursesWithBatches
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
        $student = Student::find($id);
        $coursesWithBatches = DB::table('courses')
            ->join('batches', 'courses.id', '=', 'batches.course_id')
            ->select('courseName','batchName','batches.id')
            ->get();
        //dd($coursesWithBatches);
        return view('students.edit',[
            'student' => $student,
            'coursesWithBatches' => $coursesWithBatches
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
            'title' => 'required',
            'fname' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'lname' => ['required','regex:/^[a-zA-Z]+$/'],
            'nic' => 'required|min:10|max:12',
            'dob' => 'required',
            'contactNo' => ['required','min:9','max:10','regex:/^7{1}(0|1|2|5|6|7|8){1}[0-9]{7}$/'],
            'gender' => 'required',
            'email' => ['required','regex:/^(.+)@(.+)$/']
        ]);

        $student = Student::where('id', $id)
                ->update([
                    'title' => $request->input('title'),
                    'firstName' => $request->input('fname'),
                    'lastName' => $request->input('lname'),
                    'nic' => $request->input('nic'),
                    'dob' => $request->input('dob'),
                    'contactNo' => $request->input('contactNo'),
                    'gender' => $request->input('gender'),
                    'email' => $request->input('email'),
                    'batch_id' => $request->input('batch_id')
        ]);

        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //$student = Student::find($id);

        $student->delete();

        return redirect('/students');
    }

    public function pdf($id)
    {
        //dd($id);
        $student = Student::find($id);
        $studentCoursesWithBatches = DB::table('batches')
            ->join('courses', 'courses.id', '=', 'batches.course_id')
            ->join('students', 'students.batch_id', '=', 'batches.id')
            ->where('students.id', $id)
            ->select('courseName','batchName')
            ->get();
        $pdf = app('dompdf.wrapper');
        $pdf->loadview('students.pdf', [
            'student' => $student,
            'studentCoursesWithBatches' => $studentCoursesWithBatches
        ]);
        return $pdf->download('student ' . $id . ' details.pdf');

    }
}
