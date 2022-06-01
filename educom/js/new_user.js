$(document).ready(function () {
    $(document).bind("contextmenu", function (e) {
        return false;
    });

    document.onkeypress = function (event) {
        event = event || window.event;
        if (event.keyCode == 123) {
            return false;
        }
    };
    document.onmousedown = function (event) {
        event = event || window.event;
        if (event.keyCode == 123) {
            return false;
        }
    };
    document.onkeydown = function (event) {
        event = event || window.event;
        if (event.keyCode == 123) {
            return false;
        }
    };

    $("#name").keyup(function (e) {
        var name = $(this).val();
        if (name == "") {
            $("#name_er").html('<div class="text-danger">Enter Your Name.</div>');
        } else {
            $("#name_er").hide();
        }
    });

    $("#email").keyup(function (e) {
        var email = $(this).val();
        if (email == "") {
            $("#email_er").html('<div class="text-danger">Enter an Email.</div>');
        } else {
            $.ajax({
                type: "POST",
                url: "check_em_ph.php",
                data: {
                    sub_em: 1,
                    email: email,
                },
                success: function (data) {
                    if (data == 0) {
                        $("#email_er").html(
                            '<div class="text-danger">Email already exists.</div>'
                        );
                    }
                    if (data == 1) {
                        $("#email_er").html('<div class="text-success">Valid Email.</div>');
                    }
                },
            });
        }
    });

    $("#phone").keyup(function (e) {
        var phone = $(this).val();
        if (phone == "") {
            $("#phone").html('<div class="text-danger">Enter an Phone Number.</div>');
        } else {
            $.ajax({
                type: "POST",
                url: "check_em_ph.php",
                data: {
                    sub_ph: 1,
                    phone: phone,
                },
                success: function (data) {
                    if (data == 0) {
                        $("#phone_er").html(
                            '<div class="text-danger">Phone Number already exists.</div>'
                        );
                    }
                    if (data == 1) {
                        $("#phone_er").html('<div class="text-success">Valid phone.</div>');
                    }
                },
            });
        }
    });
    $("#signin").click(function (e) {
        e.preventDefault();
        var name = $("#name").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        if (name == "") {
            $("#name_er").html('<div class="text-danger">Enter Your Name.</div>');
        }
        if (email == "") {
            $("#email_er").html('<div class="text-danger">Enter an Email.</div>');
        }
        if (phone == "") {
            $("#phone_er").html(
                '<div class="text-danger">Enter an phone number.</div>'
            );
        } else {
            $.ajax({
                type: "POST",
                url: "c_user_reg.php",
                data: {
                    submit: 1,
                    name: name,
                    email: email,
                    phone: phone,
                },
                success: function (data) {
                    //    alert(data);
                    // if(data == 00){
                    //     $("#msg").html('<div class="alert alert-danger" role="alert">something went wrong please try again later.</div>');
                    // }
                    if (data == 0) {
                        $("#msg").html(
                            '<div class="alert alert-danger" role="alert">Message could not be sent.</div>'
                        );
                    }
                    if (data == 1) {
                        $("#login-form").trigger("reset");
                        $("#msg").html(
                            '<div class="alert alert-success" role="alert">Your request has been sent to our admin. If admin verifie then the username will be sent to your email.</div>'
                        );
                    }
                    // if(data == 2){
                    //     $("#msg").html('<div class="alert alert-success" role="alert">something went wrong please try again later.</div>');
                    // }
                },
            });
        }
    });
});
