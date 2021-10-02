<?php

namespace App\DataFixtures\Data\Portfolio;

abstract class PortfolioData
{
    const allProjectName = array(self::IDevLab,self::IDevLab2,self::Projeo, self::Keyros, self::MyBugs,self::RYB,self::CrossInc,self::MyStuff,
        self::MyArchery,self::ACTA,self::Aostart);

    const IDevLab = "IDevLab";
    const IDevLab2 = "IDevLab2.0";
    const Projeo = "Projeo";
    const Keyros = "Keyros";
    const MyBugs = "MyBugs";
    const RYB = "ReportYourBug";
    const CrossInc = "CrossInc";
    const MyStuff = "MyStuff";
    const MyArchery = "MyArchery";
    const ACTA = "ACTA";
    const Aostart = "Aostart";
}