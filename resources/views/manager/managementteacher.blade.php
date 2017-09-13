<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/managementteacher.css">
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
@foreach($managementTeacher as $manager)
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
                            <div class="row">
                                <div class="managementteachername">{{$manager->first_name}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-phone" aria-hidden="true"></i> Phone :</div>
                                <div class="managementteacherphone">{{$manager->phone_number}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email :</div>
                                <div class="managementteachermail">{{$manager->email}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-road" aria-hidden="true"></i> Address :</div>
                                <div class="managementteacheraddress">{{$manager->address}}</div>
                            </div>

                        </div>

                        <div class="managementteacherexperiences">
                            <div class="moduleheader">Experiences</div>
                            <div class="content">
                                Working for thousand of IT companys, love coding, working for thousand of IT companys,
                                love
                                coding, working for thousand of IT
                                companys, love coding, working for thousand of IT companys, love coding, working for
                                thousand of IT companys, love coding,
                                working for thousand of IT companys, love coding,working for thousand of IT companys,
                                love
                                coding,working for thousand of IT
                                companys, love coding,working for thousand of IT companys, love coding,

                            </div>

                        </div>

                        <div class="managementteachermotivations">
                            <div class="moduleheader">Motivations</div>
                            <div class="content">
                                Working for thousand of IT companys, love coding, working for thousand of IT companys,
                                love
                                coding, working for thousand of IT
                                companys, love coding, working for thousand of IT companys, love coding, working for
                                thousand of IT companys, love coding,
                                working for thousand of IT companys, love coding,working for thousand of IT companys,
                                love
                                coding,working for thousand of IT
                                companys, love coding,working for thousand of IT companys, love coding,

                            </div>

                        </div>


                    </div>
                </div>

                <div id="editmanagementteacherinfo" class="tabcontent">
                    <div class="tab2">
                        <form method="post">
                            {{csrf_field()}}
                            <div class="basicform">
                                <div class="managementteacherphoneform">
                                    <div class="formtitle">Phone</div>

                                    <input type="text" name="phone_number"><br>

                                </div>

                                <div class="managementteachermailform">
                                    <div class="formtitle">Email</div>

                                    <input type="email" name="email"><br>

                                </div>

                                <div class="managementteacheraddressform">
                                    <div class="formtitle">Address</div>

                                    <input type="text" name="address"><br>

                                </div>
                            </div>

                            <div class="managementteacherexperiencesform">
                                <div class="formtitle">Experiences</div>

                                <input type="text" name="first_name"><br>

                            </div>

                            <div class="managementteachermotivationsform">
                                <div class="formtitle">Motivations</div>

                                <input type="text" name="last_name"><br>

                            </div>

                            <div class="row">
                                <div class="dirbutton">
                                    <div class="col-md-6">
                                        <button type="reset" class="clearallbtn">CLEAR ALL</button>

                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" name="submit" class="submitbtn">SUBMIT INFORMATION
                                        </button>
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
    <script type="text/javascript" src="/js/managementteacher.js"></script>
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
@endforeach
</body>
</html>
