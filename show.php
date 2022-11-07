<?php include 'config.php'; ?>
<?php include_once('./include/header.php') ?>
  <table>
    <thead>
      <th>Nim</th>
      <th>Nama</th>
      <th>JK</th>
      <th>Edit</th>
      <th>Hapus</th>
    </thead>
    <tbody>
      <?php 
        $limit = 2;
        $page = isset($_GET['page'])?(int)$_GET['page'] : 1;
        $page_first = ($page>1) ? ($page * $limit) - $limit : 0;	
    
        $previous = $page - 1;
        $next = $page + 1;
            
        $data = mysqli_query($mysqli,"SELECT * FROM mahasiswa");
        $total_data = mysqli_num_rows($data);
        $total_page = ceil($total_data / $limit);
    
        $mahasiswa = mysqli_query($mysqli,"SELECT * FROM mahasiswa limit $page_first, $limit");
        $number = $page_first+1;

        if ($total_data <= 0) {
          echo "
              <tr >
              <td colspan='5' class='text-center'>Data mahasiswa kosong</td> 
            </tr>";
          }
            
        while($mhs = mysqli_fetch_array($mahasiswa)){
          ?>
            <tr>
              <td class="text-center">
                <?php echo $mhs['nim']; ?>
              </td>
              <td>
                <?php echo $mhs['nama']; ?>
              </td>
              <td class="text-center">
                <?php echo $mhs['jk']; ?>
              </td>
              <td>
                <a href="edit.php?id=<?php echo $mhs['id']; ?>">
                  Edit Data
                </a>
              </td>
              <td>
                <a href="delete.php?id=<?php echo $mhs['id']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                  Hapus Data
                </a>
              </td>
            </tr>
          <?php
        }
      ?>
    </tbody>
  </table>

  <div class="paginations">
    <ul>
        <?php 
          for($i = 1; $i <= $total_page; $i++){
              ?> 
              <li>
                <a href="?page=<?php echo $i ?>"><?php echo $i; ?></a>
              </li>
            <?php
          }
        ?>	
    </ul>
  </div>
<?php include_once('./include/footer.php'); ?>