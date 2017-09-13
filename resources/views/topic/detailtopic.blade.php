<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/detailtopic.css')}}">
    <script src="{{asset('https://use.fontawesome.com/f5c1a979a9.js')}}"></script>

</head>
<body>


<div class="banner">
    <div class="wide" style="background-image:url({{asset('images/banner.png')}});">

        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo">
                            <img src="{{asset('images/logo.png')}}" alt="" class="img-responsive"/>
                        </div>
                    </div>
                    @include('layouts.logout')

                </div>

            </div>

        </div>

        <div class="container inside">

            <div class="row">
                <div class="col-md-12">
                    <h1>WELCOME TO SIE INTERN WEBSITE</h1>
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
                    <div class="registerbtn">REGISTER NOW</div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="topicheader"> Topic content</div>
                @if(Auth::user()->role == 'student')
                    <div class="headerdes">Hello {{Auth::user()->user_id}} </div>
                @endif
                <div class="studentlogin">
                    <a href="/login"><img src="{{asset('images/studentlog.png')}}" alt="" class="img-responsive"/></a>

                </div>


            </div>

        </div>
        @foreach($topic_id as $tp_id)
            <div class="row">
                <div class="col-md-8">
                    <div class="topiccontent">
                        <div class="topictitle">{{$tp_id->title}}</div>
                        @foreach($topic_field as $tp_field)
                            <div class="topicfield">{{$tp_field->name}}</div>
                        @endforeach

                        <div class="topicdes">
                            {{$tp_id->content}}

                        </div>
                        <div class="topicdate"><i class="fa fa-calendar" aria-hidden="true"></i> {{$tp_id->created_at}}
                        </div>
                        <div class="recruit"><i class="fa fa-user" aria-hidden="true"></i> {{$tp_id->quantity}}</div>

                    </div>


                </div>
                <div class="col-md-4">
                    <div class="skillrequire">

                        <div class="skilltitle">Skill require</div>
                        <div class="listskill">
                            <ul>
                                @foreach($topic_skills as $tp_skills)
                                    <li>{{$tp_skills->skills_name}}</li>
                                @endforeach


                            </ul>
                        </div>

                    </div>

                </div>
                <div class="col-md-4">
                    <div class="otherrequire">

                        <div class="othertitle">Skill require</div>
                        <div class="listother">
                            <ul>

                                <li>{{$tp_id->otherRequire}}</li>


                            </ul>
                        </div>

                    </div>

                </div>
                <div class="col-md-4">
                    <br>
                    <br>
                    @if(Auth::user()->role == "manager")
                        @if($tp_id->status == "Not approved yet")
                            <button class="btn btn-success" style="height:100px;
                                width:40%;"><a href="/manager/topics/approve">Approve</a>
                            </button>

                            <button class="btn btn-danger" style="height:100px;
                                    width:40%;"><a href="/manager/topics/decline">Decline</a>
                            </button>
                        @elseif($tp_id->status == "Approved")
                            <button class="btn btn-success" style="height: 100px; width: 84%; ">Approved</button>
                        @elseif($tp_id->status == "Declined")
                            <button class="label label-danger" style="height: 100px; width: 84%; ">Declined</button>
                        @endif
                    @endif

                </div>

            </div>


    </div>
</div>

<div class="footban">
    <div class="container-fluid">
        <div class="bann">
            <div class="bancon">
                <div class="banheader">You need internship?</div>
                <div class="banheader2">Sign up as Company to public your topic</div>
                <div class="banbtn">Sign Up</div>
            </div>
        </div>
    </div>
</div>
@include('layouts.subfooter')
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                All right reserved. Belong to Group 10 - LTU12A
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('js/detailtopic.js')}}"></script>
<script>
    function managementteachertab(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

</script>
@endforeach
</body>
</html>
