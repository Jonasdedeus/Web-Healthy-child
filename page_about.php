<style type="text/css">
	.ph{
		background-size: cover;
		background-color: #0009;
    margin-top: -22px;
	}

	h3{
		color:white;
		font-size: 12pt;
	}
	h1{
		color:white;
	}

	p{
		color:white;
	}
  * {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 250px;
  padding: 0 10px;
  margin-left: 20px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 300px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: -30px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #fff9;
}
</style>
<center>
  <div class="ph">
    	<h1>ABOUT US</h1><br>
    	<h3>           This is a highly globalized industry with an enormous positive influence on global health, prosperity and economic productivity.

      The pediatricians will see your child many times from birth to age 2 and once a year from ages 2 to 7. After age 7, your pediatrician will likely continue to see your child every year for annual checkups. They are also the first person to call whenever your child is sick.
      Furthermore, we are avaible to communicate about the examination may be with a hospital pediatrician or your chosen pediatrician, at anytime related to your appointment schedule.</h3>
    <!-- <h2>Card</h2> -->
    <div class="row">
      <div class="column">
        <div class="card">
        	<img src="<?php echo base_url('assets/images/armando.jpg') ?> "style="width:100px">
          <h4><b>Armando Jacquis Zamelina</b></h4>
        	<h4><b>1301183626</b></h4>     
        	<p>Web Programmer</p>
        </div>
      </div>
      <div class="column">
        <div class="card">
        	<img src="<?php echo base_url('assets/images/hasna.jpg') ?> "style="width:100px">
          <h4><b>Hasna Fadhilah Hasya</b></h4>
    		  <h4><b>1301164594</b></h4>     
        	<p>DATABASE ADMINISTRATOR</p>
        </div>
      </div>
      <div class="column">
        <div class="card">
        	<img src="<?php echo base_url('assets/images/inacio.jpg') ?> "style="width:100px">
          	<h4><b>Inacio Campos</b></h4>
       		<h4><b>1301183625</b></h4>     
        	<p>WEB CONTENT MANAGEMENT</p>
        </div>
      </div>
      <div class="column">
        <div class="card">
        	<img src="<?php echo base_url('assets/images/jonas.jpg') ?> "style="width:100px">
          	<h4><b>Jonas de Deus Guterres</b></h4>
       		<h4><b>1301183615</b></h4>     
        	<p>WEB DEVELOPER</p>
        </div>
      </div>
      <div class="column">
        <div class="card">
        	<img src="<?php echo base_url('assets/images/rikbal.jpg') ?> "style="width:100px">
          	<h4><b>Muhammad Rikbal Ikhsani</b></h4>
        	<h4><b>1301163598</b></h4>     
        	<p>WEB DESIGNER</p>
        </div>
      </div>
     </div>
     <h1>Contact Us</h1>
     <h5 style="color: white;">Email: healthychild@gmail.com</h5>
     <h5 style="color: white;">Phone: 082215561997</h5>
     <p class="copy"><?php echo "<p>Copyright &copy;" . date("Y") . " healthycild.com</p>";?></p><br>
  </div>
</center>
