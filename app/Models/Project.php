<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'img',
        'repository',
        'page_project',
        'type_id'
    ];

    public function type() {
        return $this->belongsTo(Type::class);
    }

    //un progetto ha più tecnologie
    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
