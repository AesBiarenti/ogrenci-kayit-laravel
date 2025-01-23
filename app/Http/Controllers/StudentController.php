<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('students.index',compact('students'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
        ], [
            'email.unique' => 'Bu e-posta adresi zaten kayıtlı!',
        ]);
    
        Student::create($request->all());
    
        return redirect()->back()->with('success', 'Öğrenci başarıyla kaydedildi!');
    }
    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->back()->with('success','Öğrenci Başarıyla Silindi');
    }
}
