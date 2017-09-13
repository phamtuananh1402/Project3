<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/managementteacherparser.css')}}">
    <script src="{{asset('https://use.fontawesome.com/f5c1a979a9.js')}}"></script>

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
            <div class="managementteacherpicture">
                <img src="{{asset('images/ava1.png')}}" alt="" class="img-responsive"/>

            </div>

            <div class="selections">
                <ul>
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="">User infomation</a></li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="">Entries history</a></li>
                    <li><i class="fa  fa-briefcase" aria-hidden="true"></i><a href="">Student parser</a></li>


                </ul>


            </div>


        </div>

        <div class="col-md-9 maincontent">
            <div class="tab">
                <button class="tablinks" onclick="managementteacherparsertab(event, 'managementteacherparser')"><i
                            class="fa fa-book" aria-hidden="true"></i> Parser
                </button>
                <button class="tablinks" onclick="managementteacherparsertab(event, 'managementteacherparserdone')"><i
                            class="fa fa-cog" aria-hidden="true"></i>
                    Parser done
                </button>
            </div>

            <div id="managementteacherparser" class="tabcontent">
                <div class="tab1">
                    <div class="parserheader">
                        <i class="fa fa-book" aria-hidden="true"></i> Student parser

                    </div>

                    <div class="parserlevel">
                        <div class="high">
                            <button class="btn btn-danger">High</button>
                        </div>
                        <div class="med">
                            <button class="btn btn-warning">Medium</button>
                        </div>
                        <div class="low">
                            <button class="btn btn-info">Low</button>
                        </div>
                        <script>

                            $(function () {
                                $(".high").click(function () {

                                    $(".parsertablelow").removeClass("active");
                                    $(".parsertablemed").removeClass("active");
                                    $(".parsertablehigh").addClass("active");
                                });
                                $(".low").click(function () {

                                    $(".parsertablehigh").removeClass("active");
                                    $(".parsertablemed").removeClass("active");
                                    $(".parsertablelow").addClass("active");
                                });

                                $(".med").click(function () {

                                    $(".parsertablelow").removeClass("active");
                                    $(".parsertablehigh").removeClass("active");
                                    $(".parsertablemed").addClass("active");
                                });
                            })

                        </script>
                    </div>

                    <div class="parsertablehigh">

                        <table style="width:100%">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Aspiration</th>
                                <th>Skills</th>
                                <th>Level</th>
                                <th>Company</th>
                                <th>Topic</th>
                                <th>Checkbox</th>
                            </tr>
                            <tr>
                                <td>0105</td>
                                <td>Do Vu Hiep</td>
                                <td>IoT</td>
                                <td>HTML</td>
                                <td>Beginner</td>
                                <td>Hanoigame</td>
                                <td>How to be a billionaire</td>
                                <td><input type="checkbox" name="correct" value="parser"></td>
                            </tr>
                            <tr>
                                <td>0107</td>
                                <td>Do Vu Huy</td>
                                <td>Security</td>
                                <td>Java</td>
                                <td>Insane</td>
                                <td>BKAV</td>
                                <td>How to hack</td>
                                <td><input type="checkbox" name="correct" value="parser"></td>
                            </tr>
                            <tr>
                                <td>0110</td>
                                <td>Do Vu Hai</td>
                                <td>E-commerce</td>
                                <td>PHP</td>
                                <td>Hard</td>
                                <td>Lazada</td>
                                <td>Sold a thing with double price</td>
                                <td><input type="checkbox" name="correct" value="parser"></td>
                            </tr>
                            <tr>
                                <td>0111</td>
                                <td>Do Vu Hhung</td>
                                <td>IoT</td>
                                <td>PHP</td>
                                <td>Medium</td>
                                <td>Tinhte.vn</td>
                                <td>How to create a new entry</td>
                                <td><input type="checkbox" name="correct" value="parser"></td>
                            </tr>
                            <tr>
                                <td>0112</td>
                                <td>Do Vu Hieu</td>
                                <td>Security</td>
                                <td>PHP</td>
                                <td>Insane</td>
                                <td>Kaspersky</td>
                                <td>You can never hack my page</td>
                                <td><input type="checkbox" name="correct" value="parser"></td>
                            </tr>
                        </table>

                    </div>

                    <div class="parsertablemed">

                        <table style="width:100%">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Aspiration</th>
                                <th>Skills</th>
                                <th>Level</th>
                                <th>Company</th>
                                <th>Topic</th>
                                <th>Checkbox</th>
                            </tr>
                            <tr>
                                <td>0110</td>
                                <td>Do Vu Hai</td>
                                <td>E-commerce</td>
                                <td>PHP</td>
                                <td>Hard</td>
                                <td>Lazada</td>
                                <td>Sold a thing with double price</td>
                                <td><input type="checkbox" name="correct" value="parser"></td>
                            </tr>
                            <tr>
                                <td>0111</td>
                                <td>Do Vu Hhung</td>
                                <td>IoT</td>
                                <td>PHP</td>
                                <td>Medium</td>
                                <td>Tinhte.vn</td>
                                <td>How to create a new entry</td>
                                <td><input type="checkbox" name="correct" value="parser"></td>
                            </tr>
                            <tr>
                                <td>0112</td>
                                <td>Do Vu Hieu</td>
                                <td>Security</td>
                                <td>PHP</td>
                                <td>Insane</td>
                                <td>Kaspersky</td>
                                <td>You can never hack my page</td>
                                <td><input type="checkbox" name="correct" value="parser"></td>
                            </tr>
                        </table>

                    </div>

                    <div class="parsertablelow">

                        <table style="width:100%">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Aspiration</th>
                                <th>Skills</th>
                                <th>Level</th>
                                <th>Company</th>
                                <th>Topic</th>
                                <th>Checkbox</th>
                            </tr>
                            <tr>
                                <td>0105</td>
                                <td>Do Vu Hiep</td>
                                <td>IoT</td>
                                <td>HTML</td>
                                <td>Beginner</td>
                                <td>Hanoigame</td>
                                <td>How to be a billionaire</td>
                                <td><input type="checkbox" name="correct" value="parser"></td>
                            </tr>
                            <tr>
                                <td>0107</td>
                                <td>Do Vu Huy</td>
                                <td>Security</td>
                                <td>Java</td>
                                <td>Insane</td>
                                <td>BKAV</td>
                                <td>How to hack</td>
                                <td><input type="checkbox" name="correct" value="parser"></td>
                            </tr>

                        </table>

                    </div>

                    <div class="lastrow">
                        <div class="clearallbtn">Clear Checkbox</div>
                        <div class="submitbtn">Approve parser</div>

                    </div>

                </div>
            </div>

            <div id="managementteacherparserdone" class="tabcontent">
                <div class="tab2">

                    <div class="parserheader">
                        <i class="fa fa-book" aria-hidden="true"></i> Parser done

                    </div>
                    <div class="parsertable">

                        <table style="width:100%">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Aspiration</th>
                                <th>Skills</th>
                                <th>Level</th>
                                <th>Company</th>
                                <th>Topic</th>

                            </tr>
                            <tr>
                                <td>0093</td>
                                <td>Do Vu Linh</td>
                                <td>IoT</td>
                                <td>HTML</td>
                                <td>Beginner</td>
                                <td>Hanoigame</td>
                                <td>How to be a billionaire</td>

                            </tr>
                            <tr>
                                <td>0092</td>
                                <td>Do Vu Lan</td>
                                <td>Security</td>
                                <td>Java</td>
                                <td>Insane</td>
                                <td>BKAV</td>
                                <td>How to hack</td>

                            </tr>

                        </table>

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


<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>

<script>
    function managementteacherparsertab(evt, cityName) {
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
