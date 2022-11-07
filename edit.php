<?php
  // including the database connection file
  include_once("config.php");

  if(isset($_POST['update']))
  {	

    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    
    $nim = mysqli_real_escape_string($mysqli, $_POST['nim']);
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $jk = mysqli_real_escape_string($mysqli, $_POST['jk']);	
    
    //updating the table
    $result = mysqli_query($mysqli, "UPDATE mahasiswa SET nim='$nim', nama='$nama', jk='$jk' WHERE id=$id");
      
    //redirectig to the display page. In our case, it is show.php
    header("Location: show.php");
  }
?>
<?php
  //getting id from url
  $id = $_GET['id'];

  //selecting data associated with this particular id
  $result = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE id=$id");

  while($res = mysqli_fetch_array($result))
  {
    $nim = $res['nim'];
    $nama = $res['nama'];
    $jk = $res['jk'];
  }
?>

<?php include_once('./include/header.php') ?>
  <form name="form" method="post" action="edit.php">
    <table border="0">
      <tr> 
        <td>
          NIM
        </td>
        <td>
          <input class="form-input" type="text" name="nim" value="<?php echo $nim;?>" required>
        </td>
      </tr>
      <tr> 
        <td>
          Nama
        </td>
        <td>
          <input class="form-input" type="text" name="nama" value="<?php echo $nama;?>" required>
        </td>
      </tr>
      <tr> 
        <td>
          JK
        </td>
        <td>
          <select name="jk" class="form-input" required>
            <option value="<?php echo $jk;?>">
              <?php echo $jk;?>
            </option>
            <?php 
              if ($jk == 'L') {
                echo "<option value='P'>P</option>";
              } else {
                echo "<option value='L'>L</option>";
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="no-border">
          <input type="hidden" name="id" class="btn" value=<?php echo $_GET['id'];?>>
        </td>
        <td class="no-border">
          <input type="submit" class="btn" name="update" value="Edit">
        </td>
      </tr>
    </table>
  </form>
<?php include_once('./include/footer.php'); ?>