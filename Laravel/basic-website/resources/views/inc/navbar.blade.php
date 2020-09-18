<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item
                @if(Route::current()->getName() === 'home')
                    active
                @endif
            ">
                <a class="nav-link" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item
                @if(Route::current()->getName() === 'about')
                    active
                @endif
            ">
                <a class="nav-link" href="{{route('about')}}">About</a>
            </li>
            <li class="nav-item
                @if(Route::current()->getName() === 'contact')
                    active
                @endif
            ">
                <a class="nav-link" href="{{route('contact')}}">Contact</a>
            </li>
            <li class="nav-item
                @if(Route::current()->getName() === 'get-messages')
                    active
                @endif
            ">
                <a class="nav-link" href="{{route('get-messages')}}">Messages</a>
            </li>
        </ul>
    </div>
</nav>
