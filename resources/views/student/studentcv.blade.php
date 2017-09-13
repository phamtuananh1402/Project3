<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/studentcv.css')}}">
    <script src="{{asset('https://use.fontawesome.com/f5c1a979a9.js')}}"></script>
    <script src="/js/react.min.js"></script>
    <script src="/js/JSXTransformer.js"></script>

    <script type="text/jsx" src="/js/chooselevelreact.js">


    </script>

    <style type="text/css">
      div.inline { float:left; }
        .clearBoth { clear:both; }
      </style>
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
@foreach($student_cv as $std_cv)

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
                    @if(Auth::user()->role=='student')
                        <button class="tablinks" onclick="studentinfotab(event, 'editstudentinfo')"><i class="fa fa-cog"
                                                                                                       aria-hidden="true"></i>
                            Edit Information
                        </button>
                    @endif
                </div>

                <div id="studentinfo" class="tabcontent">
                    <div class="tab1">
                        <div class="basicinfo">
                            <div class="row">
                                <div class="studentname">{{$std_cv->name}}</div>
                            </div>
                            <div class="row">
                                <div class="infotitle"><i class="fa fa-address-card" aria-hidden="true"></i> MSSV :
                                </div>
                                <div class="studentid">{{$std_cv->student_id}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-phone" aria-hidden="true"></i> Phone :</div>
                                <div class="studentphone">{{$std_cv->phone_number}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email :
                                </div>
                                <div class="studentmail">{{$std_cv->email}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-road" aria-hidden="true"></i> Address :</div>
                                <div class="studentaddress">Hanoi, Vietnam</div>
                            </div>

                        </div>

                        <div class="studentexperiences">
                            <div class="moduleheader">Experiences</div>
                            <div class="content">
                                {{$std_cv->info}}

                            </div>

                        </div>

                        <div class="studentmotivations">
                            <div class="moduleheader">Motivations</div>
                            <div class="content">
                                {{$std_cv->purpose}}

                            </div>

                        </div>

                        <div class="studentskills">
                            <div class="moduleheader">Skills</div>
                            <div class="skilllist">


                                <ul>
                                    @foreach($skill as $sk)
                                      @if($sk->skills_name != "")
                                      <li>{{$sk->skills_name}}</li>
                                      @endif
                                    @endforeach
                                </ul>

                            </div>

                        </div>


                    </div>
                </div>
                @if(Auth::user()->role=='student')
                    <div id="editstudentinfo" class="tabcontent">
                        <div class="tab2">
                            <form action="/student/cv" method="POST">
                                {{csrf_field()}}
                                <div class="basicform">
                                    <div class="studentphoneform">
                                        <div class="formtitle">Phone</div>

                                        <input type="text" name="phone_number"
                                               placeholder="0{{$std_cv->phone_number}}"><br>

                                    </div>

                                    <div class="studentmailform">
                                        <div class="formtitle">Email</div>

                                        <input type="email" name="email" placeholder="{{$std_cv->email}}"><br>

                                    </div>

                                    <div class="studentaddressform">
                                        <div class="formtitle">Address</div>

                                        <input type="text" name="address" value="Hanoi, Vietnam"><br>

                                    </div>
                                </div>

                                <div class="studentexperiencesform">
                                    <div class="formtitle">Experiences</div>
                                    <input type="text" name="info" placeholder="{{$std_cv->info}}"><br>

                                </div>

                                <div class="studentmotivationsform">
                                    <div class="formtitle">Motivations</div>

                                    <input type="text" name="purpose" placeholder="{{old('purpose')}}"><br>

                                </div>

                                <div class="studentskillsform">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="formtitle">Skills</div>
                                            <div class="skilllistform">
                                              <div class="inline">
                                                <span class="custom-dropdown big">
                                                Skill 1 : <select name="skills_name[]">
                                                  <?php
                                                  $allSkill = DB::table('skills')->get();
                                                  ?>
                                                  <option value="">Choose Skills</option>
                                                    @foreach($allSkill as $as)
                                                        <option name="skills_name[]"
                                                                value="{{$as->name}}">{{$as->name}}</option>
                                                    @endforeach
                                                 </select>
                                                </span>

                                                <div id="skills1" ></div>
                                              </div>
                                              <div class="inline">
                                                <span class="custom-dropdown big">
                                                Skill 2: <select name="skills_name[]">
                                                  <?php
                                                  $allSkill = DB::table('skills')->get();
                                                  ?>
                                                  <option value="">Choose Skills</option>
                                                    @foreach($allSkill as $as)
                                                        <option name="skills_name[]"
                                                                value="{{$as->name}}">{{$as->name}}</option>
                                                    @endforeach
                                                 </select>
                                                </span>
                                                <div id="skills2" ></div>
                                              </div>
                                              <div class="inline">
                                                <span class="custom-dropdown big">
                                                Skill 3: <select name="skills_name[]">
                                                  <?php
                                                  $allSkill = DB::table('skills')->get();
                                                  ?>
                                                  <option value="">Choose Skills</option>
                                                    @foreach($allSkill as $as)
                                                        <option name="skills_name[]"
                                                                value="{{$as->name}}">{{$as->name}}</option>
                                                    @endforeach
                                                 </select>
                                                </span>
                                                <div id="skills3" >

                                                </div>
                                              </div>

                                             </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="formtitle">Topic available</div>
                                            <div class="topicsource">
                                                @include('layouts.dropdown_field')

                                            </div>

                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="dirbutton">

                                        <div class="col-md-6">
                                            <button type="reset" class="clearallbtn">CLEAR ALL</button>

                                        </div>
                                        <div class="col-md-6">
                                            <button class="submitbtn" type="submit"> Submit</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
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
    <script type="text/javascript" src="{{asset('js/studentcv.js')}}"></script>
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js')}}"></script>
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

    <script type="text/javascript">
        $('#skillbox').click(function () {
            $("#leveldrop").toggle(this.checked);
        });
    </script>

    @endsection
@endforeach
</body>
</html>
