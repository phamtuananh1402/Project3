@extends('layouts.profile') 
@section('title')
Create Outline 
@endsection 
@section('content')
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">Outline Create</span>
                </div>
                <div class="actions">
                   
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="#" id="form_sample_3">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" readonly class="form-control" value="{{$topicId}}" name="name" id="topic_id">
                            <label for="form_control_1">Topic ID</label>
                        </div>
                        
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="number" id="week">
                            <label for="form_control_1">Week</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                   
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <select class="form-control" id="student_id">
                                <option value=""></option>
                                @foreach($idStudents as $sid)
                                <option value="{{$sid->student_id}}">{{$sid->student_id}}</option>
                                @endforeach
                            </select>
                            <label for="form_control_1">Student</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="name" id="work">
                            <label for="form_control_1">Work</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>

                        <div class="form-group form-md-line-input form-md-floating-label">
                            <textarea class="form-control" name="memo" id="work_content" rows="8"></textarea>
                            <label for="form_control_1">Work Content</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                        
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn dark" onclick="outlineCreate()">Submit</button>
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
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

@endsection 

@section('extra-js')
<script>
 
    function outlineCreate() {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/instructor/outline/store",
            type: 'post',
            data: {
                'week': document.getElementById('week').value,
                'work': document.getElementById('work').value,
                'work_content': document.getElementById('work_content').value,
                'student_id': document.getElementById('student_id').value,
                
                'topic_id': document.getElementById('topic_id').value,
            },
            success: function (data) {
                if ($.isEmptyObject(data.error)) {
                    alert('Đã thêm công việc mới');
                    //window.location = '/dashboard/create';
                } else {
                    printErrorMsg(data.error);
                }
            }

        });

        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function (key, value) {
                $(".print-error-msg").find("ul").append('<li><span class="help-block">' + value +
                    '</span></li>');
            });

        }

    }
</script>
@endsection