<?php
error_reporting(0);
function Validation($Form) {
    $Form = trim(stripslashes(htmlspecialchars(strip_tags(str_replace( array( '(', ')' ), '', $Form )), ENT_QUOTES)));
    return $Form;
}
define("TITLE", "Insert DATA Into DATABASE");
include("Connection.PHP");

if(isset($_POST['Submit'])){
    
    if(!$_POST['Name']){
        $ErrorName = "<br> Please Enter Your Good Name ";
    }   
    else {
        $Name = Validation($_POST['Name']);    
    }
    
    if(!$_POST['Email']){
        $ErrorEmail = "<br> Please Enter Your Disgusting Email Address ";
    }   
    else {
        $Email = Validation($_POST['Email']);    
    }
    
    if(!$_POST['Contact']){
        $ErrorContact = "<br> Please Enter Your Idiotic Contact Number ";
    }   
    else {
        $Contact = Validation($_POST['Contact']);    
    }
        if($Name && $Email && $Contact) {
            
            $Query = "INSERT INTO Temp(ID, Name, Email, Contact) VALUES (NULL, '$Name', '$Email', '$Contact')";
            mysqli_query($Connection, $Query);
    
            $Message = "<div class='alert alert-success'>Data Added Successfuly in Databse. <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
        }
    else {
        $Message = "<div class='alert alert-warning'>Please Try Again! Invalid Characters. <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
    }
} else {
   // echo mysqli_error($Connection);
}
        mysqli_close($Connection);

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

    <title><?php echo TITLE; ?></title>
        <style>
            small {
                color: red;
            }
        </style>
  </head>
  <body>
    <div class="container animated fadeInDown">
        
    <h1><?php echo TITLE; ?> <i class="fas fa-database"></i></h1>
        <?php echo $Message; ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form" method="post">
            <div class="form-group">
                <label for="Name">Name: </label>
                <small><?php echo $ErrorName; ?></small>
                <input autofocus required type="text" class="form-control" name="Name" id="Name" placeholder="Your Name Please">
             
            </div>    
            
            <div class="form-group">
                <label for="Email">Email: </label>
                <small><?php echo $ErrorEmail; ?></small>
                <input required type="text" class="form-control" name="Email" id="Email" placeholder="Your Email Address Please" >
            </div>  
            
            <div class="form-group">
                <label for="Contact">Contact Number: </label>
                <small><?php echo $ErrorContact; ?></small>
                <input required type="text" class="form-control" name="Contact" id="Contact" placeholder="Your Contact Number Please, We promise we wouldn't bargain">
            </div>  
            
            <div class="form-group">
                <button name="Submit" type="submit" class="form-control btn btn-primary">Submit to Database <i class='fas fa-upload'></i></button>
               
            </div>
            
        </form>
        
        <a href="Data.php">Click Here to See Data in Databse.</a>
        
    </div>
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>