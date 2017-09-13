<div class="col-md-8">
    <ul>
        <li><a href="/home">Home</a></li>
        <li><a href="#announcement">Announcement</a></li>
        <li><a href="#News">News</a></li>
        <li><a href="/search"><i class="fa fa-search" aria-hidden="true"></i></a></li>
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ route('register') }}">Register</a></li>
        @else

            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        @endif
    </ul>
</div>
