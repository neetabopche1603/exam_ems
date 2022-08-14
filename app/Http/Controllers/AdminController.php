<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function adminHome()
    {
        return view('admin.dashboard');
    }

    public function showStudent()
    {
        $users = User::where('is_admin',0)->get();
        return view('admin.students.index', compact('users'));
    }

    public function sendmail(){
        return view('emails.welcome');
    }

    public function addStudentForm()
    {
        return view('admin.students.add');
    }

    public function studentRegister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required| min:8| max:16 |confirmed',
            'password_confirmation' => 'required|',
            'student_image' => 'required|image|mimes:jpg,jpeg,png,gif|',
            'stu_address' => 'required',

        ], [
            'name.required' => 'Name is required',
            'password.required' => 'Password is required'
        ]);
        $userRegister = new User;
        $userRegister->name = $request->name;
        $userRegister->mobile = $request->mobile;
        $userRegister->email = $request->email;
        $userRegister->password = Hash::make($request->password);
        $userRegister->stu_address = $request->stu_address;

        if ($image = $request->file('student_image')) {
            $destinationPath = 'student_image';
            $uploadImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $uploadImage);
            $userRegister->student_image =  $uploadImage;
        }
        $mailData = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        Mail::to($request['email'])->send(new WelcomeMail($mailData));
        dd("Email is sent successfully.");
        $userRegister->save();

        return redirect()->route('admin.showStudent')->with('success','Register Successfully.....');
    }

    // protected function studentRegister(array $data)
    // {
    //     $user =  User::create([
    //         'name' => $data['name'],
    //         'email' => $data['mobile'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'email' => $data['stu_address'],

    //       ]);
    //         if ($image = $data->file('student_image')) {
    //             $destinationPath = 'student_image';
    //             $uploadImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //             $image->move($destinationPath, $uploadImage);
    //             $user->student_image =  $uploadImage;
    //         }


    //     Mail::to($data['email'])->send(new WelcomeMail($user));
    //     dd("Email is sent successfully.");
    //     $user->save();

    //     return redirect()->route('admin.showStudent')->with('success','Register Successfully.....');
    // }

// User View
public function studentView($viewid){
    $userview = User::find($viewid);
    return view('admin.students.view',compact('userview'));
}

    //update Query

    public function editStudentForm($id)
    {
        $edituserForm = User::find($id);
        return view('admin.students.edit', compact('edituserForm'));
    }

    public function studentUpdate(Request $request)
    {
        $userupdate = User::find($request->id);
        $userupdate->name = $request->name;
        $userupdate->mobile = $request->mobile;
        $userupdate->status = $request->status;
        // $userupdate->email = $request->email;
        if ($request->password != '') {
            $userupdate->password = Hash::make($request->password);
        }
        $userupdate->stu_address = $request->stu_address;

        if ($request->file('student_image') != NULL) {

            // Old Image Delete Code Start
            if ($userupdate->student_image != NULL) {
                unlink('student_image/' . $userupdate->student_image);
            }
            // Old Image Delete Code End
            $image = $request->file('student_image');
            $destinationPath = 'student_image';
            $uploadImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $uploadImage);
            $userupdate->student_image =  $uploadImage;
        }
        $userupdate->update();

        return redirect()->route('admin.showStudent')->with('success', 'Update Successfully.....');
    }

    // Student Delete 
    public function delete($id)
    {
        $delete = User::find($id)->delete();
        return redirect()->route('admin.showStudent')->with('danger', 'User Deleted Successfully');
    }


    //Subject Functions

    public function addsubjectForm(){
        $subjectData = Subject::get();
   return view('admin.subject.subject',compact('subjectData'));
    }

    public function subjectStore(Request $request){
        $request->validate([
            'subject' =>'required',
        ]);

        $subject = new Subject;
        $subject->subject = $request->subject;
        $subject->save();
        return redirect()->route('admin.add-subject')->with('success','Subject Successfully Add.....');
    }

    //Delete Subject
    public function subject_delete($sub_del_id){
        $subjectDelete = Subject::find($sub_del_id)->delete();
        return redirect()->route('admin.add-subject')->with('delete','Subject Deleted.....');
    }
}
