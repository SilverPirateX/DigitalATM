<?php include("server.php"); 
//including the php main file which works as a server
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="ATM Banking Service" content="Welcome to the safest Banking service in Africa">
	<title> ATM </title>
	<link rel="stylesheet" href="atm.css">
	<link rel="stylesheet" href="client2.css">
	<link rel="stylesheet" href="error.css">
</head>
<body>
	<h1>Digital Bank ATM</h1>
	<div class="container">
		<p class="mainp">
			<span>T</span>he &nbsp;&nbsp;
			<span>D</span>igital &nbsp;&nbsp;
			<span>B</span>ank <br/>
			<?php /*if there is any login/access errors we save the error at an array 'errors' and we print 
			its elements on clicking on the submitting button without accessing the bank account*/ ?>
			<?php if(count($errors) > 0): ?>
						<div class="error3">
							<?php foreach ($errors as $error): ?>
								<p><?php echo $error; ?></p>
							<?php endforeach ?>
						
					<?php endif ?>
						</div>
			<p class="thinfont">
			Banking on the go ...<br/>
			Do your banking works anytime, anywhere<br/>
			with our digital banking services.
			</p>
		</p>
		<form method="post" action="index.php">
					<?php //the data we enter here are all checked and compared with the data base values as will be shown at the server file ?>
			<div class="inputsf" id="sys" >
			<input name="id" type="number" maxlength="10" class="inp" placeholder="Account No"/>
			<input name="pass" type="password" maxlength="10" class="inp" placeholder="Password"/><br/>
			<button name="sub" type="submit" class="btn" >Access</button>
			</div>
		</form>
			
	</div>
	
</body>
</html>