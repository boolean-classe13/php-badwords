<?php
// Creare una variabile con un paragrafo di testo.
// Visualizzare a schermo il paragrafo con la relative lunghezza e sostituire la badword passata in GET con tre *.

$testo = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

// recupero la lunghezza del testo
$lunghezza = strlen($testo);

// verifico che l'array con i parametri in GET non sia vuoto
if(!empty($_GET)) {
    // recupero il parametro "badword" passato in GET
    $badword = $_GET['badword'];
}

// preparo una variabile che conterrà il numero di sostituzioni avvenute
$numero_sostizioni = 0;

// verifico che la variabile $badword sia definita e non contenga "" (stringa vuota)
if(!empty($badword)) {
    // sostituisco la badword con ***
    $testo_censurato = str_ireplace($badword, '***', $testo, $numero_sostizioni);

} else {
    // la variaible badword non è definita o è una stringa vuota
    $badword = '- non fornita -';
    // il testo censurato è uguale al testo originale (nessuna censura)
    $testo_censurato = $testo;
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Badword</title>
    </head>
    <body>
        <h1>Testo non censurato</h1>
        <p><?php echo $testo; ?></p>
        <h1>Lunghezza testo: <?php echo $lunghezza; ?> caratteri</h1>
        <h1>Parola da censurare: <?php echo $badword; ?></h1>
        <h1>Testo censurato:</h1>
        <p><?php echo $testo_censurato; ?></p>
        <h1>Numero sostituzioni: <?php echo $numero_sostizioni; ?></h1>
    </body>
</html>
