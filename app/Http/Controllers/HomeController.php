<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Question;
use App\Answer;
use App\Survey;
use App\SurveyResponse;
use PDF;

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
        $categories = Questionnaire::all();
        $stats = [
            'categories' => count(Questionnaire::select('id')->distinct()->get()),
            'questions' => count(Question::select('id')->distinct()->get()),
            'participants' => count(SurveyResponse::select('email')->distinct()->get()),
            'answers' => count(SurveyResponse::select('answer_id')->distinct()->get()),
        ];
    
        return view('home',compact('categories','stats'));
    }

    public function search(Request $request)
    {

        $searchKey = $request->searchKey;
        $filterkey =$request->filterkey;
        if($searchKey == 'Select Survey' OR $searchKey =='Select Participant'){
            return redirect()->back()->with('error', 'Search Key is Empty!');
        }
        if($filterkey == 1){
            $participants = SurveyResponse::where('email', $searchKey)->get();
            foreach($participants as $participant){
                $participant->category = Questionnaire::where('id',$participant->category_id)->first();
                $participant->answer = Answer::where('id',$participant->answer_id)->first();
            }
            return view ('reports.searchedparticipants',compact('participants'));
        } 

        if($filterkey == 2){
            $surveys = SurveyResponse::where('category_id', $searchKey)->get();   
            foreach($surveys as $survey){
                $survey->category = Questionnaire::where('id',$survey->category_id)->first();
                $survey->answer = Answer::where('id',$survey->answer_id)->first();
            }
            return view ('reports.searchedsurvey',compact('surveys'));
        }
        
        return redirect()->back()->with('error', 'No data found!'); 
    }

    public function generalReport(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $responses = $request->id;
        $allsurveys =[];
        foreach($responses as $resid) {
            $survey = SurveyResponse::where('id', $resid)->get();  
           array_push($allsurveys, $survey);
        }
        foreach($allsurveys as $surveys){
            foreach($surveys as $survey){
                $survey->category = Questionnaire::where('id',$survey->category_id)->first();
                $survey->answer = Answer::where('id',$survey->answer_id)->first();
            }
        }
        $pdf = PDF::loadView('reports.allPdf', compact('allsurveys'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('FullReport.pdf');
    }

    public function ParticipantReport (Request $request)
    {

        $responses = $request->id;
        $allsurveys =[];
        foreach($responses as $resid) {
            $survey = SurveyResponse::where('id', $resid)->get();  
           array_push($allsurveys, $survey);
        }
        foreach($allsurveys as $surveys){
            foreach($surveys as $survey){
                $survey->category = Questionnaire::where('id',$survey->category_id)->first();
                $survey->answer = Answer::where('id',$survey->answer_id)->first();
            }
        }
        $pdf = PDF::loadView('reports.ParticipantsPdf', compact('allsurveys'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('FullReport.pdf');
    }

    public function SurveyReport(Request $request)
    {

        $responses = $request->id;
        $allsurveys =[];
        foreach($responses as $resid) {
            $survey = SurveyResponse::where('id', $resid)->get();  
           array_push($allsurveys, $survey);
        }
        foreach($allsurveys as $surveys){
            foreach($surveys as $survey){
                $survey->category = Questionnaire::where('id',$survey->category_id)->first();
                $survey->answer = Answer::where('id',$survey->answer_id)->first();
            }
        }
        $pdf = PDF::loadView('reports.SurveyPdf', compact('allsurveys'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('FullReport.pdf');
    }
    
    
}
