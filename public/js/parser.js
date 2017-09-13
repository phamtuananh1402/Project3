function parserApprove(student_id, company_id, topic_id){
    $.ajax({
        url: "/parser/approve",
        type: 'get',
        data: {
            'student_id': student_id,
            'company_id': company_id,
            'topic_id': topic_id
        },
        success: function () {
            toastr.success('Approved.', 'Success Alert', {timeOut: 5000});
        },
        error: function () {
            toastr.error('Error', 'Error Alert', {timeOut: 5000});
        }
    });
}

function parserDecline(student_id){
    $.ajax({
        url: "/parser/decline",
        type: 'get',
        data: {
            'student_id': student_id,
            'company_id': company_id,
            'topic_id': topic_id
        },
        success: function () {
            toastr.success('Approved.', 'Success Alert', {timeOut: 5000});
        },
        error: function () {
            toastr.error('Error', 'Error Alert', {timeOut: 5000});
        }
    });
}
