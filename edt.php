<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <title>Twoja Księgarnia - potwierdzenie edycji</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="Marek Manczak" />
    <link rel='stylesheet' href='style.css' type='text/css' />
</head>

<body>
	<h2>Udana edycja!</h2>
<?php
	if((!isset($_POST['accept'])) && (!isset($_POST['acceptG'])) && (!isset($_POST['acceptK']))){
	header("Refresh:0; url=index.html");
	exit();
	}

// 1.1 ksiazki
if (isset($_POST['accept'])){
	$pol2 = mysqli_connect('localhost', 'root', '', 'ksiegarnia');
	if ($pol2 == true){
		echo "<h4>Polaczenie udane!";
		echo "<br />";
		}else{
		echo "<h4>Nie udalo sie polaczyc!. Blad: ".mysqli_connect_error($pol2)."</h4>";
		echo "<br />";
		}
	$pos1 = $_POST['pos1'];
	$pos2 = $_POST['pos2'];
	$pos3 = $_POST['pos3'];
	$pos4 = $_POST['pos4'];
	$pos5 = $_POST['pos5'];
	$pos6 = $_POST['pos6'];
	$pos7 = $_POST['pos7'];
	$pos8 = $_POST['pos8'];
	$pos9 = $_POST['pos9'];
	$pos10 = $_POST['pos10'];
	$pos11 = $_POST['pos11'];
	$zap2 = "UPDATE ksiazki SET ilosc='$pos2', tytul='$pos3', autor='$pos4', kategoria='$pos5', rok_wydania='$pos6', ISBN='$pos7', cena='$pos8', promocja='$pos9', nowosc='$pos10', grafika='$pos11' where ID_ksiazki=$pos1";
	// echo $zap2;
	mysqli_query($pol2, "set names utf8");
	mysqli_query($pol2, $zap2);
	echo "Zmieniona pozycja Książka o ID= ".$pos1;
	mysqli_close($pol2);
}

// 1.2 gry
if (isset($_POST['acceptG'])){
	$pol2 = mysqli_connect('localhost', 'root', '', 'ksiegarnia');
	if ($pol2 == true){
		echo "<h4>Polaczenie udane!";
		echo "<br />";
		}else{
		echo "<h4>Nie udalo sie polaczyc!. Blad: ".mysqli_connect_error($pol2)."</h4>";
		echo "<br />";
		}
	$pos1 = $_POST['pos1'];
	$pos2 = $_POST['pos2'];
	$pos3 = $_POST['pos3'];
	$pos4 = $_POST['pos4'];
	$pos5 = $_POST['pos5'];
	$pos6 = $_POST['pos6'];
	$pos7 = $_POST['pos7'];
	$pos8 = $_POST['pos8'];
	$pos9 = $_POST['pos9'];
	$pos10 = $_POST['pos10'];
	$zap2 = "UPDATE gry SET ilosc='$pos2', tytul='$pos3', wydawnictwo='$pos4', kategoria='$pos5', rok_wydania='$pos6', cena='$pos7', promocja='$pos8', nowosc='$pos9', grafika='$pos10' where ID_gry=$pos1";
	mysqli_query($pol2, "set names utf8");
	mysqli_query($pol2, $zap2);
	echo "Zmieniona pozycja Gry o ID= ".$pos1;
	mysqli_close($pol2);
}

// 1.3 klienci
if (isset($_POST['acceptK'])){
	$pol2 = mysqli_connect('localhost', 'root', '', 'ksiegarnia');
	if ($pol2 == true){
		echo "<h4>Polaczenie udane!";
		echo "<br />";
		}else{
		echo "<h4>Nie udalo sie polaczyc!. Blad: ".mysqli_connect_error($pol2)."</h4>";
		echo "<br />";
		}
	$pos1 = $_POST['pos1'];
	$pos2 = $_POST['pos2'];
	$pos3 = $_POST['pos3'];
	$pos4 = $_POST['pos4'];
	$pos5 = $_POST['pos5'];
	$pos6 = $_POST['pos6'];
	$pos7 = $_POST['pos7'];
	$pos8 = $_POST['pos8'];
	$zap2 = "UPDATE klienci SET Nazwisko='$pos2', Imie='$pos3', email='$pos4', kod_pocz='$pos5', miasto='$pos6', ulica='$pos7', numer_domu='$pos8' where ID_klienta=$pos1";
	mysqli_query($pol2, "set names utf8");
	mysqli_query($pol2, $zap2);
	echo "Zmieniona pozycja Klient o ID= ".$pos1;
	mysqli_close($pol2);
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