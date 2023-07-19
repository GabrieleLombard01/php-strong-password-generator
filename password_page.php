<?php
session_start();

// Verifichiamo se la password è stata salvata nella variabile di sessione
if (isset($_SESSION['generated_password'])) {
    $generated_password = $_SESSION['generated_password'];
    // Rimuoviamo la password dalla variabile di sessione dopo averla mostrata
    unset($_SESSION['generated_password']);
} else {
    // Se la password non è stata salvata nella variabile di sessione, reindirizziamo l'utente alla pagina principale
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generata</title>
</head>

<body>
    <h1>Password Generata</h1>
    <p>La password generata è: <strong><?php echo $generated_password; ?></strong></p>
</body>

</html>