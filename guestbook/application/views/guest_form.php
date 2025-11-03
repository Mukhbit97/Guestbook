
<!DOCTYPE html>
<html>
<head>
	<title>Buku Tamu</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		.container { max-width: 600px; margin-top: 50px; }
		.alert { margin-top: 20px; }
	</style>
</head>
<body>
	<div class="container">
		<h2 class="text-center">Buku Tamu</h2>
		
		<?php if($this->session->flashdata('success')): ?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata('success'); ?>
			</div>
		<?php endif; ?>

		<form method="post" action="<?php echo site_url('guestbook'); ?>">
			<div class="mb-3">
				<label class="form-label">Nama *</label>
				<input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>">
				<?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="mb-3">
				<label class="form-label">Email *</label>
				<input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>">
				<?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
			</div>

			<div class="mb-3">
				<label class="form-label">Pesan *</label>
				<textarea class="form-control" name="message" rows="5"><?php echo set_value('message'); ?></textarea>
				<?php echo form_error('message', '<div class="text-danger">', '</div>'); ?>
			</div>

			<button type="submit" class="btn btn-primary">Kirim Pesan</button>
			<a href="<?php echo site_url('admin'); ?>" class="btn btn-secondary">Lihat Buku Tamu (Admin)</a>
		</form>
	</div>
</body>
</html>