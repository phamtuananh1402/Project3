<!DOCTYPE html>
<html lang="en">
<head>

    @extends('layouts.head')

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
        @foreach($topic_id as $tp_id)
            <div class="col-md-12 text-right"><h4><b>This is topic number {{$tp_id->id}}</b></h4></div>
        @endforeach

    </div>
</div>
@foreach($topic_id as $tp_id)
    <div class="main">
        <div class="container-fluid banner">
            <div class="container">
                <div class="row ">
                    <div class="col-md-9 mainprofile">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="userpicture">
                                    <img src="{{asset('images/userpicture.png')}}" alt="" class="img-responsive"/>
                                </div>
                                <div class="uploadpicture"><a href="">Thay đổi ảnh đại diện</a></div>
                                <div class="userinfo">
                                    @foreach($topic as $rep_id)
                                        <div class="username"><span><i class="fa fa-user"
                                                                       aria-hidden="true"></i></span>
                                            <?php
                                            $fname = $rep_id->first_name;
                                            $lname = $rep_id->last_name;
                                            $name = $fname . " " . $lname;
                                            ?>
                                            {{$name}}
                                        </div>

                                        <div class="usermail"><span> <i class="fa fa-envelope"
                                                                        aria-hidden="true"></i></span> {{$rep_id->email}}
                                        </div>
                                        <div class="usercompany"><span> <i class="fa fa-briefcase"
                                                                           aria-hidden="true"></i></span> {{$rep_id->position}}
                                        </div>
                                        <div class="usercompanyid"><span> <i class="fa fa-map-marker"
                                                                             aria-hidden="true"></i></span> {{$rep_id->company_id}}
                                        </div>
                                    @endforeach
                                </div>
                                <br/>

                                <div class="subprofile">
                                    <div class="subtittle">Company:</div>

                                    <div class="subuserskills">
                                        @foreach($topic as $rep_id)
                                            <div class="row">
                                                <div class="col-md-9">{{$rep_id->company_id}}</div>
                                                <div class="col-md-3"><i class="fa fa-info-sign"
                                                                         aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="username">


                                    <div class="topicid"><b>Topic ID: </b><span>{{$tp_id->topic_id}}</span>
                                    </div>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <div class="topictitle"><b>Title: </b><span>{{$tp_id->title}}</span>
                                    </div>
                                    <br/>

                                    <div class="topicquantity">
                                        <span><b>Quantity: </b></span>{{$tp_id->quantity}}
                                    </div>
                                    <br/>

                                    <div class="topiccontent">
                                        <span><b>Information: </b></span><br/>{{$tp_id->content}}
                                    </div>
                                    <br/>


                                    <div class="otherrequire">
                                        <span><b>Other Require: </b></span><br/>{{$tp_id->otherRequire}}
                                    </div>
                                    <br/>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>


        <div class="subfooter">

            @extends('layouts.footer')
            @endforeach

        </div>
    </div>
</body>
</html>
