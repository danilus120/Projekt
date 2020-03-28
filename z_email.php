<?php
    include("header.php");
?>
    <h2>Zmiana Email</h2>
    <form method="POST" action="z_email.php">
        <b>Hasło:</b> <input class="wpis" type="password" name="s_haslo"><br>
        <b>Nowy email:</b> <input class="wpis" type="text" name="n_email"><br><br>
        <input class="button" type="submit" value="Zmień" name="zmien2">
    </form>

    <?php
        $db = mysqli_connect("localhost","root","");
        mysqli_select_db($db, "portal");

        if (isset($_POST['zmien2']))
        {
            $login = $_SESSION['login'];
            if(isset($_POST['s_haslo'])){
                $s_haslo = $_POST['s_haslo'];
            } else {
                ?> <h3>Proszę podać hasło</h3> <?php
                include('footer.php');
                return;
            } 

            if(isset($_POST['n_email'])){
                $n_email = $_POST['n_email'];
            } else {
                ?> <h3>Proszę podać nowy email</h3> <?php
                include('footer.php');
                return;
            } 

            
            if (mysqli_num_rows(mysqli_query($db, "SELECT login, haslo FROM uzytkownicy WHERE login = '".$login."' AND haslo = '".$s_haslo."';")) > 0)
            {
                $query = "UPDATE uzytkownicy SET email = '".$n_email."' WHERE login = '".$login."' AND haslo = '".$s_haslo."';";
                $result = mysqli_query($db, $query);
                if($result){
                    ?> <h3>Email został zmieniony</h3> <?php
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