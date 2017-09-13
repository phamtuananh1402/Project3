<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/managementteacheraddstd.css">
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
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="/manager/profile">User infomation</a>
                    </li>
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="/match">Assignment</a></li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/manager/periods">Periods</a>
                    </li>
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="/manager/topics">Topic Information</a>
                    </li>

                </ul>

            </div>


        </div>

        <div class="col-md-9 maincontent">
            <div class="tab">
                <button class="tablinks" onclick="managementteachertab(event, 'managementteacher1')"><i
                            class="fa fa-plus" aria-hidden="true"></i> Add Students
                </button>
                <button class="tablinks" onclick="managementteachertab(event, 'managementteacher2')"><i
                            class="fa fa-plus" aria-hidden="true"></i>
                    Remove Student
                </button>
            </div>

            <div id="managementteacher1" class="tabcontent">
                <div class="tab1">
                    <div class="entriesheader">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add Students

                    </div>
                    <?php
                    $periodDate = DB::table('periods')->where('id', '=', $period_id)->first();
                    ?>
                    <div class="duration">
                        <div class="firstrow"> Period :</div>
                        <div class="period">{{$period_id}}</div>
                        <div class="firstrow"> From</div>
                        <div class="date1">{{$periodDate->start_date}}</div>
                        <div class="firstrow"> To :</div>
                        <div class="date2">{{$periodDate->end_date}}</div>

                    </div>

                    <div class="studenttable">

                        <table style="width:100%">
                            <tr>
                                <th>SID</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Action</th>
                            </tr>

                            @foreach($students as $student)
                                <tr>
                                    <td>{{$student->student_id}}</td>
                                    <td>{{$student->first_name}}</td>
                                    <td>{{$student->last_name}}</td>
                                    <td>

                                        <a class="btn-primary"
                                           href="/manager/period/{{$period_id}}/add/{{$student->student_id}}"><span
                                                    class="glyphicon glyphicon-edit"></span> Approve
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>

                </div>
            </div>

            <div id="managementteacher2" class="tabcontent">
                <div class="tab2">

                    <div class="entriesheader">
                        <i class="fa fa-plus" aria-hidden="true"></i> Remove Student

                    </div>

                    <?php
                    $periodDate = DB::table('periods')->where('id', '=', $period_id)->first();
                    ?>
                    <div class="duration">
                        <div class="firstrow"> Period :</div>
                        <div class="period">{{$period_id}}</div>
                        <div class="firstrow"> From</div>
                        <div class="date1">{{$periodDate->start_date}}</div>
                        <div class="firstrow"> To :</div>
                        <div class="date2">{{$periodDate->end_date}}</div>

                        <div class="studenttable">

                            <table style="width:100%">
                                <tr>
                                    <th>SID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($studentsInPeriod as $student)
                                    <tr>
                                        <td>{{$student->student_id}}</td>
                                        <td>{{$student->first_name}}</td>
                                        <td>{{$student->last_name}}</td>
                                        <td>

                                            <a class="btn-primary"
                                               href="/manager/period/{{$period_id}}/remove/{{$student->student_id}}"><span
                                                        class="glyphicon glyphicon-edit"></span> Remove
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

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
<script type="text/javascript" src="/js/studentinfo.js"></script>
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

</body>
</html>
