<script>
    $('.FormBtn').on('click', function(event) {

        event.preventDefault();
        $(".comment_form_error").fadeIn();
    
            var form_data = $('#adminLoginForm').serialize();
            $.ajax({
                url: '../Controller/Admin/login.php',
                method: 'POST',
                data: form_data,
                beforeSend: function() {
                    $('.loading').html("<span class='alert'>Loading...</span>");
                },
                success: function(data) {
                    var Data = $.trim(data);
                    $('.loading').html("<span class='alert'>Signin</span>");
                    if (Data == 'Login Successful') {
                        $('.comment_form_error').html("<span class='btn btn-success btn-block mb-4 '><small>Login Successfull You will be Redirected...</small></span>");
                        setInterval(() => {
                            window.location = "index.php";
                        }, 1000);
                    } else if (Data == 'Wrong Email or Password') {
                        $('.comment_form_error').html("<span class='btn btn-danger btn-block mb-4 '>Wrong Email or Password</span>");
                    } else if (Data == 'required fields are missing') {
                        $('.comment_form_error').html("<span class='btn btn-google btn-block'>Required fields are missing Please fill them and try again</span>");
                    }
                }
            })
        

    });
</script>