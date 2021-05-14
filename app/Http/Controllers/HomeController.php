<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index() {
		$users = User::where('admin', 0)->get();

		if ( Auth::check() ) {
			$user = auth()->user();
			$user_subjects = $user->subjects;

			return view('home', compact('user_subjects', 'users'));
		} else {
			return view('home', compact( 'users'));
		}
	}
}
