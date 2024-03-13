<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="main-container">
    <?php include 'solace-header.php'; ?>
        <section class="signin-banner">
            <div class="signin-bg"></div>
            <div class="signin-txt">
                <h1>Sign In</h1>
                <div class="signin-subheader">
                    <p><a href="index.php">Home</a></p>
                    <p>></p>
                    <p>Sign In</p>
                </div>
            </div>
        </section>

        <section class="login-form">
            <form action="login.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="log-error"><?php echo$_GET['error']; ?></p>
                <?php } ?>
                <label for="email-ad">Email address</label>
                <input type="email" name="emailad" id="emailad" placeholder="Email address">
                <label for="pword">Password</label>
                <input type="password" name="pword" id="pword" placeholder="Password">

                <input type="submit" value="Sign In">
                    
                <div class="form-forgot">
                    <a href="signup-page.php">
                        <p>Create account</p>
                    </a>
                    <a href="#">
                        <p>Forgot password</p>
                    </a>
                </div>
                
                <p class="signin-alt">or sign in with</p>

                <div class="signin-socmed">
                    <div class="signin-fb">
                        <img src="./images/signup/signup-fb-icon.svg" alt="">
                        <p>Facebook</p>
                    </div>
                    <div class="signin-google">
                        <img src="./images/signup/signup-google-icon.svg" alt="">
                        <p>Google</p>
                    </div>
                </div>
            </form>

            <p class="signin-terms">By signing in, I agree to Solace’s <span>Terms of Use</span> and <span>Privacy Policy</span></p>
        </section>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>