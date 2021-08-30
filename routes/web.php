<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'HomeController@index');

Auth::routes();
Route::group(['prefix'=>'admin',  'middleware'=>'auth'], function (){

    Route::get('/home',[
        'uses' => 'HomeController@index',
        'as'=> 'home'
    ]);

    Route::get('/create/questionnaire',[
        'uses' => 'QuestionnaireController@create',
        'as'=> 'questionnaire'
    ]);
    Route::post('/store/questionnaire',[
        'uses' => 'QuestionnaireController@store',
        'as'=> 'storequestionnaire'
    ]);    

    Route::post('/store/question',[
        'uses' => 'QuestionController@store',
        'as'=> 'storequestion'
    ]);

    Route::get('/showquestionnaires',[
        'uses' => 'QuestionnaireController@show',
        'as'=> 'showquestionnaires'
    ]);  

    Route::get('/category/{id}',[
        'uses' => 'QuestionController@create',
        'as'=> 'category.get'
    ]);
    Route::get('/viewquestions/{id}',[
        'uses' => 'QuestionController@viewquestions',
        'as'=> 'viewquestions.get'
    ]);   

    Route::get('/surveys/{id}',[
        'uses' => 'SurveyController@create',
        'as'=> 'surveys'
    ]);   

    Route::post('/completesurvey/{id}',[
        'uses' => 'SurveyController@store',
        'as'=> 'completesurvey'
    ]);   
    Route::get('/showreports',[
        'uses' => 'ReportsController@reports',
        'as'=> 'showreports'
    ]); 

    Route::post('/filter/questionnaire',[
        'uses' => 'HomeController@search',
        'as'=> 'filter'
    ]); 

    Route::post('/generateGeneralPdf',[
        'uses' => 'HomeController@generalReport',
        'as'=> 'generateGeneralPdf'
    ]); 

    Route::post('/generateParticipantsPdf',[
        'uses' => 'HomeController@ParticipantReport',
        'as'=> 'generateParticipantsPdf'
    ]); 

    Route::post('/generateSurveyPdf',[
        'uses' => 'HomeController@SurveyReport',
        'as'=> 'generateSurveyPdf'
    ]); 
});
