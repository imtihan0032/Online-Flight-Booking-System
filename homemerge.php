<?php 
include 'admin/db_connect.php'; 
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<style>

#portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
.content-head{
    margin-top: 50px;
}
.text-head{
    font-size: 50px:
    margin-top: 20px;
}
.column1 {
  margin-left:225px;
  margin-bottom: 20px;
  float: left;
  width: 17%;
  padding: 10px;
  border-radius: 5px;
  border-style: solid;
  border-color: #F8F8F8;
}
.column2 {
  margin-left:15px;
  margin-bottom: 20px;
  float: left;
  width: 17%;
  padding: 10px;
  border-radius: 5px;
  border-style: solid;
  border-color: #F8F8F8;
}
.column3 {
  margin-left:15px;
  float: left;
  width: 17%;
  padding: 10px;
  border-radius: 5px;
  border-style: solid;
  border-color: #F8F8F8;
  margin-bottom: 20px;
}
.column4 {
  margin-left:15px;
  float: left;
  width: 17%;
  padding: 10px;
  border-radius: 5px;
  border-style: solid;
  border-color: #F8F8F8;
  margin-bottom: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.img{
    margin-bottom:10px;
}

.wrapper{
  width: 100%;
}
.carousel{
  max-width: 1200px;
  margin: auto;
  padding: 0 30px;
}
.carousel .card{
  color: #fff;
  text-align: center;
  margin: 20px 0;
  line-height: 250px;
  font-size: 90px;
  font-weight: 600;
  border-radius: 10px;
  box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
}
.carousel .card-1{
    background-image: url('assets/img/london.jpg');
    background-size:400px 300px;
    font-size: 60px;
    background-repeat: no-repeat;
}
.carousel .card-2{
    background-image: url('assets/img/barcelona.jpg');
    background-size:400px 300px;
    font-size: 60px;
}
.carousel .card-3{
    background-image: url('assets/img/tokyo.jpg');
    background-size:400px 300px;
    font-size: 60px;
}
.carousel .card-4{
   background-image: url('assets/img/thailand.jpg');
    background-size:400px 300px;
    font-size: 60px;
}
.carousel .card-5{
    background-image: url('assets/img/paris.jpg');
    background-size:400px 300px;
    font-size: 60px;
}
.owl-dots{
  text-align: center;
  margin-top: 40px;
}
.owl-dot{
  height: 15px;
  width: 45px;
  margin: 0 5px;
  outline: none;
  border-radius: 14px;
  border: 2px solid #0072bc!important;
  box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
  transition: all 0.3s ease;
}
.owl-dot.active,
.owl-dot:hover{
  background: #0072bc!important;
}

.map{
    margin-left: 200px;
}

.faq{
    padding: 50px;
}

.questions-container{
    max-width: 1100px;
    margin-left: 150px;
    border-radius: 10px;
}

.question button{
    width: 100%;
    background-color: #FFFFFF;
    display: flex;
    justify-content: space-between;
    align-items: left;
    padding: 15px;
    border:none; outline: none;
    font-size: 16px;
    color: #321831;
    font-weight: 700;
    cursor: pointer;
    border-bottom: 1px solid #D3D3D3;
    border-radius: 10px;
}

.question button i{
    transform: rotate(180deg);
    transition: all 0.3s;
}

.question p{
    background-color:#FFFFFF ;
    font-size: 14px;
    max-height: 0;
    opacity: 0;
    line-height: 1.6;
    overflow: hidden;
    transition: all 0.3s;
}

.question p.show{
    max-height: 200px; opacity: 1;
    padding: 20px;
}

.question button i.rotate{
    transform: none;
}
.btn1{
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: transparent;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

</style>
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="booking-cta">
                        <h2 class="text-black">Welcome to Online Flight Booking System</h2>
                        <p class="text-black"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel recusandae
                            voluptatibus modi explicabo. Explicabo illum voluptatem praesentium ea eum vel animi
                            laboriosam deserunt culpa cumque. Quibusdam provident vel recusandae optio!</p>
                    </div>
                </div>
                <div class="col-md-7 col-md-offset-1">
                    <div class="booking-form">
                        <form id="manage-filter" action="index.php?page=flights" method="POST">

                            <input type="hidden" name="page" value="flights">
                            <div class="form-group">
                                <div class="form-checkbox">
                                    <label for="one-way">
                                        <input type="radio" name="trip" id="ways" value="1" checked>
                                        One way
                                    </label>
                                    <label for="roundtrip">
                                        <input type="radio" name="trip" id="ways" value="2">
                                        Roundtrip
                                    </label>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Flying from</span>
                                        <select name="departure_airport_id" id="departure_location"
                                            class="form-control">
                                            <option value=""></option>
                                            <?php
                                                $airport = $conn->query("SELECT * FROM airport_list order by airport asc");
                                            while($row = $airport->fetch_assoc()):
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"
                                                <?php echo isset($departure_airport_id) && $departure_airport_id == $row['id'] ? "selected" : '' ?>>
                                                <?php echo $row['location'].", ".$row['airport'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Flyning to</span>
                                        <select name="arrival_airport_id" id="arrival_airport_id" class="form-control">

                                            <option value=""></option>

                                            <?php
                                                $airport = $conn->query("SELECT * FROM airport_list order by airport asc");
                                            while($row = $airport->fetch_assoc()):
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"
                                                <?php echo isset($arrival_airport_id) && $arrival_airport_id == $row['id'] ? "selected" : '' ?>>
                                                <?php echo $row['location'].", ".$row['airport'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Adults</span>
                                        <input class="form-control" type="number" min="0" value="0" id="adults" name="adults">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Childerns</span>
                                        <input class="form-control" type="number" min="0" value="0" id="childerns" name="childerns">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="form-label">Type</span>
                                        <select name="type" id="type" class="form-control">
                                            <option value="Economy">Economy</option>
							                <option value="Premium Economy" >Premium Economy</option>
							                <option value="Business" >Business</option>
							                <option value="First Class" >First Class</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Departing</span>
                                        <input class="form-control" type="date" name="date"
                                            autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6" id="rdate" style="display: none;">
                                    <div class="form-group">
                                        <span class="form-label">Returning</span>
                                        <input class="form-control" type="date" name="date_return"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-btn">
                                <button type="submit" class="submit-btn">Show flights</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container main-content">
            <div class="container">
                <div cSlass="content-headS">
                    <h4 class="text-head"><b>Travel Guide for some of the most popular places</b></a></h4>
                    <p>Popular destinations open to most visitors from Malaysia</p>
                    <hr>
                </div>
            </div>
        </div>

<div class="wrapper">
    <div class="carousel owl-carousel">
      <div class="card card-1"> London <a href="location.php"><button class = "btn1"> </button></a> </div>
      <div class="card card-2"> Barcelona  <a href="location2.php"><button class = "btn1"> </button></a></div>
      <div class="card card-3"> Tokyo <a href="location4.php"><button class = "btn1"> </button></a></div>
      <div class="card card-4"> Thailand <a href="location3.php"><button class = "btn1"> </button></a> </div>
      
    </div>
</div>

<div class="container main-content">
            <div class="container">
                <div class="content-head">
                    <h4 class="text-head"><b>Explore the world from Kuala Lumpur</b></a></h4>
                    <hr>
                </div>
            </div>
        </div>

        <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7986857.528891901!2d98.2523166!3d12.1917791!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc362abd08e7d3%3A0x232e1ff540d86c99!2sKuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1672086959488!5m2!1sen!2smy" width="1100" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<main class="top-margin">
        <div class="container main-content">
            <div class="container">
                <div class="content-head">
                    <h4 class="text-head"><b>Here's why traveller's choose OFBS</b></a></h4>
                    <hr>
                </div>
            </div>
</div>

<div class="row">
  <div class="column1">
  <img src="assets/img/deal.png" class="img" alt="deal" height= "40" width = "40">
  <h6><b>Best travel deals</b></h6>
  <p>Find the best deals available from countless travel sites.</p>
  </div>
  <div class="column2">
  <img src="assets/img/trust.png" class="img" alt="trust" height= "40" width = "40">
  <h6><b>Trusted and free</b></h6>
  <p>We’re completely free to use, no hidden charges or fees.</p>
  </div>
  <div class="column3" >
  <img src="assets/img/reliable.png" class="img" alt="reliable" height= "40" width = "40">
  <h6><b>Book with flexibility</b></h6>
  <p>Easily find flights with no change fees.</p>
  </div>
  <div class="column4" >
  <img src="assets/img/certified.png" class="img" alt="certified" height= "40" width = "40">
  <h6><b>We know travel</b></h6>
  <p>With years of experience, we're ready to help find your perfect trip.</p>
  </div>
</div>

<section class="faq">
<div class="container main-content">
            <div class="container">
                <div class="content-head">
                    <h4 class="text-head"><b>Frequently Asked Questions</b></a></h4>
                    <hr>
                </div>
            </div>
        </div>

    <div class="questions-container">
        <div class="question">
            <button>
                <span>Who are we?</span>
                <i class="fas fa-chevron-up"></i>
            </button>
            <p>ODFS is your go-to site for flight deals, last minute flights, travel tips and blogs that will inspire you. We're a team of passionate, savvy travellers on a mission to make it easy for you to find and compare the best flight deals. As one of the world's largest flight comparison sites, ODFS is the starting point for your travel planning.</p>
        </div>
        <div class="question">
            <button>
                <span>Why come to us?</span>
                <i class="fas fa-chevron-up"></i>
            </button>
            <p>Millions of travellers rely on us for trusted advice and the best selection of cheap flights and travel deals. Our local experts have been serving up useful tips, destination information and travel inspiration since the beginning of time. We combine experience with local knowledge and our global network of partners to create amazing holiday moments.</p>
        </div>
        <div class="question">
            <button>
                <span>How do we do it?</span>
                <i class="fas fa-chevron-up"></i>
            </button>
            <p>Our innovative flight search and inspirational content make it simple to find cheap flights. We partner with all sort of providers - big and small - to bring you cheap flights and personalised travel options. Our expertise and powerful search technology open up new travel possibilities and help you see the world on a budget.</p>
        </div>
    </div>

    

</section>

    
<script>

$(".carousel").owlCarousel({
           margin: 20,
           loop: true,
           autoplay: true,
           autoplayTimeout: 2000,
           autoplayHoverPause: true,
           responsive: {
             0:{
               items:1,
               nav: false
             },
             600:{
               items:2,
               nav: false
             },
             1000:{
               items:3,
               nav: false
             }
           }
         });
        
        $('.view_prod').click(function(){
            uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
        })
        $('.select2').select2({
            placeholder:'Select Departure',
            width:'100%'
        })
        $('[name="trip"]').on("keypress change keyup",function(){
            if($(this).val() == 1){
                $('#rdate').hide()
            }else{
                $('#rdate').show()
            }
        })

const buttons = document.querySelectorAll('button');

buttons.forEach( button =>{
    button.addEventListener('click',()=>{
        const para = button.nextElementSibling;
        const icon = button.children[1];

        para.classList.toggle('show');
        icon.classList.toggle('rotate');
    })
} )

</script>