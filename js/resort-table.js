$(document).ready(function(){

        $('.crud-icon').on('click', function(){
            $('.crud-option', this).toggle();
            var $td = $(this).closest('td');
            var delrstid = $td.siblings('.resort_id').text();
            console.log(delrstid);
        });

        $('button[name="deletebtn"]').on('click', function(){
            var $td = $(this).closest('td');
            var delrstid = $td.siblings('.resort_id').text();
            var confirmDelete = confirm("Are you sure you want to delete the resort?");
            if (confirmDelete) {
                $.ajax ({
                    type: "POST",
                    url: "delete-resorts.php",
                    data: {
                        delete_resort: true,
                        resort_id: delrstid
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
})