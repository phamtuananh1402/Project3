<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/student_cv_form.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>
<div class="topbanner">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="{{asset('images/logo_sie.png')}}" alt="" class="logo"/>
                <div class="brand">
                    <div class="first">Trường Đại học Bách Khoa Hà Nội</div>
                    <div class="second">Viện đào tạo Quốc tế SIE</div>
                </div>
            </div>
            <div class="col-md-7 menu">
                <ul>
                    <li class="direct"><a href="">Home</a></li>
                    <li class="direct"><a href="">News</a></li>
                    <li class="direct"><a href="">Courses</a></li>
                    <li class="direct"><a href="">Sign Up</a></li>
                    <li class="direct"><a href="">Contacts</a></li>

                </ul>


            </div>


        </div>

    </div>


</div>

<div class="subbanner">
    <div class="container">
        <div class="col-md-12 text-right">You're not logged in. [<a href="">Login</a>]</div>

    </div>
</div>

<div class="main">
    <div class="container-fluid banner">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 maincv">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cvheader">STUDENT CV FORM</div>
                        </div>
                    </div>
                    <form action="/company/instructor/show" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="studentname">
                                    <span>Student ID</span>

                                    <input type="text" name="instructor_id" placeholder="NAME"
                                           value="{{Auth::user()->user_id}}" contenteditable="false">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="studentfname">
                                    <span>First Name</span>

                                    <input type="text" name="first_name" placeholder="First Name">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="studentlname">
                                    <span>Last Name</span>

                                    <input type="text" name="last_name" placeholder="Last Name">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="studentphone">
                                    <span>Instructor Company Phone</span>

                                    <input type="text" name="phone_number" placeholder="Phone Number">

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="studentemail">
                                    <span>Email: </span>

                                    <input type="text" name="email" placeholder="Email">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="studentemail">
                                    <span>Position: </span>

                                    <input type="text" name="position" placeholder="Position">

                                </div>
                            </div>

                        </div>

                        <div class="row uploadpicture">
                            <div class="cvsubheader">
                                UPLOAD YOUR PROFILE PICTURE
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="uploadbutton">
                                        <div class="fileUpload btn btn-primary">
                                            <span>Upload file here</span>
                                            <input type="file" class="upload"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="note"> Pick one of yours images so people can recognize you and for some
                                        important reasons
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row directions">
                            <div class="col-md-6">
                                <button type="reset" class="resetbutton">CLEAR ALL</button>

                            </div>
                            <div class="col-md-6">
                                <button class="postbutton" type="submit"> SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4 subcv">

                </div>

            </div>

        </div>
    </div>

</div>


@extends('layouts.footer')

</body>
</html>
