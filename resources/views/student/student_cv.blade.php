@extends('layouts.profile')
@section('title')
 Student - CV 
@endsection 

@section('content')
<!-- BEGIN PAGE BASE CONTENT -->
<div class="profile">
    <div class="tabbable-line tabbable-full-width">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab_1_1" data-toggle="tab"> Profile </a>
            </li>
            @if(Auth::user()->role == 'student')
            <li>
                <a href="#tab_1_3" data-toggle="tab"> Edit </a>
            </li>
            @endif
            <li>
                <a href="#tab_1_6" data-toggle="tab"> Help </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1_1">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-unstyled profile-nav">
                            <li>
                                <img src="/assets/pages/media/profile/people19.png" class="img-responsive pic-bordered" alt="" />
                                <a href="javascript:;" class="profile-edit"> edit </a>
                            </li>
                            <li>
                                <a href="/student/profile"> Student Profile </a>
                            </li>
                            <li>
                                <a href="/student/cv"> Student CV

                                </a>
                            </li>
                            <li>
                                <a href="javascript:;"> Friends </a>
                            </li>
                            <li>
                                <a href="javascript:;"> Settings </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-8 profile-info">
                                
                                <h1 class="font-green sbold uppercase">{{$student_cv->name}}</h1>
                                <p>{{$student_cv->info}}</p>
                                <h3>Purpose</h3>
                                <p>{{$student_cv->purpose}}</p>
                                <p>
                                    <a href="javascript:;"> {{$student_cv->email}} </a>
                                </p>
                                <ul class="list-inline">
                                    
                                    <li>
                                        <i class="fa fa-calendar"></i> {{$student_cv->status}} </li>
                                    <li>
                                        <i class="fa fa-phone"></i> {{$student_cv->phone_number}} </li>
                                    <li>
                                        <i class="fa fa-info"></i> {{$student_cv->student_id}} </li>

                                </ul>
                            </div>
                            <!--end col-md-8-->
                            <div class="col-md-4">
                                <div class="portlet sale-summary">
                                    <div class="portlet-title">
                                        <div class="caption font-red sbold"> Intern Summary</div>
                                        <div class="tools">
                                            <a class="reload" href="javascript:;"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <ul class="list-unstyled">

                                            <li>
                                                <span class="sale-info"> Status
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                <span class="sale-num"> {{$student_cv->status}} </span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--end col-md-4-->
                        </div>
                        <!--end row-->
                        <div class="tabbable-line tabbable-custom-profile">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_11" data-toggle="tab"> Student Skills </a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_11">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <i class="fa fa-briefcase"></i> Skill </th>
                                                    <th class="hidden-xs">
                                                        <i class="fa fa-question"></i> Level </th>
                                                    <th>
                                                        <i class="fa fa-bookmark"></i> Experience </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($skill as $sk)
                                                <tr>
                                                    <td>
                                                        <a href="javascript:;"> {{$sk->skills_name}} </a>
                                                    </td>
                                                    <td class="hidden-xs"> {{$sk->level_name}} </td>
                                                    <td>
                                                        <span class="label label-success label-sm"> 3 Years </span>
                                                    </td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--tab-pane-->

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--tab_1_2-->
            <div class="tab-pane" id="tab_1_3">
                <div class="row profile-account">
                    <div class="col-md-3">
                        <ul class="ver-inline-menu tabbable margin-bottom-10">
                            <li class="active">
                                <a data-toggle="tab" href="#tab_1-1">
                                    <i class="fa fa-cog"></i> Create CV </a>
                                <span class="after"> </span>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_2-2">
                                    <i class="fa fa-picture-o"></i> Change Avatar </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div id="tab_1-1" class="tab-pane active">
                                <div class="col-md-12">
                                    <!-- BEGIN VALIDATION STATES-->
                                    <div class="portlet light portlet-fit portlet-form bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class=" icon-layers font-green"></i>
                                                <span class="caption-subject font-green sbold uppercase">Edit Information</span>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                    <i class="icon-cloud-upload"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                    <i class="icon-wrench"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                    <i class="icon-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <!-- BEGIN FORM-->
                                            <form action="#" class="form-horizontal" method="post" id="form_sample_1">

                                                <div class="form-body">
                                                    <div class="alert alert-danger display-hide">
                                                        <button class="close" data-close="alert"></button>
                                                        You have some form errors. Please check below.
                                                    </div>
                                                    <div class="alert alert-success display-hide">
                                                        <button class="close" data-close="alert"></button>
                                                        Your form validation is successful!
                                                    </div>

                                                    <div class="form-group form-md-line-input">
                                                        <label class="col-md-3 control-label" for="form_control_1">Email
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="" name="email" id="email" value="{{$student_cv->email}}">
                                                            <div class="form-control-focus"></div>
                                                            <span class="help-block">Enter your Email</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group form-md-line-input">
                                                        <label class="col-md-3 control-label" for="form_control_1">Phone Number
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="" name="phone_number" id="phone_number" value="{{$student_cv->phone_number}}">
                                                            <div class="form-control-focus"></div>
                                                            <span class="help-block">Enter a valid phone number</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group form-md-line-input">
                                                        <label class="col-md-3 control-label" for="form_control_1"> Experiences
                                                        </label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" name="memo" id="info" rows="5">{{$student_cv->info}}</textarea>
                                                            <div class="form-control-focus"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group form-md-line-input">
                                                        <label class="col-md-3 control-label" for="form_control_1"> Motivations
                                                        </label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" name="memo" id="purpose" rows="5">{{$student_cv->purpose}}</textarea>
                                                            <div class="form-control-focus"></div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group form-md-line-input">
                                                        <label class="col-md-3 control-label" for="form_control_1">First Skills</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" id="skill1">
                                                                <option value="">Select</option>
                                                                @foreach($allSkill as $as)
                                                                <option value="{{$as->name}}">{{$as->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-control-focus"> </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-control" id="level1">
                                                                <option value="">Select</option>
                                                                @foreach($level as $lv)
                                                                <option value="{{$lv->name}}">{{$lv->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-control-focus"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-md-line-input">
                                                        <label class="col-md-3 control-label" for="form_control_1">Second Skills</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" id="skill2">
                                                                <option value="">Select</option>
                                                                @foreach($allSkill as $as)
                                                                <option value="{{$as->name}}">{{$as->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-control-focus"> </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-control" id="level2">
                                                                <option value="">Select</option>
                                                                @foreach($level as $lv)
                                                                <option value="{{$lv->name}}">{{$lv->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-control-focus"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-md-line-input">
                                                        <label class="col-md-3 control-label" for="form_control_1">Third Skills</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" id="skill3">
                                                                <option value="">Select</option>
                                                                @foreach($allSkill as $as)
                                                                <option value="{{$as->name}}">{{$as->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-control-focus"> </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-control" id="level3">
                                                                <option value="">Select</option>
                                                                @foreach($level as $lv)
                                                                <option value="{{$lv->name}}">{{$lv->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-control-focus"> </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" id="edit_information" onclick="updateCv()" class="btn green">Edit
                                                            </button>
                                                            <button type="reset" class="btn default">Reset</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                    <!-- END VALIDATION STATES-->
                                </div>
                            </div>
                            <div id="tab_2-2" class="tab-pane">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ảnh</label>

                                        <form action="{{ url('dropzone') }}" method="post" class="dropzone dropzone-file-area dz-clickable" id="my-dropzone" style="width: 500px;">
                                    
                                            <h3 class="sbold">Drop files here or click to upload</h3>
                                            <p> This is just a demo dropzone. Selected files are not actually uploaded. </p>
                                            <div class="dz-default dz-message">
                                                <span></span>
                                            </div>
                                        </form>

                                        {{--
                                        <input type="file" class="dropzone dropzone-file-area" id="file" name="image" style="width: 500px;"></input> --}}

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end col-md-9-->
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END PAGE BASE CONTENT -->

@endsection @section('extra-js')
<script>
    var myDropzone = new Dropzone("#my-dropzone", {
        url: "/dropzone",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        maxFilesize: 6


    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function updateCv() {
        document.getElementById("edit_information").innerHTML = "Editing...";
        $.ajax({

            url: "/student/cv/update",
            type: 'post',
            data: {

                'email': document.getElementById('email').value,
                'phone_number': document.getElementById('phone_number').value,
                'address': document.getElementById('address').value,
                'info': document.getElementById('info').value,
                'purpose': document.getElementById('purpose').value,
                'skill1': document.getElementById('skill1').value,
                'skill2': document.getElementById('skill2').value,
                'skill3': document.getElementById('skill3').value,
                'level1': document.getElementById('level1').value,
                'level2': document.getElementById('level2').value,
                'level3': document.getElementById('level3').value,
            },
            success: function (data) {

                if ($.isEmptyObject(data.error)) {
                    document.getElementById("edit_information").innerHTML = "Edited";
                    alert('Information Edited');
                    window.location = '/student/cv';
                } else {
                    document.getElementById("edit_information").innerHTML = "Edit";
                    printErrorMsg(data.error);
                }
            }

        });


    }
</script>
@endsection