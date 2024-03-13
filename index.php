<?php
// session_start();
include("./dbConn.php");

$select = "SELECT * FROM resorts LIMIT 10";
$result = mysqli_query($mysqli, $select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Document</title>
</head>
<body>
    <div class="main-container">
        <?php include 'solace-header.php'; ?>

        <section class="landing-banner">
            <div class="landing-bg"></div>
            <div class="landing-txt">
                <h1>The perfect vacation starts at Solace</h1>
                <p class="sub-class">Explore the world with what you love beautiful natural beauty.</p>
                <form action="" method="POST">
                    <!-- <div class="form-container">
                        <select name="locations" id="locations">
                        <option value="" selected>Locations</option>
                        </select>
                        <input type="date" name="date" id="date">
                        <select name="people" id="people">
                            <option value="" selected>People</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                        <input class="explore-btn" type="submit" value="Explore Now">
                        
                    </div>
                </form> -->
                <button class="explore-btn" ><a href="destination.php">Explore Now</a></button>
                <p class="landing-bot">Popular place <span>: Hogwarts, Camp Half Bilod</span></p>
            </div>
        </section>

        <section class="discover-page">
            <div class="discover-header">
                <h1>Lorem ipsum dolor sit amet, consectetur</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            </div>

            <div class="discover-cover">
                <div class="discover-arrow-btn">
                    <button type="button" class="btn-scroll" id="btn-scroll-left" onclick="discoverscrollL()"><img src="./images/index/client-arrow-left.svg" alt=""></button>
                    <button type="button" class="btn-scroll" id="btn-scroll-right" onclick="discoverscrollR()"><img src="./images/index/client-arrow-right.svg" alt=""></button>
                </div>
                <div class="discover-scroll">
            
                <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($resort = mysqli_fetch_assoc($result)) {  ?>
                        <a href="./destination_detail.php?id=<?=$resort['resort_id']?>">
                            <div class="discover-item">
                            <img src="./resort-imgs/<?=$resort['image']?>" class="resort-img">
                            <h3><?=$resort['resort_name']?></h3>
                            <p class="descriptions"><?=$resort['description']?></p>
                            <p class="quote">"</p>
                        </div>
                    </a>
                    <?php    }
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="choose-us-page">
            <div class="choose-us-bg"></div>
            <div class="choose-us-header">
                <h1>Why choose Us?</h1>
                <p>our services have been trusted by world travelers.</p>
            </div>

            <div class="choose-container">
                <div class="choose-item">
                    <img src="./images/index/best-service-icon.png" alt="">
                    <h1>Best Service</h1>
                    <p>We provide people with a simple, largely stress-free way to market their rental properties for the benefit of the hosts.</p>
                    <a href="">Learn more <img src="./images/index/arrow-right.svg" alt=""></a>
                </div>
                <div class="choose-item">
                    <img src="./images/index/price-guarantee-icon.png" alt="">
                    <h1>Price Guarantee</h1>
                    <p>We assist people in finding a comfortable, budget friendly location to stay when they want to unwind. The area's top deals and locations are offered at Solace.</p>
                    <a href="">Learn more <img src="./images/index/arrow-right.svg" alt=""></a>
                </div>
                <div class="choose-item">
                    <img src="./images/index/trophy-resorts-icon.png" alt="">
                    <h1>Handpicked Resorts</h1>
                    <p>Our handpicked resorts are mostly found in Tagaytay, Calabarzon, Philippines.</p>
                    <a href="">Learn more <img src="./images/index/arrow-right.svg" alt=""></a>
                </div>
            </div>
        </section>

        <section class="client-page">
            <div class="client-header">
                <h3>TESTIMONIAL</h3>
                <h1>What our client say</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pharetra condimentum.</p>
            </div>
            <div class="arrow-btn">
                <button type="button" class="btn-scroll" id="btn-scroll-left" onclick="scrollL()"><img src="./images/index/client-arrow-left.svg" alt=""></button>
                <button type="button" class="btn-scroll" id="btn-scroll-right" onclick="scrollR()"><img src="./images/index/client-arrow-right.svg" alt=""></button>
            </div>
            <div class="client-container">
                <div class="client-items">
                    <img class="client-icon" src="./images/index/client-pic.png" alt="">
                    <h5>Draco Malfoy</h5>
                    <h6>Guest</h6>
                    <img src="./images/index/5-star.svg" alt="5-star-rate">
                    <p>I have used Solace several times, with my first being as I was driving a long distance with my family and we needed to adjust our route. I ended up being able to download the app, find a good spot, and book the place very quickly. All were very clean and they've had more rooms+better amenities than most hotels.</p>
                </div>
                <div class="client-items">
                    <img class="client-icon" src="./images/index/client-pic.png" alt="">
                    <h5>Neville Longbottom</h5>
                    <h6>Guest</h6>
                    <img src="./images/index/5-star.svg" alt="5-star-rate">
                    <p>Prices are great! Offers the luxury of home while on vacation. Cheaper than most hotels with more to offer. The more people you have to split costs with, the cheaper it is, just make sure to check the maximum occupancy requirements. </p>
                </div>
                <div class="client-items">
                    <img class="client-icon" src="./images/index/client-pic.png" alt="">
                    <h5>Harry Potter</h5>
                    <h6>Traveller</h6>
                    <img src="./images/index/5-star.svg" alt="5-star-rate">
                    <p>Every time that I have stayed at any Solace place, it has made me feel belonging to that place and not a stranger. Sharing their culture expression in those places made me love my stay more, embracing every moment of my stay. It has given me the chance to dream believing I could live there all my life because I felt at home. The places have been cozy, warm and beautiful.</p>
                </div>
                <div class="client-items">
                    <img class="client-icon" src="./images/index/client-pic.png" alt="">
                    <h5>Ron Weasley</h5>
                    <h6>Traveller</h6>
                    <img src="./images/index/5-star.svg" alt="5-star-rate">
                    <p>No complaints and only praise for Solace. Easy to use. Very responsive. Great choices. And if you are a good guest, the hosts love you. You review the host and the host reviews you; this helps your choice.</p>
                </div>
                <div class="client-items">
                    <img class="client-icon" src="./images/index/client-pic.png" alt="">
                    <h5>Hermione Granger</h5>
                    <h6>Traveller</h6>
                    <img src="./images/index/5-star.svg" alt="5-star-rate">
                    <p>I like using Solace because I believe it is safer than the motels that compare in price. You have all the stuff to cook your meals and it is just like home. The rental was clean and just like the pictures. The kitchen was well equipped with pots and pans and spices. The yard was fenced and it had a nice front porch. The owners were flexible when asked to extend the exit hours.</p>
                </div>
            </div>
        <?php include 'footer.php'; ?>

        </section>
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

    <script>
        const slides = document.querySelectorAll(".discover-item");
        const prevBtn = document.querySelector("#btn-scroll-left");
        const nextBtn = document.querySelector("#btn-scroll-right");
        const discoverScroll = document.querySelector(".discover-scroll");

        let crrntSlide = 0;

        slides[crrntSlide].classList.add('active');
        discoverScroll.scrollLeft = slides[crrntSlide].offsetLeft - (discoverScroll.offsetWidth - slides[crrntSlide].offsetWidth) / 2;

        prevBtn.addEventListener('click', () => {
            slides[crrntSlide].classList.remove('active');
            crrntSlide--;

            if (crrntSlide < 0) {
                crrntSlide = slides.length - 1;
                let rightmost = document.querySelector(".discover-scroll");
                rightmost.scrollBy(6000, 0);
            }

            slides[crrntSlide].classList.add('active');
            discoverScroll.scrollLeft = slides[crrntSlide].offsetLeft - (discoverScroll.offsetWidth - slides[crrntSlide].offsetWidth) / 2;;
        });

        nextBtn.addEventListener('click', () => {
            slides[crrntSlide].classList.remove('active');
            crrntSlide++;

            if (crrntSlide === slides.length) {
                crrntSlide = 0;
                let leftmost = document.querySelector(".discover-scroll");
                leftmost.scrollBy(-6000, 0);
            }

            slides[crrntSlide].classList.add('active');
            discoverScroll.scrollLeft = slides[crrntSlide].offsetLeft - (discoverScroll.offsetWidth - slides[crrntSlide].offsetWidth) / 2;;
        });
    </script>
</body>
</html>