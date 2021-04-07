<?php

namespace App\Tools;

abstract class Roles{
    const USER = "ROLE_USER";
    const ADMIN = "ROLE_ADMIN";
    const SUPER_ADMIN = "ROLE_SUPER_ADMIN";

    static function Random() : String
    {
        $randomNumber = rand(1,3);
        $returnValue = self::USER;

        switch ($randomNumber) {
            case 1 :
                $returnValue = self::USER;
                break;

            case 2 :
                $returnValue = self::ADMIN;
                break;

            case 3 :
                $returnValue = self::SUPER_ADMIN;
                break;
        }

        return $returnValue;
    }
}