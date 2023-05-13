<?php

$pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');

$nombre_couverts = $_POST["platesValue"];
$date = $_POST["date"];
$heure = $_POST["hour"];

// Requête SQL pour vérifier la disponibilité des tables
$resultat = $pdo->query("SELECT COUNT(*) as bookingLimit FROM booking WHERE date= :date AND heure= :hour");
$row = $resultat->fetch(PDO::FETCH_ASSOC);

// Vérification de la disponibilité des tables
if ($row['total'] < 10) {
    echo "OK"; // Si des tables sont disponibles, renvoie la réponse "OK"
} else {
    echo "COMPLET"; // Si toutes les tables sont réservées, renvoie la réponse "COMPLET"
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Réservation de restaurant</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#reservation-form').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'reservation.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#reservation-message').html(response);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1>Réservation de restaurant</h1>
    
        <label for="nombre_couverts">Nombre de couverts :</label>
        <select id="nombre_couverts" name="nombre_couverts">
            <option value="1">1 personne</option>
            <option value="2">2 personnes</option>
            <option value="3">3 personnes</option>
            <option value="4">4 personnes</option>
        </select>
        <br>
        <label for="date">Date :</label>
        <input type="date" id="date" name="date">
        <br>
        <label for="heure">Heure :</label>
        <select id="heure" name="heure">
            <option value="12:00">12:00</option>
            <option value="12:15">12:15</option>
            <option value="12:30">12:30</option>
            <option value="12:45">12:45</option>
            <option value="13:00">13:00</option>
            <option value="13:15">13:15</option>
            <option value="13:30">13:30</option>
            <option value="13:45">13:45</option>
            <option value="14:00">14:00</option>
        </select>
        <br>
        <label for="allergies">Allergies :</label>
        <input type="text" id="allergies" name="allergies">
        <br>
        <input type="submit" value="Réserver">
    
    <div id="reservation-message"></div>
</body>
</html>

<?php 
                       $sql ="SELECT `timeNoonOpening`, `timeNoonEnd` FROM `schedule` WHERE 'days' = 'Lundi';";
                       $stmt = $pdo->prepare($sql);
                       $stmt->execute();
                       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       ?>
                       
                       <button type="submit"><?php echo $row['timeNoonOpening']?> </button>
                       <br>
                       <p>Horaire du Soir</p>
                       <button type="submit"><?php echo $row['timeNoonEnd']?> </button>
                       <?php 
                      } 
                      ?>  