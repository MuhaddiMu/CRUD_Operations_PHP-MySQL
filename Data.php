<?php
error_reporting(0);
define("TITLE", "Data in Database");
include("Connection.PHP");
$Query = "SELECT * FROM Temp";
$Result = mysqli_query($Connection, $Query);

if (isset($_GET['alert'])) {
        if ($_GET['alert'] == 'Updated') {
        $Message = "<div class='alert alert-success'>Data Updated Successfuly in Databse. <a href='' class='close' data-dismiss='alert' aria-   label='close'>&times;</a></div>";
    }
    
    if ($_GET['alert'] == 'Deleted') {
        $Message = "<div class='alert alert-success'>User Deleted Successfully From Databse. <a href='' class='close' data-dismiss='alert' aria-   label='close'>&times;</a></div>";
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="animate.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


      
  </head>
  <body>
    <div class="container animated fadeInDown">
        
    <h1><?php echo TITLE; ?> <i class="fas fa-database"></i></h1>
        <?php echo $Message; ?>
        
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>Name <i class="fas fa-users"></i></th>
                <th>Email <i class="fas fa-envelope-square"></i></th>
                <th>Contact No. <i class="fas fa-phone"></i> </th>
                <th>Edit <i class="far fa-edit"></i></th>
            </tr>
    <?php
        if(mysqli_num_rows($Result) > 0){
            while($Row = mysqli_fetch_assoc($Result)){
                echo "<tr>";
                echo "<td>" . $Row['Name'] . "</td><td>" . $Row['Email'] . "</td><td>" . $Row['Contact'] . "</td>";
                echo '<td><a href="Edit.php?ID='. $Row['ID'] .'"><i class="far fa-edit"></i></a></td>';
                echo "</tr>";
            }
            
        }   
            
        else {
            echo "<div class='alert alert-warning'>You Have No Data in Databse yet. Go <a href ='index.php'>Add</a> Some Data.</div>";
        }
        echo "</table>";   
        mysqli_close($Connection);
?>
            <a href="index.php">Click Here to Add more.</a>
        
        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>