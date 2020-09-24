<?php
	error_reporting(E_ERROR);
	/* I made sure first that there is no errors affect the atm system */
	session_start();
	$name="";
	$pass="";
	$id="";
	$money="";
	$transaction="";
	$count="";
	$errors=array();
	// decleration of variables we will need it later
	$db = mysqli_connect('localhost','root','','atm');
	// connecting to the data base variable
	if(isset($_POST['sub'])) // on clicking the Access button
	{
		$id = mysqli_real_escape_string($db,$_POST['id']);
		$pass = mysqli_real_escape_string($db,$_POST['pass']);
		// on clicking the Access button the entered data will be saved into those variables

		  $countquery ="SELECT count FROM client WHERE id='$id'";
		                $result4 = mysqli_query($db, $countquery);
		                /*this query for getting the counter of login errors where we specified only 
		                3 trials for each client id and saved this counter at the data base to recheck on it every time 
		                the user login but once he log in successfully the counter will be reset to zero otherwise after
		                the third trial the system will be closed and the client should contact an admin on the page 
		                to reset his password and reseting the counter verifying his identity */
	                while ($row = $result4->fetch_assoc()) 
	                {
	                    $count = $row['count'];
	                }
	if($count < 2) // less than 2 where it's starting from 0 so ... 0,1,2 
	{
	                
		if(empty($id))
		{
			array_push($errors," Account Number is required");
		}
		if(empty($pass))
		{
			array_push($errors,"password is required");

		}
		 /*if any input left empty warning will be saved into errors array
         and it will be shown on the screen to the user without logging in*/
         if (count($errors) == 0)
		{
			$query ="SELECT * FROM client WHERE id='$id' AND password='$pass'";
				$result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) == 1)
				{
						/*now we check the login type depending on the id logging as 
	                    admin will redirect to different page than normal client*/
		                $namequery ="SELECT name FROM client WHERE id='$id'";
		                $result1 = mysqli_query($db, $namequery);
		                /*this query for getting the name of the user from the data base */
	                while ($row = $result1->fetch_assoc()) 
	                {
	                    $name = $row['name']."<br>";
	                }
						if($id =="1")//admin ID
						{
							$_SESSION['name'] = $name;
							header('location: admin.php');// admin redirection control page
						}
						else
						{
							$_SESSION['name'] = $name;
							$_SESSION['id'] = $id;
							$count=0;
							 $sql = "UPDATE client SET count = '$count' WHERE id='$id'";
						mysqli_query($db,$sql);
							header('location: client.php'); //normal client redirection
						}
					
				}
			else
				{
					array_push($errors,"The Account number or password you have entered is wrong ");
					$count=$count+1;
					 $sql = "UPDATE client SET count = '$count' WHERE id='$id'";
						mysqli_query($db,$sql);
				}
			//if both wrong show warning error message
		}
	}
		else
		{ // when u exceed 3 trials for accessing the same account
			/*close system*/
			echo "<p style='font-size:60px;font-weight:bold;color:#f00;text-align:center;margin-top:25%;'>Please contact the Bank Customer Service or the admin<br/> to reset your Password</p>";
			echo "<body style='display:none;>";

		}
		
			

	}
	//logout
		if (isset($_GET['logout']))
		{
			session_destroy();
			unset($_SESSION['name']);
			unset($_SESSION['id']);
			header('location: index.php');
		   /*by clicking logout, the session destroy itself by undefining the name variable which was working as cookie to keep the user login and redirecting to the client page*/
		}





	 		

	



?>