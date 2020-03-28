<?php 
    include("header.php");
?>

<section class="rejestracja">
    <h1> Utwórz konto administratora</h1>
    <form method="POST" action="rejestracja_a.php">
        <b>Login:</b> <input class="wpis" type="text" name="login"><br><br>
        <b>Hasło:</b> <input class="wpis" type="password" name="haslo1"><br>
        <b>Powtórz hasło:</b> <input class="wpis" type="password" name="haslo2"><br><br>
        <b>Email:</b> <input class="wpis" type="text" name="email"><br>
        <input class="button" type="submit" value="Utwórz konto" name="rejestruj">
    </form>

    <?php
        $db = mysqli_connect("localhost","root","");
        mysqli_select_db($db, "portal");

        if (isset($_POST['rejestruj']))
        {
            $login = $_POST['login'];
            $haslo1 = $_POST['haslo1'];
            $email = $_POST['email'];
            
            if(isset($_POST['login'])){
                $login = $_POST['login'];
            } else {
                ?> <h3>Proszę podać login</h3> <?php
                include('footer.php');
                return;
            } 
            
            if(isset($_POST['haslo1'])){
                $haslo1 = $_POST['haslo1'];
            } else {
                ?> <h3>Proszę podać hasło</h3> <?php
                include('footer.php');
                return;
            } 

            if ($haslo1 != $_POST['haslo2']){
                ?> <h3>Hasła nie są takie same!</h3> <?php
                include('footer.php');
                return;
            }

            if(isset($_POST['email'])){
                $email = $_POST['email'];
            } else {
                ?> <h3>Proszę podać email</h3> <?php
                include('footer.php');
                return;
            }
            

            // sprawdzamy czy login nie jest już w bazie
            if (mysqli_num_rows(mysqli_query($db, "SELECT login FROM uzytkownicy WHERE login = '".$login."';")) == 0)
            {
                $query = "INSERT INTO uzytkownicy (login, haslo, email, rejestracja, logowanie, a) VALUES ('".$login."', '".$haslo1."', '".$email."', ".time().", ".time().", true)";
                $result = mysqli_query($db, $query);
                if($result){
                    ?> <h3>Konto zostało utworzone</h3> <?php
                    include('footer.php');
                    return;
                }
                
            }
            else ?> <h3>Podany login jest już zajęty.</h3> <?php
        }
        mysqli_close($db);
    ?>
    
</section>
<?php include("footer.php"); ?>




