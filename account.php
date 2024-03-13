<?php
session_start();
include("./dbConn.php");

if (!isset($_SESSION['loggedUser'])) {
  header("Location: signin.php");
}

$select = "SELECT * FROM users WHERE FirstName = '".$_SESSION['loggedUser']."'";
$result = mysqli_query($mysqli, $select);
$profile = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Solace</title>
  <link rel="stylesheet" href="css/account.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="accounts" id="accounts">
  <div class="personal-info" id="personalInfo">
    <p>Personal Info</p>
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M7 0.75V13.25M13.25 7H0.75" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
  </div>
  <hr id="piaccsHR">
  <div class="pi-contents" id="piContents">
  <?php
      if (mysqli_num_rows($result) > 0) {
          while ($profile = mysqli_fetch_assoc($result)) {  ?>
            <div class="pi-content">
              <p>Legal Name</p>
              <p1><?=$profile['FirstName']?></p1>
              <a href="">Edit</a>
            </div>
            <hr>
      <?php }
      }
      ?>

    <div class="pi-content">
      <p>Legal name</p>
      <p1>Juan dela Cruz</p1>
      <a href="">Edit</a>
    </div>
    <hr>
    <div class="pi-content">
      <p>Email address</p>
      <p1>j***z@gmail.com</p1>
      <a href="">Edit</a>
    </div>
    <hr>
    <div class="pi-content">
      <p>Phone number</p>
      <p1>0912345678</p1>
      <a href="">Edit</a>
    </div>
    <hr>
    <div class="pi-content">
      <p>Government ID</p>
      <p1>Not provided</p1>
      <a href="">Edit</a>
    </div>
    <hr>
    <div class="pi-content">
      <p>Address</p>
      <p1>Not provided</p1>
      <a href="">Edit</a>
    </div>
    <hr>
    <div class="pi-content">
      <p>Emergency contact</p>
      <p1>Not provided</p1>
      <a href="">Edit</a>
    </div>
    <hr>
  </div>


  <div class="login-security" id="loginSecurity">
    <p>Login & Security</p>
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M7 0.75V13.25M13.25 7H0.75" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
  </div>
  <hr id="lsaccsHR">
  <div class="ls-contents" id="lsContents">
    <div class="ls-content">
      <p2>Login</p2>
      <p>Password</p>
      <p1>Last Updated 8 months ago</p1>
      <a href="">Update</a>
    </div>
    <hr>
    <div class="ls-content">
      <p2>Social accounts</p2>
      <p>Facebook</p>
      <p1>Not connected</p1>
      <a href="">Connect</a>
      <hr>
      <p>Google</p>
      <p1>Not connected</p1>
      <a href="">Connect</a>
    </div>
    <hr>
    <div class="ls-content device">
      <p2>Device history</p2>
      <p>OS X 10.15.7</p>
      <p1>San Pedro, Calabarzon, January 17, 2023 at 16:58</p1>
      
      <a href="">Logout Device</a>
    </div>
    <hr>
  </div>


  <div class="payments" id="payments">
    <p>Payments</p>
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M7 0.75V13.25M13.25 7H0.75" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
  </div>
  <hr id="paccsHR">
  <div class="p-contents" id="pContents">
    <div class="p-content">
      <p>Your payments</p>
      <p1>Keep track of all your payments and refunds</p1>
      <button>Manage payments</button>

      <p>Payment methods</p>
      <p1>Add a payment method using our secure payment system, then start planning your next trip</p1>
      <button>Add payment methods</button>
    </div>
    <hr>
    <div class="p-content">
      <p>Solace gift credit</p>
      <p1>Redeem a gift card and look up your credit balance.</p1>
      <a href="">Terms apply</a>
      <hr>
      <p1 class="balance">Current credit balance</p1>
      <p2>Php 0.00</p2>
      <button>Add gift card</button>
    </div>
    <!-- <hr> -->
    <div class="p-content">
      <p>Coupons</p>
      <p1>Add a coupon and save on your next trip</p1>
      <hr>
      <p1 class="balance">Your coupons</p1>
      <p2>Php 0.00</p2>
      <button>Add gift card</button>
    </div>
    <hr>
  </div>
  

  <div class="notifications" id="notifications">
    <p>Notifications</p>
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M7 0.75V13.25M13.25 7H0.75" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
  </div>
  <hr id="naccsHR">
  <div class="n-contents" id="nContents">
    <div class="n-content">
      <p2>Account activity and policies</p2>
      <p1>Confirm your booking and account activity, and learn about important Solace policies</p1>
      <span class="br"></span>
      <p>Account activity</p>
      <p1>On: Email and SMS</p1>
      <p>Account activity</p>
      <p1>On: Email and SMS</p1>
    </div>
    <hr>
    <div class="n-content">
      <p2>Reminders</p2>
      <p1>Get important reminders about your reservations, listings, and account activity</p1>
      <p>Reminders</p>
      <p1>On: SMS</p1>
    </div>
    <hr>
    <div class="n-content">
      <p2>Guest and Host messages</p2>
      <p1>Keep in touch with your Host or guests before and during your trip</p1>
      <p>Reminders</p>
      <p1>On: Email and SMS</p1>
    </div>
    <hr>
  </div>


  <div class="privacy-sharing" id="privacySharing">
    <p>Privacy & sharing</p>
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M7 0.75V13.25M13.25 7H0.75" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
  </div>
  <hr id="psaccsHR">
  <div class="ps-contents" id="psContents">
    <div class="ps-content">
      <p2>Manage your account data</p2>
      <p1>You can make a requeest to download or delete your personal data from Solace.</p1>
      <span class="br"></span>
      <p>Request your personal data<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M1.5 1L6.5 6L1.5 11" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></p>
      <p1>We'll create a file for you to download your personal data</p1>
      <p>Delete your account<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.5 1L6.5 6L1.5 11" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></p>
      <p1>This will permanently delete your account and your data, in accordance with applicable law.</p1>
    </div>
    <hr>
    <div class="ps-content">
      <p2>Activity sharing</p2>
      <p1>Decide how your profile and activity are shown to others</p1>
      <p>Include my profile and listing in search engines <input type="checkbox" id="switch" /><label for="switch">Toggle</label></p>
      <div class="ps-p1">
        <p1>turning this 'on' means search engines, like Google will display
        your profile and listing pages in search results.</p1>
      </div>
    </div>
    <hr>
    <div class="ps-content">
      <p2>Connected services</p2>
      <p1>View services that you've connected to your Solace Account</p1>
      <p>No services connected at the moment</p>
    </div>
    <hr>
  </div>


  <div class="global-preferences" id="globalPreferences">
    <p>Global preferences</p>
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M7 0.75V13.25M13.25 7H0.75" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
  </div>
  <hr id="gpaccsHR">
  <div class="gp-contents" id="gpContents">
    <div class="gp-content">
      <p>Preferred language</p>
      <p1>English</p1>
      <a href="">Edit</a>
    </div>
    <hr>
    <div class="gp-content">
      <p>Preferred currency</p>
      <p1>Philippine peso</p1>
      <a href="">Edit</a>
    </div>
    <hr>
    <div class="gp-content">
      <a href="">Edit</a>
      <p>Timezone</p>
      
    </div>
    <hr>
  </div>


  <div class="referral" id="referral">
    <p>Referal credit & coupon</p>
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M7 0.75V13.25M13.25 7H0.75" stroke="#6C6C6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
  </div>
  <hr id="rccaccsHR">
  <div class="rcc-contents" id="rccContents">
    <div class="rcc-content">
      <p>Track your referrals</p>
      <span class="br"></span>
      <p1>Completed referrals<p2>0</p2></p1>
      <p1>Sign ups<p2>0</p2></p1>
    </div>
    </div>
    <!-- <hr> -->
  </div>

  
</div>

<?php
include("./footer.php");
?>
<script src="js/account.js"></script>
</body>
</html>