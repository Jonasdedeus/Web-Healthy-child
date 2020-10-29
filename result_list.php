 <title>Result</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/image/logo.png') ?>">  
  <style type="text/css">
	  body{
	  background: url('<?php echo base_url('assets/image/11.jpg')  ?>') no-repeat;
	      background-position: center;
	      background-size: cover;
	      font-family: sans-serif;
	      margin-bottom: 380px;
	}
	.box{
		width: 800px;
		background-color: #0009;
		color: white;
	}
</style>
<center>
	<body>
	 <div class="container">
	    <div class="box">           
	    <h2>Result</h2>
	  	<?php if(count($result_list)){?>
		<table class="table table-bordered">
			<thead>
			  <tr>
			  	<th>No</th>
				<th>Full Name</th>
				<th>Date of Submission</th>
				<th>File</th>
			  </tr>
			</thead>
			<tbody>
			<?php $no=1; foreach ($result_list as $file): ?>
			  <tr>
			  	<td><?php echo $no++?></td>
				<td><?=$file->fullname;?></td>
				<td><?=$file->dos;?></td>
				<td><a href="<?=base_url().'assets/uploads/'.$file->file;?>" target="_blank"><?php echo $file->file;?></a></td>
				<td><a type="button" class="btn btn-danger"  href="<?= base_url() ?>index.php/welcome/deleteresult/<?= $file->id ?>" ><i class="fas fa-user-times"></i></a></td>
			  </tr>
			<?php endforeach ?>
			</tbody>
		</table>
		<div class="modal-footer">
	       <a href="<?= base_url() ?>index.php/welcome/deleteallresult"><button type="submit" class="btn btn-primary" id="hapus">Delete all Result</button></a> 
	    </div>
		<br />
	  <?php } ?>

	  </div>
	 </div>
	</body>
</center>