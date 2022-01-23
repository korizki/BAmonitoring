<!-- session login -->
<header>
  <div class='top-right'>
    <div>
      <h1>Monitoring Activities will be Easier, </h1>
      <p>We provide a service to help you choose your best plans. With graph's, all data are easier to understand.</p>
      <a href='#data' class='startBtn'>Get Started <i style='margin-left: 5px; color: inherit;' class="fa fa-lg fa-angle-right " ></i></a>
    </div>
  </div>
  <img alt='gambar illustrasi' src='assets/illusmins.svg' >
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
      <p>Our service will serve you in 24/7 hour's. Submit a ticket, and we'll help you soon. </p>
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
              <input type='submit' name='filterdata' value='Get Data' class='btnsubmit getdata'></input></p>
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
              <input type='submit' name='filterdata' value='Get Data' class='btnsubmit getdata'></input></p>
          </div>
        </form>
      </div>
    </div>
    <img src='assets/engineer.png'>
  </div>
</section>

<section id='loginForm'>
  <div class='loginBox'>
    <div class='loginForm'>
      <div class='loginIllus'>
        <img src='assets/login.svg' alt='IllustrationLogin'>
        
      </div>
      <div class='inputArea'>
        <p style='margin-bottom: 5px;'>Log In, <p>
        <h1>Welcome Back</h1>
        <form action='phpcode/login.php' method='post'style="color: #30475e">
          <i class='fa fa-lg fa-user' style="margin-top: 11px; margin-left: 12px; position: absolute;"></i> <input autocomplete='off' placeholder='Username' type='text' name='username' id='username'>
          <i class='fa fa-lg fa-key' style="margin-top: 11px; margin-left: 12px; position: absolute;" ></i> <input placeholder='Password' type='password' name='password' id='password'>
          <input class='loginsubmit' type='submit' value='Log In' name='submit'>
        </form>
        <input class='loginsubmit cancel' type='submit' value='Cancel' onClick='hideLogin()'>
        <p style='text-align: center; margin-top: 30px; font-style: italic;'>Contact your Admin to get an access or forgot password.</p>
      </div>
      
    </div>
  </div>
</section>
