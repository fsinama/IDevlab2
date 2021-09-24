<?php

namespace App\DataFixtures\Data\Portfolio;

abstract class CatagoryData
{
    const allCategoryType = array(self::SiteWeb,self::ApplicationWeb,self::ApplicationMobile,
        self::Prototype, self::Logiciel,self::Logo,self::Multiplatform);

    const SiteWeb = "Site_Web";
    const ApplicationWeb = "Application_Web";
    const ApplicationMobile = "Application_Mobile";
    const Prototype = "Prototype";
    const Logiciel = "Logiciel";
    const Logo = "Logo";
    const Multiplatform = "Multiplateform";
}