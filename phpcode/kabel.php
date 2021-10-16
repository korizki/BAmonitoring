<?php
// Data Pemakaian Kabel
    $kabel13001 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3001' and KABEL = 'Kabel 3 x 35mm2'");
    $kabel23001 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3001' and KABEL = 'Kabel 3 x 50mm2'");
    $kabel33001 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3001' and KABEL = 'Kabel 3 x 70mm2'");
    $kabel43001 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3001' and KABEL = 'Kabel 3 x 95mm2'");

    $kabel13002 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3002' and KABEL = 'Kabel 3 x 35mm2'");
    $kabel23002 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3002' and KABEL = 'Kabel 3 x 50mm2'");
    $kabel33002 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3002' and KABEL = 'Kabel 3 x 70mm2'");
    $kabel43002 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3002' and KABEL = 'Kabel 3 x 95mm2'");

    $kabel13003 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3003' and KABEL = 'Kabel 3 x 35mm2'");
    $kabel23003 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3003' and KABEL = 'Kabel 3 x 50mm2'");
    $kabel33003 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3003' and KABEL = 'Kabel 3 x 70mm2'");
    $kabel43003 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3003' and KABEL = 'Kabel 3 x 95mm2'");

    $kabel13004 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3004' and KABEL = 'Kabel 3 x 35mm2'");
    $kabel23004 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3004' and KABEL = 'Kabel 3 x 50mm2'");
    $kabel33004 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3004' and KABEL = 'Kabel 3 x 70mm2'");
    $kabel43004 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3004' and KABEL = 'Kabel 3 x 95mm2'");

    $kabel13005 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3005' and KABEL = 'Kabel 3 x 35mm2'");
    $kabel23005 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3005' and KABEL = 'Kabel 3 x 50mm2'");
    $kabel33005 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3005' and KABEL = 'Kabel 3 x 70mm2'");
    $kabel43005 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3005' and KABEL = 'Kabel 3 x 95mm2'");

    $kabel13006 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3006' and KABEL = 'Kabel 3 x 35mm2'");
    $kabel23006 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3006' and KABEL = 'Kabel 3 x 50mm2'");
    $kabel33006 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3006' and KABEL = 'Kabel 3 x 70mm2'");
    $kabel43006 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3006' and KABEL = 'Kabel 3 x 95mm2'");

    $kabel13007 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3007' and KABEL = 'Kabel 3 x 35mm2'");
    $kabel23007 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3007' and KABEL = 'Kabel 3 x 50mm2'");
    $kabel33007 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3007' and KABEL = 'Kabel 3 x 70mm2'");
    $kabel43007 = mysqli_query($hostptba, "select PANJANG from T_KABEL where SHOVEL = 'SE-3007' and KABEL = 'Kabel 3 x 95mm2'");


    $pjgkabel13001 = mysqli_fetch_array($kabel13001)['PANJANG'];
    $pjgkabel23001 = mysqli_fetch_array($kabel23001)['PANJANG'];
    $pjgkabel33001 = mysqli_fetch_array($kabel33001)['PANJANG'];
    $pjgkabel43001 = mysqli_fetch_array($kabel43001)['PANJANG'];

    $pjgkabel13002 = mysqli_fetch_array($kabel13002)['PANJANG'];
    $pjgkabel23002 = mysqli_fetch_array($kabel23002)['PANJANG'];
    $pjgkabel33002 = mysqli_fetch_array($kabel33002)['PANJANG'];
    $pjgkabel43002 = mysqli_fetch_array($kabel43002)['PANJANG'];
    
    $pjgkabel13003 = mysqli_fetch_array($kabel13003)['PANJANG'];
    $pjgkabel23003 = mysqli_fetch_array($kabel23003)['PANJANG'];
    $pjgkabel33003 = mysqli_fetch_array($kabel33003)['PANJANG'];
    $pjgkabel43003 = mysqli_fetch_array($kabel43003)['PANJANG'];

    $pjgkabel13004 = mysqli_fetch_array($kabel13004)['PANJANG'];
    $pjgkabel23004 = mysqli_fetch_array($kabel23004)['PANJANG'];
    $pjgkabel33004 = mysqli_fetch_array($kabel33004)['PANJANG'];
    $pjgkabel43004 = mysqli_fetch_array($kabel43004)['PANJANG'];

    $pjgkabel13005 = mysqli_fetch_array($kabel13005)['PANJANG'];
    $pjgkabel23005 = mysqli_fetch_array($kabel23005)['PANJANG'];
    $pjgkabel33005 = mysqli_fetch_array($kabel33005)['PANJANG'];
    $pjgkabel43005 = mysqli_fetch_array($kabel43005)['PANJANG'];

    $pjgkabel13006 = mysqli_fetch_array($kabel13006)['PANJANG'];
    $pjgkabel23006 = mysqli_fetch_array($kabel23006)['PANJANG'];
    $pjgkabel33006 = mysqli_fetch_array($kabel33006)['PANJANG'];
    $pjgkabel43006 = mysqli_fetch_array($kabel43006)['PANJANG'];

    $pjgkabel13007 = mysqli_fetch_array($kabel13007)['PANJANG'];
    $pjgkabel23007 = mysqli_fetch_array($kabel23007)['PANJANG'];
    $pjgkabel33007 = mysqli_fetch_array($kabel33007)['PANJANG'];
    $pjgkabel43007 = mysqli_fetch_array($kabel43007)['PANJANG'];


    $data3001 = mysqli_query($hostptba, "select SUM(PANJANG) as SE3001 from T_KABEL where SHOVEL = 'SE-3001'");
    $data3002 = mysqli_query($hostptba, "select SUM(PANJANG) as SE3002 from T_KABEL where SHOVEL = 'SE-3002'");
    $data3003 = mysqli_query($hostptba, "select SUM(PANJANG) as SE3003 from T_KABEL where SHOVEL = 'SE-3003'");
    $data3004 = mysqli_query($hostptba, "select SUM(PANJANG) as SE3004 from T_KABEL where SHOVEL = 'SE-3004'");
    $data3005 = mysqli_query($hostptba, "select SUM(PANJANG) as SE3005 from T_KABEL where SHOVEL = 'SE-3005'");
    $data3006 = mysqli_query($hostptba, "select SUM(PANJANG) as SE3006 from T_KABEL where SHOVEL = 'SE-3006'");
    $data3007 = mysqli_query($hostptba, "select SUM(PANJANG) as SE3007 from T_KABEL where SHOVEL = 'SE-3007'");
    $totalSE3001 = mysqli_fetch_array($data3001)['SE3001'];
    $totalSE3002 = mysqli_fetch_array($data3002)['SE3002'];
    $totalSE3003 = mysqli_fetch_array($data3003)['SE3003'];
    $totalSE3004 = mysqli_fetch_array($data3004)['SE3004'];
    $totalSE3005 = mysqli_fetch_array($data3005)['SE3005'];
    $totalSE3006 = mysqli_fetch_array($data3006)['SE3006'];
    $totalSE3007 = mysqli_fetch_array($data3007)['SE3007'];
    $arr = array($totalSE3001, $totalSE3002, $totalSE3003, $totalSE3004, $totalSE3005, $totalSE3006, $totalSE3007);
    $max = max($arr);
    if ($max == $totalSE3001){
        $shovel = 'SE-3001';
    } else if ($max == $totalSE3002){
        $shovel = 'SE-3002';
    } else if ($max == $totalSE3003){
        $shovel = 'SE-3003';
    } else if ($max == $totalSE3004){
        $shovel = 'SE-3004';
    } else if ($max == $totalSE3005){
        $shovel = 'SE-3005';
    } else if ($max == $totalSE3006){
        $shovel = 'SE-3006';
    } else if ($max == $totalSE3007){
        $shovel = 'SE-3007';
    };

    // Data Unit
    $data_cru_ready = mysqli_query($hostptba, "select COUNT(NAMA_UNIT) as 'CRUREADY' from T_UNIT where NAMA_UNIT like 'CRU%' and KONDISI = 'Ready'");
    $data_cru_standby = mysqli_query($hostptba, "select COUNT(NAMA_UNIT) as 'CRUSTANDBY' from T_UNIT where NAMA_UNIT like 'CRU%' and KONDISI = 'Standby'");
    $data_cru_breakdown = mysqli_query($hostptba, "select COUNT(NAMA_UNIT) as 'CRUBREAKDOWN' from T_UNIT where NAMA_UNIT like 'CRU%' and KONDISI = 'Breakdown'");

    $data_ssu_ready = mysqli_query($hostptba, "select COUNT(NAMA_UNIT) as 'SSUREADY' from T_UNIT where NAMA_UNIT like 'SSU%' and KONDISI = 'Ready'");
    $data_ssu_standby = mysqli_query($hostptba, "select COUNT(NAMA_UNIT) as 'SSUSTANDBY' from T_UNIT where NAMA_UNIT like 'SSU%' and KONDISI = 'Standby'");
    $data_ssu_breakdown = mysqli_query($hostptba, "select COUNT(NAMA_UNIT) as 'SSUBREAKDOWN' from T_UNIT where NAMA_UNIT like 'SSU%' and KONDISI = 'Breakdown'");

    $data_tsu_ready = mysqli_query($hostptba, "select COUNT(NAMA_UNIT) as 'TSUREADY' from T_UNIT where NAMA_UNIT like 'TSU%' and KONDISI = 'Ready'");
    $data_tsu_standby = mysqli_query($hostptba, "select COUNT(NAMA_UNIT) as 'TSUSTANDBY' from T_UNIT where NAMA_UNIT like 'TSU%' and KONDISI = 'Standby'");
    $data_tsu_breakdown = mysqli_query($hostptba, "select COUNT(NAMA_UNIT) as 'TSUBREAKDOWN' from T_UNIT where NAMA_UNIT like 'TSU%' and KONDISI = 'Breakdown'");
  
    $cruready = mysqli_fetch_array($data_cru_ready)['CRUREADY'];
    $crustandby = mysqli_fetch_array($data_cru_standby)['CRUSTANDBY'];
    $crubreakdown = mysqli_fetch_array($data_cru_breakdown)['CRUBREAKDOWN'];

    $ssuready = mysqli_fetch_array($data_ssu_ready)['SSUREADY'];
    $ssustandby = mysqli_fetch_array($data_ssu_standby)['SSUSTANDBY'];
    $ssubreakdown = mysqli_fetch_array($data_ssu_breakdown)['SSUBREAKDOWN'];

    $tsuready = mysqli_fetch_array($data_tsu_ready)['TSUREADY'];
    $tsustandby = mysqli_fetch_array($data_tsu_standby)['TSUSTANDBY'];
    $tsubreakdown = mysqli_fetch_array($data_tsu_breakdown)['TSUBREAKDOWN'];

?>