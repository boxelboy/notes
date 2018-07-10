<div class="row card-heading" style="margin: 5px 10px">
    <div class="col-6">
        <h1 class="title">{{ $title }}</h1>
    </div>
    <div class="col-6 text-right">
        @if(isset($_COOKIE['user']))
            <button type="button" id="logout" class="btn btn-primary text-right">
                Logout
            </button>
       @else
            <button type="button" class="btn btn-primary text-right" data-toggle="modal" data-target="#loginModal">
                Login
            </button>
        @endif
    </div>
</div>
