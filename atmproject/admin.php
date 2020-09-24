<?php include("server.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="ATM Banking Service" content="Welcome to the safest Banking service in Africa">
	<title> admin pannel </title>
	<link rel="stylesheet" href="atm.css">
	<link rel="stylesheet" href="client.css">
	<link rel="stylesheet" href="client2.css">
	<style> 
		/* those are some extra css features wrote internal to modify on the general styling at the external files*/
		.admadm
		{
			margin:-250px 300px 0px 550px;
			text-align:right;
		}
		.riri
		{
			text-align:right;
			width:1950px;
			height:80px;
			margin-top:-80px;
			margin-bottom:10px;
		}
		.controlt
		{
			margin-left: 100px;
			margin-top:-100px;
			width:1300px;
			text-align:center;
			height:auto;
		}
		.controlt th
		{
			width:300px;
			height:100px;
		}
		.controlt td
		{
			height:100px;
		}
		.doro
		{
			margin-left:100px;
			width:1300px;
		}
		table caption
		{
			font-weight:bold;
			font-size:25px;
		}

	</style>
</head>
<body>
	<h1>Welcome Admin 
	<div class="riri"><a href="index.php?logout='1'"><button id="btn9" style="display:absolute; margin:-400px -100px  0px 100px;">Logout</button></a></div></h1>
	<p class="mainp">
			<span>T</span>he &nbsp;&nbsp;
			<span>D</span>igital &nbsp;&nbsp;
			<span>B</span>ank
	</p>
	<div class="admadm">
	<form method="post" action="admin.php">
		<input type="number" name="search" placeholder="Client Id"style="margin:25px;width:400px;height:80px;" class="iput2">
		<button type="submit" name="sea" class="btn" style="margin:25px;">Search</button>
	</form>
</div>
<br>
			<table id="tabsh" class="controlt">
				<caption>Main Information</caption>
					<tr>
						<th>Client ID</th>
						<th>Password</th>
						<th>Name</th>
						<th>Own Money</th>
						<th>Last Access errors</th>
					</tr>
				<?php //onclicking the search button
					$id = mysqli_real_escape_string($db,$_POST['search']);
					$query1 ="SELECT * FROM client WHERE id='$id'";
					// we will search for the information of the client depending on his id
					$result1 = mysqli_query($db, $query1);
					if(mysqli_num_rows($result1) > 0)
					{
						while ($row = $result1-> fetch_assoc())
						{
							{
							echo "<tr><td>" . $row["id"] . "</td><td>" . $row["password"] . "</td><td>" . $row["name"] . "</td><td>" . $row["money"] . "</td><td>" . $row["count"] . "</td></tr>";
							}
						}

						echo"</table>";
					}
				?><br/>
					<table id="tabsh" class="doro">
						<caption>Last Transactions Info</caption>
					<tr>
						<th>Transfer ID</th>
						<th>Client ID</th>
						<th>Type</th>
						<th>Amount</th>
						<th>Account</th>
						<th>Account/Card no</th>
						<th>Transfer Date</th>
					</tr>
				<?php
				$query11 ="SELECT * FROM transfer WHERE client_id='$id' ORDER BY transfer_id DESC LIMIT 5";
				$result11 = mysqli_query($db, $query11);
				if(mysqli_num_rows($result11) > 0)
				{
					while ($row = $result11-> fetch_assoc())
					{
						{
						echo "<tr><td>" . $row["transfer_id"] . "</td><td>" . $row["client_id"] . "</td><td>" . $row["type"] . "</td><td>" . $row["amount"] . "</td><td>" . $row["account"] . "</td><td>" . $row["acc_card_no"] . "</td><td>" . $row["tdate"] . "</td></tr>";
						}
					}
					echo"</table>";
				}
				?>

</body>
</html>