<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="/css/studentmark.css">
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
            <div class="studentpicture">
                <img src="/images/ava1.png" alt="" class="img-responsive"/>

            </div>

            @extends('layouts.selections')
            @section('content')


        </div>

        <div class="col-md-9 maincontent">
            <div class="maintitle">Student score</div>
            <div class="maincontent">
                <div class="nonescore">You dont have any score yet!</div>
                <div class="scoremain">
                    <div class="studentinfo">
                        <div class="studentname">{{$student->first_name}}</div>
                        <div class="studentclass">{{$student->class}}</div>
                        <div class="interndate">January 1 to June 30</div>
                    </div>


                    <div class="internscore">
                        <table style="width:100%">
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Link</th>
                                <th>Other Note</th>
                            </tr>
                            <tr>
                                <td>Company Marking</td>
                                <td></td>
                                <td>{{$stdMark->mark_instructor_link}}</td>
                                <td>{{$stdMark->instructor_note}}</td>
                            </tr>
                            <tr>
                                <td>Teacher Marking</td>
                                <td>{{$stdMark->mark_lecturer}}</td>
                                <td></td>
                                <td>{{$stdMark->lecturer_note}}</td>
                            </tr>

                        </table>


                    </div>


                </div>


            </div>

            <div class="reportscore">
                <div class="reportdes">If you think your score is having problem or you want to discuss about this
                    score, please click this button below
                </div>
                <div class="reportbtn">
                    <button class="btn btn-primary" type="submit" name="feedback"><a href="/contact">Report score</a>
                    </button>

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
<script type="text/javascript" src="/js/studentmark.js"></script>
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
</script>
@endsection
</body>
</html>
