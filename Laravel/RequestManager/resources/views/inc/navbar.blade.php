<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{Request::is('/request') || Request::is('/') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('request.index')}}">Home</a>
            </li>
            <li class="nav-item {{Request::is('request/create') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('request.create')}}">Create</a>
            </li>
        </ul>
    </div>
</nav>
