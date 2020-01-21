<?php
session_start();

if (isset($_POST['inputletter'])){
$galgjeinputletter = $_POST['inputletter'];
}

if (isset($_POST["galgjeword"])) {
    $galgjeword = $_POST["galgjeword"]; 
    $_SESSION['split'] = str_split($galgjeword);
}

$woord = $_SESSION['split'];

$empty = array();

?>

<DOCTYPE html>
    <head>
        <link rel="stylesheet" href="stylePage2.css">
        <title>GalgjeGame.Bob</title>
    </head>
<body>

<img src="bit project banner.png" alt="Banner">
<h3>Bob Hangman!</h3>

<div class="form">
    <form action="/php.web/galgjeGame.php?knop=2" method="POST">
        <input type="text" name="inputletter" maxlength="1">
        <input type="submit" name="SubmitButton" placeholder="Submit">
    </form>
</div>   

<?php
if (!isset($_SESSION['lettergokgoed'])) {
    $_SESSION['lettergokgoed'] = array();
}

if (!isset($_SESSION['lettergokfout'])) {
$_SESSION['lettergokfout'] = array();
}

if(!isset($_SESSION['fout'])){
    $_SESSION['fout'] = 0;
}

$komtVoor = false;
if (isset($galgjeinputletter)){
    foreach($woord as $value){
        if ($galgjeinputletter === $value) {
            $komtVoor = true;
        }
    }
}

if($komtVoor){
    array_push($_SESSION['lettergokgoed'], $galgjeinputletter);
}

if(isset($galgjeinputletter)){
    if(!$komtVoor){
        array_push($_SESSION['lettergokfout'], $galgjeinputletter);
        $_SESSION["fout"]++;
    }
}

$aantalFouten = $_SESSION['fout'];
if($aantalFouten >= 1) {
    echo '<img id="dood" src="bitgalgje'.$aantalFouten.'.png">';
}

?>

<h2>
<?php 
$test = array_diff($woord, $_SESSION['lettergokgoed']);
if($test === $empty){
    echo "je hebt gewonnen";
}
?>
</h2>

<br>

<h3>
<?php 
if(isset($_SESSION['lettergokgoed'])){
    echo implode($_SESSION['lettergokgoed']);
}
?>
</h3>

<br>

<h3>
<?php
if(isset($_SESSION['lettergokfout'])){
    echo implode($_SESSION['lettergokfout']);
}
?>
</h3>

<br>

<h2>
<?php
if($_SESSION['fout'] === 10){
    echo "je hebt verloren oof";
}
?>
</h2>

<?php
foreach($woord as $value){
    if(isset($_SESSION['lettergokgoed'])){
        if (in_array($value, $_SESSION['lettergokgoed'])) {
            echo $value;
        } else {
            echo "_";
        }
    }
}

?>

<form method="POST">
    <input type="submit" name="reset" value="Clear Forum" >
</form>

<?php 
if($_SESSION['fout'] === 11){
    unset($_SESSION['lettergokgoed']);
    unset($_SESSION['lettergokfout']);
    unset($_SESSION['fout']);
    unset($_SESSION['split']);
    header('Location: /php.web/galgje.php');
}

if (isset($_POST['reset'])){
    unset($_SESSION['lettergokgoed']);
    unset($_SESSION['lettergokfout']);
    unset($_SESSION['fout']);
    unset($_SESSION['split']);
    header('Location: /php.web/galgje.php');
}
?>

</body>
</html>