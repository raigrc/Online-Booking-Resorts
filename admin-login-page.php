<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin-login-page.css">
    <title>Document</title>
</head>
<body>
    <section class="admin-container">
        <div class="admin-bg"></div>
        <div class="admin-login-form">
            <form action="admin-login.php" method="post">
                <div class="form-header">
                    <img src="/images/admin-login/admin-logo.png" alt="">
                    <h1>Log In to Admin Page</h1>
                    <p>Enter your email and password below</p>
                </div>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="log-error"><?php echo$_GET['error']; ?></p>
                <?php } ?>
                <div class="form-item">
                    <label for="adminEmail">Email address</label>
                    <input type="email" name="adminEmail" id="adminEmail" placeholder="Email address">
                </div>
                <div class="form-item">
                    <div class="pword-label">
                        <label for="adminpword">Password</label>
                        <a href="#">Forgot password?</a>
                    </div>
                    <div class="pword-input">
                        <input type="password" name="adminpword" id="adminpword" placeholder="Password">
                    <img src="./images/admin-login/see-password.svg" class="see-pwd" alt="">
                    </div>
                </div>
                <div class="form-btn">
                    <input type="submit" class="login-btn" value="Log In">
                </div>
            </form>
        </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.see-pwd').on('click', function(){
                if($("#adminpword").attr("type") == "password"){
                    $("#adminpword").prop("type", "text");
                } else {
                    $("#adminpword").prop("type", "password");
                }
            })
        })
    </script>
</body>
</html>