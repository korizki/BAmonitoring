<div class="dMainContent datafield" id="dataProblem" style="padding-top: 40px">
    <div class="fdbox" style="border-left: 8px solid #30475e;">
      <h1>Manage Data Problem </h1>
        <div class="contProblemNav">
          <div>
            Search Problem  <input type="text" name="fieldcari" id="cari" class="searchInput"><a href="#" class="searchbtn"><i class="fa fa-search" style="margin-left: 6px"></i></a>
          </div>
          <div style="margin-right: 10px;">
            <form action="" method="post" name="sort">
              <select name="sort" id="sortProblem" style="margin-top: 0;" class="btnfilter" onChange="sortProblemData()">
                <option value="" disabled selected>Sort By <span class="fa fa-filter"></span></option>
                <option value="unit">Unit (A-Z)</option>
                <option value="location">Location (A-Z)</option>
                <option value="group">Group (A-Z)</option>
                <option value="duration">Duration (High to Low)</option>
              </select>
              <input id="load" type="submit" name="load" value="Load Data" style="display: none";>
            </form>
          </div>
          <div>
            <a class='add-button' onClick='showForm()'> <i class='fa fa-plus'></i>Add Problem</a>
          </div>
        </div>
    </div>
    <div class='fdbox fd2' style='padding: 30px; padding-top: 10px;'>
      <h1 style='margin-bottom: 10px;'>Last Updates Problems </h1>
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Power</th>
              <th class='hide'>Unit</th>
              <th>Location</th>
              <th class='hide'>Group</th>
              <th class='hide'>Start Time</th>
              <th class='hide'>End Time</th>
              <th>Duration</th>
              <th class='hide'>Detail</th>
              <th class='hide'>Action</th>
              <th style='width: 100px'>Act</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sorts = "";
              $batas = 10;
              $halaman = isset($_GET['halaman'])?(int)$_GET['halaman']: 1;
              $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
              $previous = $halaman - 1;
              $next = $halaman + 1;
              $no = 1;
              $data_all = mysqli_query($hostptba, "select * from T_HALANGAN order by START desc ");
              $jumlah_data = mysqli_num_rows($data_all);
              $total_halaman = ceil($jumlah_data / $batas);

              $data = mysqli_query($hostptba, "select * from T_HALANGAN order by START desc limit $halaman_awal, $batas ");
              
              // Eksekusi Sort Data
              if(isset($_POST['load'] )){
                $sorts = $_POST['sort']; 
                if ($sorts == "unit"){
                  $data = mysqli_query($hostptba, "select * from T_HALANGAN order by UNIT asc limit $halaman_awal, $batas");
                } else if ($sorts == "location"){
                  $data = mysqli_query($hostptba, "select * from T_HALANGAN order by LOKASI asc limit $halaman_awal, $batas");
                } else if ($sorts == "group"){
                  $data = mysqli_query($hostptba, "select * from T_HALANGAN order by GRUP asc limit $halaman_awal, $batas");
                } else if ($sorts == "duration"){
                  $data = mysqli_query($hostptba, "select * from T_HALANGAN order by TOTAL desc limit $halaman_awal, $batas");
                } else {
                  $data = mysqli_query($hostptba, "select * from T_HALANGAN limit $halaman_awal, $batas");
                }  
              }

              $nomor = $halaman_awal + 1;

              while ($tabel = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $tabel['POWER'] ?></td>
                    <td class='hide'><?php echo $tabel['UNIT'] ?></td>
                    <td><?php echo $tabel['LOKASI'] ?></td>
                    <td class='hide'><?php echo $tabel['GRUP'] ?></td>
                    <td class='hide'><?php echo $tabel['START'] ?></td>
                    <td class='hide'><?php echo $tabel['END'] ?></td>
                    <td><?php echo $tabel['TOTAL'] ?></td>
                    <td class='hide'><?php echo $tabel['PROBLEM'] ?></td>
                    <td class='hide'><?php echo $tabel['ACTION_PROBLEM'] ?></td>
                    <td><a href='../phpcode/update.php?id=<?php echo $tabel['ID']; ?>'><img title='Edit' class='dataact' src='../assets/edit.svg' ></a>
                    
                    <a href="../phpcode/hapus.php?id=<?php 
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
            <li> <a <?php if($halaman > 1){echo "href='?content=problem&halaman=$previous'";} ?>><i class="fa fa-angle-left" style="margin: 0"> </i></a></li>
            <?php 
              for ($x=1; $x <= $total_halaman; $x++){
                ?>
                  <li><a href = "?content=problem&halaman=<?php echo $x ?>"><?php echo $x?></a></li>
                <?php
              }
            ?>
            <li><a <?php if ($halaman < $total_halaman){ echo "href='?content=problem&halaman=$next'"; }?>><i class="fa fa-angle-right" style="margin: 0"></i></a></li>
          </div>
        </div>
    </div>
</div>