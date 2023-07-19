<?php
// Funzione per generare una password casuale
function generateRandomPassword($length)
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
    $password = '';
    $charsLength = strlen($chars);

    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[rand(0, $charsLength - 1)];
    }

    return $password;
}
