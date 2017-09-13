<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/lecturerprogress.css">
    <script src="{{asset('https://use.fontawesome.com/f5c1a979a9.js')}}"></script>

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
                    <div class="registerbtn">REGISTER NOW</div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="main">
    <div class="container">
        <div class="col-md-3 sidebar">
            <div class="managementteacherpicture">
                <img src="/images/ava1.png" alt="" class="img-responsive"/>

            </div>

            <div class="selections">
                <ul>
                    <li><i class="fa fa-user" aria-hidden="true"></i><a
                                href="/teacher/lecturer/{{Auth::user()->user_id}}">User infomation</a></li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/lecturer/intern">Intern
                            Progress</a></li>

                </ul>

            </div>


        </div>

        <div class="col-md-9 maincontent">
            <div class="tab">
                <button class="tablinks" onclick="internshipteacherprogress(event, 'internshipteacherprogress')"><i
                            class="fa fa-book" aria-hidden="true"></i> Intern Progress
                </button>
                <button class="tablinks" onclick="internshipteacherprogress(event, 'progressing')"><i
                            class="fa fa-check-square-o" aria-hidden="true"></i>

                    Scoring
                </button>
            </div>

            <div id="internshipteacherprogress" class="tabcontent">
                <div class="tab1">
                    <div class="companysheader">
                        <i class="fa fa-book" aria-hidden="true"></i> Intership Progress

                    </div>

                    <div class="complist">Company List</div>

                    <div class="companystable">

                        <table style="width:100%">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Topic name</th>
                                <th>Contact</th>
                                <th>Outline</th>
                                <th>Time Keeping</th>
                                <th>Report</th>
                            </tr>

                            @foreach($studentId as $stu)
                                <?php

                                $stdId = $stu->student_id;
                                $student = DB::table('students')->where('student_id', '=', $stdId)->get();
                                $idTopic = $stu->topic_id;
                                ?>
                                @foreach($student as $std)
                                    <?php
                                    $fname = $std->first_name;
                                    $lname = $std->last_name;
                                    $name = $fname . " " . $lname;
                                    $topic = DB::table('topic')->where('topic_id', '=', $idTopic)->first();
                                    $outline = DB::table('outline')->where('student_id', '=', $stdId)->first();
                                    $timekeeping = DB::table('timekeeping')->where('student_id', '=', $stdId)->first();
                                    $report = DB::table('report')->where('student_id', '=', $stdId)->first();
                                    $studentCv = DB::table('student_cv')->where('student_id', '=', $stdId)->first();
                                    ?>
                                    <tr>
                                        <td>{{$stdId}}</td>
                                        <td><a href="/student/cv/{{$studentCv->student_id}}">{{$name}}</a></td>
                                        <td><a href="/topic/{{$topic->topic_id}}">{{$topic->title}} </a></td>
                                        <td>{{$std->email}}</td>
                                        @if($outline != null)
                                            <td><a href="/storage/{{$outline->filename}}">Download</a></td>
                                        @else
                                            <td>Not Submit Yet</td>
                                        @endif
                                        @if($timekeeping != null)
                                            <td><a href="/storage/{{$timekeeping->filename}}">Download</a></td>
                                        @else
                                            <td>Not Submit Yet</td>
                                        @endif
                                        @if($report != null)
                                            <td><a href="/storage/{{$report->filename}}">Download</a></td>
                                        @else
                                            <td>Not Submit Yet</td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endforeach

                        </table>
                        {{$studentId->links()}}
                    </div>
                    <hr/>

                    <div class="complist">Student List</div>

                    <div class="companystable">

                        <table style="width:100%">
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Intern progress</th>
                                <th>Report</th>
                                <th>Contact</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><a href="">Hiep Do Vu</a></td>
                                <td><a href="">Link to internship progress</a></td>
                                <td><a href="">Link to report</a></td>
                                <td>hiep1@gmail.com
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><a href="">Hiep Vu Do</a></td>
                                <td><a href="">Link to internship progress</a></td>
                                <td><a href="">Link to report</a></td>
                                <td>hiep2@gmail.com
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><a href="">Vu Do Hiep</a></td>
                                <td><a href="">Link to internship progress</a></td>
                                <td><a href="">Link to report</a></td>
                                <td>hiep3@gmail.com
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>


            <div id="progressing" class="tabcontent">
                <div class="tab2">

                    <div class="companysheader">
                        <i class="fa fa-book" aria-hidden="true"></i> Student scoring

                    </div>

                    <div class="companystable">

                        <table style="width:100%">

                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Topic</th>
                                <th>Company score</th>
                                <th>Company Comment</th>
                                <th>Teacher Comment</th>
                                <th>Teacher Score</th>
                                <th>Submit</th>
                            </tr>
                            @foreach($studentIds as $stu)
                                <?php

                                $stdId = $stu->student_id;
                                $student = DB::table('students')->where('student_id', '=', $stdId)->get();
                                $idTopic = $stu->topic_id;
                                ?>
                                @foreach($student as $std)
                                    <?php
                                    $fname = $std->first_name;
                                    $lname = $std->last_name;
                                    $name = $fname . " " . $lname;
                                    $topic = DB::table('topic')->where('topic_id', '=', $idTopic)->first();
                                    $outline = DB::table('outline')->where('student_id', '=', $stdId)->first();
                                    $timekeeping = DB::table('timekeeping')->where('student_id', '=', $stdId)->first();
                                    $report = DB::table('report')->where('student_id', '=', $stdId)->first();
                                    $studentCv = DB::table('student_cv')->where('student_id', '=', $stdId)->first();
                                    $mark = DB::table('mark')->where('student_id', '=', $stdId)->first();
                                    $evaluation = DB::table('evaluation')->where('student_id', '=', $stdId)->first();
                                    ?>
                                    <form action="" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="stdid" value="{{$stdId}}">
                                        <tr>
                                            <td>{{$stdId}}</td>
                                            <td><a href="/student/cv/{{$stdId}}">{{$name}}</a></td>
                                            <td><a href="/topic/{{$idTopic}}">{{$topic->title}}</a></td>
                                            @if($mark != null)
                                                <td>{{$mark->mark_instructor}}</td>
                                            @else
                                                <td>Not submit yet</td>
                                            @endif
                                            @if($evaluation != null)
                                                <td>{{$evaluation->content_instructor}}</td>
                                            @else
                                                <td>Not submit yet</td>
                                            @endif
                                            @if($evaluation->content_lecturer != null)
                                                <td><input type="hidden" name="evaluation"
                                                           value="{{$evaluation->content_lecturer}}">{{$evaluation->content_lecturer}}
                                                </td>
                                            @else
                                                <td>

                                                    <input type="text" name="evaluation">

                                                </td>
                                            @endif
                                            @if($mark->mark_lecturer != null)
                                                <td>{{$mark->mark_lecturer}}</td>
                                            @else
                                                <td>

                                                    <select name="mark">
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>


                                                </td>
                                            @endif
                                            @if($mark->mark_lecturer == null || $evaluation->content_lecturer == null )
                                                <td>
                                                    <input value="submit" type="submit" name="submit"
                                                           class="btn btn-primary">

                                                </td>
                                            @else
                                                <td></td>
                                            @endif

                                        </tr>
                                    </form>
                                @endforeach
                            @endforeach
                        </table>
                        {{$studentIds->links()}}
                    </div>
                    <hr/>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="ggform">
                                <div class="note">Please fill this detail scoring form <br/> Download here</div>
                                <a href="">
                                    <button class="btn btn-success">Download</button>
                                </a>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="ggform">
                                <div class="note">Submit form <br/>Click here</div>
                                <a href="">
                                    <button class="btn btn-primary">Submit</button>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="subfooter"></div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="bottombrand">
                        <div class="p1">
                            Trường Đại học Bách Khoa Hà Nội
                        </div>
                        <div class="p2">
                            Viện đào tạo Quốc tế SIE
                        </div>
                        <div class="p3">
                            PROJECT 2
                        </div>
                    </div>

                </div>

                <div class="col-md-4 about">
                    <div class="bottomtitle">ABOUT</div>
                    <div class="bottomlink">
                        <div class="link"><a href="">Home</a></div>
                        <div class="link"><a href="">News</a></div>
                        <div class="link"><a href="">Course</a></div>
                        <div class="link"><a href="">Sign Up</a></div>
                        <div class="link"><a href="">Contact</a></div>

                    </div>
                </div>

                <div class="col-md-4 contact">
                    <div class="bottomtitle">CONTACT US</div>
                    <div class="bottomlink">
                        <div class="link">Home</div>
                        <div class="link">News</div>
                        <div class="link">Course</div>
                        <div class="link">Sign Up</div>
                        <div class="link">Contact</div>

                    </div>
                </div>

            </div>


        </div>

    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    All right reserved. Belong to Group 10 - LTU12A
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="/bootstrap.js"></script>
    <script type="text/javascript" src="/clickprog.js"></script>
    <script>
        function internshipteacherprogress(evt, cityName) {
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
</body>
</html>
