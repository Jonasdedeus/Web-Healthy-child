<title>Upload Result</title>
<link rel="shortcut icon" href="<?php echo base_url('assets/image/logo.png') ?>">
<style type="text/css">
   body{
        background-size: cover;
        background: url('<?php echo base_url('assets/image/11.jpg')  ?>') no-repeat;
        background-position: center;
        font-family: sans-serif;
        margin-bottom: 270px;

  }
  .box{
     background-color: #0009;
      color: white;
  }
</style>
<body>
<div class="container" style="width: 500px">
    <div class="box">  
    <?= $this->session->flashdata('info'); ?>         
          <h3>Upload a File!</h3>
      <hr />
      <div style="color:red">
        <?php echo validation_errors(); ?>
        <?php if(isset($error)){print $error;}?>
      </div>
      <?php echo form_open_multipart('welcome/checkpatient');?>
        <div class="form-group">
          <label for="fullname">fullname</label>
          <input type="text" class="form-control" name="fullname" value="<?= set_value('fullname'); ?>" id="fullname"required>
        </div>
        <div class="form-group">
          <label for="dos">Date of Submission</label>
          <input type="date" name="dos" class="form-control"id="dos" required><?=set_value('dos');?>
        </div>
        <div class="form-group">
          <label for="file">Select File</label>
          <input type="file" name="file" class="form-control"  id="file" required>
        </div>
        <a href="<?php echo base_url('index.php/welcome/doctorpage') ?>" class="btn btn-warning" >Back</a>
        <button type="submit" class="btn btn-success">Submit</button>      
    </div>
</div>
</body>