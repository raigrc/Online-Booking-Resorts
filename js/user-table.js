$(document).ready(function(){

    showUserTable();

    function showUserTable() {
        $.ajax ({
            type: "GET",
            url: "get-users.php",
            async: true,
            timeout: 60000,
            success: function(response) {
                var usersobjResponse = JSON.parse(response);
                createUsersDataTable(usersobjResponse);
                showUserID(usersobjResponse);
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
            var id =usersobjResponse[i]["id"];
            var userid =usersobjResponse[i]["userid"];
            var firstname =usersobjResponse[i]["firstname"];
            var lastname =usersobjResponse[i]["lastname"];
            var emailaddress =usersobjResponse[i]["emailaddress"];
            var dateadded =usersobjResponse[i]["dateadded"];

            userstableResponseHTML +=
            `<tbody>
                <tr>
                    <td class="user-id">` + userid  + `</td>
                    <td hidden>` + id  + `</td>
                    <td>` + firstname  +' '+ lastname +`</td>
                    <td>` + emailaddress + `</td>
                    <td>` + dateadded  + `</td>
                    <td class="crud-icon">
                        <div class="crud-option">
                        <button type="button" name="updatebtn"><a href="admin-update-users-page.php?id=`+ id +`">Update</a></button>
                        <button type="button" name="deletebtn">Delete</button>
                        </div>
                        <img src="./images/admin-dashboard/crud-icon.svg" alt="">
                    </td>
                </tr>
            </tbody>`;
        }
        $('.users-tbl').append(userstableResponseHTML);

        $('.crud-icon').on('click', function(){
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
                    url: "delete-users.php",
                    data: {
                        delete_user: true,
                        user_id: delusrid
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(status + ':' + error);
                        console.log("error");
                    },
                });
            }
        });
    
    };

    function showUserID(usersobjResponse) {
        var userResponseHTML = '';
        var userid =usersobjResponse["userid"];

        userResponseHTML += `<h1>User ID: `+ userid +`</h1>`
        $('.userid-num').append(userResponseHTML);
    };
})