<?php 
    include("mysql.php");
    session_start();
    include_once 'components/header.php'; 
    if(isset($_SESSION['id'])) {
    header('location: welcome.php?status=loggedin');
    exit; 
    }

?>

<html>
<body>
<div class="background-img-login">
    <div class="form-form-register">
    <form class="form-register" action="register-backend.php" name="register" method="post">
        <div class="form-flex">
            <div class="register-info">
            <h1 class="register-form-header">Opret Bruger</h1>
                <!-- Hvert input-felt er lavet, så der sættes en session i gang når brugeren prøver at oprette en bruger (trykker submit). Hvis der skulle opstå fejl og brugeren skal prøve igen, vil hvert
            input-felt blive udfyldt med SESSION's værdi, altså det brugeren indtastede ved sit første forsøg. Det gør at brugeren ikke bliver frustreret over at skulle udfylde alt igen og igen,
            personen har problemer med at registrer sig. -->
                <div class="input-group">
                    <input type="text" name="firstname" <?php if(isset($_SESSION['firstname'])!=""){ 
                        echo " value='".$_SESSION['firstname']."'"; }?>>
                    <label for="firstname">Fornavn</label>
                </div>

                <div class="input-group">
                    <input type="text" name="lastname" <?php if(isset($_SESSION['lastname'])!=""){ 
                        echo " value='".$_SESSION['lastname']."'"; }?>>
                    <label for="lastname">Efternavn</label>
                </div>

                <div class="input-group">
                    <input type="number" name="number" <?php if(isset($_SESSION['number'])!=""){ 
                        echo " value='".$_SESSION['number']."'"; }?>>
                    <label for="number">Telefon</label>
                </div>

                <div class="input-group">
                    <input type="text" name="email" <?php if(isset($_SESSION['email'])!=""){ 
                        echo " value='".$_SESSION['email']."'"; }?>>
                    <label for="email">E-Mail</label>
                </div>

                <div class="input-group">
                    <select class="selectGender" type="text" name="gender">
                        <option value="mand">Mand</option>
                        <option value="kvinde">Kvinde</option>
                    </select>
                    <label for="gender">Køn</label>
                </div>
            </div>

            <div class="register-login">
                <!-- SESSION's funktionen har vi dog ikke sat på kodeord's felterne - da vi dermed sikre brugeren altid har styr på hvilken adgangskode der er skrevet i felterne. -->
                    <div class="input-group">
                        <input type="password" name="password">
                        <label for="password">Adgangskode</label>
                    </div>
                
                    <div class="input-group">
                        <input type="password" name="passwordRepeat">
                        <label for="passwordRepeat">Gentag Adgangskode</label>
                    </div>

                    <button class="default-button" type="submit" name="submit">Tilmeld</button>
                    <div class="alleredeTilmeldtP">
                    <p>Allerede tilmeldt?</p> 
                    <p class="alleredeTilmeldt2"><a href="login.php">Log ind her</a></p>  
                    </div>     
                    <!-- Herunder har vi vores fejl-håndteringer. Ved at kigge på hvilke værdier der bliver sendt tilbage i URL'en med POST, giver vi en fejlmeddelse afhængig af den. -->             
                    <?php 
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyField") {
                                echo "<p class='register-error'>*Udfyld alle felter </p>";
                            }
                            else if ($_GET["error"] == "numberTaken") {
                                echo "<p class='register-error'>*En bruger med dette telefonnummer findes allerede</p>";
                            } 
                            else if ($_GET["error"] == "incorrectNumber") {
                                echo "<p class='register-error'>*Telefon nummer skal kun bestå af 8 tal, uden mellemrum.</p>";
                            } 
                            else if ($_GET["error"] == "wrongPassword") {
                                echo "<p class='register-error'>*Kodeord stemmer ikke overens </p>";
                            }
                            else if ($_GET["error"] == "none") {
                                echo '<script>alert("Du er nu registreret!")</script>';
                            }
                        }
                    ?>
            </div>
        </div>
    </div>
</form>
</div>
