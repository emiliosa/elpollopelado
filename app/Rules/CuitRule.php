<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CuitRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!preg_match("/^\d{2}-\d{8}-\d{1}$/", $value)) {
            return false;
        }
        $aMult = '5432765432';
        $aMult = explode('', $aMult);
        $sCUIT = str_repleace(['-', '_', ' '], '', $value);
        if ($sCUIT && $sCUIT != 0 && count($sCUIT) == 11) {
            $aCUIT = explode('', $sCUIT);
            $iResult = 0;
            for ($i = 0; $i <= 9; $i++) {
                $iResult += $aCUIT[$i] * $aMult[$i];
            }
            $iResult = ($iResult % 11);
            $iResult = 11 - $iResult;
            if ($iResult == 11) {
                $iResult = 0;
            }
            if ($iResult == 10) {
                $iResult = 9;
            }
            if ($iResult == $aCUIT[10]) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Formato de CUIT/CUIL incorrecto';
    }
}
