<div class="dMainContent datafield" id="dataProblem" style="padding-top: 40px">
    <div class="fdbox" style="border-left: 8px solid #30475e;">
      <h1>Manage Data Unit</h1>
        <div class="contProblemNav">
          <div>
            Search Unit  <input type="text" name="fieldcari" id="cari" class="searchInput"><a href="#" class="searchbtn"><i class="fa fa-search" style="margin-left: 6px"></i></a>
          </div>
          <div>
            <a href="#" class='searchbtn' style="padding: 10px 15px;" onClick="showFilterMenu()"> Filter By <i class="fa fa-filter"></i></a>
            <div class="filterMenu">
              <ul>
                <li><a href="#">Unit Name</a></li>
                <li><a href="#">Location</a></li>
                <li><a href="#">Condition</a></li>
                <li><a href="#">Lane</a></li>
              </ul>
            </div>
          </div>
          <div>
            <a class='add-button' onClick='showForm()'> <i class='fa fa-plus'></i>Add Unit</a>
          </div>
        </div>
    </div>
    <div class='fdbox fd2' style='padding: 30px; padding-top: 10px;'>
      <h1 style='margin-bottom: 10px;'>Last Updates Unit </h1>
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Unit Name</th>
              <th>Location</th>
              <th>Condition</th>
              <th>Lane</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $batas = 10;
              $halaman = isset($_GET['halaman'])?(int)$_GET['halaman']: 1;
              $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
              $previous = $halaman - 1;
              $next = $halaman + 1;
              $no = 1;
              $data_all = mysqli_query($hostptba, "select * from T_UNIT order by NAMA_UNIT asc ");
              $jumlah_data = mysqli_num_rows($data_all);
              $total_halaman = ceil($jumlah_data / $batas);

              $data = mysqli_query($hostptba, "select * from T_UNIT order by NAMA_UNIT asc limit $halaman_awal, $batas ");
              $nomor = $halaman_awal + 1;

              while ($tabel = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $tabel['NAMA_UNIT'] ?></td>
                    <td><?php echo $tabel['LOKASI'] ?></td>
                    <td><?php echo $tabel['KONDISI'] ?></td>
                    <td><?php echo $tabel['JALUR'] ?></td>
                    <td><a href='../../phpcode/update.php?id=<?php echo $tabel['ID']; ?>'><img title='Edit' class='dataact' src='../assets/edit.svg' ></a>
                    
                    <a href="../../phpcode/hapus.php?id=<?php 
                      echo $tabel['ID'];
                    ?>" > 
                    <img title='Delete' onClick="return confirm('Are you sure delete the data?')" class='dataact' src='../assets/trash.svg'></a>
                    </td>
                  </tr>
                  <?php
              }
            ?>
          </tbody>
        </table>
        <!-- Panel Pages Bar -->
        <div>
          <div class='pageNumber'>
            <li> <a <?php if($halaman > 1){echo "href='?halaman=$previous'";} ?>><i class="fa fa-angle-left" style="margin: 0"> </i></a></li>
            <?php 
              for ($x=1; $x <= $total_halaman; $x++){
                ?>
                  <li><a href = "?halaman=<?php echo $x ?>"><?php echo $x?></a></li>
                <?php
              }
            ?>
            <li><a <?php if ($halaman < $total_halaman){ echo "href='?halaman=$next'"; }?>><i class="fa fa-angle-right" style="margin: 0"></i></a></li>
          </div>
        </div>
    </div>
</div>
