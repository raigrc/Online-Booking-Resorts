delrstid$(document).ready(function(){
    $.ajax({
        type: "POST",
        url: "update-user.php",
        data: {
            userid: userid,
            firstname: fname-upd,
            lastname: lastname,
            emailaddress: emailaddress,
            password: emailaddress,
            emailaddress: emailaddress,
            emailaddress: emailaddress,
            dateadded: dateadded
        },
        success: function(response) {
            console.log(response);
            alert("User updated successfully!");
        },
        error: function(xhr, status, error) {
            console.log(status + ':' + error);
            console.log("error");
        },
        });
});

//NOT WORKING PA