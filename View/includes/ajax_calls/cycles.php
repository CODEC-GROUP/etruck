<script type="text/javascript">
    ////////////////////////////Sub System Controller ///////////////////////////
    //////////////////// load subSystem on load //////////////////////////////////////
    load_sub_system();

    function load_sub_system() {
        $.ajax({
            url: "../Controller/Cycle/view.php",
            method: "GET",
            success: function(data) {
                $('#display_cycle').html($.trim(data));

            }
        })
    }


//  for edit
    // $('#sub_system_name').change(function() {
    //     var sub_system_id = $(this).val();
    //     $.ajax({
    //         url: '../Controller/Cycle/edit.php',
    //         method: 'POST',
    //         data: {
    //             sub_system_id,
    //             check: "fetch_cycle"
    //         },
    //         success: function(data) {
    //             var Data = $.trim(data);
    //             $('#cycle_name').html(Data);
 
    //         }
    //     })

    // });
// carry to class script
    
    // $('#cycle_name').change(function() {
    //                 var cycle_id = $(this).val();
    //                 $.ajax({
    //                     url: '../Controller/Cycle/edit.php',
    //                     method: 'POST',
    //                     data: {
    //                         cycle_id,
    //                         check: "fetch_class"
    //                     },
    //                     success: function(data) {
    //                         var Data = $.trim(data);
    //                         $('#class_name').html(Data);

    //                     }
    //                 })

    //             });

    //             $('#class_name').change(function() {
    //                 var class_id = $(this).val();
    //                 $.ajax({
    //                     url: '../Controller/Cycle/edit.php',
    //                     method: 'POST',
    //                     data: {
    //                         class_id,
    //                         check: "fetch_subject"
    //                     },
    //                     success: function(data) {
    //                         var Data = $.trim(data);
    //                         $('#subject_name').html(Data);

    //                     }
    //                 })

    //             });
    /////////////////////////// Manage Sub Category error messages////////////////////////
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
        } else {
            $($formId)[0].reset();
            $('.comment_form_error').html('');
            setTimeout(() => {
                $(".alert_message").fadeOut();
            }, 2000);
            $('.FormBtn1').html("Submit");
        }
    }
    // /////////////////////// ADD & EDIT SUB SYSTEM/////////////////////////////
    $('.FormBtn').on('click', function(event) {
        event.preventDefault();
        $(".alert_message").fadeIn();
        var option = $(this).data('option');
        if (option == 'add') {
            var form_data = $('#cycleForm').serialize();
            $.ajax({
                url: '../Controller/Cycle/insert.php',
                method: 'POST',
                data: form_data,
                beforeSend: function() {
                    $('.comment_form_error').html("<span class='spinner-grow spinner-grow-sm' role='status'></span><span class='load-text'>Loading...</span>");
                    $('.FormBtn1').html("");
                },
                success: function(data) {
                    var Data = $.trim(data);
                    if (Data == 'New Sub System Inserted Successfully') {
                        $('.alert_message').html('<div class="alert alert-success">New Sub System Inserted Successfully</div>');
                        s_f_message(1, '#cycleForm', '#cycleModal');
                    } else if (Data == 'Required Fields Empty Please fill them and try again') {
                        $('.alert_message').html('<div class="alert alert-danger">Required Fields Empty Please fill them and try again</div>');
                        s_f_message(0, '#cycleForm', '#cycleModal');
                    } else {}
                    load_sub_system();
                }
            })
        } else if (option == 'edit') {
            var form_data = $('#cycleEditForm').serialize();
            $.ajax({
                url: '../Controller/Cycle/edit.php',
                method: 'POST',
                data: form_data,
                beforeSend: function() {
                    $('.comment_form_error').html("<span class='spinner-grow spinner-grow-sm' role='status'></span><span class='load-text'>Loading...</span>");
                    $('.FormBtn1').html("");
                },
                success: function(data) {
                    var Data = $.trim(data);
                    if (Data == 'Sub System Edited Successfully') {
                        $('.alert_message').html('<div class="alert alert-success">Sub System Edited Successfully</div>');
                        s_f_message(1, '#cycleEditForm', '#cycleModalEdit');
                    } else if (Data == 'Some Error Occured try again') {
                        $('.alert_message').html('<div class="alert alert-danger">Some Error Occured try again</div>');
                        s_f_message(0, '#cycleEditForm', '#cycleModalEdit');
                    } else if (Data == 'Required Fields Empty Please fill them and try again') {
                        $('.alert_message').html('<div class="alert alert-danger">Required Fields Empty Please fill them and try again</div>');
                        s_f_message(0, '#cycleEditForm', '#cycleModalEdit');
                    }
                    load_sub_system();
                }
            })
        } else if (option == 'del') {
            var form_data = $('#cycleDelForm').serialize();
            $.ajax({
                url: '../Controller/Cycle/delete.php',
                method: 'POST',
                data: form_data,
                success: function(data) {
                    var Data = $.trim(data);
                    if (Data == 'Cycle Deleted Successfully') {
                        $('.alert_message').html('<div class="alert alert-success">Cycle Deleted Successfully</div>');
                        s_f_message(1, '#cycleDelForm', '#bd-example-modal-sm');
                    } else {
                        $('.alert_message').html('<div class="alert alert-danger">Required Fields Empty Please fill them and try again</div>');
                        s_f_message(0, '#cycleDelForm', '#bd-example-modal-sm');
                    }
                    load_sub_system();
                }
            })
        }

    });
    /////////////////////////// edit sub_system ////////////////////////////
    // fetch a set of information about a cycle using the cycle id into the edit popUP
    // when this popUP is submited the data is updated with the new user entry
    $(document).on('click', '#cycle_edit', function() {
        // var pro_id = $(this).attr("id");
        var cycle_edit_id = $(this).data('cycle_edit_id');
        $.ajax({
            url: '../Controller/Cycle/edit.php',
            method: 'POST',
            data: {
                cycle_edit_id: cycle_edit_id,
                check: "fetch"
            },
            success: function(data) {
                $('#edit-cycle-modal-body').html(data);
                $('#cycleModalEdit').modal('toggle');
            }

        })
    });

    /////////////////////////// Delete unique cycle ////////////////////////////
    // insert a hidden id of the cycle that need to be deleted at the front end delete popUP
    // when you click the submit of this popUP the id is sent to the delete controller
    $(document).on('click', '#ini_delete_cycle_id', function() {
        var delete_cycle_id = $(this).data('delete_cycle_id');
        $('.hidden_del_id').html('<input type="hidden" name="delete_cycle_id" value="' + delete_cycle_id + '">');
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

    ////////////////////////////Message Controller ///////////////////////////
    //load messages
    load_messages();

    function load_messages() {
        $.ajax({
            url: "../../../Controller1/messages.view.php",
            method: "GET",
            success: function(data) {
                $('#display_messages').html(data);

            }
        })
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