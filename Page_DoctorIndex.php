 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<style type="text/css">
  body{
        background-size: cover;
        background: url('<?php echo base_url('assets/image/11.jpg')  ?>') no-repeat;
        background-position: center;
        font-family: sans-serif;
        margin-bottom: 270px;
  }

  .bttn{
         width: 250px; 
        }
</style>

<!-- Optional theme -->

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <div class="container">
    <div class="box">           
      <table class="table table-striped" id="table">
        <h2>Appointment List</h2><br>
        <center><?= $this->session->flashdata('info'); ?></center>
        <thead>
          <tr>
            <th>No</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Date of BIrth</th>
            <th>Weight</th>
            <th>Date of Appointment</th>
            <th>Description</th>
            <th>Feedback</th>
            <th>Upload</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($data as $d) {?>
          <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $d->fullname?></td>
            <td><?php echo $d->gender?></td>
            <td><?php echo $d->dob?></td>
            <td><?php echo $d->weight?></td>
            <td><?php echo $d->doa?></td>
            <td><?php echo $d->description?></td>
            <!--BUTTON Feedback-->
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedback<?php echo $d->id ?>"><i class="material-icons" style="font-size:15px">&#xe87f;</i></button></td>
            <td><a href="<?php echo base_url('index.php/welcome/form') ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload<?php echo $d->id?>"><i class="fa fa-upload"></i></button></a></td>
            <td><a type="button" class="btn btn-danger"  href="<?= base_url() ?>index.php/welcome/deletecons/<?= $d->id ?>" ><i class="fas fa-user-times"></i></a></td>
          </tr>
          <?php } ?>
          <a href="<?= base_url() ?>index.php/welcome/deleteallcons"><button type="submit" class="btn btn-primary" id="hapus">Delete all</button></a> 
        </div>
    </div>
        </tbody>
      </table>
  </div>
  </body>

  <?php $no=1; foreach ($data as $d ) {?>
  <div class="modal fade" id="feedback<?php echo $d->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style=" background-color: #0009;
      color: white;">
        <div class="modal-header" >
        <center><h2> Feedback </h2></center>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= base_url() ?>index.php/welcome/feedbacks/<?php echo $d->id ?>"  enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="id" name="id" value="<?php echo $d->id ?>"  readonly>
        <div class="form-group">
          <label for="formGroupExampleInput">Full Name</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="fullname" name="fullname" value="<?php echo $d->fullname ?>" readonly >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Date of Appointment</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="doa" name="doa" value="<?php echo $d->doa ?>"readonly>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Description</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Description" name="description" value="<?php echo $d->description ?>" readonly>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Message</label>
          <textarea class="form-control" id="formGroupExampleInput2" cols="7" rows="3" placeholder="message..." name="message"required></textarea>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color: #000;">cancel</button>
        <input  type="submit" class="btn btn-primary" id="hapus" value="send" placeholder="Simpan">
        </div>
        </form>
      </div>
    </div>
  </div>

<?php } ?>
