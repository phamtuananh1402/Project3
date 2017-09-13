function submit(student_id){
    var topic_id = $('.topicoption').val();
    $.ajax({
        url: "/company/recruit",
        type: 'get',
        data: {
            'student_id': student_id,
            'topic_id': topic_id,
        }, success: function(){
            //window.location ='/home';
            toastr.success('Submitted.', 'Success Alert', {timeOut: 5000});
        },
        error: function () {
            toastr.error('Error', 'Error Alert', {timeOut: 5000});
        }
    });
}
