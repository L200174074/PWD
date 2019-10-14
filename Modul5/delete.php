<?php 
	$conn = mysqli_connect('localhost', 'root', '', 'informatika');
	// mengambil data dari URL
	$nim = $_GET['NIM'];
	// aksi menghapus data
	$hapus = "DELETE FROM mahasiswa WHERE NIM='$nim'";
	$data = mysqli_query($conn, $hapus);

	if ($data > 0) {
		echo "
			<script>
				alert('data berhasil di hapus')
				document.location.href= 'form.php'
			</script>";
	}else{
		echo "
			<script>
				alert('data gagal dihapus')
				document.location.href= 'form.php'
			</script>
		";
	}
	
 ?>