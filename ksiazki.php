<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <title>Twoja Księgarnia - magazyn książki</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="Marek Manczak" />
    <link rel='stylesheet' href='style.css' type='text/css' />
</head>

<body>
	<h2>Magazyn</h2>
	<a href='index.html'>Powrót na stronę główną</a>
<?php
//pobranie danych z index.html
if (isset($_POST['chooseTab'])){
$showTab = $_POST['chooseTab'];
}
//wybrana tabela książki
if (isset($showTab) && $showTab == 'ksiazki'){	
showWybKsiazki();
};
//wybrana tabela gry
if (isset($showTab) && $showTab == 'gry'){	
showWybGry();
};
//wybrana tabela klient
if (isset($showTab) && $showTab == 'klient'){	
showWybKlienti();
};
//

//1.1 funkcja pokaż wybór z Książek
function showWybKsiazki(){
echo		"<form method='post'>";
echo		"<h3>Sortuj według:</h3>";
echo		"<select name='sort'>";
echo		"<option value='ID_ksiazki'>Numeru ID</option>";
echo		"<option value='tytul'>Tytuł</option>";
echo		"<option value='autor'>Autor</option>";
echo		"<option value='kategoria'>Kategoria</option>";
echo		"<option value='rok_wydania'>Rok wydania</option>";
echo		"<option value='ISBN'>ISBN</option>";
echo		"</select>";
echo		"<select name='nowe'>";
echo		"<option value='%'>Dowolne</option>";
echo		"<option value='1'>Nowość</option>";
echo		"<option value='0'>Starsze</option>";
echo		"</select>";
echo		"<br/>";
echo		"<br/>";
echo		"<input type='submit' name='przyciskKsiazki' value='Pokaż książki'>";
echo		"</form>";
}
//
// 1.2 funkcja pokaż tabelę z Książęk
function showTableKsiazki($zap){
	$pol = mysqli_connect('localhost', 'root', '', 'ksiegarnia');
if ($pol == true){
	echo "<h4>Polaczenie udane!";
	echo "<br />";
}else{
	echo "<h4>Nie udalo sie polaczyc!. Blad: ".mysqli_connect_error($pol)."</h4>";
	echo "<br />";
	exit();
}
mysqli_query($pol, "set names utf8"); 
$wynik = mysqli_query($pol, $zap);
echo "<h3>Ilość wybranych pozycji: ".mysqli_num_rows($wynik)."</h3>";
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
<th><form method='post' action='add.php'><input type='submit' name='add' value='        +        '></form></th>
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
	."<td><img src='img_ksiazki/".$wiersz['grafika']."' alt='' /></td>"
	."<td><form method='post' action='edytuj.php'>
	<input type='radio' name='wybor' value='edt$pole' checked>Edycja
	<input type='radio' name='wybor' value='del$pole'>Usuń pozycję
	<input type='submit' name='edycja' value='Wybierz'>
	</form></td>"
	."</tr>";
}
echo "</table>";
mysqli_close($pol);
}
//

// 1.3 domyślny wybór, przy załadowaniu strony z Książek
if(!isset($_POST['przyciskKsiazki']) && (isset($showTab) && $showTab == 'ksiazki')){	
$zap = "SELECT * FROM ksiazki";
showTableKsiazki($zap);
KsiazkiBKUP();
}
//

//1.4 przycisk wyboru zatwierdzony
if(isset($_POST['przyciskKsiazki'])){
	$wybor = $_POST['sort'];
	$nowosc = $_POST['nowe'];
	$zap = "SELECT * FROM ksiazki where nowosc like '$nowosc' ORDER BY $wybor asc";
	showWybKsiazki();
	showTableKsiazki($zap);
	KsiazkiBKUP();
}
//
// 1.5 odworzenie bazy Ksiązki
function KsiazkiBKUP(){
echo	'<br />';
echo	'<br />';
echo	'<br />';
echo	"<form method='post'>";
echo	"<input type='submit' name='import' value='Odtwórz całą bazę książki z kopii zapasowej'>";
echo	"</form>";
}
if(isset($_POST['import'])){
	$polbckp = mysqli_connect('localhost', 'root', '', 'ksiegarnia');
if ($polbckp == true){
echo "<h4>Połączenie udane!";
echo "<br />";
}else{
echo "<h4>Nie udalo sie polączyc!. Bląd: ".mysqli_connect_error($polbckp)."</h4>";
echo "<br />";
}
mysqli_query($polbckp, "set names utf8"); 

//zmienne do odtworzenia bazy
$drop = "DROP TABLE IF EXISTS ksiazki";
include 'bkup/createKsiazki.php';
include 'bkup/insertKsiazki.php';
$alter1 = "ALTER TABLE `ksiazki` ADD PRIMARY KEY (`ID_ksiazki`);";
$alter2 = "ALTER TABLE `ksiazki` MODIFY `ID_ksiazki` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;";
//
//aż 5 zapytań.. z jednym nie chciało działać...
mysqli_query($polbckp, $drop);
mysqli_query($polbckp, $create);
mysqli_query($polbckp, $insert);
mysqli_query($polbckp, $alter1);
$restorePass = mysqli_query($polbckp, $alter2);
//

//czy udało się przywrócić kopię
if ($restorePass == true){
	echo "<h4>Udane przywrócenie bazy danych!";
	echo "<br />";
	}else{
	echo "<h4>Nie udalo się przywrócić bazy!</h4>";
	echo "<br />";
	}
//
mysqli_close($polbckp);
header("Refresh:1; url=index.html");
}

//2.1 funkcja pokaż wybór z Gry
function showWybGry(){
echo		"<form method='post'>";
echo		"<h3>Sortuj według:</h3>";
echo		"<select name='sort'>";
echo		"<option value='ID_gry'>Numeru ID</option>";
echo		"<option value='tytul'>Tytuł</option>";
echo		"<option value='wydawnictwo'>Wydawnictwa</option>";
echo		"<option value='kategoria'>Kategoria</option>";
echo		"<option value='rok_wydania'>Rok wydania</option>";
echo		"</select>";
echo		"<select name='nowe'>";
echo		"<option value='%'>Dowolne</option>";
echo		"<option value='1'>Nowość</option>";
echo		"<option value='0'>Starsze</option>";
echo		"</select>";
echo		"<br/>";
echo		"<br/>";
echo		"<input type='submit' name='przyciskGry' value='Pokaż gry'>";
echo		"</form>";
echo 		"<div id='tabela'>";
}
//
// 2.2 funkcja pokaż tabelę z Gry
function showTableGry($zap){
	$pol = mysqli_connect('localhost', 'root', '', 'ksiegarnia');
if ($pol == true){
	echo "<h4>Polaczenie udane!";
	echo "<br />";
}else{
	echo "<h4>Nie udalo sie polaczyc!. Blad: ".mysqli_connect_error($pol)."</h4>";
	echo "<br />";
	exit();
}
mysqli_query($pol, "set names utf8"); 
$wynik = mysqli_query($pol, $zap);
echo "<h3>Ilość wybranych pozycji: ".mysqli_num_rows($wynik)."</h3>";
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
<th><form method='post' action='add.php'><input type='submit' name='addG' value='        +        '></form></th>
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
	."<td><img src='img_gry/".$wiersz['grafika']."' alt='' /></td>"
	."<td><form method='post' action='edytuj.php'>
	<input type='radio' name='wybor' value='edG$pole' checked>Edycja
	<input type='radio' name='wybor' value='deG$pole'>Usuń pozycję
	<input type='submit' name='edycja' value='Wybierz'>
	</form></td>"
	."</tr>";
}
echo "</table>";
mysqli_close($pol);
}
//

// 2.3 domyślny wybór, przy załadowaniu strony z Gry
if(!isset($_POST['przyciskGry']) && (isset($showTab) && $showTab == 'gry')){	
$zap = "SELECT * FROM gry";
showTableGry($zap);
GryBKUP();
}
//

//2.4 przycisk wyboru zatwierdzony gry
if(isset($_POST['przyciskGry'])){
	$wybor = $_POST['sort'];
	$nowosc = $_POST['nowe'];
	$zap = "SELECT * FROM gry where nowosc like '$nowosc' ORDER BY $wybor asc";
	showWybGry();
	showTableGry($zap);
	GryBKUP();
}
//
// 2.5 odworzenie bazy Gry
function GryBKUP(){
echo	'<br />';
echo	'<br />';
echo	'<br />';
echo	"<form method='post'>";
echo	"<input type='submit' name='importG' value='Odtwórz całą bazę gry z kopii zapasowej'>";
echo	"</form>";
}		
if(isset($_POST['importG'])){
	$polG = mysqli_connect('localhost', 'root', '', 'ksiegarnia');
if ($polG == true){
echo "<h4>Połączenie udane!";
echo "<br />";
}else{
echo "<h4>Nie udalo sie polączyc!. Bląd: ".mysqli_connect_error($polG)."</h4>";
echo "<br />";
}
mysqli_query($polG, "set names utf8"); 

//zmienne do odtworzenia bazy gry
$dropGry = "DROP TABLE IF EXISTS gry";
include 'bkup/createGry.php';
include 'bkup/insertGry.php';
$alter1Gry = "ALTER TABLE `gry` ADD PRIMARY KEY (`ID_gry`);";
$alter2Gry = "ALTER TABLE `gry` MODIFY `ID_gry` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;";
//
//aż 5 zapytań.. z jednym nie chciało działać...
mysqli_query($polG, $dropGry);
mysqli_query($polG, $createGry);
mysqli_query($polG, $insertGry);
mysqli_query($polG, $alter1Gry);
$restorePass = mysqli_query($polG, $alter2Gry);
//

//czy udało się przywrócić kopię
if ($restorePass == true){
	echo "<h4>Udane przywrócenie bazy danych!";
	echo "<br />";
	}else{
	echo "<h4>Nie udalo się przywrócić bazy!</h4>";
	echo "<br />";
	}
//
mysqli_close($polG);
header("Refresh:1; url=index.html");
}

//3.1 funkcja pokaż wybór z Klienci
function showWybKlient(){
echo		"<form method='post'>";
echo		"<h3>Sortuj według:</h3>";
echo		"<select name='sort'>";
echo		"<option value='ID_klienta'>Numeru ID</option>";
echo		"<option value='Nazwisko'>Nazwiska</option>";
echo		"<option value='Imie'>Imienia</option>";
echo		"<option value='email'>Adresu e-mail</option>";
echo		"<option value='miasto'>Miasta zamieszkania</option>";
echo		"</select>";
echo		"<input type='submit' name='przyciskKlient' value='Pokaż klientów'>";
echo		"</form>";
echo 		"<div id='tabela'>";
}
//
// 3.2 funkcja pokaż tabelę z Klienci
function showTableKlient($zap){
	$pol = mysqli_connect('localhost', 'root', '', 'ksiegarnia');
if ($pol == true){
	echo "<h4>Polaczenie udane!";
	echo "<br />";
}else{
	echo "<h4>Nie udalo sie polaczyc!. Blad: ".mysqli_connect_error($pol)."</h4>";
	echo "<br />";
	exit();
}
mysqli_query($pol, "set names utf8"); 
$wynik = mysqli_query($pol, $zap);
echo "<h3>Ilość wybranych pozycji: ".mysqli_num_rows($wynik)."</h3>";
echo"<table><tr>
<th>ID</th>
<th>Nazwisko</th>
<th>Imię</th>
<th>email</th>
<th>Kod Pocztowy</th>
<th>Miasto</th>
<th>Ulica</th>
<th>Numer domu</th>
<th><form method='post' action='add.php'><input type='submit' name='addK' value='        +        '></form></th>
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
	."<td><form method='post' action='edytuj.php'>
	<input type='radio' name='wybor' value='edK$pole' checked>Edycja
	<input type='radio' name='wybor' value='deK$pole'>Usuń klienta
	<input type='submit' name='edycja' value='Wybierz'>
	</form></td>"
	."</tr>";
}
echo "</table>";
mysqli_close($pol);
}
//

// 3.3 domyślny wybór, przy załadowaniu strony z Klienci
if(!isset($_POST['przyciskKlient']) && (isset($showTab) && $showTab == 'klienci')){	
$zap = "SELECT * FROM klienci";
showWybKlient();
showTableKlient($zap);
KlientBKUP();
}
//

//3.4 przycisk wyboru zatwierdzony Klienci
if(isset($_POST['przyciskKlient'])){
	$wybor = $_POST['sort'];
	$zap = "SELECT * FROM klienci ORDER BY $wybor asc";
	showWybKlient();
	showTableKlient($zap);
	KlientBKUP();
}
//
// 3.5 odworzenie bazy Klienci
function KlientBKUP(){
echo	'<br />';
echo	'<br />';
echo	'<br />';
echo	"<form method='post'>";
echo	"<input type='submit' name='import' value='Odtwórz całą bazę klienci z kopii zapasowej'>";
echo	"</form>";
}		
if(isset($_POST['import'])){
	$pol = mysqli_connect('localhost', 'root', '', 'ksiegarnia');
if ($pol == true){
echo "<h4>Połączenie udane!";
echo "<br />";
}else{
echo "<h4>Nie udalo sie polączyc!. Bląd: ".mysqli_connect_error($pol)."</h4>";
echo "<br />";
}
mysqli_query($pol, "set names utf8"); 

//zmienne do odtworzenia bazy
$dropKlienci = "DROP TABLE IF EXISTS klienci";
include 'bkup/createKlient.php';
include 'bkup/insertKlient.php';
$alter1Klienci = "ALTER TABLE `klienci` ADD PRIMARY KEY (`ID_klienta`);";
$alter2Klienci = "ALTER TABLE `klienci` MODIFY `ID_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;";
//
//aż 5 zapytań.. z jednym nie chciało działać...
mysqli_query($pol, $dropKlienci);
mysqli_query($pol, $createKlienci);
mysqli_query($pol, $insertKlienci);
mysqli_query($pol, $alter1Klienci);
$restorePass = mysqli_query($pol, $alter2Klienci);
//

//czy udało się przywrócić kopię
if ($restorePass == true){
	echo "<h4>Udane przywrócenie bazy danych!";
	echo "<br />";
	}else{
	echo "<h4>Nie udalo się przywrócić bazy!</h4>";
	echo "<br />";
	}
//
mysqli_close($pol);
header("Refresh:1; url=index.html");
}



?>

</body>
</html>