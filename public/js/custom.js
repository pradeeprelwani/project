function baseUrl() {
    return $('meta[name="base_url"]').attr('content');
}
function token() {
    return $('meta[name="csrf-token"]').attr('content');
}
$("#register-form").validate({
    errorClass: "text-danger",
    errorElement: "span",
    rules: {
        name: {required: true},
        email: {required: true},
        profile_pic: {required: true},
        hobbies: {required: true},
        date: {required: true, number: true},
        month: {required: true, number: true},
        year: {required: true, number: true},
        password: {required: true, minlength: 6},
        password_confirmation: {required: true, equalTo: "#password"},
        phone: {required: true, number: true},
        gender: {required: true},
    },
    messages: {
        name: {required: "Please enter name"},
        email: {required: "Please enter email"},
        hobbies: {required: "Please select hobbies"},
        profile_pic: {required: "Please select profile pic "},
        date: {required: "Please select date "},
        month: {required: "Please select month "},
        year: {required: "Please select year "},
        password: {required: "Please enter password"},
        password_confirmation: {
            required: "Please enter confirm password",
            equalTo: "Please enter same password"},
        phone: {required: "Please enter phone", number: "Please enter valid phone"},
        gender: {required: "Please enter gender"}
    },
    submitHandler: function (form) {
        var formAction = $('#register-form').attr('action');
        var formdata = new FormData();
        var icon = $('input[name=profile_pic]')[0].files;
        for (var i = 0; i < icon.length; i++) {
            formdata.append("profile_pic", icon[i], icon[i]['name']);
        }
        $.each($(".hobbies:checked"), function () {
            formdata.append("hobbies[]", $(this).val());
        });
        formdata.append("_token", $('meta[name="csrf-token"]').attr('content'));
        formdata.append("name", $('input[name="name"]').val());
        formdata.append("email", $('input[name="email"]').val());
        formdata.append("birth_day", $('#date').val());
        formdata.append("birth_month", $('#month').val());
        formdata.append("birth_year", $('#year').val());
        formdata.append("password", $('#password').val());
        formdata.append("phone", $('#phone').val());
        formdata.append("gender", $('input[name=gender]').val());
        formdata.append("about_me", $('#about_me').val());
        $.ajax({
            enctype: 'multipart/form-data',
            'method': 'POST',
            url: formAction,
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {

                setTimeout(function () {
                    window.location.href = baseUrl() + '/home';
                }, 100);
            },
            error: function (response) {
                if (response.status === 422) {
                    $("span.msg-alert").remove();
                    $.each(response.responseJSON.errors, (index, value) => {
                        $("#" + index).after('<span class="msg-alert text-danger">' + value[0] + '</span>')
                    });
                } else {
                    $(".page-title-header").prepend('<span class="msg-alert text-danger">' + response.statusText + '</span>')
                }
            }
        });
    }
});
$("#login-form").validate({
    errorClass: "text-danger",
    errorElement: "span",
    rules: {
        email: {
            required: true,
            email: true
        },
        password: {
            required: true,
        }
    },
    messages: {
        email: {
            required: "Please enter email",
            email: "Please enter valid email"
        },
        password: {
            required: "Please enter password",
        }
    }
});
$("#card-add").validate({
    errorClass: "text-danger",
    errorElement: "span",
    rules: {
        card_number: {required: true, number: true, minlength: 16, maxlength: 16},
        card_holder: {required: true},
        expiry_month: {required: true, number: true, maxlength: 2},
        expiry_year: {required: true, number: true, maxlength: 4},
        cvv: {required: true, number: true, minlength: 3, maxlength: 3}
    },
    messages: {
        card_number: {required: "Please enter card number",
            number: "Card number should be numeric",
            minlength: "Card number should be 16 digit",
            maxlength: "Card number should be 16 digit"},
        card_holder: {required: "Please enter card holder name", },
        expiry_month: {required: "Please select expiry month ",
            number: "Expiry month should be numeric",
            maxlength: "Expiry month should be 2 digit"},
        expiry_year: {required: "Please select expiry year",
            number: "Expiry year should be numeric",
            maxlength: "Expiry year should be 4 digit"},
        cvv: {required: "Please enter cvv",
            number: "Cvv should be numeric",
            minlength: "Cvv  should be 3 digit",
            maxlength: "Cvv  should be 3 digit"}
    },
    submitHandler: function (form) {
        var formAction = $('#card-add').attr('action');
        var formdata = new FormData();
        formdata.append("_token", $('meta[name="csrf-token"]').attr('content'));
        formdata.append("card_number", $("#card_number").val());
        formdata.append("card_holder", $("#card_holder").val());
        formdata.append("expiry_month", $("#expiry_month").val());
        formdata.append("expiry_year", $('#expiry_year').val());
        formdata.append("cvv", $('#cvv').val());
        $.ajax({
            'method': 'POST',
            url: formAction,
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#card-add")[0].reset()
                $(".card-body").prepend('<div class="alert alert-success">' + response.message + '</div>');
                setTimeout(function () {
                    window.location.href = window.location.href;
                }, 5000);
            },
            error: function (response) {
                console.log(response);
                if (response.status === 422) {
                    $("span.msg-alert").remove();
                    $.each(response.responseJSON.errors, (index, value) => {
                        $("#" + index).after('<span class="msg-alert text-danger">' + value[0] + '</span>')
                    });
                } else {
                    $(".page-title-header").prepend('<span class="msg-alert text-danger">' + response.responseJSON.message + '</span>')
                }
            }
        });
    }
});
$("#driver-register-form").validate({
    errorClass: "text-danger",
    errorElement: "span",
    rules: {
        name: {required: true},
        email: {required: true},
        password: {required: true, minlength: 6},
        password_confirmation: {required: true, equalTo: "#password"},
    },
    messages: {
        name: {required: "Please enter name"},
        email: {required: "Please enter email"},
        password: {required: "Please enter password"},
        password_confirmation: {
            required: "Please enter confirm password",
            equalTo: "Please enter same password"},
    },
    submitHandler: function (form) {
        var formAction = $('#driver-register-form').attr('action');
        var data = {
            _token: token(),
            name: $('input[name="name"]').val(),
            email: $('input[name="email"]').val(),
            password: $('#password').val()
        }
        $.ajax({
            enctype: 'multipart/form-data',
            'method': 'POST',
            url: formAction,
            data: data,
            dataType: 'json',
            success: function (response) {
                if (response.status === true) {
                    setTimeout(function () {
                        window.location.href = response.url;
                    }, 100);
                } else {
                    $(".card-body").prepend('<span class="msg-alert text-danger">' + response.message + '</span>')
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    $("span.msg-alert").remove();
                    $.each(response.responseJSON.errors, (index, value) => {
                        $("#" + index).after('<span class="msg-alert text-danger">' + value[0] + '</span>')
                    });
                } else {
                    $(".card-body").prepend('<span class="msg-alert text-danger">' + response.statusText + '</span>')
                }
            }
        });
    }
});
$("#driver-login-form").validate({
    errorClass: "text-danger",
    errorElement: "span",
    rules: {
        email: {
            required: true,
            email: true
        },
        password: {
            required: true,
        }
    },
    messages: {
        email: {
            required: "Please enter email",
            email: "Please enter valid email"
        },
        password: {
            required: "Please enter password",
        }
    },
    submitHandler: function (form) {
        var formAction = $('#driver-login-form').attr('action');
        var data = {
            _token: token(),
            email: $('input[name="email"]').val(),
            password: $('#password').val()
        }
        $.ajax({
            'method': 'POST',
            url: formAction,
            data: data,
            dataType: 'json',
            success: function (response) {
                if (response.status === true) {
                    setTimeout(function () {
                        window.location.href = response.url;
                    }, 100);
                } else {
                    $(".card-body").prepend('<span class="msg-alert text-danger">' + response.message + '</span>')
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    $("span.msg-alert").remove();
                    $.each(response.responseJSON.errors, (index, value) => {
                        $("#" + index).after('<span class="msg-alert text-danger">' + value[0] + '</span>')
                    });
                } else {
                    $(".card-body").prepend('<span class="msg-alert text-danger">' + response.statusText + '</span>')
                }
            }
        });
    }
});

//select all rides in driver pane
$("#example-select-all").click(function () {
    if (this.checked) {
        $("input.rides_checkbox").each(function (index, value) {
            $(value).prop('checked', true);
        });
    } else {
        $("input.rides_checkbox").each(function (index, value) {
            $(value).prop('checked', false);
        });
    }
});


//uncheck main checkbox
function selectCheckbox(_this) {
    let total_checkbox = $("input.rides_checkbox").length;
    let total_checked = $("input.rides_checkbox:checked").length

    var count = 0;
    $("input.rides_checkbox").each(function (index, value) {
        if ($(this).prop("checked") == true) {
            count++;
        }
    });
    if (count != total_checkbox) {
        $("#example-select-all").prop("checked", false);
    } else {
        $("#example-select-all").prop("checked", true);
    }

}


//accept/rejected rides by driver
$(".change_ride_status").click(function () {
    if ($('input.rides_checkbox:checked').length > 0 && $("#ride_status").val() != "") {
        var checkbox_id = "";
        var data = {};
        $('input.rides_checkbox:checked').each(function (index, value) {
            checkbox_id += this.value + ",";
        });

        var result = $('input.rides_checkbox:checked').map(function (i, opt) {
            return $(opt).val();
        }).toArray().join(',');

        data.id = result;
        data.status = $("#ride_status").val();
        data._token = token();

        $.ajax({
            'method': 'POST',
            url: baseUrl() + '/driver/ride/status',
            data: data,
            dataType: 'json',
            success: function (response) {
                if (response.status === true) {
                    var oTable = $('.datatable').DataTable();
                    oTable.columns.adjust().draw()
                    $(".card-body").prepend('<div class="msg-alert alert alert-success">' + response.message + '</div>')
                } else {
                    $(".card-body").prepend('<span class="msg-alert alert alert-danger">' + response.message + '</span>')
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    $("span.msg-alert").remove();
                    $.each(response.responseJSON.errors, (index, value) => {
                        $("#" + index).after('<span class="msg-alert text-danger">' + value[0] + '</span>')
                    });
                } else {
                    $(".card-body").prepend('<span class="msg-alert text-danger">' + response.statusText + '</span>')
                }
            }
        });

    } else {
        alert("Please select rides or status");
    }
})

function changeRideStatus(_this) {
    var data = {
        status: $(_this).data('type'),
        id: $(_this).data('id'),
        _token: token()
    };

    $.ajax({
        method: 'POST',
        url: baseUrl() + '/driver/ride/status',
        data: data,
        dataType: 'json',
        success: function (response) {
            $("span.alert").remove();
            if (response.status === true) {
                var oTable = $('.datatable').DataTable();
                oTable.columns.adjust().draw()
                $(".card-body").prepend('<div class="msg-alert alert alert-success">' + response.message + '</div>')
            } else {
                $(".card-body").prepend('<span class="msg-alert alert alert-danger">' + response.message + '</span>')
            }
        },
        error: function (response) {
            if (response.status === 422) {
                $("span.msg-alert").remove();
                $.each(response.responseJSON.errors, (index, value) => {
                    $(".card-body").prepend('<span class="msg-alert text-danger">' + value[0] + '</span>')
                });
            } else {
                $(".card-body").prepend('<span class="msg-alert text-danger">' + response.statusText + '</span>')
            }
        }
    });
}


//book a ride from rider side
$("#book-ride").validate({
    errorClass: "text-danger",
    errorElement: "span",
    rules: {
        source_address: {required: true},
        destination_address: {required: true}
    },
    messages: {
        source_address: {required: "Please enter source address"},
        destination_address: {required: "Please enter destination address",
        }
    },
    submitHandler: function (form) {
        var formAction = $('#book-ride').attr('action');
        var data = {
            _token: token(),
            source_address: $('input[name="source_address"]').val(),
            source_lat: $('input[name="source_lat"]').val(),
            source_long: $('input[name="source_long"]').val(),
            destination_address: $('input[name="destination_address"]').val(),
            destination_lat: $('input[name="destination_lat"]').val(),
            destination_long: $('input[name="destination_long"]').val(),
        };
        $.ajax({
            'method': 'POST',
            url: formAction,
            data: data,
            dataType: 'json',
            success: function (response) {
                removeAlert()
                if (response.status === true) {
                    $(".card-body").prepend('<div class="alert alert-success">' + response.message + '</div>')
                    $("#book-ride")[0].reset()
                    setTimeout(function () {
                        removeAlert();
                    }, 5000);
                } else {
                    $(".card-body").prepend('<p class="msg-alert text-danger">' + response.message + '</p>')
                }
            },
            error: function (response) {
                removeAlert();
                if (response.status === 422) {
                    $("span.msg-alert").remove();
                    $.each(response.responseJSON.errors, (index, value) => {
                        $("#" + index).after('<p class="msg-alert text-danger">' + value[0] + '</p>')
                    });
                } else {
                    $(".card-body").prepend('<p class="msg-alert text-danger">' + response.statusText + '</p>')
                }
            }
        });
    }
});


function removeAlert() {
    $('.alert').remove();
}