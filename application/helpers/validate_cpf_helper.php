<?php defined('BASEPATH') or exit('No direct script access allowed');

function validate_cpf($cpf)
{
    // Extract only numbers
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    // Verify if type all numbers
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verify if all numbers are equal
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Calculate and compare the first digite
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}
