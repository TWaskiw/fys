<?php
    include("mysql.php");
    session_start();
        if(!isset($_SESSION['number'])) {
        header('location: login.php?error=noLogin');
        exit;
    }
    include_once 'components/header.php';

    // Vi kalder på funktionen CallMySQL for at kører en sql query så vi kan få fat i alle informationer omkring brugeren der er logget ind.
    function CallMySQL($sqlQuery) {
        global $mySQL;

        $json = [];
        $users = [];
        $number = $_SESSION['number'];

        $sqlQuery = "SELECT * FROM userTable WHERE number='$number'";
        $result = $mySQL->query($sqlQuery);

        while($row = $result->fetch_object()){
            $users[] = $row;
        }
       
        $json["users"] = $users;

        return json_encode($json);
    }
    
    // Vi looper igennem dataen og sætter indformationen ind i formen, så brugeren kan se og redigerer i de ønskede ting.
        $sql = "SELECT * FROM userTable";
        $data = json_decode(CallMySQL($sql));
        foreach($data as $user){
            foreach($user as $info){
            echo '<div class="form-form-register"><h1 style="text-align:center"> Redigér oplysninger</h1><br>';
            if (isset($_GET["status"])) {
                if ($_GET["status"] == "success") {
                    echo "<p class='update_success'>Din information blev opdateret</p>";
                }
                else if ($_GET["status"] == "fail_empty") {
                    echo "<p class='update_fail'>Udfyld alle felter</p>";
                }
            }
        
            echo '<form class="opdater-form" action="opdater-backend.php" name="register" method="post">
            <div class="input-group">
            <input type="text" name="name" value="'.$info->firstname.'">
            <label for="name">Fornavn</label>
            </div>
            <div class="input-group">
            <input type="text" name="lastname" value="'.$info->lastname.'">
            <label for="lastname">Efternavn</label>
            </div>
            <div class="input-group">
            <input type="text" name="email" value="'.$info->email.'">
            <label for="email">Email</label>
            </div>
            
            
            <button class="opdater-button" type="submit" name="update">Gem opdateringer</button>
            </form></div>';
        }
     }

          include_once 'components/footer.php';
?>
