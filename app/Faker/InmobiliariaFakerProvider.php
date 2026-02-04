<?php

namespace App\Faker;

use Faker\Provider\Base;

class InmobiliariaFakerProvider extends Base
{

    public function numeroCatastral():string{
        return $this->generator->regexify('^\d{7}[A-Z]{7}\d{4}[A-Z]{2}$');

    }

    public function dni():string{
        return $this->generator->regexify('^\d{8}[A-Z]{1}$');

}

}
