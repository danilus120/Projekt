<?php
        $db = mysqli_connect("localhost","root","");
        mysqli_select_db($db, "portal");

        $query = "SELECT id_uzytkownika, marka, model, cena, rok_produkcji, przebieg, rodzaj_paliwa, img FROM ogloszenia";
        $result = mysqli_query($db, $query);

        echo '<div class="single_post">';
        while ($row = mysqli_fetch_array($result))
        {
            echo '<div class="single_post--left">';
            echo '<img style="height:200px; width:300px;" src="img/'.$row['img'].'">';
            echo "</div>";
            echo '<div class="single_post--right">';
            echo "Marka: ".$row['marka']."</br>";
            echo "Model: ".$row['model']."</br>";
            echo "Cena: ".$row['cena']."</br>";
            echo "Rok produkcji: ".$row['rok_produkcji']."</br>";
            echo "Przebieg: ".$row['przebieg']."</br>";
            echo "Rodzaj paliwa: ".$row['rodzaj_paliwa']."</br>";
            echo "Użytkownik: ".$row['id_uzytkownika']."</br>";
            echo "</div></br>";
            echo "</div>";
            echo '<div class="single_post">';
        }
        echo "</div>";
        mysqli_close($db);

    ?>