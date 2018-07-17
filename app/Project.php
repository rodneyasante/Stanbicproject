<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    protected $fillable = [
        'event_name', 'category', 'type', 'start_date', 'end_date','description','venue','contact_person','contact_no','user_id','status','latitude','longitude','user_id','url'
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',	
        'end_date'
    ];
    public function ProjectsPhoto()
    {
        return $this->hasmany('App\ProjectsPhoto');
    }
}
