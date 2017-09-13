<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/companysearch.css">
    <script src="/js/fontawesome.js"></script>
    <style>
        input[type="text"] {
            padding: 10px;
            border: solid 1px #fff;
            box-shadow: inset 1px 1px 2px 0 #707070;
            transition: box-shadow 0.3s;
        }

        input[type="text"]:focus,
        input[type="text"].focus {
            box-shadow: inset 1px 1px 2px 0 #c9c9c9;
        }

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

<div class="main">
    <div class="container">
        <div class="col-md-3 sidebar">
            <div class="searchingcontent">
                <div class="dess">You want to <span>search for</span> :</div>
                <div class="selection">
                    <form method="post" action='/search/input'>
                        {{csrf_field()}}
                        <select class="selectdesign" name="sel">
                            <option value="company">Company</option>
                            <option name="student" value="student">Student</option>
                            <option value="topic">Topic</option>
                        </select>

                        <div class="searched">
                            <div class="dess2">What you want to <span>search</span> :</div>

                            <!-- 						method ='post' action =''-->
                            <input type="text" name="text"> <i class="fa fa-search" aria-hidden="true"></i>


                        </div>
                        <input type="submit" name="submitSearch" class="btn-success">

                    </form>
                </div>
            </div>


        </div>

        <div class="col-md-9 maincontent">

            <div class="topicheader">
                <i class="fa fa-search" aria-hidden="true"></i> Company Searching

            </div>

            <div class="searchresult">Search Results <span>1-10 of 10</span></div>

            <div class="results">
                <div class="resultstable">

                    @if (!empty($compa))
                        <table style="width:100%">
                            <tr>
                                <th>Company ID</th>
                                <th>Company Name</th>
                                <th>Representation</th>
                                <th>Address</th>
                            </tr>
                            @foreach($compa as $compa)
                                <tr>
                                    <td>{{$compa['company_id']}}</td>
                                    <td class="companyname">{{strtoupper($compa['company_name'])}}</td>
                                    <td><a href="/company/representation/{{$compa['representation_id']}}">Look
                                            Mr/Mrs/Ms {{$compa['last_name']}}'s Profile</a></td>
                                    <td>{{$compa['address']}}</td>

                                </tr>

                            @endforeach

                        </table>
                    @endif
                <!-- is_array($compaTopic) || is_object($compaTopic) and -->
                    @if ( !empty($compaTopic))
                        <table style="width:100%">
                            <tr>
                                <th>Topic Name</th>
                                <th>Company Name</th>
                                <th>Skill</th>
                                <th>Level</th>
                            </tr>

                            @foreach($compaTopic as $companyTopic)
                                <tr>
                                    <td class="companyname">{{$companyTopic['title']}}</td>
                                    <td><a href="">{{$companyTopic['company_name']}}</a></td>
                                    <td>{{$companyTopic['skills_name']}}</td>
                                    <td>{{$companyTopic['level_name']}}</td>
                                </tr>
                            @endforeach

                        </table>
                    @endif
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


<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/studentinfo.js"></script>
<script>
    function companytopictab(evt, cityName) {
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
