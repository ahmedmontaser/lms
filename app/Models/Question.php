<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $fillable = [
		'question',
		'right_answer',
		'option_1',
		'option_2',
		'option_3',
		'score',
		'quiz_id',
		'type'
	];

	use HasFactory;

	public function quiz() {
		return $this->belongsTo('App\Models\Quiz');
	}
}
