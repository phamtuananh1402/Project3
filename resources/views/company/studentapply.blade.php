<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/studentapply.css">
    <script src="/js/fontawesome.js"></script>

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

            @include('layouts.selections')

        </div>

        <div class="col-md-9 maincontent">

            <div class="basicinfo">
                <div class="row">
                    <div class="title">Apply Student CV Form</div>
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
                <form action="/student/aspiration/" method="post">
                    <div class="row">
                        {{ csrf_field() }}

                        <div class="company">
                            Company name :

                            <input class="textin" type="text" name="company_name" value="">


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <input type="submit" class="submitbtn" name="submit">
                        </div>

                    </div>
                </form>
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
<script type="text/javascript" src="/js/studentinfo.js"></script>

</body>
</html>
