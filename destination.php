<?php
// session_start();
include("./dbConn.php");

$select = "SELECT * FROM resorts";
$result = mysqli_query($mysqli, $select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/destination.css">
    <title>Document</title>
</head>
<body>
    <div class="main-container">
    <?php include 'solace-header.php'; ?>
        <section class="destination-banner">
            <div class="banner-bg"></div>
            <div class="banner-txt">
                <h1>Destination</h1>
                <h5>Home > Destination</h5>
            </div>
        </section>

            <section class="popular-page">
                <div class="popular-header">
                    <h1>Popular Destination</h1>
                    <p>orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                    <button class="popular-btn" onclick="window.location.href='/index.html'">Discover More</button>
                </div>

                <div class="popular-container">
                <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($resort = mysqli_fetch_assoc($result)) {  ?>
                                <div class="popular-item">
                                    <td class="d-resort-details">
                                            <!-- <div class="item-bg"> -->
                                                <img class="item-bg"src="./resort-imgs/<?=$resort['image']?>" class="resort-img">
                                            <!-- </div> -->
                                            <div class="item-head">
                                                <h5><?=$resort['resort_name']?></h5>
                                                <h6>Php <?=$resort['price']?></h6>
                                            </div>
                                            <p><?=$resort['address']?>, <?=$resort['city']?>, <?=$resort['province']?></p>
                                            <p><?=$resort['availability']?></p>
                                        </td>
                                    <div class="item-foot">
                                        <img src="./images/destination/popular-stars.svg" alt="">
                                        <button class="foot-btn" onclick="window.location.href='./destination_detail.php?id=<?=$resort['resort_id']?>'">Book Now</button>
                                    </div>
                                    </div>
                            <?php    }
                            }
                            ?>
                </div>
            </section>

        <section class="provided-destinations">
            <div class="provide-bg"></div>
            <h1>We provide top destinations especially for you</h1>
            <button class="provide-white" onclick="window.location.href='/index.html'">See package</button>
            <button class="provide-black" onclick="window.location.href='/index.html'">Discover more</button>
        </section>

        <section class="client-page">
            <div class="client-header">
                <h3>TESTIMONIAL</h3>
                <h1>What our client say</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pharetra condimentum.</p>
            </div>
            <div class="arrow-btn">
                <button class="btn-scroll" id="btn-scroll-left" onclick="scrollL()"><img src="./images/index/client-arrow-left.svg" alt=""></button>
                <button class="btn-scroll" id="btn-scroll-right" onclick="scrollR()"><img src="./images/index/client-arrow-right.svg" alt=""></button>
            </div>
            <div class="client-container">
                <div class="client-items">
                    <img class="client-icon" src="./images/index/client-pic.png" alt="">
                    <h5>Hermione Granger</h5>
                    <h6>Guest</h6>
                    <img src="./images/index/5-star.svg" alt="5-star-rate">
                    <p>Before we define any approach, we need to deline the brands overall goal. We  then need to dive.</p>
                </div>
                <div class="client-items">
                    <img class="client-icon" src="./images/index/client-pic.png" alt="">
                    <h5>Hermione Granger</h5>
                    <h6>Guest</h6>
                    <img src="./images/index/5-star.svg" alt="5-star-rate">
                    <p>Before we define any approach, we need to deline the brands overall goal. We  then need to dive.</p>
                </div>
                <div class="client-items">
                    <img class="client-icon" src="./images/index/client-pic.png" alt="">
                    <h5>Hermione Granger</h5>
                    <h6>Guest</h6>
                    <img src="./images/index/5-star.svg" alt="5-star-rate">
                    <p>Before we define any approach, we need to deline the brands overall goal. We  then need to dive.</p>
                </div>
                <div class="client-items">
                    <img class="client-icon" src="./images/index/client-pic.png" alt="">
                    <h5>Hermione Granger</h5>
                    <h6>Guest</h6>
                    <img src="./images/index/5-star.svg" alt="5-star-rate">
                    <p>Before we define any approach, we need to deline the brands overall goal. We  then need to dive.</p>
                </div>
                <div class="client-items">
                    <img class="client-icon" src="./images/index/client-pic.png" alt="">
                    <h5>Hermione Granger</h5>
                    <h6>Guest</h6>
                    <img src="./images/index/5-star.svg" alt="5-star-rate">
                    <p>Before we define any approach, we need to deline the brands overall goal. We  then need to dive.</p>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </div>

    <script>
        function scrollL(){
            let left = document.querySelector(".client-container");
            left.scrollBy(-350, 0);
        }

        function scrollR(){
            let right = document.querySelector(".client-container");
            right.scrollBy(350, 0);
        }
    </script>
</body>
</html>