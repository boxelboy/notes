<div class="row noterow">
    <div class="col-sm-12 col-md-6">
        {{ $note->id }} : {{ $note->title }}
    </div>
    <div class="col-sm-12 col-md-6 text-right">
        <button class="btn btn-primary view" data-id="{{ $note->id }}">View</button>
        @if(isset($_COOKIE['user']))
        <button class="btn btn-primary edit" data-id="{{ $note->id }}">Edit</button>
        <button class="btn btn-danger delete" data-id="{{ $note->id }}">Delete</button>
        @endif
    </div>
</div>
<div class="row notes note-{{ $note->id }} grey">
    <div class="col-sm-12">
        <?php echo markdown($note->content); ?>
    </div>
</div>