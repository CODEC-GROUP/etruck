<script type="text/javascript">



load_chart();
 
 function load_chart() {
   $.ajax({
     url: "../Controller/Voters/tableData.php",
     method: "GET",
     success: function(data)
     {
        var myArray = JSON.parse(data);
        var political_parties = myArray[0];
        var Points = myArray[1];
        var colors = myArray[2];

    var options = {
      chart: {
        height: 320,
        type: 'pie',
      },
      labels: political_parties,
      series: Points,
      colors: colors,
      legend: {
        show: true,
        position: 'bottom',
      },
      dataLabels: {
        enabled: true,
        dropShadow: {
          enabled: false,
        }
      },
      responsive: [{
        breakpoint: 480,
        options: {
          legend: {
            position: 'bottom'
          }
        }
      }]
    }
    var chart = new ApexCharts(
      document.querySelector("#pie-chart-1"),
      options
    );
    chart.render();
}
  });
}



    ////////// product controller///////////
    //load PRoducts
    load_voters();

    function load_voters() {
        $.ajax({
            url: '../Controller/Voters/view.php',
            method: "GET",
            success: function(data) {
                $('#display_voters').html(data);

            }
        })
    }

    display_pp();

    function display_pp() {
        $.ajax({
            url: '../Controller/Voters/display_pp.php',
            method: "GET",
            success: function(data) {
                $('#display_pp').html(data);

            }
        })
    }

    // insertPoliticalParty
    $('#insertVoters').on('submit', function(event) {
        event.preventDefault();
        let form_data = $('#insertVoters')[0];
        let formData = new FormData(form_data);
        console.log(form_data);
        // var pro_id = $(this).attr("delete_check_msg");
        $.ajax({
            url: '../Controller/Voters/insert.php',
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#comment_form_error').html('<br /><label class="text-primary">Uploading...</label>');
            },
            success: function(data) {
                var Data = $.trim(data);

                if (Data == 'New Voter Successfully Registered') {
                    $('.alert_message').html('<div class="alert alert-success">New Voter Successfully Registered</div>');
                } else if (Data == 'Some Error Occured try again') {
                    $('.alert_message').html('<div class="alert alert-danger">Some Error Occured try again</div>');
                } else if (Data == 'Required Fields Empty Please fill them and try again') {
                    $('.alert_message').html('<div class="alert alert-danger">Required Fields Empty Please fill them and try again</div>');
                }


            }
        })
    });


    // login voters

    $('.FormBtn').on('click', function(event) {

        event.preventDefault();

        var form_data = $('#adminLoginForm').serialize();
        $.ajax({
            url: '../Controller/Voters/login.php',
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
                        window.location = "vote.php";
                    }, 1000);
                } else if (Data == 'Wrong Voter or Id Card Number') {
                    $('.comment_form_error').html("<span class='btn btn-danger btn-block mb-2 '>Wrong Voters or Id Card Number</span>");
                } else if (Data == 'required fields are missing') {
                    $('.comment_form_error').html("<span class='btn btn-danger btn-block mb-2'>Required fields are missing Please fill them and try again</span>");
                }
            }
        })


    });


    // confirm_vote
    $('.confirm_vote').on('click', function(event) {
        if (confirm("Are you sure you want to vote for this candidate?")) {
            var political_p_id = $(this).data('political_p_id');

            alert(political_p_id);
            $.ajax({
                url: '../Controller/Voters/confirm_vote.php',
                method: 'POST',
                data: {
                political_p_id: political_p_id
            },
                beforeSend: function() {
                    
                    $('.comment_form_error').html("<span class='alert'>Loading...</span>");
                },
                success: function(data) {
                    var Data = $.trim(data);
                    if (Data == 'Thanks , You have Successfully Voted') {
                        $('.comment_form_error').html("<span class='btn btn-success btn-block mb-4 '><small>Thanks , You have Successfully Voted, You will be Redirected...</small></span>");
                     
                    } else if (Data == 'Some Error Occured try again') {
                        $('.comment_form_error').html("<span class='btn btn-danger btn-block mb-2 '>Some Error Occured try again</span>");
                    } else if (Data == 'This Voter has already Voted') {
                        $('.comment_form_error').html("<span class='btn btn-danger btn-block mb-2'>This Voter has already Voted </span>");

                    }
                    setInterval(() => {
                            window.location = "voter_login.php";
                        }, 1500);
                }
            })
        }
    });

</script>