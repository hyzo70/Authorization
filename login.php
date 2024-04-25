<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{
			//read from database
			$query = "select * from users where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if(md5($password) == $user_data['password'])
					{
						if($user_data['user_type'] == 'admin'){

							$_SESSION['user_id'] = $user_data['user_id'];
							$_SESSION['user_name'] = $user_data['user_name'];
							header('location:admin_index.php');
				   
						 }elseif($user_data['user_type'] == 'user'){
				   
							$_SESSION['user_id'] = $user_data['user_id'];
							$_SESSION['user_name'] = $user_data['user_name'];
							header('location:user_index.php');
				   
						 }
				   
					}
				}
			}
			
			echo  '<script>
                         window.location.href = "login.php";
                         alert("Login failed. Invalid email or password!")
                     </script>';
		}else
		{
			echo  '<script>
                         window.location.href = "login.php";
                         alert("Login failed. Invalid email or password!")
                     </script>';
		}
	}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
        
        <div id="form">
            <h1>Login</h1>
            <form onsubmit="isvalid()" method="POST" autocomplete="off">
                <label>Email: </label>
                <input type="email" id="email" name="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required></br></br>
                <label>Password: </label>
                <input type="password" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" required></br></br>
                <input type="submit" id="btn" value="Login"><br><br>
				<a href="signup.php">Click to Sign Up</a>
            </form>
        </div>
        <script src="index.js"></script>
    </body>
</html>