
/* Approve assign */
function approve(student_id, company_id, topic_id) {
    $.ajax({
        url: "/company/assign/approve",
        type: 'get',
        data: {
            'student_id': student_id,
            'company_id': company_id,
            'topic_id': topic_id
        },
        success: function () {
            $('.'+ student_id + 'a').html('<label class="label label-success" readonly="true">Approved</label>');
            $('.'+ student_id + 'b').html('');
            toastr.success('Approved.', 'Success Alert', {timeOut: 5000});
        },
        error: function () {
            toastr.error('Error', 'Error Alert', {timeOut: 5000});
        }
    });
}

/* Decline assign */
function decline(student_id) {
    $.ajax({
        url: "/company/assign/decline",
        type: 'get',
        data: {
            'student_id': student_id
        },
        success: function () {
            $('.'+ student_id + 'a').html('<label class="label label-danger" readonly="true">Declined</label>');
            $('.'+ student_id + 'b').html('');
            toastr.success('Declined.', 'Success Alert', {timeOut: 5000});
        },
        error: function () {
            toastr.error('Error', 'Error Alert', {timeOut: 5000});
        }
    });

}
