<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
	public function index() {
		$subjects = Subject::orderBy('id', 'desc')->paginate(12);
		return view('admin.subjects.index', compact('subjects'));
	}

	public function create() {
		return view('admin.subjects.create');
	}

	public function store( Request $request ) {
		$rules = [
			'title' => 'required|min:5|max:150',
		];

		$this->validate($request, $rules);

		$request['slug'] = strtolower(str_replace(' ', '-', $request->title));

		$subject = Subject::create($request->all());

		if ( $subject ) {
			if ( $file = $request->file('image') ) {
				$filename = $file->getClientOriginalName();
				$fileExtension = $file->getClientOriginalExtension();
				$file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileExtension;

				if ( $file->move('images', $file_to_store) ) {
					Photo::create([
						'filename' => $file_to_store,
						'photoable_id' => $subject->id,
						'photoable_type' => 'App\Subject',
					]);
				}
			}
		}
		return redirect('/admin/subjects');
	}

	public function show( Subject $subject ) {
		return view('admin.subjects.show', compact('subject'));
	}

	public function edit( Subject $subject ) {
		return view('admin.subjects.edit', compact('subject'));
	}

	public function update( Request $request, Subject $subject ) {
		$rules = [
			'title' => 'required|min:5|max:150',
			'status' => 'required|integer|in:0,1',
		];

		$this->validate($request, $rules);

		$request['slug'] = strtolower(str_replace(' ', '-', $request->title));

		$subject->update($request->all());

		if ( $file = $request->file('image') ) {
			$filename = $file->getClientOriginalName();
			$fileExtension = $file->getClientOriginalExtension();
			$file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileExtension;

			if ( $file->move('images', $file_to_store) ) {
				if ( $subject->photo ) {
					$photo = $subject->photo;

					$filename = $photo->filename;
					unlink('images/' . $filename);

					$photo->filename = $file_to_store;
					$photo->save();
				} else {
					Photo::create([
						'filename' => $file_to_store,
						'photoable_id' => $subject->id,
						'photoable_type' => 'App\Subject',
					]);
				}
			}
		}
		return redirect('/admin/subjects');
	}

	public function destroy( Subject $subject ) {
		if ( $subject->photo ) {
			$filename = $subject->photo->filename;
			unlink('images/' . $filename);
			$subject->photo->delete();
		}

		$subject->delete();
		return redirect('/admin/subjects');
	}
}
