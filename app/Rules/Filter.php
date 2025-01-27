<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Filter implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected $forbidden;

    public function __construct(string $forbidden)
    {
        $this->forbidden = $forbidden;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        if (strtolower($value) == strtolower($this->forbidden)) {
            $fail('The :attribute is  not allowed');
        }
    }

    // public function message(): string
    // {
    //     return 'The :attribute is  not allowed';
    // }
}
