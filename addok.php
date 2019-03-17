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
	if((!isset($_POST['addNew'])) && (!isset($_POST['addNewG'])) && (!isset($_POST['addNewK']))){
	header("Refresh:0; url=index.html");
	exit();
	}
//1.1 ksiazki	
if (isset($_POST['addNew'])){
	$pol2 = mysqli_connect('localhost', 'root', '', 'ksiegarnia');
	if ($pol2 == true){
		echo "<h4>Polaczenie udane!";
		echo "<br />";
		}else{
		echo "<h4>Nie udalo sie polaczyc!. Blad: ".mysqli_connect_error($pol2)."</h4>";
		echo "<br />";
	}
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
	$zap2 = "INSERT INTO ksiazki (ID_ksiazki, ilosc, tytul, autor, kategoria, rok_wydania, ISBN, cena, promocja, nowosc, grafika) VALUES('', '$pos2', '$pos3', '$pos4', '$pos5', '$pos6', '$pos7', '$pos8', '$pos9', '$pos10', '$pos11')";
	mysqli_query($pol2, "set names utf8");
	mysqli_query($pol2, $zap2);
	echo "Dodano nową pozycję Książka!";
	mysqli_close($pol2);
}


// 1.2 gry
if (isset($_POST['addNewG'])){
	$pol2 = mysqli_connect('localhost', 'root', '', 'ksiegarnia');
	if ($pol2 == true){
		echo "<h4>Polaczenie udane!";
		echo "<br />";
		}else{
		echo "<h4>Nie udalo sie polaczyc!. Blad: ".mysqli_connect_error($pol2)."</h4>";
		echo "<br />";
	}
	$pos2 = $_POST['pos2'];
	$pos3 = $_POST['pos3'];
	$pos4 = $_POST['pos4'];
	$pos5 = $_POST['pos5'];
	$pos6 = $_POST['pos6'];
	$pos7 = $_POST['pos7'];
	$pos8 = $_POST['pos8'];
	$pos9 = $_POST['pos9'];
	$pos10 = $_POST['pos10'];
	$zap2 = "INSERT INTO gry (ID_gry, ilosc, tytul, wydawnictwo, kategoria, rok_wydania, cena, promocja, nowosc, grafika) VALUES('', '$pos2', '$pos3', '$pos4', '$pos5', '$pos6', '$pos7', '$pos8', '$pos9', '$pos10')";
	mysqli_query($pol2, "set names utf8");
	mysqli_query($pol2, $zap2);
	echo "Dodano nową pozycję Gra!";
	mysqli_close($pol2);
}

// 1.3 klienci
if (isset($_POST['addNewK'])){
	$pol2 = mysqli_connect('localhost', 'root', '', 'ksiegarnia');
	if ($pol2 == true){
		echo "<h4>Polaczenie udane!";
		echo "<br />";
		}else{
		echo "<h4>Nie udalo sie polaczyc!. Blad: ".mysqli_connect_error($pol2)."</h4>";
		echo "<br />";
	}
	$pos2 = $_POST['pos2'];
	$pos3 = $_POST['pos3'];
	$pos4 = $_POST['pos4'];
	$pos5 = $_POST['pos5'];
	$pos6 = $_POST['pos6'];
	$pos7 = $_POST['pos7'];
	$pos8 = $_POST['pos8'];
	$zap2 = "INSERT INTO klienci (ID_klienta, Nazwisko, Imie, email, kod_pocz, miasto, ulica, numer_domu) VALUES('', '$pos2', '$pos3', '$pos4', '$pos5', '$pos6', '$pos7', '$pos8')";
	mysqli_query($pol2, "set names utf8");
	mysqli_query($pol2, $zap2);
	echo "Dodano nowego Klienta!";
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