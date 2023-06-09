<script type="text/javascript">

    ////////// product controller///////////
    //load PRoducts
    load_elections();

    function load_elections() {
        $.ajax({
            url: '../Controller/Election/view.php',
            method: "GET",
            success: function(data) {
                $('#display_elections').html(data);

            }
        })
    }

    // 
    $('#applyElection').on('submit', function(event) {
        event.preventDefault();
        let form_data = $('#applyElection')[0];
        let formData = new FormData(form_data);
        console.log(form_data);
        // var pro_id = $(this).attr("delete_check_msg");
        $.ajax({
            url: '../Controller/Election/apply.php',
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#comment_form_error').html('<br /><label class="text-primary">Uploading...</label>');
            },
            success: function(data) {
                var Data = $.trim(data);

                if (Data == 'Application Successful') {
                    $('.alert_message').html('<div class="alert alert-success">Application Successful</div>');
                } else if (Data == 'Some Error Occured try again') {
                    $('.alert_message').html('<div class="alert alert-danger">Some Error Occured try again</div>');
                } else if (Data == 'Required Fields Empty Please fill them and try again') {
                    $('.alert_message').html('<div class="alert alert-danger">Required Fields Empty Please fill them and try again</div>');
                }


            }
        })
    });

    // insertPoliticalParty
    $('#insertElection').on('submit', function(event) {
        event.preventDefault();
        let form_data = $('#insertElection')[0];
        let formData = new FormData(form_data);
        console.log(form_data);
        // var pro_id = $(this).attr("delete_check_msg");
        $.ajax({
            url: '../Controller/Election/insert.php',
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#comment_form_error').html('<br /><label class="text-primary">Uploading...</label>');
            },
            success: function(data) {
                var Data = $.trim(data);

                if (Data == 'New Election Successfully') {
                    $('.alert_message').html('<div class="alert alert-success">New Election Successfully</div>');
                } else if (Data == 'Some Error Occured try again') {
                    $('.alert_message').html('<div class="alert alert-danger">Some Error Occured try again</div>');
                } else if (Data == 'Required Fields Empty Please fill them and try again') {
                    $('.alert_message').html('<div class="alert alert-danger">Required Fields Empty Please fill them and try again</div>');
                }


            }
        })
    });

    
    $(document).on('click', '#ini_delete_election_id', function() {
        var delete_election_id = $(this).data('delete_election_id');
        $.ajax({
            url: '../Controller/Election/delete.php',
            method: 'POST',
            data: {
                delete_election_id: delete_election_id
            },
            success: function(data) {
                if (data == "Election Deleted Successfully") {
                    alert(data);
                    location.reload();
                } else if (data == "Election is currently going on , you cant delete alter it") {
                    alert(data);
                } else {
                    alert("Some Error Occured PLease try again");
                    location.reload();
                }

            }

        })
    });
    

</script>