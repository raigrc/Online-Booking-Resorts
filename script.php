<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    function submitData(action) {
    $(document).ready(function() {

        var data = {
            action: action,
            id: $('#userid').val(),
            firstname: $('#fname-add').val(),
            lastname: $('#lname-add').val(),
            emailaddress: $('#email-add').val(),
            password: $('#pword-add').val(),
            number: $('#number-add').val(),
            address: $('#address-add').val(),
            timestamp: $('#timestamp-add').val()
        };
        
        $.ajax({
            url: 'function.php',
            data: data,
            type: 'POST',
            success: function(response) {
                alert(response);
            }
        });
    });
};

function submitDataAdmin(action) {
    $(document).ready(function() {

        var data = {
            action: action,
            id: $('#admin-id').val(),
            firstname: $('#fname-add').val(),
            lastname: $('#lname-add').val(),
            emailaddress: $('#email-add').val(),
            password: $('#pword-add').val(),
            number: $('#number-add').val(),
            timestamp: $('#timestamp-add').val()
        };
        
        $.ajax({
            url: 'function.php',
            data: data,
            type: 'POST',
            success: function(response) {
                alert(response);
            }
        });
    });
};

    function submitData1(action) {
        $(document).ready(function(){
            var data = {
                action: action,
                resort_id: $('#resort-id').val(),
                resort_name: $('#resort-name').val(),
                city: $('#city').val(),
                province: $('#province').val(),
                address: $('#address').val(),
                rooms: $('#rooms').val(),
                price: $('#price').val(),
                description: $('#description').val(),
                facilities: $('#facilities').val(),
                image: $('#resort_img').val(),

            }

            $.ajax({
            url: 'function.php',
            data: data,
            method: 'POST',
            success: function(response) {
                console.log(data);
                alert(response);
            }
            });
        })
    }
</script>
