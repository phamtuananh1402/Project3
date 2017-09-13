<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/studentinfo.css')}}">
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
                    @include('layouts.logout');

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
                    <button class="registerbtn" id="topic">View Topic</button>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($student as $std)
    <div class="main">
        <div class="container">
            <div class="col-md-3 sidebar">
                <div class="studentpicture">
                    <img src="{{asset('images/ava1.png')}}" alt="" class="img-responsive"/>

                </div>
                @extends('layouts.selections')
                @section('content')

            </div>

            <div class="col-md-9 maincontent">
                <div class="tab">
                    <button class="tablinks" onclick="studentinfotab(event, 'studentinfo')"><i
                                class="fa fa-user-circle-o"
                                aria-hidden="true"></i> User
                        Information
                    </button>
                    <button class="tablinks" onclick="studentinfotab(event, 'editstudentinfo')"><i class="fa fa-cog"
                                                                                                   aria-hidden="true"></i>
                        Edit Information
                    </button>
                </div>

                <div id="studentinfo" class="tabcontent">
                    <div class="tab1">
                        <div class="basicinfo">
                            <div class="row">

                                <?php
                                $fname = $std->first_name;
                                $lname = $std->last_name;
                                $name = $fname . " " . $lname;
                                ?>
                                <div class="studentname">{{$name}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-address-card" aria-hidden="true"></i> MSSV :
                                </div>
                                <div class="studentid">{{Auth::user()->user_id}}</div>

                            </div>
                            <div class="row">
                                <div class="infotitle"><i class="fa fa-calendar" aria-hidden="true"></i> Date Of Birth:
                                </div>
                                <div class="studentid">{{$std->date_of_birth}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-user" aria-hidden="true"></i> Gender:
                                </div>
                                <div class="studentid">{{$std->gender}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-phone" aria-hidden="true"></i> Phone :</div>
                                <div class="studentphone">{{$std->phone_number}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email :</div>
                                <div class="studentmail">{{$std->email}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-road" aria-hidden="true"></i> Address :</div>
                                <div class="studentaddress">{{$std->address}}</div>
                            </div>

                        </div>

                        <div class="studentexperiences">
                            <div class="moduleheader">About Me</div>
                            <div class="content">
                                {{$std->about_me}}

                            </div>

                        </div>

                        <div class="studentmotivations">
                            <div class="moduleheader">Motivations</div>
                            <div class="content">


                            </div>

                        </div>


                    </div>
                </div>

                <div id="editstudentinfo" class="tabcontent">
                    <div class="tab2">
                        <form method="POST" action="/student/profile">
                            {{csrf_field()}}

                            <div class="basicform">

                                <div class="studentphoneform">
                                    <div class="formtitle">Phone</div>

                                    <input type="text" name="phone_number"
                                           placeholder="0{{$std->phone_number}}"><br>

                                </div>

                                <div class="studentmailform">
                                    <div class="formtitle">Email</div>
                                    <input type="email" name="email" placeholder="{{$std->email}}"><br>
                                </div>

                                <div class="studentaddressform">
                                    <div class="formtitle">Address</div>
                                    <input type="text" name="address" placeholder="{{$std->address}}"><br>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div class="studentphoneform">
                                    <div class="formtitle">Student ID</div>

                                    <input type="text" name="student_id" readonly
                                           value="{{$std->student_id}}" placeholder="{{$std->student_id}}"><br>


                                </div>

                                <div class="studentphoneform{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <div class="formtitle">First Name</div>
                                    <input type="text" name="first_name"
                                           placeholder="{{$std->first_name}}"><br>
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="studentphoneform{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <div class="formtitle">Last Name</div>
                                    <input type="text" name="last_name" placeholder="{{$std->last_name}}"><br>
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div class="studentexperiencesform">
                                    <div class="formtitle">About Me</div>

                                    <input type="text" name="about_me" placeholder="{{$std->about_me}}"><br>

                                </div>
                                <br>
                                <div class="studentphoneform">
                                    <div class="formtitle">Date Of Birth</div>

                                    <input type="date" name="date_of_birth" placeholder="{{$std->date_of_birth}}"><br>

                                </div>
                                <div class="studentphoneform">
                                    <div class="formtitle">Class</div>

                                    <input type="text" name="class"
                                           placeholder="{{$std->class}}"><br>

                                </div>
                                <div class="studentphoneform">
                                    <div class="formtitle">Semester</div>
                                    <input type="text" name="semester"
                                           placeholder="{{$std->semester}}"><br>
                                </div>

                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="row">

                                <div class="dirbutton">

                                    <div class="col-md-6">
                                        @include('button.clearbutton')
                                    </div>
                                    <div class="col-md-6">
                                        @include('button.buttonsubmit')
                                    </div>

                                </div>
                            </div>
                        </form>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach

                            </ul>

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

    <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/studentinfo.js')}}"></script>
    <script>
        function studentinfotab(evt, cityName) {
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
    <script type="text/javascript" src={{asset('js/topicbutton.js')}}></script>
    @endsection
@endforeach

</body>
</html>
