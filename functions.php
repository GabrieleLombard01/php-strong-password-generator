<?php
// Funzione per generare una password casuale
function generateRandomPassword($length, $allow_repetition = false)
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
    $password = '';
    $charsLength = strlen($chars);

    for ($i = 0; $i < $length; $i++) {
        if (!$allow_repetition) {
            // Se la ripetizione non è consentita, assicuriamoci che il carattere non sia già presente nella password
            do {
                $char = $chars[rand(0, $charsLength - 1)];
            } while (strpos($password, $char) !== false);
        } else {
            // Se la ripetizione è consentita, selezioniamo il carattere casualmente
            $char = $chars[rand(0, $charsLength - 1)];
        }
        $password .= $char;
    }

    return $password;
}
