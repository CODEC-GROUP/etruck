<script type="text/javascript">
    ////////// product controller///////////
    //load PRoducts
    load_political_parties();

    function load_political_parties() {
        $.ajax({
            url: '../Controller/Politicalparty/view.php',
            method: "GET",
            success: function(data) {
                $('#display_political_parties').html(data);

            }
        })
    }
    // insertPoliticalParty
    $('#insertPoliticalParty').on('submit', function(event) {
        event.preventDefault();
        let form_data = $('#insertPoliticalParty')[0];
        let formData = new FormData(form_data);
        console.log(form_data);
        // var pro_id = $(this).attr("delete_check_msg");
        $.ajax({
            url: '../Controller/Politicalparty/insert.php',
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#comment_form_error').html('<br /><label class="text-primary">Uploading...</label>');
            },
            success: function(data) {
                var Data = $.trim(data);

                if (Data == 'New Political Party Successfully') {
                    $('.alert_message').html('<div class="alert alert-success">New Political Party Successfully</div>');
                } else if (Data == 'Some Error Occured try again') {
                    $('.alert_message').html('<div class="alert alert-danger">Some Error Occured try again</div>');
                } else if (Data == 'Required Fields Empty Please fill them and try again') {
                    $('.alert_message').html('<div class="alert alert-danger">Required Fields Empty Please fill them and try again</div>');
                }


            }
        })
    });

    $(document).on('click', '#ini_delete_pp_id', function() {
        var delete_pp_id = $(this).data('delete_pp_id');
        $.ajax({
            url: '../Controller/Politicalparty/delete.php',
            method: 'POST',
            data: {
                delete_pp_id: delete_pp_id
            },
            success: function(data) {
                if (data == "Political Party Deleted Successfully") {
                    alert(data);
                    location.reload();
                } else if (data == "Political Party Has Participated in Current Elections You cant delete it") {
                    alert(data);
                } else {
                    alert("Some Error Occured PLease try again");
                    location.reload();
                }

            }

        })
    });
</script>