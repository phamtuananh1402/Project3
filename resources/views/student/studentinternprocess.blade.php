<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/studentinternprocess.css">
    <script src="/js/fontawesome.js"></script>
    <script type="text/javascript" src="{{asset('http://code.jquery.com/jquery.min.js')}}"></script>
    <style>


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
                    <button class="registerbtn" id="topic">REGISTER NOW</button>
                </div>
            </div>
        </div>
    </div>

</div>

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
                <button class="tablinks" onclick="studentinternproctab(event, 'studentinternproc')"><i
                            class="fa fa-bar-chart" aria-hidden="true"></i> Intern process
                </button>
                <button class="tablinks" onclick="studentinternproctab(event, 'assignment')"><i class="fa fa-upload"
                                                                                                aria-hidden="true"></i>
                    Assignment
                </button>
            </div>

            <div id="studentinternproc" class="tabcontent">
                <div class="tab1">
                    <div class="processheader">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i> Student intern process

                    </div>

                    <div class="processinfo">
                        <?php
                        $stdFirstName = $student->first_name;
                        $stdLastName = $student->last_name;
                        $stdName = $stdFirstName . " " . $stdLastName;
                        ?>

                        <div class="row ">
                            <div class="infotitle">Name :</div>

                            <div class="studentfullname">{{$stdName}}</div>

                        </div>

                        <div class="row">
                            <div class="infotitle">Class :</div>
                            <div class="studentclass">{{$student->class}}</div>
                        </div>

                        <div class="row">
                            <div class="infotitle">Company :</div>
                            <div class="companyname">{{$company->company_name}}</div>
                        </div>
                        <?php
                        if ($instructor != null) {
                        $insFirstName = $instructor->first_name;
                        $insLastName = $instructor->last_name;
                        $insName = $insFirstName . " " . $insLastName;
                        ?>

                        <div class="row">
                            <div class="infotitle">Trainer :</div>
                            <div class="trainername">{{$insName}}</div>
                        </div>
                        <?php
                        } else{ ?>
                        <div class="row">
                            <div class="infotitle">Trainer :</div>
                            <div class="trainername"></div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="processtable">

                        <table style="width:100%">
                            <tr>

                                <th>Day</th>
                                <th>Date</th>
                                <th>Work process</th>
                            </tr>
                            @foreach($evaluation as $eva)
                                <tr>
                                    <th>{{$eva->id}}</th>
                                    <th>{{$eva->created_at}}</th>
                                    <th>{{$eva->content_instructor}}</th>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                    <?php

                    $now = \Carbon\Carbon::now('Asia/Bangkok');
                    if($endDateFeedback >= $now){
                    ?>
                    @include('button.buttonfeedback')

                    <?php
                    }

                    ?>

                </div>
            </div>

            <div id="assignment" class="tabcontent">
                <div class="tab2">
                    <div class="assignmentheader">
                        <i class="fa fa-upload" aria-hidden="true"></i> Assignment

                    </div>
                    <?php
                    $id = \Illuminate\Support\Facades\Auth::user()->user_id;
                    $report = DB::table('report')->where('student_id', '=', $id)->first();
                    ?>
                    @if($report->status == "Submitted")
                        <h1 style="text-align: center">You already submitted the final report!</h1>
                    @else
                        <form action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="upload">
                                    <div class="uploadtitle"><i class="fa fa-circle-o" aria-hidden="true"></i> Upload
                                        your
                                        assignment here
                                    </div>

                                    <input type="file" name="report" id="file" class="inputfile" multiple
                                           onchange="GetFileSizeNameAndType()"/>
                                    <label for="file">Choose a file</label>
                                    <div id="fp"></div>

                                    <p>
                                    <div id="divTotalSize"></div>

                                    </p>


                                </div>
                            </div>

                            <div class="row">
                                <div class="reportheader"><i class="fa fa-circle-o" aria-hidden="true"></i> Report</div>
                                <div class="reportnote">Otherwise, you can post your complain here and it will send
                                    directly
                                    to the company and your lecturer
                                </div>
                                <textarea rows="4" cols="50" placeholder="Text here..."></textarea>

                            </div>

                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <button class="submitbtn" type="submit" name="submit">SUBMIT NOW</button>
                                </div>
                            </div>
                        </form>
                    @endif

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
<script type="text/javascript" src="/js/studentinternprocess.js"></script>
<script>
    function studentinternproctab(evt, cityName) {
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

    function GetFileSizeNameAndType() {
        var fi = document.getElementById('file'); // GET THE FILE INPUT AS VARIABLE.

        var totalFileSize = 0;

        // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
        if (fi.files.length > 0) {
            // RUN A LOOP TO CHECK EACH SELECTED FILE.
            for (var i = 0; i <= fi.files.length - 1; i++) {
                //ACCESS THE SIZE PROPERTY OF THE ITEM OBJECT IN FILES COLLECTION. IN THIS WAY ALSO GET OTHER PROPERTIES LIKE FILENAME AND FILETYPE
                var fsize = fi.files.item(i).size;
                totalFileSize = totalFileSize + fsize;
                document.getElementById('fp').innerHTML =
                    document.getElementById('fp').innerHTML
                    +
                    '<br /> ' + 'File Name is <b>' + fi.files.item(i).name
                    +
                    '</b> and Size is <b>' + Math.round((fsize / 1024)) //DEFAULT SIZE IS IN BYTES SO WE DIVIDING BY 1024 TO CONVERT IT IN KB
                    +
                    '</b> KB and File Type is <b>' + fi.files.item(i).type + "</b>.";

            }

        }
        document.getElementById('divTotalSize').innerHTML = "Total File(s) Size is <b>" + Math.round(totalFileSize / 1024) + "</b> KB";
    }

</script>
<script type="text/javascript" src={{asset('js/topicbutton.js')}}></script>
@endsection
</body>
</html>
