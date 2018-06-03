<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CurrencyRule implements Rule
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
        return preg_match("/^\d*(\.\d{1,2})?$/", $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Monto o formato incorrecto';
    }
}
