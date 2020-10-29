<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patient Page</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/image/logo.png') ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
  <title>Order Page</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/image/logo.png') ?>">
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
        margin-bottom: 200px;
  }
  </style>
</head>
<body>
 <div class="container">
    <div class="box">
    <?= $this->session->flashdata('info'); ?>      
      <u><center><h2>ALL ITEMS</h2></center></u> 
      <form method="" action="<?= base_url() ?>index.php/welcome/checkOrder">               
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
            <td><a type="button" class="btn btn-danger"  href="<?= base_url() ?>index.php/welcome/deleteorder/<?= $d->id ?>" ><i class="fas fa-user-times"></i></a></td>
          <?php } ?>
          </tr>
          <tr>
            <?php
            $this->db->select('SUM(price) as total');
            $this->db->from('orderpharmacie');
            ?>
            <td colspan="4">Total:</td> 
            <td> Rp. <?php echo $this->db->get()->row()->total; ?> </td>
        </tr>
        </tbody>
      </table>
      <div class="modal-footer">
          <a href="<?=base_url()?>index.php/welcome/pharmacy"><button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button></a>
        <input  type="submit" class="btn btn-primary" id="hapus" value="Confirm" placeholder="Simpan">
    </div>
    </form>
    </div>
  </div>
</body>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

