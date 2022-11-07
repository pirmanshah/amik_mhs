<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['add']))
{	
	$nim = mysqli_real_escape_string($mysqli, $_POST['nim']);
	$nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
	$jk = mysqli_real_escape_string($mysqli, $_POST['jk']);	
	
	// checking empty fields
	if(empty($nim) || empty($nama) || empty($jk)) {	
			
		if(empty($nim)) {
			echo "<font color='red'>NIM field is empty.</font><br/>";
		}
		
		if(empty($nama)) {
			echo "<font color='red'>Nama field is empty.</font><br/>";
		}
		
		if(empty($jk)) {
			echo "<font color='red'>JK field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "INSERT INTO mahasiswa(nim, nama, jk) VALUES('$nim', '$nama', '$jk')");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: show.php");
	}
}
?>

<?php include_once('./include/header.php') ?>
  <form name="form" method="post" action="add.php">
    <table border="0">
      <tr> 
        <td>NIM</td>
        <td><input class="form-input" type="text" name="nim" required></td>
      </tr>
      <tr> 
        <td>Nama</td>
        <td><input class="form-input" type="text" name="nama" required></td>
      </tr>
      <tr> 
        <td>JK</td>
        <td>
          <select name="jk" class="form-input" required>
            <option value="L">L</option>
            <option value="P">P</option>
          </select>
        </td>
      </tr>
      <tr>
        <td class="no-border"><input type="submit" class="btn" name="add" value="Tambah"></td>
      </tr>
    </table>
  </form>
<?php include_once('./include/footer.php'); ?>