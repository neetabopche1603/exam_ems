<?php

namespace App\Http\Controllers;

use App\Mail\ResultMail;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Option;
use App\Models\Result;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }

    public function exam()
    {
        $exams = DB::table('questions')->join('subjects', 'questions.subject_id', '=', 'subjects.id')->get();
        return view('user.exam', compact('exams'));
    }


    public function joinExam($id)
    {
        $data = DB::table('subjects')
            ->join('questions', 'subjects.id', '=', 'questions.subject_id')
            ->select('questions.*', 'subjects.subject as subject_name', 'subjects.id as subject_id')
            ->where('subjects.id', '=', $id)
            ->get();
        $subject = Subject::where('id', '=', $id)->get();
        return view('user.view-exam', compact('data', 'subject'));
    }

    public function submitExam(Request $request)
    {
        $data = $request->all();
        $count = 0;
        $ans = [];
        for ($i = 1; $i <= 20; $i++) {
        }
        for ($i = 1; $i <= $request->index; $i++) {
            if (isset($data['question' . $i]) && isset($data['option' . $i])) {
                $question = Question::where('id', $data['question' . $i])->first();

                if ($question->answer ==  $data['option' . $i]) {
                    $count++;
                } else {
                    $count;
                }
            }

            if (isset($data['option' . $i])) {
                array_push($ans, $data['option' . $i]);
            } else {
                array_push($ans, 'Not Answered');
            }
        }

        $option = new Option();
        $option->option = json_encode($ans);
        $option->subject_id = $request->subject_id;
        $option->user_id = $request->user_id;
        $option->save();

        $result = $count / $request->index;
        $result = $result * 100;
        $result = round($result, 2);

        $res = new Result();
        $res->subject_id = $request->subject_id;
        $res->user_id = $request->user_id;
        $res->result = $result;
        $res->save();

        $answer = DB::table('subjects')
            ->join('questions', 'subjects.id', '=', 'questions.subject_id')
            ->select('questions.*', 'subjects.subject as subject_name')
            ->where('subjects.id', '=', $request->subject_id)
            ->get();

        $subname = json_decode(json_encode($answer), true);
        $mailData = [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'result' => $result,
            'subject' => $subname[0]["subject_name"]
        ];
        Mail::to(auth()->user()->email)->send(new ResultMail($mailData));
        $answer->option = $option->option;
        return view('user.result', compact('result', 'answer'));
    }
}
