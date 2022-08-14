<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\QuestionsImport;
use App\Models\Question;
use App\Models\Result;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function importQuestions()
    {
        return view('admin.question.import');
    }
    public function import()
    {
        Excel::import(new QuestionsImport, request()->file('import_que'));
        return redirect()->route('admin.indexQuestion')->with('success', 'Question Added.....');
    }

    public function index_question()
    {
        $data['questions'] = Question::join('subjects', 'subjects.id', '=', 'questions.subject_id')->select('subjects.subject', 'questions.*')->get();
        return view('admin.question.question', $data);
    }

    public function manual_question()
    {
        $data['subjects'] = Subject::all();
        return view('admin.question.manual-ques', $data);
    }
    public function manual_queStore(Request $request)
    {
        $request->validate([
            'subject_id' => 'required',
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'answer' => 'required',
        ]);

        $question = new Question;
        $question->subject_id = $request->subject_id;
        $question->question = $request->question;
        $question->a = $request->option1;
        $question->b = $request->option2;
        $question->c = $request->option3;
        $question->d = $request->option4;
        $question->answer = $request->answer;
        $question->save();
        return redirect()->route('admin.indexQuestion')->with('success', 'Question Added.....');
    }

    public function questionEditForm($id)
    {
        //    $data['questionEdits '] = Question::find($id);
        $questionEdits = Question::find($id);
        $subjectDatas = Subject::get();
        return view('admin.question.edit', compact('questionEdits', 'subjectDatas'));
    }


    public function questionUpdate(Request $request)
    {

        // $questionUpdate = Question::join('subjects','subjects.id','=','questions.subject_id')->select('subjects.subject','questions.*')->get()->find($request->id);

        $questionUpdate = Question::find($request->id);
        $questionUpdate->subject_id = $request->subject_id;
        $questionUpdate->question = $request->question;
        $questionUpdate->a = $request->option1;
        $questionUpdate->b = $request->option2;
        $questionUpdate->c = $request->option3;
        $questionUpdate->d = $request->option4;
        $questionUpdate->answer = $request->answer;
        $questionUpdate->update();
        return redirect()->route('admin.indexQuestion')->with('msg', 'Question Update Successfully.....');
    }


    public function questionDelete($quid)
    {
        $questionDelete = Question::find($quid)->delete();
        return redirect()->route('admin.indexQuestion')->with('delete', 'Question Deleted Successfully.....');
    }

    //Result Function
    public function resultForm(){
        $results = DB::table('results')->join('users','results.user_id','=','users.id')->join('subjects','results.subject_id','=','subjects.id')->get();

        return view('admin.Result.result',compact('results'));
    }
    public function deleteResult($id){
        $deleteResult = Result::where('subject_id',$id)->delete();
        return redirect()->route('admin.resultForm')->with('delete', 'Result Deleted Successfully.....');
    }

   

}
