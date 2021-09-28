<?php

namespace App\Tools;

abstract class Roles{

    const allGranted = array(self::USER,self::ADMIN,self::SUPER_ADMIN);
    const allRoles = array(self::USER_Display,self::ADMIN_Display,self::SUPER_ADMIN_Display);

    const USER = "ROLE_USER";
    const ADMIN = "ROLE_ADMIN";
    const SUPER_ADMIN = "ROLE_SUPER_ADMIN";
    const USER_Display= "Utilisateur";
    const ADMIN_Display = "Administrateur";
    const SUPER_ADMIN_Display = "Super Administrateur";

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