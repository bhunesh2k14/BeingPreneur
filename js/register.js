$(function () {
 

    $("#registerForm input").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function ($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function ($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var name = $("input#regname").val();
            var email = $("input#regemail").val();
            var phone = $("input#regphone").val();
            // var message = $("textarea#message").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $this = $("#registerButton");
            $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
            $.ajax({
                url: "././mail/register.php",
                type: "POST",
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    // message: message
                },
                cache: false,
                success: function () {
                    // Success message
                    $('#regsuccess').html("<div class='alert alert-success'>");
                    $('#regsuccess > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#regsuccess > .alert-success')
                        .append("<strong>Your registration is successfull. <br>you will recieve a confirmation mail within 24hrs. </strong>");
                    $('#regsuccess > .alert-success')
                        .append('</div>');
                    //clear all fields
                    $('#registerForm').trigger("reset");
                },
                error: function () {
                    // Fail message
                    $('#regsuccess').html("<div class='alert alert-danger'>");
                    $('#regsuccess > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#regsuccess > .alert-danger').append($("<strong>").text("Sorry " + firstName + ", it seems that server is not responding. Please try again later!"));
                    $('#regsuccess > .alert-danger').append('</div>');
                    //clear all fields
                    $('#registerForm').trigger("reset");
                },
                complete: function () {
                    setTimeout(function () {
                        $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
                    }, 1000);
                }
            });
        },
        filter: function () {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

/*When clicking on Full hide fail/success boxes */
$('#name').focus(function () {
    $('#regsuccess').html('');
});
