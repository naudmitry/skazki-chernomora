<?php

namespace App\Validators;

class DomainName
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        return preg_match('/^((?!-)[A-Za-z0-9-]{1,63}(?<!-)\\.)+[A-Za-z]{2,6}$/', $value);
    }
}