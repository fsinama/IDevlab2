<?php

namespace App\DataFixtures\Data\Portfolio;

abstract class SkillData
{
    const allSkillType = array(self::SiteWeb,self::ApplicationWeb,self::ApplicationMobile,self::BackEnd,
        self::FrontEnd,self::FullStack,self::HTML,self::CSS,self::PHP,self::Symfony,self::Laravel,self::PHP_Symfony_Laravel,
        self::JavaScript,self::DesignGraphique,self::AdobeXD,self::Sketch,
        self::Dart,self::Flutter,self::Dart_Flutter,self::Android,self::IOS,self::Multiplatform);

    const SiteWeb = "Site_Web";
    const ApplicationWeb = "Application_Web";
    const ApplicationMobile = "Application_Mobbile";
    const BackEnd = "BackEnd";
    const FrontEnd = "FrontEnd";
    const FullStack = "FullStack";
    const HTML = "HTML";
    const CSS = "CSS";
    const PHP = "PHP";
    const Symfony = "Symfony";
    const Laravel = "Laravel";
    const PHP_Symfony_Laravel = "PHP - Symfony - Laravel";
    const JavaScript = "JavaScript";
    const DesignGraphique = "Design_Graphique";
    const AdobeXD = "AdobeXD";
    const Sketch = "Sketch";
    const Dart = "Dart";
    const Flutter = "Flutter";
    const Dart_Flutter = "Dart | Flutter";
    const Android = "Android";
    const IOS = "IOS";
    const Multiplatform = "Multiplateform";
}