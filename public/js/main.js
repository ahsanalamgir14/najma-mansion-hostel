$(function () {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});

function previewImages() {

    var $preview = $('#preview').empty();
    if (this.files) $.each(this.files, readAndPreview);

    function readAndPreview(i, file) {

        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " is not an image");
        } // else...

        var reader = new FileReader();

        $(reader).on("load", function () {
            $preview.append($("<img/>", {
                src: this.result,
                height: 50
            }));
        });

        reader.readAsDataURL(file);

    }

}

$('#room_images').on("change", previewImages);

$('#save_room_form').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    // $('#btn_save_room').prop('disabled', true);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contenttype: 'application/json; charset=utf-8',
        type: 'post',
        data: formData,
        url: '/api/rooms',
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.status == true) {
                console.log(result.data);
                $('#btn_save_room').prop('disabled', false);
                $("form")[0].reset();
                document.getElementById("save_room_form").reset();
                // $('#newRoomModal').trigger("reset");
                $('#newRoomModal').modal('toggle');
                var notyf = new Notyf();
                notyf.success(result.message);
                // window.location.reload();
            } else if (result.status == false) {
                $.each(result.error, function (key, val) {
                    $('#' + key + '_error').html(val[0]);
                });
            }
        }
    });
});

$('#update_room_form').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append('_method', 'PUT');
    var id = $(this).find("#id").val();
    // console.log(formData);
    // $('#btn_save_room').prop('disabled', true);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contenttype: 'application/json; charset=utf-8',
        type: 'post',
        data: formData,
        url: '/api/rooms/' + id, 
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.status == true) {
                console.log(result.data);
                $('#btn_update_room').prop('disabled', false);
                // $("form")[0].reset();
                var notyf = new Notyf();
                notyf.success(result.message);
                // window.location.reload();
            } else if (result.status == false) {
                $.each(result.error, function (key, val) {
                    $('#' + key + '_error').html(val[0]);
                });
            }
        }
    });
});

$('.clickable-row').click(function () {
    window.location = $(this).data('href');
    //use window.open if you want a link to open in a new window
});

$('#joining_date').datetimepicker({ format: 'L' }); 
$('#shifting_date').datetimepicker({ format: 'L' });

$('#save_employee_form').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    // $('#btn_save_employee').prop('disabled', true);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contenttype: 'application/json; charset=utf-8',
        type: 'post',
        data: formData,
        url: '/api/employees',
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.status == true) {
                console.log(result.data);
                $('#btn_save_employee').prop('disabled', false);
                $("form")[0].reset();
                document.getElementById("save_employee_form").reset();
                // $('#newRoomModal').trigger("reset");
                $('#newEmployee').modal('toggle');
                var notyf = new Notyf();
                notyf.success(result.message);
                // window.location.reload();
            } else if (result.status == false) {
                $.each(result.error, function (key, val) {
                    $('#' + key + '_error').html(val[0]);
                });
            }
        }
    });
});

$('#update_employee_form').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append('_method', 'PUT');
    var id = $(this).find("#id").val();
    // console.log(formData);
    // $('#btn_save_room').prop('disabled', true);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contenttype: 'application/json; charset=utf-8',
        type: 'post',
        data: formData,
        url: '/api/employees/' + id, 
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.status == true) {
                console.log(result.data);
                $('#btn_update_employee').prop('disabled', false);
                // $("form")[0].reset();
                var notyf = new Notyf();
                notyf.success(result.message);
                // window.location.reload();
            } else if (result.status == false) {
                $.each(result.error, function (key, val) {
                    $('#' + key + '_error').html(val[0]);
                });
            }
        }
    });
});

$('#save_tenant_form').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    // $('#btn_save_employee').prop('disabled', true);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contenttype: 'application/json; charset=utf-8',
        type: 'post',
        data: formData,
        url: '/api/tenants',
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.status == true) {
                console.log(result.data);
                $('#btn_save_tenant').prop('disabled', false);
                $("form")[0].reset();
                document.getElementById("save_tenant_form").reset();
                // $('#newRoomModal').trigger("reset");
                $('#newTenant').modal('toggle');
                var notyf = new Notyf();
                notyf.success(result.message);
                // window.location.reload();
            } else if (result.status == false) {
                $.each(result.error, function (key, val) {
                    $('#' + key + '_error').html(val[0]);
                });
            }
        }
    });
});

$('#update_tenant_form').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append('_method', 'PUT');
    var id = $(this).find("#id").val();
    // console.log(formData);
    // $('#btn_save_room').prop('disabled', true);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contenttype: 'application/json; charset=utf-8',
        type: 'post',
        data: formData,
        url: '/api/tenants/' + id, 
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.status == true) {
                console.log(result.data);
                $('#btn_update_tenants').prop('disabled', false);
                // $("form")[0].reset();
                var notyf = new Notyf();
                notyf.success(result.message);
                // window.location.reload();
            } else if (result.status == false) {
                $.each(result.error, function (key, val) {
                    $('#' + key + '_error').html(val[0]);
                });
            }
        }
    });
});

// help

// function sort_by() {
//     var selected_sort = $('#sort_option').val();
//     $('#sort_input').val(selected_sort);
//     $('#category_filter').submit();
//   }

//   function price_slider_filter() {
//     var min_price = $('#skip-value-lower').html();
//     var max_price = $('#skip-value-upper').html();
//     $('#price_slider_min').val(min_price);
//     $('#price_slider_max').val(max_price);
//     $('#category_filter').submit();
//   }
//   $('#search_keyword').keypress(function (e) {
//     if (e.which == 13) {
//       search_function();
//     }
//   });
//   function search_function() {

//     var search_key = $('#search_keyword').val();
//     $('#search_form').on('submit', function (e) {
//       return false;
//     });
//     if (search_key !== '') {
//       if (search_key.length > 3) {
//         window.location.href = '/search/' + search_key;
//       }
//       else {
//         alert('Type more than 3 words');
//       }
//     }
//     else {
//       alert('Type to search');
//     }
//   }

//   $('#form_reg').submit(function (e) {
//     e.preventDefault();
//     $(this).find(".invalid-feedback").html('');
//     $(this).find(".invalid-feedback").show();
//     $.ajax({
//       headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       },
//       url: 'registration_process',
//       data: $('#form_reg').serialize(),
//       type: 'POST',
//       success: function (result) {
//         if (result.status == "error") {
//           $.each(result.error, function (key, val) {
//             $('#' + key + '_error').html(val[0]);
//           });
//         }
//         else if (result.status == "success") {
//           if (confirm('Verification Email has been send to you. Please verify...')) {
//             window.location.href = '/';
//           }
//         }
//       }
//     });
//   });


//   $('#modal_login_form').submit(function (e) {
//     e.preventDefault();
//     $('.modal_error').html('');
//     $('#btn_login').prop('disabled', true);
//     $.ajax({
//       url: '/login_process',
//       data: $('#modal_login_form').serialize(),
//       type: 'post',
//       success: function (result) {
//         if (result.status == "error") {
//           $('#modal_error').html(result.msg);
//         }
//         if (result.status == "success") {
//           window.location.href = '/';
//         }
//       }
//     });
//   });


//   $("#btn_forgot_pass").click(function () {
//     $('#forgot-pass-modal').modal('show');
//     $('#login-modal').modal('hide');
//   });

//   $("#btn_login_now").click(function () {
//     $('#login-modal').modal('show');
//     $('#forgot-pass-modal').modal('hide');
//   });

//   $('#modal_forgot_form').submit(function (e) {
//     e.preventDefault();
//     $('#btn_forgot_pass').prop('disabled', true);
//     var email = $('#reset_email').val();
//     $(this).blur();
//     $.ajax({
//       url: '/forgot_password',
//       data: $('#modal_forgot_form').serialize(),
//       type: 'post',
//       success: function (result) {
//         $('#forgot-pass-modal').modal('hide');
//       },
//       error: function (result) {
//         swal("Email Exception Error!", "error");
//       },
//     });
//   });

//   $('#frmUpdatePassword').submit(function (e) {
//     $('#thank_you_msg').html("Please wait...");
//     $('#thank_you_msg').html("");
//     e.preventDefault();
//     $.ajax({
//       url: '/forgot_password_change_process',
//       data: $('#frmUpdatePassword').serialize(),
//       type: 'post',
//       success: function (result) {
//         console.log(result);
//         $('#frmUpdatePassword')[0].reset();
//         if (confirm(result.msg)) {
//           window.location.href = "/";
//         }
//       }
//     });
//   });

//   $('#form_place_order').submit(function (e) {
//     $('#order_place_msg').html("Please wait...");
//     e.preventDefault();
//     $(this).find(".invalid-feedback").html('');
//     $(this).find(".invalid-feedback").show();
//     $.ajax({
//       url: '/place_order',
//       data: $('#form_place_order').serialize(),
//       type: 'post',
//       success: function (result) {
//         if (result.status == 'success') {
//           window.location.href = "/order_placed";
//         }else if (result.status == "error") {
//           $.each(result.error, function (key, val) {
//             $('#' + key + '_error').html(val[0]);
//           });
//         }
//         $('#order_place_msg').html(result.msg);
//       }
//     });
//   });

//   function add_item_to_cart(id, qty, type) {

//     if ((qty == 'undefined') && (type == 'front')) {
//       var qty = $('#qty').val();
//     }
//     else if (typeof qty == 'undefined') {
//       qty = 1;
//     } else if (qty == 0 && type == 'remove') {
//       qty = 0;
//     }

//     if (qty == '') {
//       $('#add_to_cart_msg').html('<div class="alert alert-danger fade in alert-dismissible mt10"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please select Qty</div>');
//     }
//     jQuery.ajax({
//       type: "POST",
//       dataType: "json",
//       headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       },
//       contenttype: 'application/json; charset=utf-8',
//       async: true,
//       url: '/add_to_cart',
//       data: {
//         id: id,
//         qty: qty
//       },
//       success: function (data) {
//         swal({
//           title: data.title,
//           text: data.message,
//           icon: "success",
//           button: "OK"
//         });
//         if (data.items_count == 0) {
//           $('.aa-cart-notify').html('0');
//           $('.aa-cartbox-summary').html();
//         }
//         else {
//           var totalPrice = 0;
//           $('.aa-cart-notify').html(data.items_count);
//           var html = '<ul>';
//           $.each(data.result, function (arrKey, arrVal) {
//             totalPrice = parseInt(totalPrice) + (parseInt(arrVal.qty) * parseInt(arrVal.price));
//             html += '<li><a class="aa-cartbox-img" href="#"><img src="' + PRODUCT_IMAGE + '/' + arrVal.product_image + '" alt="img"></a><div class="aa-cartbox-info"><h4><a href="#">' + arrVal.product_name + '</a></h4><p> ' + arrVal.qty + ' * Rs  ' + arrVal.price + '</p></div></li>';
//           });
//         }
//         html += '<li><span class="aa-cartbox-total-title">Total</span><span class="aa-cartbox-total-price">Rs ' + totalPrice + '</span></li>';
//         html += '</ul><a class="aa-cartbox-checkout aa-primary-btn" href="cart">Cart</a>';
//         console.log(html);
//         $('.aa-cartbox-summary').html(html);
//       }
//     });
//   }
//   function update_qty(pid, price) {
//     var qty = $('#qty' + pid).val();
//     if(qty <= -1){
//       if(confirm("Quantity cannot be 0 or Nagetive.")){
//         window.location.reload();
//       }
//       die;
//     }
//     add_item_to_cart(pid, qty, 'update');
//     var html = $('#total_price' + pid).html(price * qty);

//   }
//   function remove_cart_item(pid) {
//     $('#cart_box' + pid).remove();
//     var qty = 0;
//     add_item_to_cart(pid, qty, 'remove');
//   }
//   function check_pass() {
//     $('#btn_login').prop('disabled', true);
//     $.ajax({
//       headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       },
//       contenttype: 'application/json; charset=utf-8',
//       url: '/check_password',
//       data: $('#password_check_form').serialize(),
//       type: 'post',
//       success: function (result) {
//         if (result.status == "success") {
//           $('#btn_login').prop('disabled', false);
//           $("#login-modal").modal('hide');
//           $("#form_place_order").submit();
//         }
//         else if (result.status == "error") {
//           $('#modal_error').html(result.msg);
//         }
//       }
//     });
//   }
//   function check_pass_for_checkout() {
//     $('#btn_login').prop('disabled', true);
//     data = $('#form-login-for-checkout').serialize();
//     console.log('data', data);
//     $.ajax({
//       headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       },
//       contenttype: 'application/json; charset=utf-8',
//       url: '/check_pass_for_checkout',
//       data: $('#form-login-for-checkout').serialize(),
//       type: 'post',
//       success: function (result) {
//         if (result.status == "success") {
//           console.log(result.data);
//           localStorage.setItem('reset-place-order', 'true');
//           $('#btn_login').prop('disabled', false);
//           window.location.reload();
//         }
//         else if (result.status == "error") {
//           $('#modal_error').html(result.msg);
//         }
//       }
//     });
//   }
//   function release_button() {
//     $('#btn_login').prop('disabled', false);
//     $('#modal_error').html('');
//   }
//   function btn_generate_release() {
//     $('#btn_forgot_pass').prop('disabled', false);
//   }
//   $('#account_form').on('submit', (function (e) {
//     e.preventDefault();
//     var formData = new FormData(this);
//     console.log(formData);
//     $('#account_submit').prop('disabled', true);
//     $.ajax({
//       headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       },
//       contenttype: 'application/json; charset=utf-8',
//       url: '/customer/account',
//       data: formData,
//       type: 'post',
//       contentType: false,
//       processData: false,
//       success: function (result) {
//         $('#account_submit').prop('disabled', false);
//         if (result.status == true) {
//           swal("Done!", "Profile updated succesfully!", "success");
//         }
//         else if (result.status == "error") {
//           swal("Error!", "Profile updated failed!", "alert");
//         }
//       }
//     });
//   })
//   );

//   function delete_order(id) {
//     swal({
//       title: "Are you sure?",
//       text: "You will not be able to recover this order!",
//       type: "warning",
//       showCancelButton: true,
//       confirmButtonColor: '#DD6B55',
//       confirmButtonText: 'Delete',
//       cancelButtonText: "Cancel",
//       closeOnConfirm: true,
//       closeOnCancel: true
//     },
//       function (isConfirm) {
//         if (isConfirm) {
//           $.ajax({
//             dataType: "json",
//             headers: {
//               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             contenttype: 'application/json; charset=utf-8',
//             url: '/customer/delete_order/' + id,
//             type: 'get',
//             contentType: false,
//             processData: false,
//             success: function (result) {
//               if (result.status == true) {
//                 setTimeout(function () {
//                   swal("Done!", "Order Deleted succesfully!", "success");
//                   location.reload(true);
//                 }, 2000);
//               }
//               else {
//                 swal("Error!", "Error in deleting order!", "error");
//               }
//             }
//           });
//         }
//       });
//   }

//   function generate_link() {
//     var email = $('#reset_email').val();
//     jQuery.ajax({
//       type: "POST",
//       dataType: "json",
//       headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       },
//       contenttype: 'application/json; charset=utf-8',
//       async: true,
//       url: '/admin/generate_link',
//       data: {
//         email: email
//       },
//       success: function (data) {
//         console.log(data);
//         if (data.status) {
//           swal({
//             title: "Email Successfull",
//             text: data.message,
//             icon: "success",
//             button: "OK"
//           },
//             function (isConfirm) {
//               if (isConfirm) {
//                 window.location.href = "/admin"
//               }
//             });
//         }
//       },
//       error: function (result) {
//         $('#reset_email_error').html('Email is not registered as admin');
//       },
//     });
//   }
//   function change_admin_password() {
//     var password1 = $('#password1').val();
//     var password2 = $('#password2').val();
//     if (!password1 || !password2 && !password1 == password2) {
//       $('#password_error').html('Confirm password do not match');
//     } else {
//       jQuery.ajax({
//         type: "POST",
//         dataType: "json",
//         headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         contenttype: 'application/json; charset=utf-8',
//         async: true,
//         url: '/admin/forgot_password_change_process',
//         data: {
//           password1: password1,
//           password2: password2
//         },
//         success: function (data) {
//           console.log(data);
//           if (data.status) {
//             swal({
//               title: 'Password Reset',
//               text: 'Password has been changed successfully.',
//               icon: "success",
//               button: "OK"
//             },
//               function (isConfirm) {
//                 if (isConfirm) {
//                   window.location.href = "/admin"
//                 }
//               }
//             );
//           } else {
//             $('#password_error').html('Confirm password do not match');
//           }
//         }
//       });
//     }
//   }
//   $('.toggle-password').click(function () {
//     $(this).children().toggleClass('mdi-eye-off-outline mdi-eye-outline');
//     let input = $(this).prev();
//     input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
//   });
//   function changeType(){
//     var type = $("#password").attr('type');
//     switch (type) {
//         case 'password':
//         {
//             $("#password").attr('type', 'text');
//             $(".type-text").show();
//             $(".type-pass").hide();
//             return;
//         }
//         case 'text':
//         {
//             $("#password").attr('type', 'password');
//             $(".type-text").hide();
//             $(".type-pass").show();
//             return;
//             }
//         }
//     }
//   $( document ).ready(function () {
//     $(".moreBox").hide();
//     $(".moreBox").slice(0, 4).show();
//     if ($(".productBox:hidden").length != 0) {
//       $("#loadMore").show();
//     }
//     $("#loadMore").on('click', function (e) {
//       e.preventDefault();
//       $(".moreBox:hidden").slice(0, 4).slideDown();
//       if ($(".moreBox:hidden").length == 0) {
//         $("#loadMore").fadeOut('slow');
//       }
//     });
//   });
//   function resetLoadMore(){
//     $(".moreBox").hide();
//     $(".moreBox").slice(0, 4).show();
//     if ($(".productBox:hidden").length != 0) {
//       $("#loadMore").show();
//     }
//     $("#loadMore").on('click', function (e) {
//       e.preventDefault();
//       $(".moreBox:hidden").slice(0, 4).slideDown();
//       if ($(".moreBox:hidden").length == 0) {
//         $("#loadMore").fadeOut('slow');
//       }
//     });
//   }

//   $( document ).ready(function () {
//     reset_order_attr = localStorage.getItem('reset-place-order');
//     if(reset_order_attr){
//       $('#btn_place_order').removeAttr('data-target');
//       $('#btn_place_order').removeAttr('data-toggle');
//       $('#btn_place_order').attr('type', 'submit');
//       localStorage.removeItem('reset-place-order');
//     }
//   });
//   function hide_error(elem) {
//     $(elem).next('div').hide();
//   }
