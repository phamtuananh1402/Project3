<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/representation_profile.css')}}">
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
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/company/assign">Student Assign</a>
                    </li>
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="/company/instructor/create">Create
                            Instructor Account</a></li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/company/topics/create">Create
                            Topic</a></li>


                </ul>


            </div>
        </div>
        @foreach($representation_id as $rep)


            <div class="col-md-9 maincontent">
                <div class="tab">
                    <button class="tablinks" onclick="managementteachertab(event, 'managementteacherinfo')"><i
                                class="fa fa-user-circle-o" aria-hidden="true"></i> User Information
                    </button>
                    <button class="tablinks" onclick="managementteachertab(event, 'editmanagementteacherinfo')"><i
                                class="fa fa-cog" aria-hidden="true"></i>
                        Edit Information
                    </button>
                </div>

                <div id="managementteacherinfo" class="tabcontent">
                    <div class="tab1">
                        <div class="basicinfo">
                            <?php
                            $fname = $rep->first_name;
                            $lname = $rep->last_name;
                            $name = $fname . " " . $lname;
                            ?>
                            <div class="row">
                                <div class="managementteachername">{{$name}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-phone" aria-hidden="true"></i> Phone :</div>
                                <div class="managementteacherphone">{{$rep->phone_number}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email :</div>
                                <div class="managementteachermail">{{$rep->email}}</div>
                            </div>

                            <div class="row">
                                @foreach($company as $com)
                                    <div class="infotitle"><i class="fa fa-road" aria-hidden="true"></i> Company :</div>
                                    <div class="managementteacheraddress">{{$com->company_name}}</div>
                                @endforeach
                            </div>

                        </div>

                        <div class="managementteacherexperiences">
                            <div class="moduleheader">Published Topic</div>
                            <div class="topictable">

                                <table style="width:100%">
                                    <tr>
                                        <th><i class="fa fa-comment-o" aria-hidden="true"></i> Topic name</th>
                                        <th><i class="fa fa-black-tie" aria-hidden="true"></i> Company</th>
                                        <th><i class="fa fa-calendar" aria-hidden="true"></i> Date</th>
                                        <th><i class="fa fa-user-plus" aria-hidden="true"></i> Recruit</th>
                                    </tr>

                                    @foreach($topic as $top)

                                        @php
                                            $topicId = $top->topic_id;
                                            //field
                                            $field = DB::table('topic_field')->where('topic_field.topic_id','=',$topicId)->pluck('field_name');
                                            $field_name = $field->first();
                                            //representation
                                            $representation = DB::table('topic')->where('topic.topic_id','=',$topicId)->pluck('representation_id');
                                            $rep_id = $representation->first();
                                            //company
                                            $company = DB::table('company')->where('company_id','=',$rep_id)->pluck('company_name');
                                            $company_name = $company->first();

                                        @endphp
                                        <tr>
                                            <td><a href="/topic/{{$top->topic_id}}">{{$top->title}}</a>
                                                <div class="topicnote">Click for more information</div>

                                            </td>
                                            <td>{{$company_name}}</td>
                                            <td>{{$top->created_at}}</td>
                                            <td>{{$top->quantity}}</td>
                                        </tr>


                                    @endforeach

                                </table>

                            </div>
                        </div>

                        <div class="managementteachermotivations">
                            <div class="moduleheader">Motivations</div>

                            <div class="content">{{$rep->company_id}}</div>

                        </div>


                    </div>
                </div>

                <div id="editmanagementteacherinfo" class="tabcontent">
                    <div class="tab2">
                        <form method="post" action="">
                            {{csrf_field()}}
                            <div class="basicform">
                                <div class="managementteacherphoneform">
                                    <div class="formtitle">Phone</div>

                                    <input type="text" name="phone_number" placeholder="{{old('phone_number')}}"><br>

                                </div>

                                <div class="managementteachermailform">
                                    <div class="formtitle">Email</div>

                                    <input type="text" name="email" placeholder="{{old('email')}}"><br>

                                </div>

                                <div class="managementteacheraddressform">
                                    <div class="formtitle">Name</div>

                                    <input type="text" name="first_name" placeholder="{{old('first_name')}}"><br>

                                </div>
                            </div>

                            <div class="managementteacherexperiencesform">
                                <div class="formtitle">Experiences</div>

                                <input type="text" name="position" placeholder="{{old('position')}}"><br>

                            </div>

                            <div class="managementteachermotivationsform">
                                <div class="formtitle">Motivations</div>

                                <input type="text" name="motivations" value=""><br>

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

            </div>
    </div>

</div>


@include('layouts.subfooter')
@endforeach
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                All right reserved. Belong to Group 10 - LTU12A
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{asset('/js/bottstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/representation_profile.js')}}"></script>
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
