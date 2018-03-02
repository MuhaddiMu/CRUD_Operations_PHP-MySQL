<?php
error_reporting(0);

function Validation($Form) {
    $Form = trim(stripslashes(htmlspecialchars(strip_tags(str_replace( array( '(', ')' ), '', $Form )), ENT_QUOTES)));
    return $Form;
}

define("TITLE", "Edit in Database");
include("Connection.PHP");
$DataId = $_GET['ID'];

$Query = "SELECT * FROM Temp WHERE ID = '$DataId'";
$Result = mysqli_query($Connection, $Query);

if(mysqli_num_rows($Result) > 0){
    while($Row = mysqli_fetch_assoc($Result)){
        $Name       = $Row['Name'];
        $Email      = $Row['Email'];
        $Contact    = $Row['Contact'];
        
    }
} else {
            $Message = "<div class='alert alert-warning'>You Have No Data in Databse yet. Go <a href ='index.php'>Add</a> Some Data.</div>";
    }

if(isset($_POST['Update'])){
    
        $UserName    = Validation($_POST['Name']);
        $UserEmail   = Validation($_POST['Email']);
        $UserContact = Validation($_POST['Contact']);

        $Query = "UPDATE Temp 
                    SET Name    = '$UserName',
                        Email   = '$UserEmail',
                        Contact = '$UserContact' WHERE ID = '$DataId'";
    
        $Result = mysqli_query($Connection, $Query);
        if($Result){
            header("Location: Data.php?alert=Updated");
        }
} else {
   // echo mysqli_error($Connection);
}

if(isset($_POST['Delete'])){
    $Message = "<div class='alert alert-danger'> 
                    <p>Are you sure you want to Delete this User? No take back!</p>
                    <form action ='" . htmlspecialchars($_SERVER['PHP_SELF']) . "?ID=$DataId' method='post' >
                        <input type = 'submit' class='btn btn-danger btn-sm' name='confirm-delete' value='Yes, Delete!'> 
                            <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Oops, No Thanks!</a>
                    </form>    
        </div>";
}
if(isset($_POST['confirm-delete'])){
    $Query = "DELETE FROM Temp WHERE ID = '$DataId'";
    $Result = mysqli_query($Connection, $Query);
    
    if($Result){
        header("location: Data.php?alert=Deleted");
    }
    else {
		echo "Error Updating Record: " . mysqli_error($Connection);
	}
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
      
  </head>
  <body>
    <div class="container animated fadeInDown">
        
    <h1><?php echo TITLE; ?> <i class="fas fa-database"></i></h1>
        <?php echo $Message; ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?ID=<?php echo $DataId; ?>" class="form" method="post">
            <div class="form-group">
                <label for="Name">Name: </label>
                <input autofocus required type="text" class="form-control" name="Name" id="Name" value="<?php echo $Name; ?>">
             
            </div>    
            
            <div class="form-group">
                <label for="Email">Email: </label>
                <input required type="text" class="form-control" name="Email" id="Email" value="<?php echo $Email; ?>">
            </div>  
            
            <div class="form-group">
                <label for="Contact">Contact Number: </label>
                <input required type="text" class="form-control" name="Contact" id="Contact" value="<?php echo $Contact; ?>">
            </div>  
            
            <div class="form-group">
                <button name="Update" type="submit" class="form-control btn btn-primary">Update Record <i class='fas fa-upload'></i></button><br><br>
                <button name="Delete" type="submit" class="form-control btn btn-danger">Delete Record <i class="fas fa-trash-alt"></i></button>
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