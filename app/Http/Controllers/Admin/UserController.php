<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index( User $model ) {
		$users = User::where('admin', 0)->orderBy('id', 'desc')->paginate(10);
		return view('admin.users.index', ['users' => $users]);
	}

	public function create() {
		return view('admin.users.create');
	}

	public function store( Request $request ) {
		User::create($request->merge(['password' => Hash::make($request->get('password'))])->all());

		return redirect()->route('users.index');
	}

	public function edit( User $user ) {
		return view('admin.users.edit', compact('user'));
	}

	public function update( Request $request, User $user ) {
		$rules = [
			'name' => 'required|string|min:5|max:40',
			'email' => 'required|email',
			'password' => 'nullable|min:6|confirmed',
		];

		$this->validate($request, $rules);

		$user->update(
			$request->merge(['password' => Hash::make($request->get('password'))])
				->except([$request->get('password') ? '' : 'password']
				));

		return redirect()->route('users.index');
	}

	public function destroy( User $user ) {
		$user->delete();

		return redirect()->route('users.index');
	}
}
