<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        @if (session()->has('success'))
        <a class="nav-link" href="">
            <div class="alert alert-success text-center" role="alert">
                <strong>Success!</strong> {{ session()->get('success') }}
            </div>
        </a>
        @elseif (session()->has('update'))
        <a class="nav-link" href="">
            <div class="alert alert-primary text-center" role="alert">
                <strong>Updated!</strong> {{ session()->get('update') }}
            </div>
        </a>
        @elseif (session()->has('delete'))
        <strong class="nav-link" href="">
            <div class="alert alert-danger text-center" role="alert">
                <strong>Deleted!</strong> {{ session()->get('delete') }}
            </div>
        </a>
        @endif
    </div>
    <div class="col-2"></div>
</div>