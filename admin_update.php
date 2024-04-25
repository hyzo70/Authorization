<?php 
session_start();

	include("connection.php");
	include("functions.php");

    $id = $_GET["id"];

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $matricNo = $_POST['matricNo'];
        $email = $_POST['email'];
        $currentAddress = $_POST['currentAddress'];
        $homeAddress = $_POST['homeAddress'];
        $mobilePhoneNo = $_POST['mobilePhoneNo'];
        $homePhoneNo = $_POST['homePhoneNo'];
        
            $row = "UPDATE studentform SET name='$name',matricNo='$matricNo',email='$email',currentAddress='$currentAddress',
            homeAddress='$homeAddress',mobilePhoneNo='$mobilePhoneNo',homePhoneNo='$homePhoneNo' WHERE id = $id";
         
            $result = mysqli_query($con, $row);
         
            if ($result) {
               header("Location: user_record.php?msg=Data updated successfully");
            } else {
               echo "Failed: " . mysqli_error($con);
            }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Form</title>
    <link rel="stylesheet" type="text/css" href="uindex.css">
 </head>
<body>
    <h1>Student Details Form</h1>
      <h2>Hi! <span><?php echo $_SESSION['user_name'] ?></span></h2>
      <a href="logout.php"><img src="logout.jpg" alt="Logout"></a>

      <?php
     $sql = "SELECT * FROM studentform WHERE id = $id LIMIT 1";
     $result = mysqli_query($con, $sql);
     $row = mysqli_fetch_assoc($result);
    ?>

<form id="studentForm" method="POST"  onsubmit="formValidate()" autocomplete="off">
        <label for="name">Name (Legal/Official):</label>
        <input type="text" name="name" pattern="^[a-zA-Z]+(?: [a-zA-Z]+(?: [a-zA-Z]+(?: (?:bin|ibn) )*[a-zA-Z]+)*)*(?: @ [a-zA-Z]+)?$" id="name" required value="<?php echo $row['name'] ?>">
        <br>
        <label for="matricNo">Matric No.:</label>
        <input type="text" name="matricNo" id="matricNo" pattern="[A-Za-z0-9]+" required value="<?php echo $row['matricNo'] ?>">
        <br>
        <label for="email">Email (Gmail Account):</label>
        <input type="email" name="email" id="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required value="<?php echo $row['email'] ?>">
        <br>
        <label for="currentAddress">Current Address:</label>
        <textarea name="currentAddress" id="currentAddress" pattern="^([\w\s\W]+[\w\W]?)\s([\d\-\\\/\w]*)?" rows="4" cols="50" required value="<?php echo $row['currentAddress'] ?>"></textarea>
        <br>
        <label for="homeAddress">Home Address (Emergency):</label>
        <textarea name="homeAddress" id="homeAddress" pattern="^([\w\s\W]+[\w\W]?)\s([\d\-\\\/\w]*)?" rows="4" cols="50" value="<?php echo $row['homeAddress'] ?>"></textarea>
        <br>
        <label for="mobilePhoneNo">Mobile Phone No.:</label>
        <input type="tel" name="mobilePhoneNo" pattern="^\+?[0-9]{2,}[0-9]{7,}$" id="mobilePhoneNo" required value="<?php echo $row['mobilePhoneNo'] ?>">
        <br>
        <label for="homePhoneNo">Home Phone No. (Emergency):</label>
        <input type="tel" name="homePhoneNo" pattern="^\+?[0-9]{2,}[0-9]{7,}$" id="homePhoneNo" value="<?php echo $row['homePhoneNo'] ?>">
        <br>
        <button type="submit">Update</button>
        <a id="record" href="admin_record.php">Cancel</a>
    </form>
    <script src="index.js"></script>
</body>
</html>