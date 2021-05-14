<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

	protected $fillable = [
		'name',
		'subject_id',
	];

	public function questions() {
		return $this->hasMany('App\Models\Question');
	}

	public function subject() {
		return $this->belongsTo('App\Models\Subject');
	}

	public function users() {
		return $this->belongsToMany('App\User');
	}
}
