<title>Edit Profile</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/image/logo.png') ?>">
  <style type="text/css">
   body{
        background-size: cover;
        background: url('<?php echo base_url('assets/image/11.jpg')  ?>') no-repeat;
        background-position: center;
        font-family: sans-serif;
        margin-bottom: -1190px;
  }
  .box{
    width: 600px;
    margin-left: 300px;
    
    color: white;
  }
</style>
<body>
  <?php $no=1; foreach ($data as $d )  {?>         
 <div class="container">
    <div class="box">
      <u><center><h2 style="color: black;">EDIT PROFILE</h2></center></u>
        <form method="post" action="<?= base_url() ?>index.php/welcome/editprofiles/<?php echo $d->id ?>"  enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="id" name="id" value="<?php echo $d->id ?>" required>
         <div class="form-group">
          <label for="formGroupExampleInput2">Password</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Form" name="pw" value="<?php echo $d->password ?>" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Full Name</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="fullname" name="fname" value="<?php echo $d->fullname ?>" required >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Email</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="email" name="useremail" value="<?php echo $d->email ?>"required>
        </div>
       <div class="form-group">
          <label for="formGroupExampleInput2">Phone</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="phone" name="userphone" value="<?php echo $d->phone?>" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Address</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="address" name="useraddress" value="<?php echo $d->address?>" required>
        </div>
        <div class="modal-footer">
          <a href="<?php echo base_url('index.php/welcome/pageMenu') ?>"><button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button></a>
        <input  type="submit" class="btn btn-primary" id="edit" value="Edit" placeholder="Simpan">
        </div>
        </form>   
      </div> 
    </div>   
    <?php } ?>

  </body>
      