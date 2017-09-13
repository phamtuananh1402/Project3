
/* Approve topic */
function approve(topic_id) {
    $.ajax({
        url: "/manager/topics/approve",
        type: 'get',
        data: {
            'topic_id': topic_id
        },
        success: function (result) {
            $('.'+ topic_id + 'a').html('<label class="label label-success" readonly="true">Approved</label>');
            $('.'+ topic_id + 'b').html('');
            toastr.success('Approved.', 'Success Alert', {timeOut: 5000});
        },
        error: function () {
            toastr.error('Error', 'Error Alert', {timeOut: 5000});
        }
    });

}

/* Decline topic */
function decline(topic_id) {
    $.ajax({
        url: "/manager/topics/decline",
        type: 'get',
        data: {
            'topic_id': topic_id
        },
        success: function (result) {
            $('.'+ topic_id + 'a').html('<label class="label label-danger" readonly="true">Declined</label>');
            $('.'+ topic_id + 'b').html('');
            toastr.success('Declined.', 'Success Alert', {timeOut: 5000});
        },
        error: function () {
            toastr.error('Error', 'Error Alert', {timeOut: 5000});
        }
    });

}
