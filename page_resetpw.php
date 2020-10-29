<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
	<link rel="shortcut icon" type="text/css" href="<?php echo base_url('assets/image/logo.png') ?>">
	<style type="text/css">
		@import"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
		body{
			background-size: cover;
			background: url('<?php echo base_url('assets/image/12.jpg')  ?>') no-repeat;
		}

		.login-box{
			width: 280px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			color: white;
		}

		.login-box h1{
			float: left;
			font-size: 40px;
			border-bottom: 6px solid #4caf50;
			margin-bottom: 5px;
			padding: 13px 0
		}

		.textbox{
			width: 100%;
			overflow: hidden;
			font-size: 20px;
			padding: 8px 0;
			margin: 8px 0;
			border-bottom: 1px solid #4caf50;
		}

		.textbox i{
			width: 26px;
			float: left;
			text-align: center;
		}

		.textbox input{
			border:none;
			outline: none;
			background:none;
			color:white;
			font-size: 18px;
			width: 200px;
			float: left;
			margin: 0 20px;
		}

		.button{
			display: none;
			background-color: #ffffff;
			color: #000;
		}

		.bttn{
			width: 100%;
			background-color: #4caf50;
			margin: auto;
			color:#FFFFFF;
			padding: 10px 0px 10px 0px;
			text-align: center;
			border-radius: 5px 5px 5px 5px;
			text-align: center;
		}

		.btn{
			width: 100%;
			background:none;
			border:2px solid #4caf50;
			color:white;
			padding: 5px;
			font-size: 18px;
			cursor: pointer;
			margin: 12px 0;
		}
		.btn:hover{
			background-color: #4caf50;
		}
		u:hover{
			color:blue;
		}
	</style>
</head>
<body>
<div class="login-box">
	<form action="<?php echo base_url(). 'index.php/welcome/forgetpw'; ?>" method="post">
	<h2>RESET PASSWORD</h2>
	<?= $this->session->flashdata('info'); ?>
	<div class="textbox" >
		<i class="fa fa-user" aria-hidden="true"></i>
		<input type="text" placeholder = "E-mail" name="email" value="" required>
	</div>
	<div class="textbox">
		<i class="fa fa-lock" aria-hidden="true"></i>
		<input type="password" placeholder = "new password" id ="pw1"name="pw1" value="" required>
	</div>
	<div>
		<input type="checkbox" onclick="myFunction()"> show password
	</div>
	<div class="textbox">
		<i class="fa fa-lock" aria-hidden="true"></i>
		<input type="password" placeholder = "confirm password" id ="pw2"name="pw2" value="" required>
	</div>
		<input type="checkbox" onclick="myFunction1()"> show password
	<div><br>
		<input class ="bttn" type="submit" value="Reset"><a href="<?php echo base_url().'index.php/welcome/doctorpage'; ?>"></a></div><br>
		<a href="<?php echo base_url(); ?>index.php/welcome/loginMenu" style="color: white"><button type="button" class="bttn btn-primary" data-toggle="modal">Cancel</button><u></u></a>

	</form>
	
</div>
</body>
<script>
function myFunction() {
  var x = document.getElementById("pw1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction1() {
  var y = document.getElementById("pw2");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}
</script>
</html>