<!DOCTYPE html>
<html lang="en">
<?php include 'db_connect.php' ?>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <?php
  session_start();
  if (!isset($_SESSION['login_id']))
    header('location:login.php');
  include('./header.php');
  // include('./auth.php'); 
  ?>
  <link rel="stylesheet" href="ticket.css">
  <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+128+Text" rel="stylesheet">
  
</head>


<body>
   <?php include 'topbar.php' ?>
   <?php include 'navbar.php' ?>
   <div class="borders">
     <div class="dashboard2">
       <div class="leftdash2">
         <div class="container">
           <table>
              <?php
                $airport = $conn->query("SELECT * FROM airport_list ");
                while($row = $airport->fetch_assoc()){
                  $aname[$row['id']] = ucwords($row['airport'].', '.$row['location']);
                }
                $i=1;
                $qry = $conn->query("SELECT b.*,f.*,a.airlines,a.logo_path,b.id as bid FROM  booked_flight b inner join flight_list f on f.id = b.flight_id inner join airlines_list a on f.airline_id = a.id  order by b.id desc");
                while($row = $qry->fetch_assoc()):
                ?>  
                <tr>
                  <div class="card-container">
                    <div class="card card-left">
                      <h1>Flight <span>Booking</span></h1>
                      <div class="airline">
                        <h2><?php echo $row['airlines'] ?></h2>
                      </div>
                      <div class="name">
                        <span>name</span>
                        <h2><?php echo $row['name'] ?></h2>
                      </div>
                      <div class="St">
                        <div class="seat">
                          <span>Departure</span>
                          <h2><?php echo date('g:i a',strtotime($row['departure_datetime'])) ?></h2>
                        </div>
                        <div class="Time">
                          <span>Arrival</span>
                          <h2><?php echo date('g:i a',strtotime($row['arrival_datetime'])) ?></h2>
                        </div>
                      </div>
                    </div>
                  
                    <div class="card card-right">
                      <div class="ticketTag"></div>
                      <div class="number">
                        <span>seat</span>
                        <h1>100</h1>
                      </div>
                      <div id="barcodeContainer" class="glowing-animation">
                        <h1 id="barcode">
                          <span class="animatedSpan" id="UniqueQR_number"><?php echo $row['bid'] ?></span><span class="animatedSpan"><?php echo $row['airlines'] ?></span><span class="animatedSpan"><?php echo $row['flight_id'] ?></span>
                        </h1>
                      </div>
                    </div>
                  </div>
                </tr>
              <?php endwhile; ?>
           </table>
         </div>
       </div>
     </div>
   </div>
   <!-- <h1>My Ticket</h1>
     <div>
     <img src="" alt="">
     <div class="ticket-section">
         <h2 class="col1">Airline Name</h2>
         <h2 class= "col2">boarding pass</h2>
     </div>
         <div class="details-1">
         <h3>Departure:</h3>
         <h3>Arrival:</h3>
     </div>
     <div class="details-2">
         <h1>SEAT</h1>
         <h1>GATE</h1>
         <h1>FLIGHT</h1>
     </div>
     <img src="" alt="">
     
     </div> -->
</body>
<script>
  // let generatedNumbers = [];

  // function generateUniqueNumber(min, max) {
  //   return Math.floor(Math.random() * (max - min + 1)) + min;
  //   if (num.length > 150000){
  //     generatedNumbers = []; 
  //   }
  //   if (generatedNumbers.includes(num)) {
  //     // If it has, generate a new number
  //     return generateUniqueNumber(min, max);
  //   } else {
  //     // If it hasn't, add it to the list of generated numbers and return it
  //     generatedNumbers.push(num);
  //     return num;
  //   }
  // }
  
  // // Generate a unique number between 99999 and 999999999999999999
  // const uniqueNumber = generateUniqueNumber(99999, 999999999999999999);
  
  // // Get the output element
  // const output = document.querySelector(".animatedSpan");
  
  // // Set the output element's content to the unique number
  // output.innerHTML = uniqueNumber;
</script>
</html>