<div class="selections">
    <ul>
        <li><i class="fa fa-user" aria-hidden="true"></i><a href="/student/profile">User infomation</a>
        </li>
        <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/student/cv">User curriculum
                vitae
                (CV)</a>
        </li>
        <?php
        $count = DB::table('aspiration')->where('student_id', '=', Auth::user()->user_id)->count();
        ?>
        @if($count >=1 )
            <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/student/create/aspiration">Aspiration
                </a>
            </li>
        @endif

        <?php
        $count = DB::table('assignment')->where('student_id', '=', Auth::user()->user_id)->count();
        ?>
        @if($count >=1 )
            <li><i class="fa fa-clock-o" aria-hidden="true"></i><a href="/student/intern">Intership
                    process</a></li>
            <li><i class="fa fa-star-o" aria-hidden="true"></i><a href="/student/mark">Mark (Intern score)</a>
            </li>
        @endif
    </ul>
</div>
@yield('content')