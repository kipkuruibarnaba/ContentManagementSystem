<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Question;
use App\Answer;
use App\Survey;
use App\SurveyResponse;

class SurveyController extends Controller
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
        $question->answer = Answer::where('question_id',$question->id)->get();
       }
       return view('survey.view',compact('category','questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $surveyCategory = $id;
        $questions = $request ->input('question');
        $answers= $request ->input('answer');
         foreach($questions as $key => $question){
            $question = explode('||',$question);
            $surveyData = [
                'category_id'=>$surveyCategory,
                'question_id'=>$question[0],
                'question_name'=>$question[1],
                'answer_id'=>$answers[$key],
                'name'=>$request->name,
                'email'=>$request->email
            ];
            // dd($surveyData);
            $dat = SurveyResponse::create($surveyData);
         }

         return redirect()->back()->with('success','Completed Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
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
