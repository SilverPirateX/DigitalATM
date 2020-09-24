<?php include("server.php"); ?>
<?php { $errors2=array(); ?>
	<?php
	 				$type="";
	 				$amount="";
	 				$account="";
	 				$no="";
	 				$modify="";
	 				// some variables we will need it later
	 			if(isset($_POST['addm']))// onclicking the add button
	 			{
	 				$type="add"; //storing the type of transaction
	 				$amount = mysqli_real_escape_string($db,$_POST['amount']);
	 				$account = mysqli_real_escape_string($db,$_POST['account']);
	 				$no = mysqli_real_escape_string($db,$_POST['no']);
	 				/* if any of the inputs entered in wrong way error will be added to the errors2 array
	 				to display it on a specific place for errors*/
	 				if(empty($amount)) 
					{
						array_push($errors2," The Amount you want to transfer is required");
					}
					if(empty($account))
					{
						array_push($errors2,"The type of the Acc/Card is required");
					}
				 	if(empty($no))
					{
						array_push($errors2," The Acc/Card no is required");
					}
					if (count($errors2) == 0) // if there is no empty fields
					{

						$sql = "INSERT INTO transfer (client_id,type,amount,account,acc_card_no,tdate) values ('$id','$type','$amount','$account','$no',now())";
						// we inserting the tranaction values into another table at the data base
						mysqli_query($db,$sql);
						 $modify = $money + $amount; 
						 $sql = "UPDATE client SET money = '$modify' WHERE id='$id'";
						mysqli_query($db,$sql); 
						/* and on transaction done successfully we modify the amount of money that this client have 
						on his account at the data base*/
						header('location: client.php');
						// reloading the page to refresh the amount of money that the client have and displayed on the screen

					}
				}
				if(isset($_POST['withm'])) //onclicking the whithdraw button
		 		{ //same process as the adding with little changes
		 				$errors2=array();
		 				$type="withdraw";
		 				$amount = mysqli_real_escape_string($db,$_POST['amount']);
		 				$account = mysqli_real_escape_string($db,$_POST['account']);
						$no = mysqli_real_escape_string($db,$_POST['no']);
		 			if(empty($amount))
					{
						array_push($errors2," The Amount you want to transfer is required");
					}
					if(empty($account))
					{
						array_push($errors2,"The type of the Acc/Card is required");
					}
				 	if(empty($no))
					{
						array_push($errors2," The Acc/Card no is required");
					}
					if($amount>$money)/*if the amount of money entered to be withdrawed is less than what the client have, an error will be addedd to the errors array*/
					{
						array_push($errors2," You haven't this amount of cash in your account");
					}
					if (count($errors2) == 0)// if there is no errors
					{

						$sql = "INSERT INTO transfer (client_id,type,amount,account,acc_card_no,tdate) values ('$id','$type','$amount','$account','$no',now())";
						/* we will store the transaction details into the data base*/
						mysqli_query($db,$sql);
						 $modify = $money - $amount; 
						 $sql = "UPDATE client SET money = '$modify' WHERE id='$id'";
						mysqli_query($db,$sql); // updating the amount of money at the account
						header('location: client.php'); // refreshing the page

					}



				}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="ATM Banking Service" content="Welcome to the safest Banking service in Africa">
	<title> Client </title>
	<link rel="stylesheet" href="atm.css">
	<link rel="stylesheet" href="client.css">
	<link rel="stylesheet" href="client2.css">
	<link rel="stylesheet" href="error.css">
</head>
<body>
	<?php 	$name=$_SESSION['name'];	?>
	<!-- that will bring the name of the client from the DB depinding on the client id-->
	<h1>Welcome <?php echo $name; ?> 
	</h1>
	<div class="mainsec">
	<p class="mainp">
			<span>T</span>he &nbsp;&nbsp;
			<span>D</span>igital &nbsp;&nbsp;
			<span>B</span>ank
	</p>
	<?php
	//for displaying the amount of money the client have on the screen
			$id = $_SESSION['id'];
		  $moneyquery ="SELECT money FROM client WHERE id='$id'";
		                $result2 = mysqli_query($db, $moneyquery);
		            
	                while ($row = $result2->fetch_assoc()) 
	                {
	                    $money = $row['money'];
	                    $transfer2 = $money;
	                }
	                echo'<p class="moneyp"> You have <span>' . $transfer2 . "$ </span> in your Account.</p>";
	    ?>
	 
	 	<div class="transaction">
	 		<form method="post" action="client.php"> <!-- Add money form -->
	 			<div class="addborder">
	 				<label>Transfer Money <span style="color:green;">To</span> Your Digital Bank Account</label><br>
	 			<input name="amount" type="number" maxlength="6" min="10" max="500000" class="iput2" placeholder="Amount">
	 			<select name="account">
	 				<option value="paypal">PayPal</option>
	 				<option value="visa card">Visa Card</option>
	 				<option value="master card">Master Card</option>
	 				<option value="pioneer">Pioneer</option>
	 				<option value="western union">Western Union</option>
	 			</select>
	 			<input name="no" type="number" maxlength="16" class="iput2" placeholder="Acc/Card No">
	 			<button name="addm" type="submit" class="btn2">Add</button>
	 		</div>

	 		</form> <!-- withdrawing money form -->
	 		<form method="post" action="client.php">
	 			<div class="addborder">
	 				<label>Transfer Money <span style="color:red">From</span> Your Digital Bank Account</label><br>
	 			<input name="amount" type="number" maxlength="6" min="10" max="500000" class="iput2" placeholder="Amount">
	 			<select name="account">
	 				<option value="paypal">PayPal</option>
	 				<option value="visa card">Visa Card</option>
	 				<option value="master card">Master Card</option>
	 				<option value="pioneer">Pioneer</option>
	 				<option value="western union">Western Union</option>
	 			</select>
	 			<input name="no" type="number" maxlength="16" class="iput2" placeholder="Acc/Card No">
	 			<button name="withm" type="submit" class="btn2">Withdraw</button>
	 		</div>
	 		</form>
	 		</div>

	 	</div>
	</div>

			<aside class="record"> <!-- the aside is html5 element will be used as side bar -->
			<a href="index.php?logout='1'"><button id="btn9">Logout</button></a><br>
			<details> <!-- on clicking this element the table of transactions will be displayed -->
				<summary>Last Transactions</summary>
			<table id="tabsh">
					<tr>
						<th>Transfer ID</th>
						<th>Client ID</th>
						<th>Type</th>
						<th>Amount</th>
						<th>Account</th>
						<th>Account/Card no</th>
						<th>Transfer Date</th>
					</tr>
				<?php // displaying last 5 transactions history to a table
				$query5 ="SELECT * FROM transfer WHERE client_id='$id' ORDER BY transfer_id DESC LIMIT 5";
				$result5 = mysqli_query($db, $query5);
				if(mysqli_num_rows($result5) > 0)
				{
					while ($row = $result5-> fetch_assoc())
					{
						{
						echo "<tr><td>" . $row["transfer_id"] . "</td><td>" . $row["client_id"] . "</td><td>" . $row["type"] . "</td><td>" . $row["amount"] . "</td><td>" . $row["account"] . "</td><td>" . $row["acc_card_no"] . "</td><td>" . $row["tdate"] . "</td></tr>";
						}
					}
					echo"</table>";
				}
				?>

				</details>
				<?php include("error.php"); ?>
			</aside>
						
					
			<br/>
	 
		
	 	
	

</body>
</html>
<?php
				/* we repeated some of the above php code cause 
					it needs to be found in more than specific place to work properly*/
	 				$type="";
	 				$amount="";
	 				$account="";
	 				$no="";
	 				$modify="";
	 				$trans2="";
	 				
	 			if(isset($_POST['addm']))
	 			{
	 				$type="add";
	 				$amount = mysqli_real_escape_string($db,$_POST['amount']);
	 				$account = mysqli_real_escape_string($db,$_POST['account']);
	 				$no = mysqli_real_escape_string($db,$_POST['no']);
	 				if(empty($amount))
					{
						array_push($errors2," The Amount you want to transfer is required");
					}
					if(empty($account))
					{
						array_push($errors2,"The type of the Acc/Card is required");
					}
				 	if(empty($no))
					{
						array_push($errors2," The Acc/Card no is required");
					}
					if (count($errors2) == 0)
					{

						$sql = "INSERT INTO transfer (client_id,type,amount,account,acc_card_no,tdate) values ('$id','$type','$amount','$account','$no',now())";
						mysqli_query($db,$sql);
						 $modify = $money + $amount; 
						 $sql = "UPDATE client SET money = '$modify' WHERE id='$id'";
						mysqli_query($db,$sql);
						header('location: client.php');

					}
				}
				if(isset($_POST['withm']))
		 		{
		 				$errors2=array();
		 				$type="withdraw";
		 				$amount = mysqli_real_escape_string($db,$_POST['amount']);
		 				$account = mysqli_real_escape_string($db,$_POST['account']);
						$no = mysqli_real_escape_string($db,$_POST['no']);
		 			if(empty($amount))
					{
						array_push($errors2," The Amount you want to transfer is required");
					}
					if(empty($account))
					{
						array_push($errors2,"The type of the Acc/Card is required");
					}
				 	if(empty($no))
					{
						array_push($errors2," The Acc/Card no is required");
					}
					if($amount>$money)
					{
						array_push($errors2," You haven't this amount of cash in your account");
					}
					if (count($errors2) == 0)
					{

						$sql = "INSERT INTO transfer (client_id,type,amount,account,acc_card_no,tdate) values ('$id','$type','$amount','$account','$no',now())";
						mysqli_query($db,$sql);
						 $modify = $money - $amount; 
						 $sql = "UPDATE client SET money = '$modify' WHERE id='$id'";
						mysqli_query($db,$sql);
						header('location: client.php');

					}



				}
?>

<?php } ?>