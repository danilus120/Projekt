<?php include("header.php"); ?>

<?php
    $db = mysqli_connect("localhost","root","");
    mysqli_select_db($db, "portal");
?>

<form method="POST" action="logowanie.php">
    <b>Login:</b> <input type="text" name="login"><br>
    <b>Hasło:</b> <input type="password" name="haslo"><br>
    <input class="button" type="submit" value="Zaloguj" name="loguj">
</form>

<?php

if (isset($_POST['loguj']))
{
    $login = $_POST['login'];
    $haslo =$_POST['haslo'];

    // sprawdzamy czy login i hasło są dobre
    if (mysqli_num_rows(mysqli_query($db, "SELECT login, haslo FROM uzytkownicy WHERE login = '".$login."' AND haslo = '".$haslo."';")) > 0)
    {
        // uaktualniamy date logowania
        $timestamp = time();
        $query = "UPDATE `uzytkownicy` SET (`logowanie` = '".$timestamp.") WHERE login = '".$login."';";
        $result = mysqli_query($db, $query);
        
        $_SESSION["zalogowany"] = true;
        $_SESSION["login"] = $login;

        if (isset($_SESSION["zalogowany"])) {
            header('Location: index.php');
        }
        // zalogowany

    }
    else echo "Wpisano złe dane.";
    mysqli_close($db);
}

?>

<?php include("footer.php"); ?>




