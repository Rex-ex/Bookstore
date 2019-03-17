
<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <title>Twoja Księgarnia - edycja</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="Marek Manczak" />
    <link rel='stylesheet' href='style.css' type='text/css' />
</head>

<body>
	<h2>Edycja</h2>

<?php
if($_POST['wybor']){
$edycja = $_POST['wybor'];
}else{
	header("Refresh:0; url=ksiazki.php");
	exit();
}

if (isset($edycja)){
$pol = mysqli_connect('localhost', 'root', '', 'ksiegarnia');
if ($pol == true){
	echo "<h4>Polaczenie udane!";
	echo "<br />";
}else{
	echo "<h4>Nie udalo sie polaczyc!. Blad: ".mysqli_connect_error($pol)."</h4>";
	echo "<br />";
}

mysqli_query($pol, "set names utf8"); 
$tryb = substr ($edycja, 0, 3);
$wiersz =  substr($edycja, 3, 3);

// 1.1usuwanie ksiazki
if ($tryb == 'del'){
	echo "Usunięta pozycja Książki o ID= ".$wiersz;
	$zap = "DELETE from ksiazki where ID_ksiazki=$wiersz";
	mysqli_query($pol, $zap);
	mysqli_close($pol);
}
// 1.2usuwanie gry
if ($tryb == 'deG'){
	echo "Usunięta pozycja Gry o ID= ".$wiersz;
	$zap = "DELETE from gry where ID_gry=$wiersz";
	mysqli_query($pol, $zap);
	mysqli_close($pol);
}
// 1.3 usuwanie klient
if ($tryb == 'deK'){
	echo "Usunięta pozycja Klient o ID= ".$wiersz;
	$zap = "DELETE from klienci where ID_klienta=$wiersz";
	mysqli_query($pol, $zap);
	mysqli_close($pol);
}
//

// 2.1 edytowanie ksiazki
if ($tryb == 'edt'){
	$zap = "SELECT * FROM ksiazki where ID_ksiazki=$wiersz";
	$wynik = mysqli_query($pol, $zap);
	echo"<table><tr>
	<th>ID</th>
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
	while($wiersz = mysqli_fetch_assoc($wynik)){
	$pole = $wiersz['ID_ksiazki'];
	echo "<tr>
	<td>".$wiersz['ID_ksiazki']."</td>"
	."<td>".$wiersz['ilosc']."</td>"
	."<td>".$wiersz['tytul']."</td>"
	."<td>".$wiersz['autor']."</td>"
	."<td>".$wiersz['kategoria']."</td>"
	."<td>".$wiersz['rok_wydania']."</td>"
	."<td>".$wiersz['ISBN']."</td>"
	."<td>".$wiersz['cena']."</td>"
	."<td>".$wiersz['promocja']."</td>"
	."<td>".$wiersz['nowosc']."</td>"
	."<td>".$wiersz['grafika']."</td>"
	."</tr>"
	."<tr><form method='post' action='edt.php'>"
	."<td><input type='text' name='pos1' value='".$wiersz['ID_ksiazki']."' readonly></td>"
	."<td><input type='number' name='pos2' value='".$wiersz['ilosc']."' required></td>"
	."<td><input type='text' name='pos3' value='".$wiersz['tytul']."' required></td>"
	."<td><input type='text' name='pos4' value='".$wiersz['autor']."' required></td>"
	."<td><input type='text' name='pos5' value='".$wiersz['kategoria']."' required></td>"
	."<td><input type='text' name='pos6' value='".$wiersz['rok_wydania']."' required></td>"
	."<td><input type='text' name='pos7' value='".$wiersz['ISBN']."' required></td>"
	."<td><input type='number' name='pos8' value='".$wiersz['cena']."' required></td>"
	."<td><input type='text' name='pos9' value='".$wiersz['promocja']."' required></td>"
	."<td><input type='text' name='pos10' value='".$wiersz['nowosc']."' required></td>"
	."<td><input type='text' name='pos11' value='".$wiersz['grafika']."' required></td>"
	."<td><input type='submit' name='accept' value='Potwierdź'></td></form>"
	."<td class='den'><a href=index.html>Odrzuć</a></td>"
	."</tr>"
	."</table>";
	mysqli_close($pol);
	}
}

// 2.2 edytowanie gry
if ($tryb == 'edG'){
	$zap = "SELECT * FROM gry where ID_gry=$wiersz";
	$wynik = mysqli_query($pol, $zap);
	echo"<table><tr>
	<th>ID</th>
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
	while($wiersz = mysqli_fetch_assoc($wynik)){
	$pole = $wiersz['ID_gry'];
	echo "<tr>
	<td>".$wiersz['ID_gry']."</td>"
	."<td>".$wiersz['ilosc']."</td>"
	."<td>".$wiersz['tytul']."</td>"
	."<td>".$wiersz['wydawnictwo']."</td>"
	."<td>".$wiersz['kategoria']."</td>"
	."<td>".$wiersz['rok_wydania']."</td>"
	."<td>".$wiersz['cena']."</td>"
	."<td>".$wiersz['promocja']."</td>"
	."<td>".$wiersz['nowosc']."</td>"
	."<td>".$wiersz['grafika']."</td>"
	."</tr>"
	."<tr><form method='post' action='edt.php'>"
	."<td><input type='text' name='pos1' value='".$wiersz['ID_gry']."' readonly></td>"
	."<td><input type='number' name='pos2' value='".$wiersz['ilosc']."' required>></td>"
	."<td><input type='text' name='pos3' value='".$wiersz['tytul']."' required>></td>"
	."<td><input type='text' name='pos4' value='".$wiersz['wydawnictwo']."' required></td>"
	."<td><input type='text' name='pos5' value='".$wiersz['kategoria']."' required></td>"
	."<td><input type='text' name='pos6' value='".$wiersz['rok_wydania']."' required></td>"
	."<td><input type='number' name='pos7' value='".$wiersz['cena']."' required></td>"
	."<td><input type='text' name='pos8' value='".$wiersz['promocja']."' required></td>"
	."<td><input type='text' name='pos9' value='".$wiersz['nowosc']."' required></td>"
	."<td><input type='text' name='pos10' value='".$wiersz['grafika']."' required></td>"
	."<td><input type='submit' name='acceptG' value='Potwierdź'></td></form>"
	."<td class='den'><a href=index.html>Odrzuć</a></td>"
	."</tr>"
	."</table>";
	mysqli_close($pol);
}
}
// 2.3 edytowanie klienci
if ($tryb == 'edK'){
	$zap = "SELECT * FROM klienci where ID_klienta=$wiersz";
	$wynik = mysqli_query($pol, $zap);
	echo"<table><tr>
	<th>ID</th>
	<th>Nazwisko</th>
	<th>Imię</th>
	<th>email</th>
	<th>Kod Pocztowy</th>
	<th>Miasto</th>
	<th>Ulica</th>
	<th>Numer Domu</th>
	</tr>";
	while($wiersz = mysqli_fetch_assoc($wynik)){
	$pole = $wiersz['ID_klienta'];
	echo "<tr>
	<td>".$wiersz['ID_klienta']."</td>"
	."<td>".$wiersz['Nazwisko']."</td>"
	."<td>".$wiersz['Imie']."</td>"
	."<td>".$wiersz['email']."</td>"
	."<td>".$wiersz['kod_pocz']."</td>"
	."<td>".$wiersz['miasto']."</td>"
	."<td>".$wiersz['ulica']."</td>"
	."<td>".$wiersz['numer_domu']."</td>"
	."</tr>"
	."<tr><form method='post' action='edt.php'>"
	."<td><input type='text' name='pos1' value='".$wiersz['ID_klienta']."' readonly></td>"
	."<td><input type='text' name='pos2' value='".$wiersz['Nazwisko']."' required></td>"
	."<td><input type='text' name='pos3' value='".$wiersz['Imie']."' required></td>"
	."<td><input type='email' name='pos4' value='".$wiersz['email']."' required></td>"
	."<td><input type='text' name='pos5' value='".$wiersz['kod_pocz']."' required></td>"
	."<td><input type='text' name='pos6' value='".$wiersz['miasto']."' required></td>"
	."<td><input type='text' name='pos7' value='".$wiersz['ulica']."' required></td>"
	."<td><input type='text' name='pos8' value='".$wiersz['numer_domu']."' required></td>"
	."<td><input type='submit' name='acceptK' value='Potwierdź'></td></form>"
	."<td class='den'><a href=index.html>Odrzuć</a></td>"
	."</tr>"
	."</table>";
	mysqli_close($pol);
}
}
// koniec edycji....

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

}

?>



</body>

</html>