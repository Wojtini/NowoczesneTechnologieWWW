<!DOCTYPE html >
<html lang ="pl" >
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Maziarz Site</title>
        <link rel="stylesheet" href="main.css">
        <script src="main.js"></script>
      </head>
      <body>
    <noscript>
  		<ul id="noscriptMenu">
  		  <li><a href="main.php">Home</a></li>
  		  <li><a href="projekty.php">Projekty</a></li>
  		  <li><a href="kontakt.php">Kontakt</a></li>
  		  <li><a href="lockstep.php">Lockstep MP</a></li>
  		  <li><a href="tts.php">TTS</a></li>
  		  <li><a href="https://github.com/Wojtini/">github</a></li>
        <?php
        // session_start();
        if (isset($_SESSION["username"])) {
          echo "<li><a href='login.php'>Logowanie</a></li>";
        }else{
          echo "<li><a href='logout.php'>Wyloguj</a></li>";
        }
         ?>
  		</ul>
    </noscript>

    <ul id="hamburgermenu">
        <li><h2 onclick="openNav()">&#9776; MENU</h2></li>
    </ul>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="main.php">Home</a>
        <a href="projekty.php">Projekty</a>
        <a href="kontakt.php">Kontakt</a>
        <a href="lockstep.php">Lockstep MP</a>
        <a href="tts.php">TTS</a>
        <a href="https://github.com/Wojtini/">github</a>
        <?php
        // session_start();
        if (isset($_SESSION["username"])) {
          echo "<a href='login.php'>Logowanie</a>";
        }else{
          echo "<a href='logout.php'>Wyloguj</a>";
        }
         ?>
      </div>


      <button onclick="myFunction()" class="dropbtn">MENU</button>
      <div class="dropdown">
        <div id="myDropdown" class="dropdown-content">
          <a href="main.php">Home</a>
          <a href="projekty.php">Projekty</a>
          <a href="kontakt.php">Kontakt</a>
          <a href="lockstep.php">Lockstep MP</a>
          <a href="tts.php">TTS</a>
          <a href="https://github.com/Wojtini/">github</a>
          <?php
          //session_start();
          if (!isset($_SESSION["username"])) {
            echo "<a href='login.php'>Logowanie</a>";
          }else{
            echo "<a href='logout.php'>Wyloguj</a>";
          }
           ?>
        </div>
      </div>
	</nav>

  </body>
</html >
