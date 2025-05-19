<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    private $genders = ['male' => 'Male', 'female' => 'Female'];
    private $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];
    private $studentListRoute = '/students';
    public function student(Request $request)
    {
        return view('students.index', ['students' => Student::getStudentList($request->all()), 'statuses' => $this->statuses, 'genders' => $this->genders]);
    }

    public function addStudent()
    {
        $student = new Student;
        return view('students.student-form', ['student' => $student]);
    }

    public function editStudent($id)
    {
        $student = Student::getStudentById($id);
        if (empty($student))
            abort(404);
        return view('students.student-form', ['student' => $student]);
    }

    public function saveStudent(Request $request)
    {
        $rules =  [
            'name' => 'required|min:1|max:100',
            'date_of_birth' => 'required|date|before:tomorrow',
            'gender' => 'required|in:male,female,other',
            'email' => 'required|email:rfc,dns|max:100',
            'mobile' => 'required|min:10|max:10|unique:students,mobile,' . $request->get('id'),
            'address' => 'required|min:1',
            'roll_number' => 'required|min:1|max:50|unique:students,roll_number,' . $request->get('id'),
            'class' => 'nullable|min:1|max:50',
            'section' => 'nullable|min:1|max:50',
        ];
        $messages = [
            'name.required' => 'Please enter your name',
            'name.min' => 'Name should be at least 1 character',
            'name.max' => 'Name should not exceed 100 characters',

            'date_of_birth.required' => 'Please enter your date of birth',
            'date_of_birth.date' => 'Please provide a valid date',
            'date_of_birth.before' => 'Date of birth must be before tomorrow',

            'gender.required' => 'Please select your gender',
            'gender.in' => 'Gender must be one of the following: male, female, or other',

            'email.required' => 'Please enter your email address',
            'email.email' => 'Please provide a valid email address',
            'email.max' => 'Email should not exceed 100 characters',

            'mobile.required' => 'Please enter your mobile number',
            'mobile.min' => 'Mobile number must be exactly 10 digits',
            'mobile.max' => 'Mobile number must be exactly 10 digits',
            'mobile.unique' => 'This mobile number is already associated with another student',

            'address.required' => 'Please enter your address',
            'address.min' => 'Address should be at least 1 character',

            'roll_number.required' => 'Please enter a roll number',
            'roll_number.min' => 'Roll number should be at least 1 character',
            'roll_number.max' => 'Roll number should not exceed 50 characters',
            'roll_number.unique' => 'This roll number is already associated with another student',

            'class.min' => 'Class should be at least 1 character',
            'class.max' => 'Class should not exceed 50 characters',

            'section.min' => 'Section should be at least 1 character',
            'section.max' => 'Section should not exceed 50 characters',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            return redirect()->back()->withError($errorMessage)->withInput();
        }

        if (!empty($request->get('id'))) {
            $student = Student::getStudentById($request->get('id'));
            if (empty($student))
                abort(404);
            $redirect = [
                'url' => redirect()->back(),
                'msg' => 'Student updated successfully'
            ];
        } else {
            $student = new Student;
            $redirect = [
                'url' => redirect($this->studentListRoute),
                'msg' => 'Student created successfully'
            ];
        }

        $student->name = trim($request->get('name'));
        $student->date_of_birth = date('Y-m-d', strtotime($request->get('date_of_birth')));
        $student->gender = $request->input('gender');
        $student->email = trim($request->input('email'));
        $student->mobile = trim($request->input('mobile'));
        $student->address = trim($request->get('address'));
        $student->roll_number = $request->get('roll_number');
        $student->class = $request->input('class') ? $request->input('class') : null;
        $student->section = $request->input('section') ? $request->input('section') : null;
        $student->status = !empty($request->get('status')) ? 'active' : 'inactive';
        try {
            $student->save();
            return $redirect['url']->with('success', $redirect['msg']);
        } catch (\Exception $e) {
            echo ($e->getMessage());
            exit;
            return redirect()->back()->withError('Something went wrong please try again later');
        }
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        if (empty($student))
            abort(404);
        try {
            $student->delete();
            return redirect($this->studentListRoute)->with('success', 'Student has been deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Something went wrong please try again later');
        }
    }
}
