<!DOCTYPE html>
<html>
<head>
	<title>Consultation</title>
	<link rel="shortcut icon" type="text/css" href="<?php echo base_url('assets/image/logo.png') ?>">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		body{
			background: url('<?php echo base_url('assets/image/11.jpg')  ?>') no-repeat;
			background-position: center;
			background-size: cover;
			font-family: sans-serif;
			margin-top:100px; 
		}
		.regform{
			width: 800px;
			background-color: #000;
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
			margin-bottom: -5px;
		}
		#name{
			width: 100%;
			height: 50px;
		}
		.name{
			margin-left: 25px;
			margin-top: 4px;
			width: 125px;
			color:white;
			font-size:18px;
			font-weight: 700; 
		}
		.firstname{
			position: relative;
			left: 200px;
			top:-37px;
			width: 400px;
			line-height: 40px;
			border-radius: 6px;
			padding: 0 8px;
			font-size: 16px; 
		} 
		.date{
			position: relative;
			left: 200px;
			top:-37px;
			width: 135px;
			line-height: 40px;
			border-radius: 6px;
			padding: 0 5px;
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
			padding: 0 8px;
			font-size: 16px;
			margin-bottom:-18px; 
		}
		.email{
			position: relative;
			left: 200px;
			top:-37px;
			width: 250px;
			line-height: 40px;
			border-radius: 6px;
			padding: 0 8px;
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

		.bttn{
			width: 780px;
			background-color: #4caf50;
			margin: auto;
			color:#FFFFFF;
			padding: 10px 0px 10px 0px;
			text-align: center;
			border-radius: 15px 15px 15px 15px;
			text-align: center;
		}
		.btn{
			width: 20%;
			background:none;
			border:2px solid #4caf50;
			color:white;
			padding: 5px;
			font-size: 18px;
			cursor: pointer;
			margin: 0px 0;
		}
		.btn:hover{
			background-color: #4caf50;
		}
	</style>
	
</head>
	<body>
	<div class="regform"><h3>Patient Data</h3></div>
	<div class="main">
		<form action="<?php echo base_url(). 'index.php/welcome/consultation_patient'; ?>" method="post">
			<?= $this->session->flashdata('info'); ?>
			<div id="name">
				<h2 class="name">Fullname</h2>
				<input class= "firstname"type="text" name="fullname" required><br>
			</div>
			<h2 class="name">Gender</h2>
			<div class="address">
				<input type="radio" name="gender" value="male"required>
				  <label for="male">Male</label>
				  <input type="radio" id="female" name="gender" value="female"required>
				  <label for="female">Female</label><br>
			</div>
			<h2 class="name">Date of Births</h2>
			<input class="date"type="date" name="dob" required>
			<h2 class="name">Weight</h2>
			<input class="email"type="text" name="weight" required>
			<h2 class="name">Date of Appointment</h2>
			<input class="date"type="date" name="doa" required>
			<h2 class="name">Description of Diseases</h2>
			<textarea class="address" name="description" rows="3" cols="4" required></textarea><br>

			<center><a href="<?php echo base_url('index.php/welcome/pageMenu') ?>" class="btn">Back</a><button class="btn"type="submit">Submit</button></center>
		</form>
	</div>
	</body>
</html>