<?php 

require_once 'admin/db_connect.php';
$sql = "SELECT *FROM places";
$all_places = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>London</title>
    <link rel ="stylesheet" href = "location.css">
</head>
<?php include('footer.php') ?>
<body>
    <?php 
    while ($row = mysqli_fetch_assoc($all_places)){
    ?>

<section class = "about">
    <div class = "main">
        <img src="assets/img/<?php echo $row ["locationImage"]; ?>" alt ="" >
        <div class = "about-text">
            <h3> <?php echo $row ["locationName"]; ?></h3>
            <p><?php echo $row ["locationDetails"]; ?></p>

            <a href ="https://www.nomadicmatt.com/travel-guides/england-travel-tips/london/"> <button type="button">See More</button></a>

        </div>

    </div>
</section>

<?php 
    }
?>
</body>
<footer>
<footer class="footer">
  <div class="footer_container">
    <div class="footer_top">
      <div class="company_info">
        <h2 class="company_logo">Online<span class="h">Flight Booking System</span></h2>
        <p class="company_description">All Rights Reserved.</p>

    </div>
    </div>
    </div>
</footer>
</footer>

</html>