<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
    
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 135px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}


.dropdown-content a:hover {background-color: #f1f1f1;
color:black;}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<script type="text/javascript">

         function testConfirmDialog()  {

              var result = confirm("Do you want to continue?");

              if(result)  {
                window.location.href = "ajax.php?action=logout";
                
              } else {
                  alert("Cancelled!");
              }
              
         }

      </script>
<nav class="navbar navbar-light fixed-top bg-primary" style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">
  				<span class="fa fa-plane-departure"></span>
  			</div>
  		</div>
      <div class="col-md-4 float-left text-white">
        <large><b>Online Flight Booking System</b></large>
      </div>
	  	<div class="col-md-2 float-right text-white">
      <li class="dropdown">
	  		<a class="text-white" ><?php echo $_SESSION['login_name'] ?></a>
        <div class="dropdown-content">
      <a onclick="testConfirmDialog()" style = "hover : black;" >Logout <i class="fa fa-power-off"></i></a>
    </div>
    </li>
        
	    </div>
    </div>
  </div>
  
</nav>
