<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bookings.css">
    <title>Document</title>
</head>
<body>
    <div class="main-container">
    <?php include 'solace-header.php'; ?>
        <section class="list-your-place-banner">
            <div class="list-your-place-bg"></div>
            <div class="list-your-place-txt">
                <h1>List your place</h1>
                <div class="list-your-place-subtxt">
                    <p><a href="">Home</a></p>
                    <p>></p>
                    <p>Booking</p>
                </div>
            </div>
        </section>

        <section class="booking-form">
            <div class="form-container">
                <form action="" method="post">
                    <div class="form-item">
                        <label for="name">Name <span>*</span></label>
                        <input type="text" name="name" id="name">
                      </div>
                      <div class="form-item">
                        <label for="address">Address <span>*</span></label>
                        <input type="text" name="address" id="address">
                      </div>
                      <div class="form-item">
                        <label for="unitnum">Unit Number <span>*</span></label>
                        <input type="text" name="unitnum" id="unitnum">
                      </div>
                      <div class="form-item">
                        <label for="city">City <span>*</span></label>
                        <select name="city" id="city">
                          <option value="" selected>Select City</option>
                        </select>
                      </div>
                      <div class="form-item">
                        <label for="province">Province <span>*</span></label>
                        <select name="province" id="province">
                          <option value="" selected>Select Province</option>
                        </select>
                      </div>
                      <div class="form-item">
                        <label for="roomtype">Room Type <span>*</span></label>
                        <select name="roomtype" id="roomtype">
                          <option value="" selected>Room Type</option>
                        </select>
                      </div>
                      <div class="form-item">
                        <label for="price">Price <span>*</span></label>
                        <input type="text" name="price" id="price">
                      </div>
                      <div class="form-item">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"></textarea>
                      </div>
                      <div class="form-item">
                        <label for="photos">Upload Photos</label>
                        <div class="upload-img">
                            <h3>Drag your images here, or <span>browse</span></h3>
                            <p>Supported: JPG, JPEG, PNG</p>
                            <input type="file" name="photos" id="photos" hidden>
                        </div>
                      </div>
                    <input type="button" value="Add New Property">
                </form>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>