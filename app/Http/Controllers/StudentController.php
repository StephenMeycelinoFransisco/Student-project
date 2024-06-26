<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\ClassResource;
use App\Http\Resources\StudentResource;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\ClassesResource;
use Laracasts\Flash\Flash;

class StudentController extends Controller
{
    public function index(Request $request) 
    {
        $studentQuery = Student::query();

        $studentQuery = $this->applySearch($studentQuery, request('search'));

        return inertia('Student/Index', [
            'students' => StudentResource::collection($studentQuery->paginate(10)),
            'search' => request('search') ?? ''
        ]);
    }

    protected function applySearch(Builder $query, $search)
    {
        return $query->when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        });
    }

    public function create()
    {
        $classes = ClassesResource::collection(Classes::all());

        return inertia('Student/Create', [
            'classes' => $classes
        ]);
    }

    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());
        Flash::success('Student created successfully!');
        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        $classes = ClassesResource::collection(Classes::all());

        return inertia('Student/Edit', [
            'student' => StudentResource::make($student),
            'classes' => $classes
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        Flash::success('Student created successfully!');
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
