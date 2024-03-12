<?php
$insert=false;
if(isset($_POST['name'])){
    $Server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($Server, $username, $password);
    if(!$con){
        die("connection to this database failed due" . mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
            VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    if($con->query($sql) == true){
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <img class="bg" src="bg.jpg" alt="">
    <div class="Container">
        <h3>Welcome to IIT Kharagpur US Trip form</h3>
        <p> Enter your details and submit this form to confirm your participation in the trip</p>
<?php
if($insert==true){
    echo "<p style='color:green'>Thanks for submitting your form. We are happy to see you joining the US Trip</p>";
}
?>
<form action="index.php" method="post">
        <input type="text" name="name" placeholder="enter your name">
        <input type="text" name="age" id="age" placeholder="enter your age">
        <input type="text" name="gender" id="gender" placeholder="enter your gender">
        <input type="email" name="email" id="email" placeholder="enter your Email">
        <input type="phone" name="phone" id="phone" placeholder="enter your phone"> 
        <textarea rows="10" cols="30" placeholder="Enter the information here" name="desc" id = "desc"></textarea>
        <button class="btn" type="submit">Submit</button>
</form>
</div>
<script src="index.js"></script>
</body>
</html>
