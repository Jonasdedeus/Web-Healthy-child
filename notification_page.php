<title>Notification</title>
<link rel="shortcut icon" href="<?php echo base_url('assets/image/logo.png') ?>">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style type="text/css">
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
      <table class="table table-striped" id="table">
        <h2>Notifications</h2><br>
        <thead>
          <tr>
            <th>No</th>
            <th>Full Name</th>
            <th>Date of Appointment</th>
            <th>Description</th>
            <th>Message</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($data as $d) {?>
          <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $d->fullname?></td>
            <td><?php echo $d->doa?></td>
            <td><?php echo $d->description?></td>
            <td><?php echo $d->message?></td>
            <!--BUTTON Feedback-->
            <td><a type="button" class="btn btn-danger"  href="<?= base_url() ?>index.php/welcome/deletenotification/<?= $d->id ?>" ><i class="fas fa-user-times"></i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>
  </div>
</body>