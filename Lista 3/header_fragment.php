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

	<header>
		<a href="https://pwr.edu.pl"><img src="./images/logo_pwr.png" alt="pwr"></a>
		<a href="https://wppt.pwr.edu.pl"><img src="./images/wppt_logo.png" alt="pwr"></a>
		Wojciech Maziarz
    <br>
    <?php

      $handle = fopen("counter.txt", "r");
      if(!$handle){

       echo "could not open the file" ;

      }
      else {


      	$counter = (int ) fread($handle,20);
      	fclose ($handle);
      	$counter++;
      	echo" <strong> Jestes ". $counter . " odwiedzajacym </strong> " ;
      $handle = fopen("counter.txt", "w" );
      fwrite($handle,$counter) ;
      fclose ($handle) ;
      	}
      ?>
	</header>

	</footer>
  </body>
</html >
