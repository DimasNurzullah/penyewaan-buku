<?php
	include_once ('koneksi.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Read Sewa</title>
</head>
<body>
	<a href="FormSewa.php">Tambah Sewa </a>
	<table border="1px">
		<tr>
			<th>No</th>
			<th>Judul Buku</th>
			<th>Nama Penyewa</th>
			<th>Tanggal Sewa</th>
			<th>Durasi</th>
			<th>Tanggal Selesai</th>
			<th>Action</th>
		</tr>
		<?php
			$no=1;
			$query=mysqli_query($koneksi,"SELECT * FROM sewa");
			while($row=mysqli_fetch_array($query)){
				$tanggal_selesai=date('y-m-d',strtotime($row['tanggal_sewa']."+ $row[durasi] days"));
			echo "<tr>";
				echo "<td>$no</td>";
				echo "<td>$row[judul]</td>";
				echo "<td>$row[penyewa]</td>";
				echo "<td>$row[tanggal_sewa]</td>";
				echo "<td>$row[durasi]</td>";
				echo "<td>$tanggal_selesai</td>";
				echo "<td><a href='FormEditSewa.php?id=$row[id]'>Edit</a></td>";
				echo "<td><a href='deleteSewa.php?id=$row[id]'>Delete</a></td>";
				$no++;
		}
		?>
	</table>
</body>
</html>