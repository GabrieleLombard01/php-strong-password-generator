<?php
session_start();
include_once 'functions.php';

// Controllo se è stata inviata una richiesta con la lunghezza della password
if (isset($_GET['password_length'])) {
    $password_length = intval($_GET['password_length']);

    // Controllo che la lunghezza sia valida (tra 8 e 32 caratteri)
    if ($password_length >= 8 && $password_length <= 32) {
        // Verifica se è stata selezionata l'opzione per consentire o meno la ripetizione dello stesso carattere
        $allow_repetition = isset($_GET['allow_repetition']) ? boolval($_GET['allow_repetition']) : false;

        // Genera la password casuale con il parametro aggiuntivo
        $generated_password = generateRandomPassword($password_length, $allow_repetition);

        // Salviamo la password generata nella variabile di sessione
        $_SESSION['generated_password'] = $generated_password;

        // Redirect alla pagina dedicata per mostrare la password
        header('Location: password_page.php');
        exit;
    } else {
        echo "<p>La lunghezza della password deve essere compresa tra 8 e 32 caratteri.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Gabriele Lombardo">
    <meta name="keywords" content="Boolean exercise Classe 100">
    <meta name="description" content="Riproduzione di un generatore per password sicure">
    <!--TODO Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--TODO Bottstrap style-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--TODO Bottstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Strong Password Generator</title>
    <!--! My style -->
    <style>
        /*CSS reset*/
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /*Custom properties*/
        /*Pseudo-classes*/
        /*Generics*/
        body {
            background-image: url(https://w.wallhaven.cc/full/x6/wallhaven-x6pl9v.jpg);
            background-size: cover;
        }

        h1 {
            font-weight: 900;
        }

        p {
            margin-top: 60px;
            text-align: center;
            color: white;
            font-size: 25px;
            font-weight: 600;
            text-shadow: 3px 3px black;
        }

        /*Utilties*/
        .card_bg_grey {
            background-color: rgba(0, 0, 0, 0.750);
        }

        .form_card {
            background-color: rgba(227, 227, 227, 0.8);
            min-height: 200px;
            width: 60%;
            margin: 30px auto;
            border-radius: 10px;
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="card_bg_grey pb-4 mt-5 rounded-3 text-white container container-md container-lg">
        <!-- TITLE -->
        <h1 class="pt-3 text-center">Strong Password Generator</h1>
        <h2 class="pt-1 text-center text-light">Genera una password sicura</h2>
        <!-- FORM -->
        <form method="GET" action="index.php" class="form_card text-black text-center position-relative">
            <div class="row">
                <!--password-->
                <div class="col-12 col-md-6">
                    <label for="password_length">Lunghezza password:</label>
                </div>
                <div class="col-12 col-md-6">
                    <input id="password_length" class="w-50 mx-auto" min="8" max="32" required type="number" name="password_length">
                </div>
            </div>
            <div class="row mt-3">
                <!--ripetizioni-->
                <div class="col-12 col-md-6">
                    <label for="character">Consenti ripetizioni di uno o più caratteri:</label>
                </div>
                <div class="col-12 col-md-6">
                    <input type="radio" name="allow_repetition" value="1"><span class="ps-1 pe-3">Sì</span>
                    <input type="radio" name="allow_repetition" value="0"><span class="ps-1">No</span>
                </div>
                <!--checkbox-->
                <div class="mt-3 col-12 col-md-4">
                    <input type="checkbox"> <span>Lettere</span>
                </div>
                <div class="mt-3 col-12 col-md-4">
                    <input type="checkbox"> <span>Numeri</span>
                </div>
                <div class="mt-3 col-12 col-md-4">
                    <input type="checkbox"> <span>Simboli</span>
                </div>
            </div>

            <!--buttons-->
            <button type="submit" class="mt-3">Invia</button>
            <button type="reset" class="mt-3">Annulla</button>
        </form>
    </div>
</body>

</html>