<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/periodmanage.css">
    <script type="text/javascript"
            src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
    <script src="{{asset('https://use.fontawesome.com/f5c1a979a9.js')}}"></script>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.504/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.504/styles/kendo.material.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.504/styles/kendo.material.mobile.min.css"/>

    <script src="https://kendo.cdn.telerik.com/2017.2.504/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.2.504/js/kendo.all.min.js"></script>


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
                <button class="tablinks" onclick="managementteachertab(event, 'managementteacherentries')"><i
                            class="fa fa-book" aria-hidden="true"></i> Entries
                </button>
                <button class="tablinks" onclick="managementteachertab(event, 'createmanagementteacherentry')"><i
                            class="fa fa-cog" aria-hidden="true"></i>
                    Create a new entry
                </button>
            </div>

            <div id="managementteacherentries" class="tabcontent">
                <div class="tab1">
                    <div class="entriesheader">
                        <i class="fa fa-book" aria-hidden="true"></i> All entries

                    </div>

                    <div class="entriessum">
                        @php($count = DB::table('periods')->count())
                        There are {{$count}} entries
                    </div>
                    <div class="entriestable">

                        <table style="width:100%">
                            <tr>
                                <th>Title</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Number Student</th>
                                <th>Status</th>
                            </tr>
                            @foreach($periods as $ped)
                                @php
                                    $pereiodId = $ped->id;
                                    $count = DB::table('periods_students')->where('period_id', '=', $pereiodId)->count();
                                    $sdate = \Carbon\Carbon::now();
                                    $edate = $ped->end_date;
                                    $enddate = new \Carbon\Carbon($edate);


                                @endphp
                                <tr>
                                    @if($sdate > $enddate)
                                        <td>{{$ped->name}}</td>
                                    @else
                                        <td><a href="/manager/period/{{$pereiodId}}">{{$ped->name}}</a><br>
                                            <span>Click for add student</span>
                                        </td>

                                    @endif

                                    <td>{{$ped->start_date}}</td>
                                    <td>{{$ped->end_date}}</td>
                                    <td>{{$count}}</td>
                                    @if($sdate > $enddate)
                                        <td>Expired</td>
                                    @else
                                        <td>On Going</td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>

                    </div>

                </div>
            </div>

            <div id="createmanagementteacherentry" class="tabcontent">
                <div class="tab2">

                    <div class="entriesheader">
                        <i class="fa fa-book" aria-hidden="true"></i> Create a new entry

                    </div>
                    <form id="eventForm" class="form-horizontal" method="POST" action="/manager/periods/create">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-xs-3 control-label">Event</label>
                            <div class="col-xs-5">
                                <input type="text" class="form-control" name="name"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label">Start date</label>
                            <div class="col-xs-5 dateContainer">
                                <div class="input-group input-append date" id="startDatePicker">
                                    <input id="start" style="width: 100%;" name="start_date"/>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label">End date</label>
                            <div class="col-xs-5 dateContainer">
                                <div class="input-group input-append date" id="endDatePicker">
                                    <input id="end" style="width: 100%;" name="end_date"/>

                                </div>
                            </div>
                        </div>

                        <div class="row finishbtn">
                            <div class="col-md-6">
                                <button class="clearallbtn" type="reset">CLEAR ALL</button>
                            </div>

                            <div class="col-md-6">
                                <button class="submitbtn" name="submit" type="submit">SUBMIT NOW</button>
                            </div>
                        </div>


                    </form>

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
<script type="text/javascript" src="/js/periodmanage.js"></script>
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
<script>

    $(document).ready(function () {
        function startChange() {
            var startDate = start.value(),
                endDate = end.value();

            if (startDate) {
                startDate = new Date(startDate);
                startDate.setDate(startDate.getDate());
                end.min(startDate);
            } else if (endDate) {
                start.max(new Date(endDate));
            } else {
                endDate = new Date();
                start.max(endDate);
                end.min(endDate);
            }
        }

        function endChange() {
            var endDate = end.value(),
                startDate = start.value();

            if (endDate) {
                endDate = new Date(endDate);
                endDate.setDate(endDate.getDate());
                start.max(endDate);
            } else if (startDate) {
                end.min(new Date(startDate));
            } else {
                endDate = new Date();
                start.max(endDate);
                end.min(endDate);
            }
        }

        var start = $("#start").kendoDatePicker({
            change: startChange,
            format: "yyyy-MM-dd"
        }).data("kendoDatePicker");

        var end = $("#end").kendoDatePicker({
            change: endChange,
            format: "yyyy-MM-dd"
        }).data("kendoDatePicker");

        start.max(end.value());
        end.min(start.value());
    });
</script>

</body>

</html>
