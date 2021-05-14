<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

	protected $fillable = [
		'title',
		'description',
		'slug',
	];

	public function photo() {
		return $this->morphOne('App\Models\Photo', 'photoable');
	}

	public function users() {
		return $this->belongsToMany('App\Models\User');
	}

	public function quizzes() {
		return $this->hasMany('App\Models\Quiz');
	}
}
