<?php

namespace App\DataFixtures\Data\ReportYourBug;

abstract class TypeData
{
    const allType = array(
        "Structurel",
        "Exception",
        "SQL",
        "Syntax",
        "Mapping",
        "Method",
        "Beans",
        "Materiels",
        "IHM",
        "DAL",
        "Conceptions",
        "Droit",
        "Hiérarchique",
        "Package",
        "Gradle",
        "Maven",
        "IDE",
        "Language/Framework",
        "Système",
        "Version",
        "Depôt",
        "Git",
        "Serveur",
        "Réseaux",
    );
}