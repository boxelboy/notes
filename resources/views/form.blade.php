@extends('templates.layout')
@section('content')
    <div class="form-row">
        <div class="form-group col-12">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" value="{{ isset($note) ? $note->title : '' }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-12">
            <label for="note">Note</label>
            <div id="editormd">
                <textarea style="display:none"  id="note" class="form-control">{{ isset($note) ? $note->content : '' }}</textarea>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-12">
            <label for="note">Private note</label>
            <input type="checkbox" id="private" value="1" {{ isset($note) && $note->private == 1 ?'checked' : '' }}>
        </div>
    </div>
    <div class="alert alert-danger d-none" role="alert">Unable to save data - please try later.</div>

    <div class="form-row">
        <div class="form-group col-12">
            <input type="hidden" id="id" value="{{ isset($note) ? $note->id : '' }}">
            <button type="button" class="btn btn-secondary note-cancel">Cancel</button>
            <button id="changebutton" type="button" class="btn btn-primary note-add">{{ isset($note) ? 'Change' : 'Add' }} note <i class="fa fa-angle-double-right"></i></button>
        </div>
    </div>
    {!! editor_js() !!}
    {!! editor_config(['id' => 'editormd']) !!}
@endsection