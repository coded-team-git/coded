<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $guarded= [];

    protected $appends = ['content',];

    //* Attributes

    public function getContentAttribute()
    {

        $content = 'content_'.App::currentLocale();
        return $this->$content;
    }//! end of getNameAttribute


public function section()
{
    return $this->belongsTo(Section::class);
}//! end of section relation

}
