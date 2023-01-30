<?php 
include 'admin/db_connect.php'; 
if($_SERVER['REQUEST_METHOD'] == "POST"){
	foreach($_POST as $k => $v){
		$$k = $v;
	}
}

?>
        <div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="booking-cta">
							<h2 class="text-black">Welcome to Online Flight Booking System</h2>
                            <p class="text-black"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel recusandae voluptatibus modi explicabo. Explicabo illum voluptatem praesentium ea eum vel animi laboriosam deserunt culpa cumque. Quibusdam provident vel recusandae optio!</p>
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
	<section class="page-section" id="flight" >
        <div class="container">
        	<div class="card">
        		<div class="card-body">
        			<div class="col-lg-12">
						<div class="row">
							<div class="col-md-12 text-center">
								<h2><b><?php echo isset($trip) && $trip == 2 ? "Departure Searched Flight results..." : ( !isset($trip)? " Flights Available " :"Searched Flight results...")  ?></b></h2>
							</div>
						</div>
						<hr class="divider">
				<?php 
				$airport = $conn->query("SELECT * FROM airport_list ");
				while($row = $airport->fetch_assoc()){
					$aname[$row['id']] = ucwords($row['airport'].', '.$row['location']);
				}
				$where = " where date(f.departure_datetime) > '".date("Y-m-d")."' ";
				if($_SERVER['REQUEST_METHOD'] == "POST" )
				$where .= " and f.departure_airport_id ='$departure_airport_id' and f.arrival_airport_id = '$arrival_airport_id' and date(f.departure_datetime) = '".date('Y-m-d',strtotime($date))."'  ";
				$flight = $conn->query("SELECT f.*,a.airlines,a.logo_path FROM flight_list f inner join airlines_list a on f.airline_id = a.id $where order by rand()");
				if($flight->num_rows > 0):
				while($row=$flight->fetch_assoc()):
					$booked = $conn->query("SELECT * FROM booked_flight where flight_id = ".$row['id'])->num_rows;
				?>
				<div class="row align-items-center">
					<div class="col-md-3">
						<img src="assets/img/<?php echo $row['logo_path'] ?>" alt="">
					</div>
					<div class="col-md-6">
						 <p><b><?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?></b></p>
						 <p><small>Airline: <b><?php echo $row['airlines'] ?></b></small></p>
						 <p><small>Departure: <b><?php echo date('h:i A',strtotime($row['departure_datetime'])) ?></b></small></p>
						 <p><small>Arrival: <b><?php echo (date('M d,Y',strtotime($row['departure_datetime'])) == date('M d,Y',strtotime($row['arrival_datetime']))) ? date('h:i A',strtotime($row['arrival_datetime'])) : date('M d,Y h:i A',strtotime($row['arrival_datetime'])) ?></b></small></p>
						 <p>Available Seats : <b><h4><?php echo $row['seats'] - $booked ?></h4></b></p>
					</div>
					<div class="col-md-3 text-center align-self-end-sm">
						<h4 class="text-right"><b><?php echo number_format($row['price'],2) ?></b></h4>
						<button class="btn-outline-primary  btn  mb-4 book_flight" type="button" data-id="<?php echo $row['id'] ?>"  data-name="<?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?>" data-max="<?php echo $row['seats'] - $booked ?>">Book Now</button>
					</div>
				</div>
				<hr class="divider" style="max-width: 60vw">
				<?php endwhile; ?>
				<?php else: ?>
					<div class="row align-items-center">
						<h5 class="text-center"><b>No result.</b></h5>
					</div>
				<?php endif; ?>
					
				<?php if(isset($trip) && $trip ==2): ?>
					<hr>
					<div class="row">
						<div class="col-md-12 text-center">
							<h2><b><?php echo isset($trip) && $trip == 2 ? "Arrival Searched Flight results..." : ( !isset($trip)? " Flights Available " :"Searched Flight results...")  ?></b></h2>
						</div>
					</div>
						<hr class="divider">
				<?php 
				$airport = $conn->query("SELECT * FROM airport_list ");
				while($row = $airport->fetch_assoc()){
					$aname[$row['id']] = ucwords($row['airport'].', '.$row['location']);
				}
				$where = " where date(f.departure_datetime) > '".date("Y-m-d")."' ";
				if($_SERVER['REQUEST_METHOD'] == "POST" )
				$where .= " and f.departure_airport_id ='$arrival_airport_id' and f.arrival_airport_id = '$departure_airport_id' and date(f.departure_datetime) = '".date('Y-m-d',strtotime($date_return))."'  ";
				$flight = $conn->query("SELECT f.*,a.airlines,a.logo_path FROM flight_list f inner join airlines_list a on f.airline_id = a.id $where order by rand()");
				if($flight->num_rows > 0):
				while($row=$flight->fetch_assoc()):
					$booked = $conn->query("SELECT * FROM booked_flight where flight_id = ".$row['id'])->num_rows;

				?>
				<div class="row align-items-center">
					<div class="col-md-3">
						<img src="assets/img/<?php echo $row['logo_path'] ?>" alt="">
					</div>
					<div class="col-md-6">
						 <p><b><?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?></b></p>
						 <p><small>Airline: <b><?php echo $row['airlines'] ?></b></small></p>
						 <p><small>Departure: <b><?php echo date('h:i A',strtotime($row['departure_datetime'])) ?></b></small></p>
						 <p><small>Arrival: <b><?php echo (date('M d,Y',strtotime($row['departure_datetime'])) == date('M d,Y',strtotime($row['arrival_datetime']))) ? date('h:i A',strtotime($row['arrival_datetime'])) : date('M d,Y h:i A',strtotime($row['arrival_datetime'])) ?></b></small></p>
						 <p>Available Seats : <b><h4><?php echo $row['seats'] - $booked ?></h4></b></p>
					</div>
					<div class="col-md-3 text-center align-self-end-sm">
						<h4 class="text-right"><b><?php echo number_format($row['price'],2) ?></b></h4>
						<button class="btn-outline-primary  btn  mb-4 book_flight" type="button" data-id="<?php echo $row['id'] ?>"  data-name="<?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?>" data-max="<?php echo $row['seats'] - $booked ?>">Book Now</button>
					</div>
				</div>
				<hr class="divider" style="max-width: 60vw">
				<?php endwhile; ?>
				<?php else: ?>
					<div class="row align-items-center">
						<h5 class="text-center"><b>No result.</b></h5>
					</div>
				<?php endif; ?>
				<?php endif; ?>
				</div>
				</div>
        	</div>
        </div>
    </section>
    <style>
    	#flight img{
    		max-height: 300px;
    		max-width: 200px; 
    	}
    	#flight p{
    		margin: unset
      	}
    </style>
    <script>
        
       $('.view_schedule').click(function(){
			uni_modal($(this).attr('data-name')+" - Schedule","view_doctor_schedule.php?id="+$(this).attr('data-id'))
		})
       $('.book_flight').click(function(){
       	if($(this).attr('data-max') <= 0){
       		alert("There is no Available Seats for the selected flight");
       		return false;
       	}
			uni_modal($(this).attr('data-name'),"book_flight.php?id="+$(this).attr('data-id')+"&max="+$(this).attr('data-max'),'mid-large')
		})
        $('[name="trip"]').on("keypress change keyup",function(){
            if($(this).val() == 1){
                $('#rdate').hide()
            }else{
                $('#rdate').show()
            }
        })
    </script>
	
