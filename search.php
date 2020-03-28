<?php

    $db = mysqli_connect("localhost","root","");
    mysqli_select_db($db, "portal");
    if (isset($_POST['szukaj'])){
        include("header.php");
    }

?>

<form method="POST" action="search.php">
    <b>Marka:</b>
    <select name="marka">
        <?php
            $query = "SELECT DISTINCT marka FROM ogloszenia";
            $result = mysqli_query($db, $query);

            while ($row = mysqli_fetch_array($result))
            {
                echo "<option>".$row['marka']."</option>";
            }
        ?>
    </select>
    <input class="button" type="submit" value="Szukaj" name="szukaj">
</form>

<?php

if (isset($_POST['szukaj']))
{   
    $marka = $_POST['marka'];

    $query = "SELECT * FROM ogloszenia WHERE marka = '$marka'";
    $result = mysqli_query($db, $query);
    
    while ($row = mysqli_fetch_array($result))
    {   
        echo "<div class='search_left'>";
        echo '<img id="img" src="img/'.$row['img'].'">';
        echo "</div>";
        echo "<div class='search_right'>";
        echo "<tr>";
        echo "<td>Marka: ".$row['marka']."</td></br>";
        echo "<td>Model: ".$row['model']."</td></br>";
        echo "<td>Cena: ".$row['cena']."</td></br>";
        echo "<td>Rok produkcji: ".$row['rok_produkcji']."</td></br>";
        echo "<td>Przebieg: ".$row['przebieg']."</td></br>";
        echo "<td>Rodzaj paliwa: ".$row['rodzaj_paliwa']."</td></br>";
        echo "<td>Użytkownik: ".$row['id_uzytkownika']."</td></br>";
        echo "</tr></br>";
        echo "</div>";
    }
    include("footer.php");
    mysqli_close($db);
}

?>

