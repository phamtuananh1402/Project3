<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
    <link rel="stylesheet" href="{{asset('css/signin.css')}}">
    <script type="text/javascript" src=/js/fontawesome.js></script>
</head>
<body>

<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <img src="{{asset('images/logo.png')}}" alt="" class="img-responsive"/>
                </div>
            </div>
            @include('layouts.logout');

        </div>

    </div>

</div>

<div class="banner">
    <div class="wide" style="background-image:url({{asset('images/banner.png')}});">

        <div class="container inside">

            <div class="row">
                <div class="col-md-12">
                    <h1>OFFICIAL SITE FOR SIE INTERNSHIP</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Student Intern Program for SIE, students can find internships and <br/>employment opportunities
                        in the world’s marketplace</h2>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <ul>
                        @if(Auth::guest())
                            <li>

                                <button class="btn btn-success" style="background: lightblue" 
                                   onclick="document.getElementById('idlogin').style.display='block'">
                                    FOR ADMIN
                                </button>

                                <form id="register-form" action="{{ route('register') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @elseif(Auth::user()->role == 'manager')
                            <li>
                                <button class="registerbtn" id="topiccensor">View Topic</button>
                            </li>
                        @else
                            <li>
                                <button class="registerbtn" id="topic">View Topic</button>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="dominian">
    <div class="container">
        @if(Auth::guest())
            <div class="row">
                <div class="col-md-4">
                    <div class="student">
                        <img src="{{asset('images/studentava.png')}}" alt="" class="img-responsive"
                             @if(Auth::guest())
                             onclick="document.getElementById('idlogin').style.display='block'"
                                @endif/>
                        <div class="dom"><span>FOR</span> STUDENT</div>
                        <div class="detailinfo">Lorem ipsum dolor sit armet, consectetuer adipiscing elit, sed diam
                            nonumy
                            nibh equismod tincidunt ut laoreet.
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="teacher">
                        <img src="{{asset('images/teacherava.png')}}" alt="" class="img-responsive"
                             @if(Auth::guest())
                             onclick="document.getElementById('idlogin').style.display='block'"
                                @endif/>
                        <div class="dom"><span>FOR</span> TEACHER</div>
                        <div class="detailinfo">Lorem ipsum dolor sit armet, consectetuer adipiscing elit, sed diam
                            nonumy
                            nibh equismod tincidunt ut laoreet.
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="company">
                        <img src="{{asset('images/companyava.png')}}" alt="" class="img-responsive"
                             @if(Auth::guest())
                             onclick="document.getElementById('idlogin').style.display='block'"
                                @endif/>
                        <div class="dom"><span>FOR</span> COMPANY</div>
                        <div class="detailinfo">Lorem ipsum dolor sit armet, consectetuer adipiscing elit, sed diam
                            nonumy
                            nibh equismod tincidunt ut laoreet.
                        </div>
                    </div>

                </div>

            </div>
        @else
            @if(Auth::user()->role == 'admin')

                <script type="text/javascript">
                    window.location = "{{ url('/admin/dashboard') }}";//here double curly bracket
                </script>

            @endif
            <div class="row">
                @if(Auth::user()->role == 'student')
                    <div class="col-md-4" style="margin-left: 35%">

                        <div class="student">

                            <img src="{{asset('images/studentava.png')}}" alt="" class="img-responsive"
                                 onclick="
                                         location.href = '/student/profile';
                                         "/>

                            <div class="dom"><span>FOR</span> STUDENT</div>
                            <div class="detailinfo">Lorem ipsum dolor sit armet, consectetuer adipiscing elit, sed diam
                                nonumy
                                nibh equismod tincidunt ut laoreet.
                            </div>
                        </div>

                    </div>
                @endif
                @if(Auth::user()->role == 'manager')
                    <div class="col-md-4" style="margin-left: 35%">
                        <div class="teacher">


                            <img src="{{asset('images/teacherava.png')}}" alt="" class="img-responsive"
                                 onclick="
                                         location.href = '/manager/profile';
                                         "/>

                            <div class="dom"><span>FOR</span> TEACHER</div>
                            <div class="detailinfo">Lorem ipsum dolor sit armet, consectetuer adipiscing elit, sed diam
                                nonumy
                                nibh equismod tincidunt ut laoreet.
                            </div>
                        </div>

                    </div>
                @endif
                @if(Auth::user()->role == 'lecturer')
                    <div class="col-md-4" style="margin-left: 35%">
                        <div class="teacher">


                            <img src="{{asset('images/teacherava.png')}}" alt="" class="img-responsive"
                                 onclick="
                                         location.href = 'teacher/lecturer/{{Auth::user()->user_id}}';
                                         "/>

                            <div class="dom"><span>FOR</span> TEACHER</div>
                            <div class="detailinfo">Lorem ipsum dolor sit armet, consectetuer adipiscing elit, sed diam
                                nonumy
                                nibh equismod tincidunt ut laoreet.
                            </div>
                        </div>

                    </div>
                @endif
                @if(Auth::user()->role == 'company')
                    <div class="col-md-4" style="margin-left: 35%">
                        <div class="company">

                            <img src="{{asset('images/companyava.png')}}" alt="" class="img-responsive"
                                 onclick="
                                         location.href = '/company/representation/{{Auth::user()->user_id}}';
                                         "/>

                            <div class="dom"><span>FOR</span> COMPANY</div>
                            <div class="detailinfo">Lorem ipsum dolor sit armet, consectetuer adipiscing elit, sed diam
                                nonumy
                                nibh equismod tincidunt ut laoreet.
                            </div>
                        </div>

                    </div>
                @endif
                @if(Auth::user()->role == 'instructor')
                    <div class="col-md-4" style="margin-left: 35%">
                        <div class="company">

                            <img src="{{asset('images/companyava.png')}}" alt="" class="img-responsive"
                                 onclick="
                                         location.href = '/company/instructor/{{Auth::user()->user_id}}';
                                         "/>

                            <div class="dom"><span>FOR</span> COMPANY</div>
                            <div class="detailinfo">Lorem ipsum dolor sit armet, consectetuer adipiscing elit, sed diam
                                nonumy
                                nibh equismod tincidunt ut laoreet.
                            </div>
                        </div>

                    </div>
                @endif
            </div>


        @endif

    </div>

</div>

<div class="subbanner">
    <div class="wide2" style=" background-image:url({{asset('images/subbanner.png')}});">
        <div class="container inside">

            <div class="row">
                <div class="col-md-12">
                    <div class="row1">Find your suitable TOPIC and get good mark</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row2">It's limited slot! Hurry up.</div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>

</div>

<div class="reportproblem">
    <div class="wide3">
        <div class="container inside2">
            <div class="col-md-6">
                <div class="questionicon">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>

                </div>
                <p>GOT QUESTION? <br/>
                    <span>We here to help. Send us an email or call us at 19001000</span>
                </p>

            </div>
            <div class="col-md-6">
                <div class="reportbtn">
                    GET IN TOUCH
                </div>

            </div>

        </div>

    </div>

</div>

@include('layouts.subfooter')

<script>
    // Get the modal
    var modal = document.getElementById('idlogin');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        window.location = "/login";
    }
</script>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('js/homepage.js')}}"></script>
<script type="text/javascript" src={{asset('js/topicbutton.js')}}></script>
<script type="text/javascript">

    document.getElementById("topiccensor").onclick = function () {

        location.href = "/manager/topics";

    };
    document.getElementById("representationlogin").onclick = function representation() {

        location.href = "/manager/topics";

    };

</script>

</body>
</html>
