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
		<h2>Moje projekty</h2>

		<section>
		<h3>Isengard - Projekt Bazodanowy</h3>
		Projekt miał na celu zaimplementować aplikację pozwalającą na przeglądanie oraz zamawianie książek.
		Aplikacja jest podłączona do uprzednio skonfigurowanej bazy danych. Aplikacja posiada bezpieczny
		system rejestracji i logowania posiadający zabezpieczenia przeciwko atakom sql injection.
		<img src="./images/isengard.png" alt="Portret">

    <?php
    $project_id = 'isengard';
    require_once "config.php";
    $sql = "SELECT * FROM comments WHERE projectid = '$project_id'";
    if($stmt = mysqli_prepare($link, $sql)){
      if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_fetch($stmt);

            $stmt->bind_result($name, $code, $codec);

            while ($stmt->fetch()) {
            echo "<br>";
                echo $code, ": ", $codec;
            }
        } else{
          echo "Could not read comments";
        }
    }
     ?>
    <form action="new_comment.php" method="get">
      <input type="hidden" name="project" value="isengard"><br>
      Comment: <input type="text" name="submittext"><br>
      <input type="submit">
    </form>

		</section>

		<section>
		<h3>Chińskie Warcaby</h3>
		Gra napisana w Java umożliwiająca rozgrywkę sieciową od 2 do 6 graczy w Chińskie Warcaby. System został zaprojektowany z myślą łatwej modyfikacji
		dlatego też bez problemu można dodać inne rozgrywki jak np. warcaby, szachy czy inne gry planszowe.

		<p>Fragment kody odpowiedzialny za generowanie ruchów</p>
		<section>
			<code>
			<br>
				public ArrayList&lt;Vector2&gt; getAvailableMovesForPos(Board board, int x, int y,boolean movedInThisTurn)
				<br>{<br>
				&ensp;ArrayList&lt;Vector2&gt; outcome = new ArrayList &lt;Vector2&gt;();<br>
					&ensp;for(int i=0;i &lt; availableMoves.size();i++) {<br>
				  &ensp;&ensp;Move option = availableMoves.get(i);<br>
				 &ensp;&ensp; if(option instanceof NormalMove && movedInThisTurn) {<br>
			//    &ensp;&ensp;&ensp;    System.out.println("Pomija ruch");<br>
				 &ensp;&ensp; }else {<br>
				&ensp;&ensp;&ensp;	option.generateMoves(board, x, y, outcome);<br>
				&ensp;&ensp;  }<br>
				&ensp;}<br>
				return outcome;<br>
			  }<br>
			</code>
		</section>

		<img src="./images/checkers.png" alt="Portret">

    <?php
    $project_id = "checkers";
    require_once "config.php";
    $sql = "SELECT * FROM comments WHERE projectid = 'checkers'";
    if($stmt = mysqli_prepare($link, $sql)){
      if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_fetch($stmt);

            $stmt->bind_result($name, $code, $codec);

            while ($stmt->fetch()) {
            echo "<br>";
                echo $code, ": ", $codec;
            }
        } else{
          echo "Could not read comments";
        }
    }
     ?>
    <form action="new_comment.php" method="get">
      <input type="hidden" name="project" value="checkers"><br>
      Comment: <input type="text" name="submittext"><br>
      <input type="submit">
    </form>

		</section>

		<section>
		<h3>Drzewo binarne</h3>
		Graficzna reprezentacja drzewa binarnego. Aplikacja pozwala na tworzenie nowego drzewa o podanym typie danych oraz zapewnie podstawowe operacje na drzewie.

		<img src="./images/graf.png" alt="Portret">

    <?php
    $project_id = 'graf';
    require_once "config.php";
    $sql = "SELECT * FROM comments WHERE projectid = '$project_id'";
    if($stmt = mysqli_prepare($link, $sql)){
      if(mysqli_stmt_execute($stmt)){
            //mysqli_stmt_store_result($stmt);
            //mysqli_stmt_fetch($stmt);

            $stmt->bind_result($name, $code, $codec);

            while ($stmt->fetch()) {
                echo "<br>";
                echo $code, ": ", $codec;
            }
        } else{
          echo "Could not read comments";
        }
    }
     ?>
    <form action="new_comment.php" method="get">
      <input type="hidden" name="project" value="graf"><br>
      Comment: <input type="text" name="submittext"><br>
      <input type="submit">
    </form>
		</section>

		<section>
		<h3>Shapes</h3>

		Projekt miał na celu zaimplementować prostą aplikację za pomocą której będzie można utworzyć podstawowe kształty
		na płótnie, możliwe kształty to kwadrat, koło oraz trójkąt. Poza zmianą koloru kształtów można bez problemu zapisać.


		<img src="./images/paint.png" alt="Portret">

    <?php
    $project_id = 'paint';
    require_once "config.php";
    $sql = "SELECT * FROM comments WHERE projectid = '$project_id'";
    if($stmt = mysqli_prepare($link, $sql)){
      if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_fetch($stmt);

            $stmt->bind_result($name, $code, $codec);

            while ($stmt->fetch()) {
            echo "<br>";
                echo $code, ": ", $codec;
            }
        } else{
          echo "Could not read comments";
        }
    }
     ?>
    <form action="new_comment.php" method="get">
      <input type="hidden" name="project" value="paint"><br>
      Comment: <input type="text" name="submittext"><br>
      <input type="submit">
    </form>
		</section>
	</article>



	<footer>
		Wojciech Maziarz, whitem200@gmail.com
	</footer>
  </body>
</html >
