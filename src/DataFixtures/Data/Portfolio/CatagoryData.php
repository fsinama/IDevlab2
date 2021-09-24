<?php

namespace App\DataFixtures\Data\Portfolio;

abstract class CatagoryData
{
    const allCategoryType = array(self::SiteWeb,self::ApplicationWeb,self::ApplicationMobile, self::DesignGraphique, self::Logiciel,self::Logo);

    const SiteWeb = "Site_Web";
    const ApplicationWeb = "Application_Web";
    const ApplicationMobile = "Application_Mobbile";
    const DesignGraphique = "Design_Graphique";
    const Logiciel = "Logiciel";
    const Logo = "Logo";
}