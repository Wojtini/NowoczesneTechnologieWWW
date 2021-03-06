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

  <?php include "./header_fragment.php" ?>
  <?php include "./navigation_fragment.php" ?>
	<main>
		<article>
			<img src="./images/portrait.png" alt="Portret">
			<h2>Coś o mnie</h2>
			  Jestem studentem drugiego roku Politechniki Wrocławskiej na wydziale
			  Podstawowych Problemów Techniki kierunek Informatyka Algorytmiczna.
			<h3>Zainteresowania</h3>
			  Od dzieciństwa jestem zawziętym graczem gier komputerowych czy też planszowych, spędzam
			  przy nich dużą część swojego wolnego czasu. Korzystając również z aktualnie
			  przykrej sytuacji na świecie wraz z przyjaciółmi zaczęliśmy oglądać różne filmy, poczynając od klasyków
			  z aktorem Leslie Nielsen w roli głównej czy też trylogia Godfather, kończąc na nowszych tytułach takich jak Interstellar.
			  Ale na naszej liście znajduje się też mniej popularne filmy.
			<h4>Poznane języki</h4>

			<div class="flex-container">
				<img src="./images/lang/c.webp" alt="c">
				<img src="./images/lang/cpp.png" alt="cpp">
				<img src="./images/lang/csharp.png" alt="csharp">
				<img src="./images/lang/java.png" alt="java">
				<img src="./images/lang/python.png" alt="python">
				<img src="./images/lang/lua.png" alt="lua">
				<img src="./images/lang/kotlin.png" alt="kotlin">
				<img src="./images/lang/sql.jpg" alt="sql">
				<img src="./images/lang/ada.png" alt="ada">
				<img src="./images/lang/go.jpg" alt="go">
				<img src="./images/lang/html.png" alt="html">
				<img src="./images/lang/css.png" alt="css">
			</div>

		</article>
	</main>


  <?php include "./footer_fragment.php" ?>
  </body>
</html >
