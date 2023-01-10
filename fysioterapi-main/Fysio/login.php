<?php 
    include("mysql.php");
    session_start();
    include_once 'components/header.php';
    if (isset($_SESSION['id'])) {
        header('location: index.php');
    } 

    if (isset($_GET["error"])) {
        if ($_GET["error"] == "none") {
        echo '<script>alert("Du er nu registreret!")</script>';
        }
    }
?>
<div class="background-img-login">
    <div class="login-form">
    <h1 class="login-form-header">Log ind</h1>
     <form class="form-login" action="login-backend.php" method="post">

        <div class="input-group">
            <input type="text" name="number" placeholder="Telefonnummer">
            <label for="number">Brugernavn</label>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Adgangskode...">
            <label for="password">Adgangskode</label>
        </div>

        <button class="default-button" type="submit" name="submit">Log ind</button>
        <div class="opret-bruger"> <p>Ikke oprettet endnu?</p><a href="register.php">Opret bruger</a></div> 
        <!-- Hvis login-processen ikke går igennem, returnerer backenden med en givet fejl - med dem vil vi herunder give brugeren besked om, hvor fejlen skete. -->
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyField") {
                    echo "<p class='register-error'>Alle felter skal udfyldes</p>";
                }
                else if ($_GET["error"] == "wrongLogin") {
                    echo "<p class='register-error'>Forkert login, prøv igen</p>";
                }
            } 
        ?>
     </form>
    
    </div>
 </div>


