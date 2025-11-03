
<!DOCTYPE html>
<html>
<head>
	<title>Admin - Buku Tamu</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container mt-4">
		<h2>Data Buku Tamu</h2>
		
		<!-- Filter Form -->
		<form method="get" class="row g-3 mb-4">
			<div class="col-md-4">
				<label>Filter Tanggal:</label>
				<input type="date" name="date_filter" class="form-control" value="<?php echo $date_filter; ?>">
			</div>
			<div class="col-md-4">
				<button type="submit" class="btn btn-primary mt-4">Filter</button>
				<a href="<?php echo site_url('admin'); ?>" class="btn btn-secondary mt-4">Reset</a>
			</div>
		</form>

		<!-- Export Button -->
		<a href="<?php echo site_url('admin/export_csv'); ?>" class="btn btn-success mb-3">Export ke CSV</a>
		<a href="<?php echo site_url('guestbook'); ?>" class="btn btn-info mb-3">Kembali ke Form</a>

		<!-- Table -->
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Pesan</th>
					<th>Tanggal</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($guests)): ?>
					<?php foreach($guests as $guest): ?>
					<tr>
						<td><?php echo $guest->id; ?></td>
						<td><?php echo htmlspecialchars($guest->name); ?></td>
						<td><?php echo htmlspecialchars($guest->email); ?></td>
						<td><?php echo htmlspecialchars($guest->message); ?></td>
						<td><?php echo date('d-m-Y H:i', strtotime($guest->created_at)); ?></td>
					</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="5" class="text-center">Tidak ada data</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</body>
</html>