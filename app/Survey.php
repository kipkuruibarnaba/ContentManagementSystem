<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $guarded =[];
    
    public function questionnaire(){
        return $this->belongsTo(questionnaire::class);
   }
    public function surveys(){
        return $this->hasMany(SurveyResponse::class);
   }
}
