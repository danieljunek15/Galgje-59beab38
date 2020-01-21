<?php

?>



<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>HangmanIntro.Bob</title>
</head>
<body>

<img src="bit project banner.png" alt="Banner" >
<h1>Welcome to Bob Hangman chose your type of game play</h1>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div id="FormInput">
    <div class="form">
        <form action="/php.web/galgjeGame.php?random=true" method="POST"> 
            <h2>Pick a random word</h2><br>
            <input type="submit" value="Submit" id="ButtonRandomWord">
        </form>
    </div>
    <div class="form">
        <form action="/php.web/galgjeGame.php" method="POST">
            <h2>Type a word</h2><br>
            <input type="text" placeholder="Type here" name="galgjeword" pattern="[A-Za-z]{1}">
            <input type="submit" value="Submit" id="ButtonTypeWord">
        </form>
    </div>
</div>

</body>
</html>