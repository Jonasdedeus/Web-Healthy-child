<title>Parmachy</title>
<link rel="shortcut icon" href="<?php echo base_url('assets/image/logo.png') ?>">
<style type="text/css">
  body{
    background: url('<?php echo base_url('assets/image/11.jpg')  ?>') no-repeat;
    background-position: center;
    background-size: cover;
    font-family: sans-serif;
    margin-top:100px; 
  }

  #table td{
    background-color: #0009;
  }
  .box{
    margin-top: -30px;
    background-color: #0009;
    color:white;
  }

  tbody{
    background-color: #0009;
  }
 </style>
 <body>
 <div class="container">
    <div class="box">
      <u><center><h2>MEDICINE LIST</h2></center></u>  
      <center><?= $this->session->flashdata('msg');?></center>    
      <a href="<?= base_url() ?>index.php/welcome/orderpharmacie"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahjurusan">View Basket Order</button></a>
      <br><br>
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Generic Name</th>
            <th>Strength</th>
            <th>form</th>
            <th>price</th>
            <th>Order</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($data as $d )  {?>
          <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $d->generic_name?></td>
            <td><?php echo $d->strength ?></td>
            <td><?php echo $d->form ?></td>
            <td>Rp.<?php echo $d->price ?></td>
            <!--BUTTON ORDER-->
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#order<?= $d->id ?>"><i class="fab fa-cc-visa"></i></button></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div> 
 
<!-- Modal Order Medicine-->

<?php $no=1; foreach ($data as $d ) {?>
  <div class="modal fade" id="order<?php echo $d->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <center><h2>BASKET </h2></center>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= base_url() ?>index.php/welcome/addorder/<?php echo $d->id ?>"  enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="id" name="id" value="<?php echo $d->id ?>"  readonly>
        <div class="form-group">
          <label for="formGroupExampleInput">Generic Name</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="generic_name" name="genericname" value="<?php echo $d->generic_name ?>" readonly >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Strength</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="strength" name="strength" value="<?php echo $d->strength ?>"readonly>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Form</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Form" name="form" value="<?php echo $d->form ?>" readonly>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Price</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Price" name="price" value="<?php echo $d->price?>" readonly>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
        <input  type="submit" class="btn btn-primary" id="hapus" value="Add" placeholder="Simpan">
        </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>

<!-- Modal view Basket-->

</body>
<script type="text/javascript">
  $(document).ready( function () {
    $('#table').DataTable();
} );
</script>
</html>
