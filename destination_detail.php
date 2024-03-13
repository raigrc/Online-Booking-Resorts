<?php
// session_start();
include("./dbConn.php");

$id = $_GET['id'];
$select = "SELECT * FROM resorts WHERE resort_id = '$id'";
$result = mysqli_query($mysqli, $select);
$description = mysqli_query($mysqli, $select);
$amenities = mysqli_query($mysqli, $select);
$tourloc = mysqli_query($mysqli, $select);

// $resorts = mysqli_fetch_assoc($result);

// $_SESSION['res_id'] = $resort['resort_id']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Solace</title>
  <link rel="stylesheet" href="css/destination_detail.css">
</head>
<body>
<?php include 'solace-header.php'; ?>
<div class="destination-detail">
  <div class="d-left">
    <div class="dl-one">
      <div class="dl-one-l">
      <?php
        if (mysqli_num_rows($result) > 0) {
            $resort = mysqli_fetch_assoc($result);
            $_SESSION['res_id'] = $resort['resort_id']; 
            $_SESSION['res_price'] = $resort['price'];
            $_SESSION['res_name'] = $resort['resort_name'];?>
            

            <p><?=$resort['resort_name']?></p>
            <div class="dl-one-ld">
            <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 0C3.13 0 0 3.13 0 7C0 12.25 7 20 7 20C7 20 14 12.25 14 7C14 3.13 10.87 0 7 0ZM7 9.5C6.33696 9.5 5.70107 9.23661 5.23223 8.76777C4.76339 8.29893 4.5 7.66304 4.5 7C4.5 6.33696 4.76339 5.70107 5.23223 5.23223C5.70107 4.76339 6.33696 4.5 7 4.5C7.66304 4.5 8.29893 4.76339 8.76777 5.23223C9.23661 5.70107 9.5 6.33696 9.5 7C9.5 7.66304 9.23661 8.29893 8.76777 8.76777C8.29893 9.23661 7.66304 9.5 7 9.5Z" fill="black"/>
            </svg>
            <p1><?=$resort['address']?>, <?=$resort['city']?>, <?=$resort['province']?></p1>
        </div>
        <?php
        }
        ?>
      </div>
      <div class="dl-one-r">
        <p>Perfect</p>
        <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10.5 0L12.8574 7.25532H20.4861L14.3143 11.7394L16.6717 18.9947L10.5 14.5106L4.32825 18.9947L6.68565 11.7394L0.513906 7.25532H8.1426L10.5 0Z" fill="#F4BC61"/>
        </svg>
        <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10.5 0L12.8574 7.25532H20.4861L14.3143 11.7394L16.6717 18.9947L10.5 14.5106L4.32825 18.9947L6.68565 11.7394L0.513906 7.25532H8.1426L10.5 0Z" fill="#F4BC61"/>
        </svg>
        <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10.5 0L12.8574 7.25532H20.4861L14.3143 11.7394L16.6717 18.9947L10.5 14.5106L4.32825 18.9947L6.68565 11.7394L0.513906 7.25532H8.1426L10.5 0Z" fill="#F4BC61"/>
        </svg>
        <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10.5 0L12.8574 7.25532H20.4861L14.3143 11.7394L16.6717 18.9947L10.5 14.5106L4.32825 18.9947L6.68565 11.7394L0.513906 7.25532H8.1426L10.5 0Z" fill="#F4BC61"/>
        </svg>
        <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10.5 0L12.8574 7.25532H20.4861L14.3143 11.7394L16.6717 18.9947L10.5 14.5106L4.32825 18.9947L6.68565 11.7394L0.513906 7.25532H8.1426L10.5 0Z" fill="#F4BC61"/>
        </svg>
        <p1>from 5 view</p1>
      </div>
    </div>

    <hr>

    <div class="dl-two">
      <div class="dl-two-lbl">
        <svg width="21" height="28" viewBox="0 0 21 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M19.9547 7.85518L12.8725 1.22565C12.6702 1.03624 12.4678 0.941528 12.1643 0.941528H2.04691C0.934001 0.941528 0.0234375 1.7939 0.0234375 2.83568V25.5655C0.0234375 26.6073 0.934001 27.4596 2.04691 27.4596H18.2347C19.3476 27.4596 20.2582 26.6073 20.2582 25.5655V8.51813C20.2582 8.23401 20.157 8.04459 19.9547 7.85518ZM12.1643 3.21451L17.83 8.51813H12.1643V3.21451ZM18.2347 25.5655H2.04691V2.83568H10.1408V8.51813C10.1408 9.55991 11.0514 10.4123 12.1643 10.4123H18.2347V25.5655Z" fill="black"/>
          <path d="M4.07031 19.883H16.2112V21.7771H4.07031V19.883Z" fill="black"/>
          <path d="M4.07031 14.2006H16.2112V16.0947H4.07031V14.2006Z" fill="black"/>
          </svg>
          <p>Destination Details</p>
      </div>
      <?php
        if (mysqli_num_rows($description) > 0) {
          $resort = mysqli_fetch_assoc($description);
          echo "<p>" . $resort['description'] . "</p>";

        }
      ?>
      </div>

    <hr>

    <div class="dl-three">
      <div class="dl-three-lbl">
        <svg width="36" height="27" viewBox="0 0 36 27" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M35.6796 7.33036C35.7812 7.43482 35.8617 7.55891 35.9167 7.69552C35.9717 7.83214 36 7.9786 36 8.12651C36 8.27442 35.9717 8.42087 35.9167 8.55749C35.8617 8.69411 35.7812 8.8182 35.6796 8.92265L29.136 15.6696C29.0346 15.7744 28.9143 15.8574 28.7818 15.9141C28.6493 15.9708 28.5073 16 28.3638 16C28.2204 16 28.0783 15.9708 27.9458 15.9141C27.8133 15.8574 27.693 15.7744 27.5917 15.6696L24.3198 12.2961C24.115 12.085 24 11.7986 24 11.5C24 11.2014 24.115 10.915 24.3198 10.7039C24.5246 10.4927 24.8024 10.3741 25.092 10.3741C25.3816 10.3741 25.6593 10.4927 25.8641 10.7039L28.3638 13.2835L34.1353 7.33036C34.2366 7.22564 34.357 7.14256 34.4894 7.08587C34.6219 7.02918 34.764 7 34.9074 7C35.0509 7 35.1929 7.02918 35.3254 7.08587C35.4579 7.14256 35.5783 7.22564 35.6796 7.33036Z" fill="black"/>
        <path d="M2.25 27C2.25 27 0 27 0 24.75C0 22.5 2.25 15.75 13.5 15.75C24.75 15.75 27 22.5 27 24.75C27 27 24.75 27 24.75 27H2.25ZM13.5 13.5C15.2902 13.5 17.0071 12.7888 18.273 11.523C19.5388 10.2571 20.25 8.54021 20.25 6.75C20.25 4.95979 19.5388 3.2429 18.273 1.97703C17.0071 0.711159 15.2902 0 13.5 0C11.7098 0 9.9929 0.711159 8.72703 1.97703C7.46116 3.2429 6.75 4.95979 6.75 6.75C6.75 8.54021 7.46116 10.2571 8.72703 11.523C9.9929 12.7888 11.7098 13.5 13.5 13.5Z" fill="black"/>
        </svg>
        <p>Included</p>
      </div>
      <div class="dl-three-l">
        <div class="dltl-o">
          <?php
        if (mysqli_num_rows($amenities) > 0) {
          $resort = mysqli_fetch_assoc($amenities);
          $facilities = $resort['facilities'];
          $facilities_array = explode(",", $facilities);
          // $first_word = trim($facilities_array[0]);
          foreach ($facilities_array as $facility) {
            // echo "<svg width='22' height='16' viewBox='0 0 22 16' fill='none' xmlns='http://www.w3.org/2000/svg'>
            // <path fill-rule='evenodd' clip-rule='evenodd' d='M21.4126 0.587312C21.5988 0.773011 21.7465 0.993615 21.8473 1.23649C21.9481 1.47936 22 1.73973 22 2.00268C22 2.26563 21.9481 2.526 21.8473 2.76887C21.7465 3.01174 21.5988 3.23235 21.4126 3.41805L9.41591 15.4127C9.23018 15.5989 9.00954 15.7466 8.76663 15.8473C8.52371 15.9481 8.2633 16 8.00031 16C7.73731 16 7.4769 15.9481 7.23399 15.8473C6.99107 15.7466 6.77043 15.5989 6.5847 15.4127L0.586362 9.41537C0.21092 9.03999 -3.95592e-09 8.53087 0 8C3.95593e-09 7.46913 0.21092 6.96001 0.586362 6.58463C0.961805 6.20925 1.47101 5.99837 2.00197 5.99837C2.53293 5.99837 3.04214 6.20925 3.41758 6.58463L8.00031 11.1706L18.5814 0.587312C18.7671 0.401142 18.9877 0.253436 19.2307 0.152655C19.4736 0.0518743 19.734 0 19.997 0C20.26 0 20.5204 0.0518743 20.7633 0.152655C21.0062 0.253436 21.2269 0.401142 21.4126 0.587312Z' fill='black'/>
            // </svg>
            // <p>" .trim($facility) . "</p>";
            
            echo "<div class='included-items'>
            <svg width='22' height='16' viewBox='0 0 22 16' fill='none' xmlns='http://www.w3.org/2000/svg'>
            <path fill-rule='evenodd' clip-rule='evenodd' d='M21.4126 0.587312C21.5988 0.773011 21.7465 0.993615 21.8473 1.23649C21.9481 1.47936 22 1.73973 22 2.00268C22 2.26563 21.9481 2.526 21.8473 2.76887C21.7465 3.01174 21.5988 3.23235 21.4126 3.41805L9.41591 15.4127C9.23018 15.5989 9.00954 15.7466 8.76663 15.8473C8.52371 15.9481 8.2633 16 8.00031 16C7.73731 16 7.4769 15.9481 7.23399 15.8473C6.99107 15.7466 6.77043 15.5989 6.5847 15.4127L0.586362 9.41537C0.21092 9.03999 -3.95592e-09 8.53087 0 8C3.95593e-09 7.46913 0.21092 6.96001 0.586362 6.58463C0.961805 6.20925 1.47101 5.99837 2.00197 5.99837C2.53293 5.99837 3.04214 6.20925 3.41758 6.58463L8.00031 11.1706L18.5814 0.587312C18.7671 0.401142 18.9877 0.253436 19.2307 0.152655C19.4736 0.0518743 19.734 0 19.997 0C20.26 0 20.5204 0.0518743 20.7633 0.152655C21.0062 0.253436 21.2269 0.401142 21.4126 0.587312Z' fill='black'/>
            </svg>
            <p>" .trim($facility) . "</p> 
            </div> <br>";
          }
        }        
      ?>
        </div>
      </div>
    </div>
    <hr class="bigger-hr">

    <div class="dl-five">
      <svg width="40" height="36" viewBox="0 0 40 36" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M20 0C15.1674 0 11.25 3.96633 11.25 8.85938C11.25 12.8152 16.9688 20.025 19.1597 22.642C19.6035 23.1722 20.3972 23.1722 20.8403 22.642C23.0313 20.025 28.75 12.8152 28.75 8.85938C28.75 3.96633 24.8326 0 20 0ZM20 11.8125C18.3889 11.8125 17.0833 10.4906 17.0833 8.85938C17.0833 7.22813 18.3889 5.90625 20 5.90625C21.6111 5.90625 22.9167 7.22813 22.9167 8.85938C22.9167 10.4906 21.6111 11.8125 20 11.8125ZM1.39722 15.184C0.984846 15.351 0.631341 15.6392 0.382298 16.0116C0.133256 16.3839 9.87644e-05 16.8233 0 17.273L0 34.8736C0 35.6695 0.79375 36.2137 1.52361 35.9184L11.1111 31.5V15.1116C10.4972 13.988 9.99514 12.8939 9.63542 11.8477L1.39722 15.184ZM20 25.2893C19.0229 25.2893 18.0986 24.8548 17.4646 24.0968C16.0993 22.4655 14.6472 20.6079 13.3333 18.7024V31.4993L26.6667 35.9993V18.7031C25.3528 20.6079 23.9014 22.4662 22.5354 24.0975C21.9014 24.8548 20.9771 25.2893 20 25.2893ZM38.4764 11.3316L28.8889 15.75V36L38.6028 32.066C39.0152 31.8991 39.3688 31.6109 39.6178 31.2385C39.8669 30.8661 40 30.4267 40 29.977V12.3764C40 11.5805 39.2063 11.0363 38.4764 11.3316Z" fill="black"/>
      </svg>
      <p>Tour's Location</p>
      <div class="loc">
        <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7 0C3.13 0 0 3.13 0 7C0 12.25 7 20 7 20C7 20 14 12.25 14 7C14 3.13 10.87 0 7 0ZM7 9.5C6.33696 9.5 5.70107 9.23661 5.23223 8.76777C4.76339 8.29893 4.5 7.66304 4.5 7C4.5 6.33696 4.76339 5.70107 5.23223 5.23223C5.70107 4.76339 6.33696 4.5 7 4.5C7.66304 4.5 8.29893 4.76339 8.76777 5.23223C9.23661 5.70107 9.5 6.33696 9.5 7C9.5 7.66304 9.23661 8.29893 8.76777 8.76777C8.29893 9.23661 7.66304 9.5 7 9.5Z" fill="black"/>
        </svg>
        <?php
        if (mysqli_num_rows($tourloc) > 0) {
          $resort = mysqli_fetch_assoc($tourloc);
          echo "<p>" . $resort['city']. ", " . $resort['province']  . "</p>";

        }
      ?>
        <!-- <p>San Pedro, Laguna</p> -->
      </div>
      <!-- <img src="images/destination_detail/maps.png" alt="bg"> -->
    </div>
    <img class="maps" src="images/destination_detail/maps.png" alt="bg">

    <hr class="bigger-hr">

    <!-- <div class="dl-six">
      <svg width="31" height="28" viewBox="0 0 31 28" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0.00390625 4.625C0.00390625 3.63044 0.398994 2.67661 1.10226 1.97335C1.80552 1.27009 2.75934 0.875 3.75391 0.875H26.2539C27.2485 0.875 28.2023 1.27009 28.9056 1.97335C29.6088 2.67661 30.0039 3.63044 30.0039 4.625V23.375C30.0039 24.3696 29.6088 25.3234 28.9056 26.0266C28.2023 26.7299 27.2485 27.125 26.2539 27.125H3.75391C2.75934 27.125 1.80552 26.7299 1.10226 26.0266C0.398994 25.3234 0.00390625 24.3696 0.00390625 23.375V4.625ZM1.87891 21.5V23.375C1.87891 23.8723 2.07645 24.3492 2.42808 24.7008C2.77971 25.0525 3.25663 25.25 3.75391 25.25H26.2539C26.7512 25.25 27.2281 25.0525 27.5797 24.7008C27.9314 24.3492 28.1289 23.8723 28.1289 23.375V16.8125L21.047 13.1619C20.8712 13.0738 20.6721 13.0432 20.478 13.0745C20.2838 13.1058 20.1044 13.1974 19.9652 13.3363L13.0089 20.2925L8.02141 16.97C7.84133 16.8501 7.62534 16.7962 7.41004 16.8174C7.19475 16.8386 6.99341 16.9336 6.84016 17.0863L1.87891 21.5ZM11.2539 9.3125C11.2539 8.56658 10.9576 7.85121 10.4301 7.32376C9.9027 6.79632 9.18733 6.5 8.44141 6.5C7.69549 6.5 6.98011 6.79632 6.45267 7.32376C5.92522 7.85121 5.62891 8.56658 5.62891 9.3125C5.62891 10.0584 5.92522 10.7738 6.45267 11.3012C6.98011 11.8287 7.69549 12.125 8.44141 12.125C9.18733 12.125 9.9027 11.8287 10.4301 11.3012C10.9576 10.7738 11.2539 10.0584 11.2539 9.3125Z" fill="black"/>
      </svg>
      <p>Related images</p>
    </div>
    <div class="imgs-banner">
      <div class="imgs-slider">
        <div class="imgs-slides">
          <input type="radio" name="radio-btn" id="radio1">
          <input type="radio" name="radio-btn" id="radio2">
          <input type="radio" name="radio-btn" id="radio3">

          <div class="slide first">
            <img src="images/destination_detail/imgs.png" alt="">
            <p>slide one</p>
          </div>
          <div class="slide">
            <img src="images/destination_detail/imgs.png" alt="">
            <p>slide two</p>
          </div>
          <div class="slide">
            <img src="images/destination_detail/imgs.png" alt="">
            <p>slide three</p>
          </div>

          <div class="imgs-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
          </div>
        </div>

        <div class="imgs-manual">
          <label for="radio1" class="imgs-mbtn"></label>
          <label for="radio2" class="imgs-mbtn"></label>
          <label for="radio3" class="imgs-mbtn"></label>
        </div>
      </div>
    </div> -->

  </div>

  <div class="d-right">
    <div class="dr-one">
      <p>Book This Tour</p>
      <div class="txt-boxes">
        <form action="get-bookings.php" method="post">
        <?php
              
              if (isset($_SESSION['loggedUser'])) {
                echo "<input type='text' value='". $_SESSION['fullname'] ."' name='username' disabled>";
                echo "<input type='email' value='". $_SESSION['email'] ."' name='useremail' disabled>";
              }else {
                echo '<input type="text" placeholder="Your Name" name="username" disabled>';
                echo '<input type="email" placeholder="Your Email" name="useremail" disabled>';
              }
            ?>
        <!-- <input type="text" placeholder="Your Phone" disabled> -->
        <input type="datetime-local" placeholder="From:" name="in_date"> 
        <input type="datetime-local" placeholder="To:" name="out_date"> 
        <input type="text" placeholder="Guest" disabled>
        <input type="text" placeholder="Your Message" id="message" disabled>
        <div class="dr-one-btn">
        <?php
              
              if (isset($_SESSION['loggedUser'])) {
                echo "<button type='submit'>Book Now</button>";
              }else {
                echo "<button type='submit'><a href='login-page.php'>Book Now</a></button>";
              }
            ?>
        
      </div>
        </form>
      </div>
    </div>
    <div class="dr-two">
      <p>Have Any Question?</p>
      <br>
      <p1>Do not hesitage to give us a call. We are an expert team and we are happy to talk to you.</p1>
      <br>
      <br>
      <div class="drt-phone">
        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.3341 12.0818L12.7979 10.6173C12.9951 10.4225 13.2445 10.2892 13.516 10.2335C13.7875 10.1778 14.0692 10.2021 14.3271 10.3035L16.1112 11.0161C16.3718 11.122 16.5953 11.3026 16.7535 11.5353C16.9117 11.768 16.9974 12.0423 17 12.3237V15.5926C16.9985 15.784 16.9583 15.9731 16.8818 16.1485C16.8053 16.324 16.694 16.4821 16.5548 16.6135C16.4156 16.7448 16.2513 16.8466 16.0717 16.9127C15.8922 16.9788 15.7011 17.0079 15.51 16.9982C3.00832 16.2202 0.485766 5.62903 0.00870312 1.57562C-0.0134425 1.37657 0.00679136 1.17509 0.0680735 0.984422C0.129356 0.793756 0.230297 0.618231 0.364257 0.469395C0.498217 0.320559 0.662161 0.201785 0.845301 0.120886C1.02844 0.0399873 1.22663 -0.0012024 1.42682 2.67191e-05H4.58328C4.86495 0.000860796 5.13993 0.0859768 5.37285 0.244427C5.60577 0.402877 5.78598 0.627415 5.89031 0.889161L6.60263 2.67397C6.70736 2.93094 6.73408 3.2131 6.67945 3.48518C6.62483 3.75726 6.49128 4.00721 6.29548 4.2038L4.83162 5.66825C4.83162 5.66825 5.67465 11.3757 11.3341 12.0818Z" fill="white"/>
        </svg>
        <p1>+62 6943 6956</p1>
      </div>
      <div class="drt-mail">
        <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18.9916 0.00658083C18.9064 -0.00219361 18.8206 -0.00219361 18.7355 0.00658083H1.24321C1.1311 0.00830827 1.01973 0.0251184 0.912109 0.0565586L9.93936 9.04632L18.9916 0.00658083Z" fill="white"/>
        <path d="M19.9162 0.875031L10.8202 9.93352C10.5861 10.1662 10.2694 10.2968 9.93935 10.2968C9.60926 10.2968 9.29258 10.1662 9.05849 9.93352L0.0437307 0.94375C0.0160175 1.04561 0.00132359 1.15056 0 1.25611V13.7506C0 14.082 0.131638 14.3998 0.365954 14.6341C0.600271 14.8684 0.918073 15 1.24945 15H18.7417C19.0731 15 19.3909 14.8684 19.6252 14.6341C19.8595 14.3998 19.9911 14.082 19.9911 13.7506V1.25611C19.9862 1.12595 19.9609 0.997373 19.9162 0.875031ZM2.10532 13.7506H1.23695V12.8572L5.77869 8.35297L6.65955 9.23383L2.10532 13.7506ZM18.7292 13.7506H17.8546L13.3004 9.23383L14.1812 8.35297L18.723 12.8572L18.7292 13.7506Z" fill="white"/>
        </svg>
        <p1>contact@solace.com</p1>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
<script src="js/destination_detail.js"></script>
</body>
</html>