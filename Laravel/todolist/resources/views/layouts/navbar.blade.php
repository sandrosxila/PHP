<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{Request::is('/') ? 'active' : ''}}">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item {{Request::is('/todos/create') ? 'active' : ''}}">
                <a class="nav-link" href="/todos/create">Create</a>
            </li>
        </ul>
    </div>
</nav>
