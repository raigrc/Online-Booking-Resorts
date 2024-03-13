<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup.css">
    
    <title>Document</title>
</head>
<body>
    <div class="main-container">
    <?php include 'solace-header.php'; ?>
        <section class="signup-banner">
            <div class="signup-bg"></div>
            <div class="signup-txt">
                <h1>Sign Up</h1>
                <div class="signup-subheader">
                    <p><a href="index.php">Home</a></p>
                    <p>></p>
                    <p>Sign Up</p>
                </div>
            </div>
        </section>

        <section class="signup-form">
            <form id="signupForm">
                <div class="log-error" style="display: none;"></div>
                <div class="log-success" style="display: none;"></div>
                <script>
                    var error = "<?php echo $_GET['error'] ?? ''; ?>";
                    var success = "<?php echo $_GET['success'] ?? ''; ?>";

                    if (error) {
                        $(".log-error").text(error).show();
                    }
                    if (success) {
                        $(".log-success").html(success).show();
                    }
                </script>
                <label for="fname">First name</label>
                <input type="text" name="fname" id="fname" placeholder="First name">
                <label for="lname">Last name</label>
                <input type="text" name="lname" id="lname" placeholder="Last name">
                <label for="emailAd">Email address</label>
                <input type="email" name="emailAd" id="emailAd" placeholder="Email Address">
                <label for="pword">Password</label>
                <input type="password" name="pword" id="pword" placeholder="Password">
                <label for="confPword">Confirm Password</label>
                <input type="password" name="confPword" id="confPword" placeholder="Confirm Password">

                <div class="update-email">
                    <input type="checkbox" name="updEmail" id="updEmail">
                    <p>Email me exclusive Solace promotions. I can opt out later as stated in the Privacy Policy</p>
                </div>

                <input type="submit" value="Sign Up" id="signup-btn">

                <p class="signup-alt">or continue with</p>

                <div class="signup-socmed">
                    <div class="signup-fb">
                        <img src="./images/signup/signup-fb-icon.svg" alt="">
                        <p>Facebook</p>
                    </div>
                    <div class="signup-google">
                        <img src="./images/signup/signup-google-icon.svg" alt="">
                        <p>Google</p>
                    </div>
                </div>
            </form>

            <div class="form-alr-acc">
                <a href="login-page.php"><input type="button" value="Already have an account? Sign in"></a>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="./js/signup-ajax.js"></script>
</body>
</html>