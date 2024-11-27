<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'link' , 'tag', 'service_id'];
    protected $guarded=[];
    protected $casts=['tag'=>'array'];


    public function service(){
        return $this->belongsTo(Service::class);
    }

    public  function images(){
        return $this->hasMany(Project_Images::class  );
    }

}
