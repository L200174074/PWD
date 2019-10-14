<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Data Mahasiswa Document</title>
</head>
<?php
	$conn = mysqli_connect('localhost','root','','informatika');
	$nim = $_GET['NIM'];
	$cari = "SELECT * FROM mahasiswa WHERE NIM ='$nim'";
	$hasil_cari = mysqli_query($conn, $cari);
	$data = mysqli_fetch_array($hasil_cari);
	
	function active_radio_button($value, $input){
		$result = $value == $input? 'checked':'';
		return $result;
	}
	if($data > 0){
	
		
?>
<body>
	<h3>FORM MAHASISWA</h3>
	<table>
		<form method="POST" action="update.php">
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><input type="text" name="nim" size="10" value="<?= $data['NIM']?>"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" size="30" value="<?= $data['Nama']?>"></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td><input type="radio" name="kelas" value="A" <?php
					   echo active_radio_button('A',$data['Kelas'])?>>A
				<input type="radio" name="kelas" value="B" <?php
					   echo active_radio_button('B',$data['Kelas'])?>>B
				<input type="radio" name="kelas" value="C" <?php
					   echo active_radio_button('C',$data['Kelas'])?>>C
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><input type="text" name="alamat" size="40" value="<?= $data['Alamat']?>"></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="UPDATE DATA"</td>	
		</tr>
		</form>	
	</table>
<?php
}
?>
	<?php
		error_reporting(E_ALL ^ E_NOTICE);
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$kelas = $_POST['kelas'];
		$alamat = $_POST['alamat'];
		$submit = $_POST['submit'];
		$update = "UPDATE mahasiswa set NIM = '$nim', Nama = '$nama', Kelas = '$kelas', Alamat = '$alamat' WHERE NIM = '$nim'";
		if($submit){
			if($nim=''){
				echo "NIM tidak boleh kosong";
			}elseif($nama=''){
				echo "Nama tidak boleh kosong";
			}elseif($alamat=''){
				echo "Alamat tidak boleh kosong";
			}else{
				mysqli_query($conn,$update);
				echo " <a href='http://localhost/l200174074/Modul_5/form.php'>Click here to view result</a>";
			}
		}
	?>
</body>
</html>