<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;


    // protected $fillable = ['name_en','name_ar','description_ar' , 'description_en' , 'image'];
    protected $guarded=[];



    protected $appends = ['name', 'description'];

    //* Attributes

    public function getNameAttribute()
    {
$name = 'name_'.App::currentLocale();
        return $this->$name;
    }//! end of getNameAttribute
    public function getDescriptionAttribute()
    {
$description = 'description_'.App::currentLocale();
        return $this->$description;
    }//! end of getDescriptionAttribute

    public function projects(){
        return $this->hasMany(Project::class);
    }

}
