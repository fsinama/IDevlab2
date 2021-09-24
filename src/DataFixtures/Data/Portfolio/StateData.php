<?php

namespace App\DataFixtures\Data\Portfolio;

abstract class StateData
{
    const allStateType = array(self::Afaire, self::EnCours, self::Terminer);

    const Afaire = "À faire";
    const EnCours = "En cours";
    const Terminer = "Terminer";
}