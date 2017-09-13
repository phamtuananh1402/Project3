<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/companystd.css">
    <script src="https://use.fontawesome.com/f5c1a979a9.js"></script>

    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js')}}"></script>
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css')}}"
          rel="stylesheet">

</head>
<body>


<div class="banner">
    <div class="wide">

        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo">
                            <img src="/images/logo.png" alt="" class="img-responsive"/>
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
                    <div class="registerbtn"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="main">
    <div class="container">
        <div class="col-md-3 sidebar">
            <div class="studentpicture">
                <img src="/images/ava_1.png" alt="" class="img-responsive"/>

            </div>
            <div class="selections">
                <ul>
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="">User infomation</a></li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/company/assign">Student Assign</a>
                    </li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/company/choose">Choose a specified
                            student</a>
                    </li>
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="/company/instructor/create">Create
                            Instructor</a></li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/company/topics/create">Create
                            Topic</a></li>


                </ul>


            </div>
        </div>

        <div class="col-md-9 maincontent">

            <div class="basicinfo">
                <div class="row">
                    <div class="title">Choose Topic for Student</div>
                </div>
                <div class="row">
                    <div class="studentid">
                        <div class="firstrow">Student ID :</div>
                        <div class="id nextrow">{{$student->student_id}}</div>
                    </div>

                </div>
                <div class="row">
                    <div class="studentname">
                        <div class="firstrow">First name :</div>
                        <div class="firstname nextrow">{{$student->first_name}}</div>
                        <div class="firstrow">Last name :</div>
                        <div class="lastname nextrow">{{$student->last_name}}</div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="company">
                        Choose a topic for him/her :
                        <form action="">
                            <select class="topicoption">
                                @foreach($topics as $topic)
                                    <option value="{{$topic->topic_id}}">{{$topic->title}}</option>
                                @endforeach
                            </select>
                            {{csrf_field()}}
                        </form>


                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-4">
                        <button class="submitbtn" onclick="submit({{$student->student_id}})">Submit</button>
                    </div>
                </div>
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


<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/1.js"></script>
<script>
    function companytopictab(evt, cityName) {
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
<script src="/js/companystd.js"></script>
</body>
</html>
