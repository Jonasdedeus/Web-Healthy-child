<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patient Page</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/image/logo.png') ?>">
  <style type="text/css">
    *{
      margin:0;
      padding:0;
    }
    body{
    background: url('<?php echo base_url('assets/image/11.jpg')  ?>') no-repeat;
        background-position: center;
        background-size: cover;
        font-family: sans-serif;
        margin-bottom: 380px;
    }
  </style>

<body>
 <div class="container">
    <div class="box">      
      <u><center><h2>HISTORY</h2></center></u> 
      <form method="" action="<?= base_url() ?>index.php/welcome/deleteallhistory">               
      <table class="table table-striped" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Generic Name</th>
            <th>Strength</th>
            <th>form</th>
            <th>price</th>
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
            <td><a type="button" class="btn btn-danger"  href="<?= base_url() ?>index.php/welcome/deletehistory/<?= $d->id ?>" ><i class="fas fa-user-times"></i></a></td>
          <?php } ?>
          </tr>
          <tr>
            <?php
            $this->db->select('SUM(price) as total');
            $this->db->from('history');
            ?>
            <td colspan="4">Total:</td> 
            <td> Rp. <?php echo $this->db->get()->row()->total; ?> </td>
        </tr>
        </tbody>
      </table>
      <div class="modal-footer">
        <input  type="submit" class="btn btn-primary" id="hapus" value="Delete all history" placeholder="Simpan">
      </div>
    </form>
    </div>
  </div>
</body>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

