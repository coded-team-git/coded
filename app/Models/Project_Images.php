<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_Images extends Model
{
    use HasFactory;
    // protected $fillable = ['project_id', 'image'];

    protected $guarded= [];

    protected $table = 'project_images';


    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
