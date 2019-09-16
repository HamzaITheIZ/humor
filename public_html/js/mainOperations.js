$(document).ready(function () {
    var DOMAIN = "http://localhost/Icha3a/public_html";
    $("#register_form").on("submit", function () {
        var status = true;
        var status1 = true;
        var status2 = true;
        //var status3 = true;
        var name = $("#username");
        var email = $("#email");
        var pass1 = $("#password1");
        var pass2 = $("#password2");
        //hamza@gmail.com
        var e_patt = new RegExp(/^[A-Za-z0-9_-]+(\.[A-Za-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        if (name.val() == "" || name.val().length < 6) {
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>Please enter the name and the name must be more than 6 characters</span>");
            status1 = false;
        } else {
            name.removeClass("border-danger");
            $("#u_error").html("");
            status1 = true;
        }
        if (!e_patt.test(email.val())) {
            email.addClass("border-danger");
            $("#er_error").html("<span class='text-danger'>Please enter a valid email address</span>");
            status2 = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status2 = true;
        }
        if (pass1.val() == "" || pass1.val().length < 9) {
            pass1.addClass("border-danger");
            $("#p1_error").html("<span class='text-danger'>Please enter more than 9 digits password</span>");
            status = false;
        } else {
            pass1.removeClass("border-danger");
            $("#p1_error").html("");
            status = true;
        }
        if (pass2.val() == "" || pass2.val().length < 9) {
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>The password is smaller than the other</span>");
            status = false;
        } else {
            pass2.removeClass("border-danger");
            $("#p2_error").html("");
            status = true;
        }
        if (status == true & status1 == true & status2 == true) {
            if (pass1.val() == pass2.val()) {
                $(".overlay").show();
                $.ajax({
                    url: DOMAIN + "/includes/process.php",
                    method: "POST",
                    data: $("#register_form").serialize(),
                    success: function (data) {
                        if (data == "EMAIL_ALREADY_EXISTS") {
                            $(".overlay").hide();
                            alert("Looks like your email is already in use");
                        } else if (data == "SOME_ERROR") {
                            $(".overlay").hide();
                            alert("Check your entries if something is missing");
                        } else {
                            $(".overlay").hide();
                            window.location.href = encodeURI(DOMAIN + "/login.php?msg=You are registered now you can login");
                        }
                    }
                })
            } else {
                pass2.addClass("border-danger");
                $("#p2_error").html("<span class='text-danger'>The password is not similar to the other</span>");
                status = true;
            }
        }
    })
    //For Login Part
    $("#form_login").on("submit", function () {
        var email = $("#log_email");
        var pass = $("#log_password");
        var status = false;
        var status1 = false;

        if (email.val() == "") {
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please enter the email address</span>");
            status1 = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status1 = true;
        }
        if (pass.val() == "") {
            pass.addClass("border-danger");
            $("#p_error").html("<span class='text-danger'>Please enter the password</span>");
            status = false;
        } else {
            pass.removeClass("border-danger");
            $("#p_error").html("");
            status = true;
        }
        if (status == true && status1 == true) {
            $(".overlay").show();
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#form_login").serialize(),
                success: function (data) {
                    //alert(data);
                    if (data === "NOT_REGISTERD") {
                        $(".overlay").hide();
                        email.addClass("border-danger");
                        $("#e_error").html("<span class='text-danger'>Looks like you're not registered.</span>");
                    } else if (data === "PASSWORD_NOT_MATCHED") {
                        $(".overlay").hide();
                        pass.addClass("border-danger");
                        $("#p_error").html("<span class='text-danger'>Please enter the correct password</span>");
                        status = false;
                    } else {
                        $(".overlay").hide();
                        //console.log(data);
                        window.location.href = DOMAIN;
                    }
                }
            })
        }
    })
    $('#rumor_create_form').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (data) {
                if (data == "Rumor_Added") {
                    window.location.href = encodeURI(DOMAIN + "/manage_rumors.php?msg=Rumor Added Successfully");
                } else
                    alert(data);
            }
        })
    })
//-----------------------RUMORS-------------------------------
    //Fetch Rumors
    consultRumors();
    function consultRumors() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {rumors_info: 1},
            success: function (data) {
                $("#get_rumors").html(data);
            }
        })
    }

    //Update Rumors
    $("body").delegate(".edit_rumor", "click", function () {
        var eid = $(this).attr("eid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {updateRumor: 1, id: eid},
            success: function (data) {
                console.log(data);
                $("#id").val(data["id"]);
                $("#select_Type").val(data["type"]);
                $("#title").val(data["title"]);
                $("#article").val(data["article"]);
            }
        })
    })

    $("#update_rumor_form").on("submit", function () {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: $("#update_rumor_form").serialize(),
            success: function (data) {
                alert(data);
                consultRumors();
                $('#form_update_rumors').modal('toggle');
            }
        })
    })
    //delete rumor
    $("body").delegate(".del_rumor", "click", function () {
        var did = $(this).attr("did");
        if (confirm('Are You sure You want to Delete this Rumor?!')) {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: 'POST',
                data: {deleteRumor: 1, id: did},
                success: function (data) {
                    alert(data);
                    consultRumors();
                }
            })
        }
    })

//-----------------------------------------------------------------------

    $("#search").keyup(function () {
        search_table($(this).val());
    })

    function search_table(value) {
        $("#consult_rumors tr").each(function () {
            var found = "false";
            $(this).each(function () {
                if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                    found = "true";
                }
            })
            if (found == "true")
            {
                $(this).show();
            } else
            {
                $(this).hide();
            }
        })
    }
})
