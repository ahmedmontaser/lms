<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$user = auth()->user();
		return view('profile', compact('user'));
	}

	public function update( Request $request ) {
		$user = auth()->user();
		$photoable_type = 'App\Models\User';
		$photoable_id = $user->id;

		if ( $image = $request->file('image') ) {
			$file_to_store = time() . "_" . $user->name . "_" . "." . $image->getClientOriginalExtension();

			if ( $user->photo ) {
				$filename = $user->photo->filename;
				$user->photo->delete();
				unlink('images/' . $filename);
			}

			if ( $user->photo()->create(['filename' => $file_to_store, 'photoable_type' => $photoable_type, 'photoable_id' => $photoable_id]) ) {
				$image->move('images', $file_to_store);
			}

			return response()->json([
				'message' => 'your profile image uploaded successfully',
				'uploaded_image' => '<img src="' . 'images/' . $file_to_store . '"class="img-thumbnail img-fluid">',

			]);
		} else {
			$rules = [
				'name' => 'required|string|min:5|max:30',
				'email' => 'required|email',
				'password' => 'nullable|min:6|confirmed'
			];

			$this->validate($request, $rules);

			if ( $request->password == null ) {
				if ( $user->update(['name' => $request->name, 'email' => $request->email]) ) {
					return response()->json([

						'message' => 'your profile info is updated successfully',
						'profilename' => $request->name . ' ' . 'Profile',
						'profileemail' => $request->email
					]);
				}
			} else {
				$password = password_hash($request->password, PASSWORD_DEFAULT);

				if ( $user->update(['name' => $request->name, 'email' => $request->email, 'password' => $password]) ) {
					return response()->json([

						'message' => 'your profile info is updated successfully',
						'profilename' => $request->name . ' ' . 'Profile',
						'profileemail' => $request->email
					]);
				}
			}
		}
	}

}
