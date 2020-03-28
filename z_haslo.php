<?php
    include("header.php");
?>
    <h2>Zmiana Hasła</h2>
    <form method="POST" action="z_haslo.php">
        <b>Stare hasło:</b> <input class="wpis" type="password" name="s_haslo"><br>
        <b>Nowe hasło:</b> <input class="wpis" type="password" name="n_haslo"><br><br>
        <input class="button" type="submit" value="Zmień" name="zmien">
    </form>

    <?php
        $db = mysqli_connect("localhost","root","");
        mysqli_select_db($db, "portal");

        if (isset($_POST['zmien']))
        {
            $login = $_SESSION['login'];

            if(isset($_POST['s_haslo'])){
                $s_haslo = $_POST['s_haslo'];
            } else {
                ?> <h3>Proszę podać stare hasło</h3> <?php
                include('footer.php');
                return;
            } 

            if(isset($_POST['n_haslo'])){
                $n_haslo = $_POST['n_haslo'];
            } else {
                ?> <h3>Proszę podać nowe hasło</h3> <?php
                include('footer.php');
                return;
            } 

            
            if (mysqli_num_rows(mysqli_query($db, "SELECT login, haslo FROM uzytkownicy WHERE login = '".$login."' AND haslo = '".$s_haslo."';")) > 0)
            {
                $query = "UPDATE uzytkownicy SET haslo = '".$n_haslo."' WHERE login = '".$login."' AND haslo = '".$s_haslo."';";
                $result = mysqli_query($db, $query);
                if($result){
                    ?> <h3>Hasło zostało zmienione</h3> <?php
                    include('footer.php');
                    return;
                }
                
            }
            else ?> <h3>Hasła nie pasują</h3> <?php
        }
        mysqli_close($db);
    ?>
<?php
    include("footer.php");
?>