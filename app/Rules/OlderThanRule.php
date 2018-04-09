<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class OlderThanRule implements Rule
{
    protected $years;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($years)
    {
        $this->years = $years;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Carbon::now()->diff(new Carbon($value))->y >= $this->years;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La cantidad de años debe ser mayor a ' . $this->years;
    }
}
