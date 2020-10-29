<!DOCTYPE html>
<html>
<head>
	<title>Registration form</title>
	<link rel="shortcut icon" type="text/css" href="<?php echo base_url('assets/image/logo.png') ?>">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		body{
			background: url('<?php echo base_url('assets/image/12.jpg')  ?>') no-repeat;
			background-position: center;
			background-size: cover;
			font-family: sans-serif;
			margin-top:40px; 
		}
		.regform{
			width: 800px;
			background-color: #4caf50;
			margin: auto;
			color:#FFFFFF;
			padding: 10px 0px 10px 0px;
			text-align: center;
			border-radius: 15px 15px 0px 0px;
		}
		.main{
			background-color: rgb(0,0,0,0.5);
			width: 800px;
			margin: auto;
		}
		form{
			padding: 10px;
		}
		#name{
			width: 100%;
			height: 50px;
		}
		.name{
			margin-left: 25px;
			margin-top: 30px;
			width: 125px;
			color:white;
			font-size:18px;
			font-weight: 700; 
		}
		.firstname{
			position: relative;
			left: 200px;
			top:-37px;
			width: 250px;
			line-height: 40px;
			border-radius: 6px;
			padding: 0 22px;
			font-size: 16px; 
		}
		.Password{
			position: relative;
			left: 200px;
			top:-37px;
			line-height: 40px;
			border-radius: 6px;
			padding: 0 22px;
			font-size: 16px;
			margin-bottom:-10px; 
		}
		.Password1{
			position: relative;
			left: 100px;
			top:-37px;
			line-height: 40px;
			border-radius: 6px;
			padding: 0 22px;
			font-size: 16px;
			margin-bottom:-10px; 
		}
		.address{
			position: relative;
			left: 200px;
			top:-37px;
			width: 450px;
			line-height: 40px;
			border-radius: 6px;
			padding: 0 22px;
			font-size: 16px;
			margin-bottom:-10px; 
		}
		.email{
			position: relative;
			left: 200px;
			top:-37px;
			width: 250px;
			line-height: 40px;
			border-radius: 6px;
			padding: 0 22px;
			font-size: 16px; 
			margin-bottom:-10px; 
		}
		.phone{
			position: relative;
			left: 200px;
			top:-37px;
			width: 125px;
			line-height: 40px;
			border-radius: 6px;
			padding: 0 22px;
			font-size: 16px;
		}

		.btn{
			width: 780px;
			background-color: #4caf50;
			margin: auto;
			color:#FFFFFF;
			padding: 10px 0px 10px 0px;
			text-align: center;
			border-radius: 15px 15px 15px 15px;
			text-align: center;
		}

		.button{
			width: 20%;
			background:none;
			border:2px solid #4caf50;
			color:white;
			padding: 5px;
			font-size: 18px;
			cursor: pointer;
			margin: 12px 0;
		}
		.button:hover{
			background-color: #4caf50;
		}
	</style>
</head>
<body>
	<div class="regform"><h1>Registration Form</h1></div>
	<div class="main">
		<form action="<?php echo base_url(). 'index.php/welcome/register_user'; ?>" method="post">
			<?= $this->session->flashdata('email'); ?><?= $this->session->flashdata('pass'); ?>
			<div id="name">
				<h2 class="name">Fullname</h2>
				<input class= "firstname"type="text" name="fullname" placeholder="Full Name" required>
			</div>
			<h2 class="name">Password</h2>
			<input class="Password"type="Password" name="pw1" id="pw1" placeholder="new password"required><input type="checkbox"onclick="myFunction()" style="color: white;"><label style="color: white;">show password</label><input class="Password1"type="Password" name="pw2" id="pw2" placeholder="confirm password" required>
			<input type="checkbox" onclick="myFunction1()" style="color: white;"><label style="color: white;">show password</label>
			<h2 class="name">Address</h2>
			<input class="address"type="text" name="address" placeholder="Address" required>
			<h2 class="name">E-mail</h2>
			<input class="email"type="email" name="email" placeholder="E-mail" required>
			<label><h2 class="name">Phone</h2></label>
			<input class= "phone"type="Number" name="phone"placeholder="Phone" required>
			<center>
				<button class="button"type="submit" name="submit">Register</button>
				<p style="color: white">Already have account? Please <a href="<?php echo base_url(); ?>index.php/welcome/loginmenu" style = "color:blue">Login</a></p><button type="btn btn-danger"></button>
			</center>
		</form>
	</div>
</body>
<script>
function myFunction() {
  var x = document.getElementById("pw1");
  if (x.type === "password")  {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction1() {
  var y = document.getElementById("pw2")
  if (y.type === "password")  {
    y.type = "text";
  } else {
    y.type = "password";
  }
}
</script>
</html>
