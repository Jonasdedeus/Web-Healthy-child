 <title>Pharmacy Doctor</title>
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
 <div class="container">
    <div class="box">
      <center><h2>Medicine Data</h2></center>           
      <br><br>
      <table class="table table-bordered" id="table">
         <thead>
          <tr>
            <th>No</th>
            <th>Generic Name</th>
            <th>Strength</th>
            <th>form</th>
            <th>price</th>
            <th>Edit</th>
            <th>Delete</th>
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
            <!--BUTTON EDIT-->
            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $d->id ?>"><i class="fas fa-user-edit"></i></button></td>
            <!-- BUTTON DELETE -->
            <td><a type="button" class="btn btn-danger"  href="<?= base_url() ?>index.php/welcome/deletemedicine/<?= $d->id ?>" onClick="return confirm('Confirm?')" ><i class="fas fa-user-times"></i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">ADD MEDICINE</button>
    </div>
  </div> 
 

<!-- ADD MEDICINE MODAL-->

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style=" background-color: #0009;
      color: white;">
      <div class="modal-header">
      <center><h2>ADD MEDICINE</h2></center>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url() ?>index.php/welcome/addmedicine/<?php echo $d->id ?>"  enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="id" name="id" required>
        <div class="form-group">
          <label for="formGroupExampleInput">Generic Name</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="generic_name" name="genericname" required >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Strength</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="strength" name="strength"required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Form</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Form" name="form" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Price</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Price" name="price" required>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"  style="color: black";>Back</button>
        <input  type="submit" class="btn btn-primary" id="hapus" value="Add" placeholder="Simpan">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- EDIT MEDICINE MODAL-->

<?php $no=1; foreach ($data as $d ) {?>
  <div class="modal fade" id="edit<?php echo $d->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style=" background-color: #0009;
      color: white;">
        <div class="modal-header">
        <center><h2>EDIT MEDICINE </h2></center>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= base_url() ?>index.php/welcome/editmedicine/<?php echo $d->id ?>"  enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="id" name="id" value="<?php echo $d->id ?>"  required>
        <div class="form-group">
          <label for="formGroupExampleInput">Generic Name</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="generic_name" name="genericname" value="<?php echo $d->generic_name ?>" required >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Strength</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="strength" name="strength" value="<?php echo $d->strength ?>"required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Form</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Form" name="form" value="<?php echo $d->form ?>" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Price</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Price" name="price" value="<?php echo $d->price?>" required>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color: black;">Back</button>
        <input  type="submit" class="btn btn-primary" id="hapus" value="Edit" placeholder="Simpan">
        </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>

</body>
<script type="text/javascript">
  $(document).ready( function () {
    $('#table').DataTable();
} );
</script>
</html>
