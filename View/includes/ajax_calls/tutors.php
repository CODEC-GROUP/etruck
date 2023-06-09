<script type="text/javascript">
    ////////////////////////////Sub Tutors Controller ///////////////////////////
    //////////////////// load Tutors on load //////////////////////////////////////
    load_tutors();

    function load_tutors() {
        $.ajax({
            url: "../Controller/Tutor/view.php",
            method: "GET",
            success: function(data) {
                $('#display_tutors').html($.trim(data));

            }
        })
    }

    // view subjects
    $(document).on('click', '#ini_view_job_id', function() {
        var view_job_id = $(this).data('view_job_id');
        $.ajax({
            url: '../Controller/Tutor/view.php',
            method: 'GET',
            data: {
                view_job_id: view_job_id,
                check: "fetch_view"
            },
            success: function(data) {
                $('.view_tutor_details').html(data);
                $('#viewSubjectModal').modal('toggle');
            }

        })
    });





    // 
</script>