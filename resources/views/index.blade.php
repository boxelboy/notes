@extends('templates.layout')
@section('content')
    @if(isset($_COOKIE['user']))
    <div class="row noterow">
        <div class="col-12">
            <button class="btn btn-success newNote">Add new note</button>
        </div>
    </div>
    @endif
    @if($notes->count() > 0)
    @foreach($notes as $note)
        @if(isset($_COOKIE['user']))
        @include('components.note', ['note' => $note])
        @elseif(!$note->private)
        @include('components.note', ['note' => $note])
        @endif
    @endforeach
    @else
        <div class="row">
            <div class="col-12">No public notes at the moment - why not login and add some.</div>
        </div>
    @endif
@endsection