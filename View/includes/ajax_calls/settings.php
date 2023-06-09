<script type="text/javascript">
    // 

    $('#settingForm').on('submit', function(event) {
        event.preventDefault();
        let form_data = $('#settingForm')[0];
        let formData = new FormData(form_data);
        $.ajax({
            url: '../Controller/Admin/setting.php',
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('.comment_form_error').html("<span class='spinner-grow spinner-grow-sm' role='status'></span><span class='load-text'>Loading...</span>");
                // $('.FormBtn1').html("");
            },
            success: function(data) {
                var Data = $.trim(data);
                if (Data == 'Settings Updated Successfully') {
                    $('.alert_message').html('<div class="alert alert-success">Settings Updated Successfully <a href="index.php">Head to Dashborad</a></div>');
                    // s_f_message(1, '#subjectForm', '#subjectModal');
                } else if (Data == 'Required Fields Empty Please fill them and try again') {
                    $('.alert_message').html('<div class="alert alert-danger">Required Fields Empty Please fill them and try again</div>');
                    // s_f_message(0, '#subjectForm', '#subjectModal');
                } else {}
            }
        })

    });
</script>