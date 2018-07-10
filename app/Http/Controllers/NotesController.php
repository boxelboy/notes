<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NotesController extends Controller
{
    public function index() {

        $notes = Note::all();

        $data = ['title' => 'Notes App', 'notes' => $notes];

        return view('index', $data);
    }

    public function showForm($id = null) {

        if ($id) {
            $data = ['title' => 'Edit note'];
            $note = Note::where(['id' => $id])->first();
            $data['note'] = $note;
        } else {
            $data = ['title' => 'Add a new note'];
        }

        return view('form', $data);
    }

    public function get($id = null) {

        if ($id) {
            if ($note = Note::find($id)) {
                return $note;
            } else {
                return 404;
            }
        } else {
            return Note::all();
        }
    }

    public function delete($id) {

        if (Note::destroy($id)) {
            return 204;
        } else {
            return 409;
        }

    }

    public function edit(Request $request) {
        if (isset($request->id)) {
            $note = Note::find($request->id);
            $note->title = $request->title;
            $note->content = $request->note;
            $note->private = $request->private;
        } else {
            $note = new Note;
            $note->title = $request->title;
            $note->content = $request->note;
            $note->private = $request->private;
        }

        if($note->save()) {
            return 200;
        } else {
            return 500;
        }

    }

}
