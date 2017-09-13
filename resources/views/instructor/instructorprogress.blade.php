<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <script type="text/javascript"
            src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="/css/instructorprogress.css">
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
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="">User infomation</a></li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="">Topic Request</a></li>
                    <li><i class="fa fa-bar-chart" aria-hidden="true"></i><a href="">Intern progress</a></li>

                </ul>


            </div>


        </div>

        <div class="col-md-9 maincontent">
            <div class="tab">
                <button class="tablinks" onclick="instructorprogress(event, 'instructorprogress')"><i class="fa fa-book"
                                                                                                      aria-hidden="true"></i>
                    Intern Progress
                </button>
                <button class="tablinks" onclick="instructorprogress(event, 'progressing')"><i
                            class="fa fa-check-square-o" aria-hidden="true"></i>

                    Scoring
                </button>
            </div>

            <div id="instructorprogress" class="tabcontent">
                <div class="tab1">
                    <div class="Topicsheader">
                        <i class="fa fa-book" aria-hidden="true"></i> Intership Progress

                    </div>

                    <div class="complist">Topic List</div>

                    <div class="Topicstable">

                        <table style="width:100%">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Topic name</th>
                                <th>Quantity</th>
                                <th title="Internship's Date-time">Date</th>
                                <th>Contact</th>
                                <th>TimeKeeping</th>
                                <th>Outline</th>
                            </tr>
                            @foreach($instructor_id as $ins)
                                <?php
                                $id = $ins->instructor_id;
                                $idCom = DB::table('instructor_company')->where('instructor_id', '=', $id)->pluck('company_id');
                                $idStudent = DB::table('student_instructor_company')->where('instructor_id', '=', $id)->pluck('student_id');
                                $student = DB::table('students')->whereIn('student_id', $idStudent)->get();
                                $company = DB::table('company')->where('company.company_id', '=', $idCom)->get();



                                ?>
                                @foreach($student as $std)
                                    <?php
                                    $fname = $std->first_name;
                                    $lname = $std->last_name;
                                    $name = $fname . " " . $lname;
                                    $stdId = $std->student_id;
                                    $idTopic = DB::table('assignment')->where('company_id', '=', $idCom)
                                        ->where('student_id', '=', $stdId)->pluck('topic_id');

                                    $topic = DB::table('topic')->whereIn('topic_id', $idTopic)->first();
                                    $collection = json_encode($topic);
                                    $collect = json_decode($collection, true);
                                    $title = $collect['title'];
                                    $topId = $collect['topic_id'];
                                    $quantity = $collect['quantity'];
                                    $created_at = $collect['created_at'];
                                    $outline = DB::table('outline')->where('student_id', '=', $stdId)->where('link', '!=', " ")->first();
                                    $timekeeping = DB::table('timekeeping')->where('student_id', '=', $stdId)->where('link', '!=', " ")->first();
                                    ?>
                                    <form action="/instructor/internship" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <tr>
                                            <td>{{$std->id}}</td>
                                            <td>{{$name}}</td>
                                            <td><a href="/topic/{{$topId}}">{{$title}} </a></td>
                                            <td>{{$quantity}}</td>
                                            <td> {{$created_at}}</td>
                                            <td>{{$std->email}}</td>
                                            @if($timekeeping != null)

                                                <td>
                                                    <a href="/storage/{{$timekeeping->filename}}">Download</a>
                                                </td>

                                            @else
                                                <td>

                                                    <input type="file" name="linka"> <br>
                                                    <input type="hidden" name="student_id" value="{{$stdId}}">

                                                    <br>

                                                </td>
                                            @endif

                                            @if($outline!= null)

                                                <td>
                                                    <a href="/storage/{{$outline->filename}}">Download</a>
                                                </td>

                                            @else
                                                <td>

                                                    <input type="file" name="linkb" id="file" class="inputfile"/>
                                                    <input type="hidden" name="student_id" value="{{$stdId}}">
                                                    <input type="hidden" name="topic_id" value="{{$topId}}">
                                                    <br>

                                                </td>
                                            @endif
                                            <td>
                                                <button class="btn btn-primary" type="submit" name="submit">SUBMIT NOW
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
                                @endforeach

                            @endforeach
                        </table>

                    </div>
                    <hr/>
                    <div class="row">
                        <?php
                        $linkOutline = "https://drive.google.com/open?id=0B3kSVSFCDynPTTVfWFFsTjVMV3c";
                        $linkTimeKeeping = "https://drive.google.com/open?id=0B3kSVSFCDynPeGYzTzJYeFV2V0k";
                        ?>
                        <div class="col-md-6">
                            <div class="ggform">
                                <div class="note">Please fill this detail Outline form <br/> Download here</div>
                                <a href="{{$linkOutline}}">
                                    <button class="btn btn-success">Download</button>
                                </a>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="ggform">
                                <div class="note">Please fill this detail TimeKeeping form <br/> Download here</div>
                                <a href="{{$linkTimeKeeping}}">
                                    <button class="btn btn-success">Download</button>
                                </a>
                            </div>

                        </div>

                    </div>
                    <div class="complist">Student List</div>

                    <div class="Topicstable">

                        <table style="width:100%">
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Intern progress</th>
                                <th>Report</th>
                                <th>Contact</th>
                            </tr>
                            @foreach($instructor_id as $ins)
                                <?php
                                $id = $ins->instructor_id;
                                $idCom = DB::table('instructor_company')->where('instructor_id', '=', $id)->pluck('company_id');
                                $idStudent = DB::table('student_instructor_company')->where('instructor_id', '=', $id)->pluck('student_id');
                                $student = DB::table('students')->whereIn('student_id', $idStudent)->get();
                                $company = DB::table('company')->where('company.company_id', '=', $idCom)->get();



                                ?>
                                @foreach($student as $std)
                                    <?php
                                    $fname = $std->first_name;
                                    $lname = $std->last_name;
                                    $name = $fname . " " . $lname;
                                    $stdId = $std->student_id;
                                    $idTopic = DB::table('assignment')->where('company_id', '=', $idCom)
                                        ->where('student_id', '=', $stdId)->pluck('topic_id');
                                    $topic = DB::table('topic')->whereIn('topic_id', $idTopic)->first();
                                    $collection = json_encode($topic);
                                    $collect = json_decode($collection, true);
                                    $title = $collect['title'];
                                    $outline = DB::table('outline')->where('student_id', '=', $stdId)->first();
                                    $timekeeping = DB::table('timekeeping')->where('student_id', '=', $stdId)->first();
                                    $report = DB::table('report')->where('student_id', '=', $stdId)->first();
                                    $studentCv = DB::table('student_cv')->where('student_id', '=', $stdId)->first();
                                    ?>
                                    <tr>
                                        <td>3</td>
                                        <td>{{$std->student_id}}</td>
                                        <td><a href="/student/cv/{{$studentCv->student_id}}"></a>{{$name}}</td>
                                        <td><a href=""></a>{{$report->link}}</td>
                                        <td>{{$std->email}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>


            <div id="progressing" class="tabcontent">
                <div class="tab2">

                    <div class="Topicsheader">
                        <i class="fa fa-book" aria-hidden="true"></i> Student scoring

                    </div>

                    <div class="Topicstable">

                        <table style="width:100%">

                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Topic</th>
                                <th>Teacher Score</th>
                                <th>Teacher Comment</th>
                                <th>Company score</th>
                                <th>Company Comment</th>
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
                                                <td>{{$mark->mark_lecturer}}</td>
                                            @else
                                                <td>Not submit yet</td>
                                            @endif
                                            @if($evaluation != null)
                                                <td>{{$evaluation->content_lecturer}}</td>
                                            @else
                                                <td>Not submit yet</td>
                                            @endif
                                            @if($evaluation->content_instructor != null)
                                                <td><input type="hidden" name="evaluation"
                                                           value="{{$evaluation->content_instructor}}">{{$evaluation->content_instructor}}
                                                </td>
                                            @else
                                                <td>

                                                    <input type="text" name="evaluation">

                                                </td>
                                            @endif
                                            @if($mark->mark_instructor != null)
                                                <td>{{$mark->mark_instructor}}</td>
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
                                            @if($mark->mark_instructor == null || $evaluation->content_instructor == null )
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
<script type="text/javascript" src="/js/clickprog.js"></script>
<script>
    function instructorprogress(evt, cityName) {
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

<script>
    function approve(filename) {
        $.ajax({

            url: "/storage/" + filename,
            type: 'get',
            data: {
                'filename': filename
            }
        });

    }


</script>

</body>
</html>
