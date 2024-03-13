$(document).ready(function(){

    showUserTable();
function showUserTable() {
    $.ajax ({
        type: "GET",
        url: "get-admins.php",
        async: true,
        timeout: 60000,
        success: function(response) {
            var usersobjResponse = JSON.parse(response);
            createUsersDataTable(usersobjResponse);
            console.log('success!');
        },
        error: function(xhr, status, error) {
            console.log(status + ':' + error);
            console.log("error");
        },
    });
    }

    function createUsersDataTable(usersobjResponse) {
    var userstableResponseHTML = '';

    for(var i = 0; i < usersobjResponse.length; i++) {
        var userid =usersobjResponse[i]["userid"];
        var firstname =usersobjResponse[i]["firstname"];
        var lastname =usersobjResponse[i]["lastname"];
        var emailaddress =usersobjResponse[i]["emailaddress"];
        var mobilenumber =usersobjResponse[i]["mobilenumber"];
        var dateadded =usersobjResponse[i]["dateadded"];

        userstableResponseHTML +=
        `<tbody>
            <tr>
                <td class="user-id">` + userid  + `</td>
                <td>` + firstname  +' '+ lastname +`</td>
                <td>` + emailaddress + `</td>
                <td>` + mobilenumber + `</td>
                <td>` + dateadded  + `</td>
                <td class="crud-icon">
                    <div class="crud-option">
                    <button type="button" name="updatebtn" onclick="updateData()">Update</button>
                    <button type="button" name="deletebtn">Delete</button>
                    </div>
                    <img src="./images/admin-dashboard/crud-icon.svg" alt="">
                </td>
            </tr>
        </tbody>`;
    }
    $('.users-tbl').append(userstableResponseHTML);

    $('tr').on('click','.crud-icon', function(){
        $('.crud-option', this).toggle();
        var delusrid = $('.user-id', this).text();
        console.log(delusrid);
    });

    $('button[name="deletebtn"]').on('click', function(){
        var delusrid = $(this).closest('tr').find('.user-id').text();
        var confirmDelete = confirm("Are you sure you want to delete the user?");
        if (confirmDelete) {
            $.ajax ({
                type: "POST",
                url: "delete-admins.php",
                data: {
                    delete_admin: true,
                    user_id: delusrid
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log(status + ':' + error);
                    console.log("error");
                },
            });
        }
    });
    
    };
})