<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <title>Twoja Księgarnia - dodaj wpis</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="Marek Manczak" />
    <link rel='stylesheet' href='style.css' type='text/css' />
</head>

<body>
<?php
	if((!isset($_POST['add'])) && (!isset($_POST['addG'])) && (!isset($_POST['addK']))){
	header("Refresh:0; url=index.html");
	exit();
	}

if (isset($_POST['add'])){
	echo "<h2>Dodaj nowy wpis - KSIĄŻKI</h2>";
	echo"<table><tr>
	<th>Ilość</th>
	<th>Tytuł</th>
	<th>Autor</th>
	<th>Kategoria</th>
	<th>Rok wydania</th>
	<th>ISBN</th>
	<th>Cena po promocji</th>
	<th>Promocja w %</th>
	<th>Nowość</th>
	<th>Grafika</th>
	</tr>";
	echo "<tr><form method='post' action='addok.php'>"
	."<td><input type='number' name='pos2'  required></td>"
	."<td><input type='text' name='pos3' required></td>"
	."<td><input type='text' name='pos4' required></td>"
	."<td><input type='text' name='pos5'  required></td>"
	."<td><input type='text' name='pos6'  required></td>"
	."<td><input type='text' name='pos7'  required></td>"
	."<td><input type='number' name='pos8' required></td>"
	."<td><input type='text' name='pos9' required></td>"
	."<td><input type='text' name='pos10' required></td>"
	."<td><input type='text' name='pos11' required></td>"
	."<td><input type='submit' name='addNew' value='Potwierdź'></td></form>"
	."<td class='den'><a href=index.html>Odrzuć</a></td>"
	."</tr>"
	."</table>";
}


// 1.2 gry
if (isset($_POST['addG'])){
	echo "<h2>Dodaj nowy wpis - GRY</h2>";
	echo"<table><tr>
	<th>Ilość</th>
	<th>Tytuł</th>
	<th>Wydawnictwo</th>
	<th>Kategoria</th>
	<th>Rok wydania</th>
	<th>Cena po promocji</th>
	<th>Promocja w %</th>
	<th>Nowość</th>
	<th>Grafika</th>
	</tr>";
	echo"<tr><form method='post' action='addok.php'>"
	."<td><input type='number' name='pos2' required></td>"
	."<td><input type='text' name='pos3' required></td>"
	."<td><input type='text' name='pos4' required></td>"
	."<td><input type='text' name='pos5' required></td>"
	."<td><input type='text' name='pos6' required></td>"
	."<td><input type='number' name='pos7' required></td>"
	."<td><input type='text' name='pos8' required></td>"
	."<td><input type='text' name='pos9' required></td>"
	."<td><input type='text' name='pos10' required></td>"
	."<td><input type='submit' name='addNewG' value='Potwierdź'></td></form>"
	."<td class='den'><a href=index.html>Odrzuć</a></td>"
	."</tr>"
	."</table>";
}

// 1.3 klienci
if (isset($_POST['addK'])){
	echo "<h2>Dodaj nowy wpis - KLIENT</h2>";
	echo"<table><tr>
	<th>Nazwisko</th>
	<th>Imię</th>
	<th>email</th>
	<th>Kod Pocztowy</th>
	<th>Miasto</th>
	<th>Ulica</th>
	<th>Numer Domu</th>
	</tr>";
	echo "<tr><form method='post' action='addok.php'>"
	."<td><input type='text' name='pos2' required></td>"
	."<td><input type='text' name='pos3' required></td>"
	."<td><input type='email' name='pos4' required></td>"
	."<td><input type='text' name='pos5' required></td>"
	."<td><input type='text' name='pos6' required></td>"
	."<td><input type='text' name='pos7' required></td>"
	."<td><input type='text' name='pos8' required></td>"
	."<td><input type='submit' name='addNewK' value='Potwierdź'></td></form>"
	."<td class='den'><a href=index.html>Odrzuć</a></td>"
	."</tr>"
	."</table>";
}

echo 		"<br />";
echo		"<form method='post' action='ksiazki.php'>";
echo		"<h3>Wybierz tabelę: </h3>";
echo		"<select name='chooseTab'>";
echo		"<option value='ksiazki'>Książki</option>";
echo		"<option value='gry'>Gry</option>";
echo		"<option value='klienci'>Klienci</option>";
echo		"</select>";
echo		"<br/>";
echo		"<br/>";
echo		"<input type='submit' name='tabButton' value='Powrót'>";
echo		"</form>";
?>
</body>

</html>