<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded= [];


    protected $appends = ['name',];

    //* Attributes

    public function getNameAttribute()
    {
        $name = 'title_'.App::currentLocale();
        return $this->$name;
    }//! end of getNameAttribute



    public function scopeWherePage($query, $page_name)
    {
        return $query->whereHas("page", function ($q) use ($page_name) {
            $q->whereIn("name", (array) $page_name)
                ->orWhereIn("id", (array) $page_name);
        });

    }//? end of scopeWhereRole


public function page()
{
    return $this->belongsTo(Page::class);
}//! end of page

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
