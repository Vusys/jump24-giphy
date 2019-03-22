<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex justify-content-between">

        <a href="{{ route('index') }}" class="navbar-brand">Jump24 / GIPHY</a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ active('index') }}"><a href="{{ route('index') }}" class="nav-link">Popular</a></li>
                <li class="nav-item {{ active('random.index') }}"><a href="{{ route('random.index') }}" class="nav-link">Random</a></li>
            </ul>
            <form class="form-inline my-2 my-lg-0" id="search-form" action="{{ route('search') }}" method="post">
                {{ csrf_field() }}
                <input placeholder="Search for GIFs" aria-label="Search" type="search" class="form-control mr-sm-2" id="search-gifs" name="search" value="{{ $search ?? '' }}"/>
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
            </form>
        </div>
    </div>
</nav>