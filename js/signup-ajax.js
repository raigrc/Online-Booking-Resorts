$(document).ready(function() {
    $(document).on('click', '#signup-btn', function(e){
        e.preventDefault();
        var firstname = $("input[name='fname']").val();
        var lastname = $("input[name='lname']").val();
        var emailAd = $("input[name='emailAd']").val();
        var password = $("input[name='pword']").val();
        var confirmpassword = $("input[name='confPword']").val();

        if(!firstname) {
            $(".log-error").text("First name is required").show();
            $("input[name='pword']").val("");
            $("input[name='confPword']").val("");
            return;
        } else if (!lastname) {
            $(".log-error").text("Last name is required").show();
            $("input[name='pword']").val("");
            $("input[name='confPword']").val("");
            return;
        } else if (!emailAd) {
            $(".log-error").text("Email address is required").show();
            $("input[name='pword']").val("");
            $("input[name='confPword']").val("");
            return;
        } else if (!password) {
            $(".log-error").text("Password is required").show();
            $("input[name='pword']").val("");
            $("input[name='confPword']").val("");
            return;
        } else if (!confirmpassword) {
            $(".log-error").text("Confirm password is required").show();
            $("input[name='pword']").val("");
            $("input[name='confPword']").val("");
            return;
        } else if (password !== confirmpassword) {
            $(".log-error").text("Password does not match").show();
            $("input[name='pword']").val("");
            $("input[name='confPword']").val("");
            return;
        }

        var test = $('#signupForm').serialize();
        console.log(test);
        $.ajax({
            url: 'signup.php',
            data: $('#signupForm').serialize(),
            method: 'POST',
            success: function(resp){
                // var data = JSON.parse(resp);
                console.log(resp);
                if (resp === 'successfully inserted') {
                    $(".log-success").text(resp).show();
                    $("input[name='pword']").val("");
                    $("input[name='confPword']").val("");
                }else if (resp === "Email address is already taken") {
                    $(".log-error").text(resp).show();
                }
                else {
                    console.log("error");
                }
            }
        })
    })
});