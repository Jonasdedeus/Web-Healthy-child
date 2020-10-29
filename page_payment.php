<title>Payment</title>
<link rel="shortcut icon" href="<?php echo base_url('assets/image/logo.png') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
   body{
        background-size: cover;
        background: url('<?php echo base_url('assets/image/11.jpg')  ?>') no-repeat;
        background-position: center;
        font-family: sans-serif;
        margin-bottom: 0px;

  }
  .box{
     background-color: #0009;
      color: white;
  }

  h3{
    color: white;
    text-align: center;
  }
</style>
<body>
<?= $this->session->flashdata('info'); ?>
<div class="container" style="width: 500px">
    <div class="box">  
    <?= $this->session->flashdata('info'); ?>         
          <h3>PAYMENT</h3>
      <hr />
      <form action="<?= base_url() ?>index.php/welcome/deleteallorder" method="post">
      <center>
        <h3><b>Total price Rp.<?php
          $this->db->select('SUM(price) as total');
          $this->db->from('orderpharmacie');
          echo $this->db->get()->row()->total;?></b></h3>
      <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy; font-size: 36px;"></i>
              <i class="fa fa-cc-amex" style="color:blue; font-size: 36px;"></i>
              <i class="fa fa-cc-mastercard" style="color:red; font-size: 36px;"></i>
              <i class="fa fa-cc-discover" style="color:orange; font-size: 36px;"></i>
            </div>
      </center>
        <div class="form-group">
          <label for="fullname">Name on card</label>
          <input type="text" class ="form-control"name="fullname" value="<?= set_value('fullname'); ?>" id="fullname"required>
        </div>
        <div class="form-group">
          <label for="numb">Credit card Number</label>
          <input type="Number" class ="form-control" name="numb" id="numb" required><?=set_value('dos');?>
        </div>
        <div class ="form-group">
          <label for="Month">Expire Month</label>
          <input type="text" class ="form-control" name="Month"  id="Month" required>
        </div>
        <div class="form-group">
          <label for="Year">Exp Year</label>
          <input type="Number" class ="form-control" name="Year" id="Year" min="2020" max="2030" required>
          <label for="cvv">CVV</label>
          <input type="Number" class ="form-control" name="cvv"  id="cvv" required>
        </div>
        <a href="<?= base_url() ?>index.php/welcome/orderpharmacie"><button type="button" class="btn btn-secondary" data-toggle="modal">Cancel</button></a><!-- <a href="<?= base_url() ?>index.php/welcome/deleteallorder">-- --><button type="submit" class="btn btn-primary" data-toggle="modal">Checkout</button></a>
        </form>
    </div>
</div>
<center>
<p><?php echo "<p>Copyright &copy;" . date("Y") . " healthycild.com</p>"; ?>
  </p>
  </center>
</body>
