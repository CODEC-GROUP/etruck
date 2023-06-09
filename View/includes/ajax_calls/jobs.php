<script type="text/javascript">
    ////////////////////////////Job Controller ///////////////////////////


    /////////////////////////// Manage Job error messages////////////////////////
    function s_f_message($param, $formId, $modalId) {
        // alert($param+$formId+$modalId);
        if ($param == 1) {
            $($formId)[0].reset();
            $('.comment_form_error').html('');
            setTimeout(() => {
                $(".alert_message").fadeOut();
            }, 1000);
            $('.FormBtn1').html("Submit");
            setTimeout(() => {
                $($modalId).modal('hide');
            }, 1500);
            load_jobs();

        } else {
            $('.comment_form_error').html('');
            setTimeout(() => {
                $(".alert_message").fadeOut();
            }, 2000);
            $('.FormBtn1').html("Submit");
        }
    }
    // FROM the job page to viwualize jobs of different valid status
    //////////////////// load Jobs on load //////////////////////////////////////
    load_jobs();

    function load_jobs() {
        const queryString = window.location.search;
        if (queryString) {
            var fetch_url = "../Controller/Job/view.php" + queryString;
            var appendDivId = "#display_valid_jobs";
        } else {
            var fetch_url = "../Controller/Job/view.php";
            var appendDivId = "#display_jobs";
        }
        $.ajax({
            url: fetch_url,
            method: "GET",
            success: function(data) {
                $(appendDivId).html($.trim(data));
            }
        })
    }
    // FROM the job Page and editJob page 
    //////////////////// load corresponding cycles into cycle select  when sub system is change //////////////////////////////////////
    $('#sub_system_id').change(function() {
        var sub_system_id = $(this).val();
        $.ajax({
            url: '../Controller/Job/edit.php',
            method: 'POST',
            data: {
                sub_system_id,
                check: "fetch_cycle"
            },
            success: function(data) {
                var Data = $.trim(data);
                $('#cycle_id').html(Data);
            }
        })
    });
    // FROM the job Page and editJob page 
    //////////////////// load corresponding classes into class select  when cycle is changed //////////////////////////////////////
    $('#cycle_id').change(function() {
        var cycle_id = $(this).val();
        var sub_system_id = $('#sub_system_id').val();
        $.ajax({
            url: '../Controller/Job/edit.php',
            method: 'POST',
            data: {
                cycle_id,
                sub_system_id,
                check: "fetch_class"
            },
            success: function(data) {
                var Data = $.trim(data);
                $('#class_id').html(Data);
            }
        })
    });
    // FROM the job Page and editJob page 
    //////////////////// load corresponding subjects into subject inout  when class is changed //////////////////////////////////////
    $('#class_id').change(function() {
        var class_id = $(this).val();
        var sub_system_id = $('#sub_system_id').val();
        var cycle_id = $('#cycle_id').val();
        $.ajax({
            url: '../Controller/Job/edit.php',
            method: 'POST',
            data: {
                cycle_id,
                sub_system_id,
                class_id,
                check: "fetch_subject"
            },
            success: function(data) {
                var Data = $.trim(data);
                $('#subject_id').val(Data);
            }
        })
    });
    // FROM the job Page and editJob page 
    // /////////////////////// ADD, EDIT & DEl Job/////////////////////////////
    $('.FormBtn').on('click', function(event) {
        event.preventDefault();

        $(".alert_message").fadeIn();
        var option = $(this).data('option');
        if (option == 'add') {

            var form_data = $('#jobInsertForm').serialize();
            $.ajax({
                url: '../Controller/Job/insert.php',
                method: 'POST',
                data: form_data,
                beforeSend: function() {
                    $('.comment_form_error').html("<span class='spinner-grow spinner-grow-sm' role='status'></span><span class='load-text'>Loading...</span>");
                    $('.FormBtn1').html("");
                },
                success: function(data) {
                    var Data = $.trim(data);
                    if (Data == 'New Job Successfuly Inserted') {
                        $('.alert_message').html('<div class="alert alert-success">New Job Successfuly Inserted</div>');
                        s_f_message(1, '#jobInsertForm', '#jobInsertModal');
                    } else if (Data == 'Required Fields Empty Please fill them and try again') {
                        $('.alert_message').html('<div class="alert alert-danger">Required Fields Empty Please fill them and try again</div>');
                        s_f_message(0, '#jobInsertForm', '#jobInsertModal');
                    } else {}
                    load_sub_system();
                }
            })
        } else if (option == 'edit') {
            var form_data = $('#editJobForm').serializeArray();

            form_data.push({
                name: 'check',
                value: 'edit'
            });

            $.ajax({
                url: '../Controller/Job/edit.php',
                method: 'POST',
                data: form_data,
                beforeSend: function() {
                    $('.comment_form_error').html("<span class='spinner-grow spinner-grow-sm' role='status'></span><span class='load-text'>Loading...</span>");
                    $('.FormBtn1').html("");
                },
                success: function(data) {
                    var Data = $.trim(data);
                    if (Data == 'Job Edited Successfully') {
                        $('.alert_message').html('<div class="alert alert-success">Job Edited Successfully</div>');
                        s_f_message(1, '#editJobForm', '#jobtModalEdit');
                    } else if (Data == 'Some Error Occured try again') {
                        $('.alert_message').html('<div class="alert alert-danger">Some Error Occured try again</div>');
                        s_f_message(0, '#editJobForm', '#jobtModalEdit');
                    } else if (Data == 'Required Fields Empty Please fill them and try again') {
                        $('.alert_message').html('<div class="alert alert-danger">Required Fields Empty Please fill them and try again</div>');
                        s_f_message(0, '#editJobForm', '#jobtModalEdit');
                    }
                }
            })
        } else if (option == 'del') {
            var form_data = $('#').serialize();
            alert('ad');
            $.ajax({
                url: '../Controller/Job/delete.php',
                method: 'POST',
                data: form_data,
                success: function(data) {
                    var Data = $.trim(data);
                    if (Data == 'Class Deleted Successfully') {
                        $('.alert_message').html('<div class="alert alert-success">Class Deleted Successfully</div>');
                        s_f_message(1, '#classDelForm', '#bd-example-modal-sm');
                    } else {
                        $('.alert_message').html('<div class="alert alert-danger">Required Fields Empty Please fill them and try again</div>');
                        s_f_message(0, '#classDelForm', '#bd-example-modal-sm');
                    }
                    load_sub_system();
                }
            })
        } else if (option == 'val') {
            var form_data = $('#jobValidateForm').serializeArray();
            form_data.push({
                name: 'check',
                value: 'val'
            });
            $.ajax({
                url: '../Controller/Job/edit.php',
                method: 'POST',
                data: form_data,
                success: function(data) {
                    var Data = $.trim(data);
                    if (Data == 'parent did not submit') {
                        $('.alert_message').html('<div class="alert alert-danger">Parent has not submitted this job as a result you cant validate it</div>');
                        s_f_message(0, '#jobValidateForm', '#bd-example-modal-sm-validate');
                    } else if (Data == 'job validated succuessfully') {
                        $('.alert_message').html('<div class="alert alert-success">Job validated succuessfully it will generate equal amount each month</div>');
                        s_f_message(1, '#jobValidateForm', '#bd-example-modal-sm-validate');
                    } else if (Data == 'job unvalidated succuessfully') {
                        $('.alert_message').html('<div class="alert alert-success">You have succuessfully Unvalidated this Job it will stop generating revenue henceforth</div>');
                        s_f_message(1, '#jobValidateForm', '#bd-example-modal-sm-validate');
                    } else if (Data == 'sql error occured') {
                        $('.alert_message').html('<div class="alert alert-danger">Some Error Occured please try again later</div>');
                        s_f_message(0, '#jobValidateForm', '#bd-example-modal-sm-validate');
                    } else if (Data == 'job revalidated succuessfully') {
                        $('.alert_message').html('<div class="alert alert-success">You have Re Validated This Job it will strart back generating revenue</div>');
                        s_f_message(1, '#jobValidateForm', '#bd-example-modal-sm-validate');
                    } else {
                        $('.alert_message').html('<div class="alert alert-danger">Some Error Occured please Contact Your Systen Developer</div>');
                        s_f_message(0, '#jobValidateForm', '#bd-example-modal-sm-validate');
                    }
                }
            })
        }

    });
    // FROM the job Page for the Add Functionality
    // preview price 
    function previewprice() {
        // gotten paraneter 
        var days_per_week = $('#days_per_week').val();
        var sub_system_id = $('#sub_system_id').val();
        var cycle_id = $('#cycle_id').val();
        var hours_per_day = $('#hours_per_day').val();
        // set parameter
        var cal_price_insert = 'cal_price_insert';

        if (days_per_week != '' && cycle_id != '' && hours_per_day != '') {
            $.ajax({
                url: '../Controller/Job/edit.php',
                method: 'POST',
                data: {
                    days_per_week: days_per_week,
                    sub_system_id: sub_system_id,
                    cycle_id: cycle_id,
                    hours_per_day: hours_per_day,
                    check: cal_price_insert
                },
                // manage this in the controller
                beforeSend: function() {
                    $('#coming').html("<span class='spinner-grow spinner-grow-sm' role='status'> </span> <span class='load-text'>Setting Price please wait ..</span>");
                },
                success: function(data) {
                    $('#coming').html("<span class='load-text'>Use custom price or set a Price</span>");
                    $('#display_job_cost_preview').val(data);
                }
            })

        } else {
            $('#coming').html("You have to Fill the cycle, #hr per day, #day per week will generate a price below 👇");

        }
        // FROM the job Page for the Add Functionality
        // initiate price preview
    }
    $(document).on('change', '#days_per_week', function() {
        previewprice();
    });
    $(document).on('change', '#sub_system_id', function() {
        previewprice();
    });
    $(document).on('change', '#hours_per_day', function() {
        previewprice();
    });
    $(document).on('change', '#cycle_id', function() {
        previewprice();
    });

    // FROM the editJob Page
    // this is use to cal price and show on pop up before admin save the edit job for edit
    $(document).on('click', '#ini_edit_job', function() {
        var form_data = $('#editJobForm').serializeArray();
        form_data.push({
            name: 'check',
            value: 'cal_price_edit'
        });
        $.ajax({
            url: '../Controller/Job/edit.php',
            method: 'POST',
            data: form_data,
            beforeSend: function() {
                $('#coming').html("<span class='spinner-grow spinner-grow-sm' role='status'> </span> <span class='load-text'>Setting Price please wait ..</span>");
            },
            success: function(data) {
                $('#coming').html("<span class='load-text'>Edit Job</span>");
                $('.edit-subject-modal-body').val(data);
                $('#jobtModalEdit').modal('toggle');
            }
        })
    });



    $(document).on('click', '#ini_assign_job', function() {
        var assign_job_id = $(this).data('assign_job');
        $('.assign_job_id').html('<input type="hidden" name="assign_job_id" value="' + assign_job_id + '">');
    });



    $(document).on('click', '#admin_assign_tutor', function() {
        var form_data = $('#assignTutorForm').serializeArray();
        form_data.push({
            name: 'check',
            value: 'assign_tutor'
        });
        $.ajax({
            url: '../Controller/Job/edit.php',
            method: 'POST',
            data: form_data,
            beforeSend: function() {
                $('#coming').html("<span class='spinner-grow spinner-grow-sm' role='status'> </span> <span class='load-text'>Assigning Tutor please wait ..</span>");
            },
            success: function(data) {
                $('#coming').html("<span class='load-text'>Assign Job</span>");

                if (data == 1) {
                    $('.alert_message').html('<div class="alert alert-success">Job Assigned to Tutor Successfully</div>');
                    s_f_message(1, '#assignTutorForm', '#viewAssignTutor');
                }else{
                    $('.alert_message').html('<div class="alert alert-danger">An error Occured please check if the process when through successfully </div>');
                    s_f_message(0, '#assignTutorForm', '#viewAssignTutor');
                }
            }
        })
    });


    // FROM the job Page for the Validate Functionality
    /////////////////////////// Validate JOb ////////////////////////////
    // insert a hidden id of the JOb that need to be validated on the validate popup
    // when you click the submit of this popUP the id is sent to the edit (validate ) controller
    $(document).on('click', '#ini_validate_job_id', function() {
        var validate_job_id = $(this).data('validate_job_id');
        $('.hidden_val_id').html('<input type="hidden" name="validate_job_id" value="' + validate_job_id + '">');
    });


    // FROM the job Page for the Delete Functionality
    /////////////////////////// Delete  JOb ////////////////////////////
    // unused yet
    // insert a hidden id of the JOb that need to be deleted at the front end delete popUP
    // when you click the submit of this popUP the id is sent to the delete controller
    $(document).on('click', '#ini_delete_subject_id', function() {
        var delete_subject_id = $(this).data('delete_subject_id');
        $('.hidden_del_id').html('<input type="hidden" name="delete_subject_id" value="' + delete_subject_id + '">');
    });




    load_chart();

    function load_chart() {
        $.ajax({
            url: "../Controller/subSystem/tableData.php",
            method: "GET",
            success: function(data)

            {
                var myArray = JSON.parse(data);
                var Data = myArray[0];
                var Cat = myArray[1];
                var options = {
                    chart: {
                        height: 400,
                        type: 'line',
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        width: 2,
                    },
                    stroke: {
                        curve: 'straight',
                    },
                    colors: ["#ff5821"],
                    series: [{
                        name: "Desktops",
                        data: Data
                    }],
                    title: {
                        text: 'Product Trends by Month',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f6ff', 'transparent'], // takes an array which will be repeated on columns
                            opacity: 0.5
                        },
                    },
                    xaxis: {
                        categories: Cat,
                    }
                }

                var chart = new ApexCharts(
                    document.querySelector("#line-chart-sub_system"),
                    options
                );
                chart.render();
            }
        });
    }



    //Delete Unique message
    $(document).on('click', '#delete_message', function() {
        if (confirm("Are you sure you want to remove this product to cart ?")) {
            // var pro_id = $(this).attr("id");
            var message_delete_id = $(this).data('message_delete_id');
            $.ajax({
                url: '../../../Controller1/messages.delete.php',
                method: 'POST',
                data: {
                    message_delete_id: message_delete_id
                },
                success: function(data) {
                    alert(data);
                    load_messages();

                }

            })
        }
    });
    $('#delete_check_form').on('submit', function(event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        if (confirm("Are you sure you want to delete this checked messages ?")) {
            console.log(form_data);
            // var pro_id = $(this).attr("delete_check_msg");
            $.ajax({
                url: '../../../Controller1/messages.delete.php',
                method: 'POST',
                data: form_data,
                // dataType:"JSON",
                success: function(data) {
                    alert(data);
                    load_messages();

                }

            })
        }
    });

    ///////////////categories
    $('#category_insert_form').on('submit', function(event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        console.log(form_data);
        // var pro_id = $(this).attr("delete_check_msg");
        $.ajax({
            url: '../../../Controller1/category.insert.php',
            method: 'POST',
            data: form_data,
            // dataType:"JSON",
            success: function(data) {
                alert(data);
                $('#comment_form_error').html('<div class="alert alert-success">' + data + '</div>');
                load_categories();
            }
        })
    });
    //load Categories
    load_categories();

    function load_categories() {
        $.ajax({
            url: '../../../Controller1/category.view.php',
            method: "GET",
            success: function(data) {
                $('#display_categories').html(data);

            }
        })
    }
    //Delete Unique message
    $(document).on('click', '#delete_category', function() {
        if (confirm("Are you sure you want to remove this category ?")) {
            // var pro_id = $(this).attr("id");
            var category_delete_id = $(this).data('category_delete_id');
            $.ajax({
                url: '../../../Controller1/category.delete.php',
                method: 'POST',
                data: {
                    category_delete_id: category_delete_id
                },
                success: function(data) {
                    alert(data);
                    load_categories();
                }
            })
        }
    });
    /////mutliple Delete
    $('#delete_category_check_form').on('submit', function(event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        if (confirm("Are you sure you want to delete this checked categories ?")) {
            console.log(form_data);
            // var pro_id = $(this).attr("delete_check_msg");
            $.ajax({
                url: '../../../Controller1/category.delete.php',
                method: 'POST',
                data: form_data,
                // dataType:"JSON",
                success: function(data) {
                    alert(data);
                    load_categories();
                }
            })
        }
    });



    ////////// product controller///////////
    //load PRoducts
    load_products();

    function load_products() {
        $.ajax({
            url: '../../../Controller1/product.view.php',
            method: "GET",
            success: function(data) {
                $('#display_products').html(data);

            }
        })
    }
    //insert product
    $('#product_insert_form').on('submit', function(event) {
        event.preventDefault();
        let form_data = $('#product_insert_form')[0];
        let formData = new FormData(form_data);
        console.log(form_data);
        // var pro_id = $(this).attr("delete_check_msg");
        $.ajax({
            url: '../../../Controller1/product.insert.php',
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#comment_form_error').html('<br /><label class="text-primary">Uploading...</label>');
            },
            success: function(data) {
                alert(data);
                $('#comment_form_error').html('<div class="alert alert-success">' + data + '</div>');
                load_products();
            }
        })
    });
    //Delete Unique  product
    $(document).on('click', '#delete_product', function() {
        if (confirm("Are you sure you want to remove this product ?")) {
            var product_delete_id = $(this).data('product_delete_id');
            $.ajax({
                url: '../../../Controller1/product.delete.php',
                method: 'POST',
                data: {
                    product_delete_id: product_delete_id
                },
                success: function(data) {
                    alert(data);
                    $('#comment_form_error').html('<div class="alert alert-success">' + data + '</div>');
                    load_products();
                }
            })
        }
    });
    $('#comment_form_error').on('click', function() {
        $('#comment_form_error').html('<div class=""></div>');
    });
    /////mutliple Delete Product
    $('#delete_product_check_form').on('submit', function(event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        if (confirm("Are you sure you want to delete this checked product (s) ?")) {
            console.log(form_data);
            $.ajax({
                url: '../../../Controller1/product.delete.php',
                method: 'POST',
                data: form_data,
                // dataType:"JSON",
                success: function(data) {
                    alert(data);
                    $('#comment_form_error').html('<div class="alert alert-success">' + data + '</div>');
                    load_products();
                }
            })
        }
    });

    /////////////////////////////////////////LOGIN CONTROLLER////////////////////////////////

    $('.loginform').on('submit', function(event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        console.log(form_data);
        $.ajax({
            url: '../../../Controller1/admin.login.php',
            method: 'POST',
            data: form_data,
            // dataType:"JSON",
            success: function(data) {
                // alert(data);
                if (data == "Login successfull") {
                    $('#comment_form_error').html('<div class="alert alert-success">' + data + ' click <a href="index.php">here</a> here to continie</div>');

                } else {
                    $('#comment_form_error').html('<div class="alert alert-success">' + data + ' try again</div>');
                }
            }
        })
    });
</script>