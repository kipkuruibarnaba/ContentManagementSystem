<?php

namespace App\Http\Controllers;
use App\Questionnaire;
use App\Question;
use App\Answer;

use Illuminate\Http\Request;

class QuestionController extends Controller
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
    public function create($id)
    {
        $category =Questionnaire::find($id);
        $questions =Question::where('questionnaire_id',$category->id)->get();
       foreach($questions as $question){
        $question->answer = Answer::where('question_id',$question->questionnaire_id)->get();
       }
       return view('question.create',compact('category','questions'));
    }

    public function viewquestions($id)
    {
        $category =Questionnaire::find($id);
        $questions =Question::where('questionnaire_id',$category->id)->get();
       foreach($questions as $question){
        $question->answer = Answer::where('question_id',$question->id)->get();
       }
       return view('question.view',compact('category','questions'));
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = explode('||', $request->category);
        $questionData = [
            'questionnaire_id'=>$request->category,
            'question'=>$request->question
        ];
        $dat = Question::create($questionData);

        //Saving Choices
        $choices = $request->choice;
        foreach($choices as $key => $choice){
            $answerData = [
                'question_id'=>$dat->id,
                'answer'=>$request->choice[$key]
            ];
         Answer::create($answerData);
        }

     return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Questinnaire $questinnaire,$id)
    {
        $questinnaire->load('questions.answers');
        // dd($questinnaire);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
