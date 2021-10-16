<header>
  <div class='top-right'>
    <div>
      <h1 >Monitoring Activities will be Easier, </h1>
      <p>We provide a service to help you choose your best plans. With graph's, all data are easier to understand.  </p>
      <a href='#data' class='startBtn'>Get Started <i class='fa fa-chevron-right' style='margin-left: 5px;'></i></a>
    </div>
  </div>
  <img alt='gambar illustrasi' src='assets/illusmins.png' style='auto;' >
</header>
<section class='sectionbox' id='benefit'>
  <h1>Benefit from Us</h1>
  <div class='flex'>
    <div class='content1'>
      <img src='assets/secure.png'>
      <p>We make sure, that all of your data will be secure with Our Security System that always updated.</p>
    </div>
    <div class='content1'>
      <img src='assets/speed.png'>
      <p>Don't worry for waste your time, we execute your request as soon as possible.</p>
    </div>
    <div class='content1'>
      <img src='assets/time.png'>
      <p>Our service will serve you in 24/7 hour's. Just make a ticket, and we'll help you. </p>
    </div>
  </div>
</section>
<section id='data' class='sectionbox full' >
  <h1>Choose Your Data</h1>
  <div class='flex con2'>
    <img src='assets/electrician.png'>
    <div class='con2-caption'>
      <h1>Electrical Maintenance</h1>
      <p>This page contains a few of Electrical Data like   Electrical Problem's, Preventif and Timesheet, All of Electrical Unit, Wire Usage, and Single Line Wiring. First, you need to filter data with select Start and End Date.</p>
      <div>
        <form action='pages/listrik.php' method='get' target='blank'>
          <div class='datebutton'>
              <p><label for='tawal'>Start</label> 
              <input class='listMonth' name='tawal' id='tawal' type='date' value='<?php echo $tawal?>' ></input>
              <label for='takhir'>End</label> 
              <input class='listMonth' name='takhir' id='takhir' type='date' value='<?php echo $takhir?>'></input>
              <input type='submit' name='filterdata' value='Get Data' class='btnsubmit'></input></p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class='flex con2'>
    <div class='con2-caption'>
      <h1>Enginee Maintenance</h1>
      <p>This page contains a few of Enginee Data like   Availability of Unit, Engine Problem's, List of Unit's. First, you need to filter data with select Start and End Date.</p>
      <div>
        <form action='pages/listrik.php' method='get' target='blank'>
          <div class='datebutton'>
              <p><label for='tawal'>Start</label> 
              <input class='listMonth' name='tawal' id='tawal' type='date' value='<?php echo $tawal?>' ></input>
              <label for='takhir'>End</label> 
              <input class='listMonth' name='takhir' id='takhir' type='date' value='<?php echo $takhir?>'></input>
              <input type='submit' name='filterdata' value='Get Data' class='btnsubmit'></input></p>
          </div>
        </form>
      </div>
    </div>
    <img src='assets/engineer.png'>
  </div>
</section>


<script>
  
</script>
