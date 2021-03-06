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
		<h2>Preludium</h2>
		Jakiś czas temu kiedy próbowałem robić grę strategiczną natrafiłem na problem podczas
		implementacji rozgrywki wieloosobowej. Sieć nie potrafiła obsłużyć większej ilości jednostek.
		Nic dziwnego w końcu serwer stale musi przesyłać informacje o każdej jednostce do klientów
		co przy większej/ogromnej ilości wymaga bardzo dobrego łącza. Dlatego też poszukałem innego rozwiązania

		<section>
		<h2>Lockstep Multiplayer</h2>
		Idea tego starego rozwiązania jest prosta. Zamiast pobierać informacje o stanie gry z serwera, można pobrać
		tylko i wyłącznie input innych graczy, jak np. rozkazy dla jednostek.
		Wtedy każdy gracz posiada własną symulację świata, ale ponieważ każdy gracz ładuje do niej te same inputy,
		output symulacji u każdego gracza jest taki sam. Warto tutaj zauważyć że symulacja jest tak wolna jak najwolniejszy
		gracz, gdyż reszta symulacji nie kroku naprzód bez dostania inputu od wszystkich graczy.
		Oczywiście to rozwiązanie wymaga zaimplementowania tur w których inputy graczy będą faktycznie wprowadzane
		do symulacji, aby zachować płynność rozgrywki tura powinna trwać odpowiednią ilość czasu.
		<img src="./images/lockstep/ls1.png" alt="ls1">
		</section>

		<section>
		<h3>Plusy rozwiązania</h3>
		<ul>
		  <li>Niskie wymagania przepustowości sieci</li>
		  <li>Łatwa możliwość nagrania rozgrywki (wystarczy nagrać input'y graczy)</li>
		  <li>Brak możliwości oszukiwania (każda taka próba kończy się desynchronizacją symulacji)</li>
		</ul>
		</section>

		<section>
		<h2>Desynchronizacja</h2>
		Oczywiście ciężko jest uruchomić dwie idealnie takie same symulacje na dwóch różnych komputerach, dlatego
		podstawowym problemem tego rozwiązania jest
		desynchronizacja, czyli moment w którym symulacje klientów zaczynają się różnić.
		Aby tego uniknąć elementy symulacji jak i sama symulacja musi być deterministyczna.
		Również trzeba pamiętać o generowaniu takich samych zmiennych losowych w symulacjach jak i o zmiennych float, które
		mogą przyjmować nieznacznie inne wartości na różnych maszynach (np. pozycja jednostki na mapie).

		Jednak w momencie jej wystąpienia dalsza rozgrywka jest niemożliwa bez przesłania całej symulacji
		przez jednego z klientów.

			<img src="./images/lockstep/corrupt.png" alt="ls1">
			<footer>Desynchronizacja w grze Europa Universalis 4</footer>
		</section>


		<section>
		<h2>Historia oraz moje próby implementacji</h2>
		Rozwiązanie te było stosowane w starych grach ze względu na niską przepustowość w tamtych czasach,
		jednak wraz z czasem zaczęto powoli odchodzić od tego rozwiązania na rzecz client-serwer które było bardziej
		niezawodne. Idea ta jednak uchowała się w niektórych grach strategicznych m.in.
		<ul>
		  <li>Starcraft</li>
		  <li>Europa Universalis 4</li>
		  <li>Hearts of Iron 4</li>
		  <li>Victoria 2</li>
		</ul>

		Najprostszą moją implementacją są chińskie warcaby. Gracze uruchamiają tą samą początkową planszę a następnie
		wysyłają sobie tylko swoje ruchy innym graczom, dzięki czemu każdy posiada tą samą symulację.
		<p>
		Co do mojej gry strategicznej, niestety zorientowałem się że moje implementacje zapewniają niemal 100% desynchronizację
		dlatego też planuję napisać ją od zera.
		</section>



	</article>



	<footer>
		Wojciech Maziarz, whitem200@gmail.com
	</footer>
  </body>
</html >
