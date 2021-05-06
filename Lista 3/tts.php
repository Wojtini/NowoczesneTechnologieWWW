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

	<article>
		<h2>Table Top Simulator</h2>
		Prosta gra polegająca na symulowaniu różnych gier planszowych czy też karcianych. W samej grze łatwo
		stworzyć/dodać różne gry oraz je oskryptować, automatyzując niektóre elementy rozgrywki jak np.
		podliczanie punktów, rozstawianie początkowe planszy, rozdawanie kart w blackjack'u itd. Dlatego też wykorzystując
		pasję oraz chęć podszkoleniu się w LUA wykorzystałem tę sytuację pisząc skrypty do tej gry.

		<section>
		<h2>The Settlers of the Catan</h2>
		Pierwszą rzeczą którą zrobiłem w tej grze było naprawienie błędu porzuconego już projektu gry Catan.
		W ten sposób nauczyłem się jak działa importowanie i automatyzowanie gier planszowych.
		Po jego naprawieniu przeszedłem do dalszego automatyzowania planszówki, a w szczególności automatyzowanie dodatków
		do tej gry.
		<img src="./images/catan.jpg" alt="catan">
		</section>

		<section>
		<h2>Tickets to Ride</h2>
		Jest to mój aktualny projekt który stara się zaimportować i zautomatyzować grę planszową Tickets to Ride.
		W momencie pisania tego tesktu jest zrobione automatyczne rozdawanie kart, a aktualnie trudzę się z automatycznym
		liczeniem punktów.
		<img src="./images/ttr.jpg" alt="catan">
		</section>



	</article>



	<footer>
		Wojciech Maziarz, whitem200@gmail.com
	</footer>
  </body>
</html >
