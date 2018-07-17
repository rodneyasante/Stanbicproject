<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectsPhoto extends Model
{
    protected $fillable = ['project_id', 'filename'];
 
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    
}
