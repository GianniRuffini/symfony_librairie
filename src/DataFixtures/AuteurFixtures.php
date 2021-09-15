<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AuteurFixtures extends Fixture
{
    //mise en place de féférence pour les auteurs afin de pouvir les utiliser dans la fixture des livres. pour cela on crée des constantes que l'on va associer aux instances d'auteur crées
    public const AUTEUR1 = 'Roba';
    public const AUTEUR2 = 'Akira';
    public const AUTEUR3 = 'Astier';
    public const AUTEUR4 = 'Bilal';
    public const AUTEUR5 = 'Oba';
    public const AUTEUR6 = 'Blancou';

    public function load(ObjectManager $manager)
    {
        $auteur = new Auteur();
        $auteur->setPseudo("Roba");
        $auteur->setNom("Roba");
        $auteur->setPrenom("Jean");
        $auteur->setBiographie("Jean Roba, dit Roba, est un auteur de bande dessinée né le 28 juillet 1930 à Schaerbeek, dans la région de Bruxelles-Capitale, et mort dans la même ville le 14 juin 2006. Il est surtout connu comme l'auteur de la série Boule et Bill, bien qu'il ait réalisé beaucoup d'autres travaux.");
        $auteur->setImageName("roba-612cf589dd880759935383.jpg");
        $manager->persist($auteur);
        //on garde une réference de l'auteur. self:: accède au constante de la classe en statique
        $this->addReference(self::AUTEUR1, $auteur);

        $auteur = new Auteur();
        $auteur->setPseudo("Akira");
        $auteur->setNom("Toriyama");
        $auteur->setPrenom("Akira");
        $auteur->setBiographie("Akira Toriyama est un auteur de manga et character designer japonais né le 5 avril 1955 à Nagoya dans la préfecture d'Aichi. Son œuvre la plus célèbre, Dragon Ball, connaît un très grand succès mondial.");
        $auteur->setImageName("akira-612cf6743cbd2774461454.png");
        $manager->persist($auteur);
        $this->addReference(self::AUTEUR2, $auteur);

        $auteur = new Auteur();
        $auteur->setPseudo("Astier");
        $auteur->setNom("Astier");
        $auteur->setPrenom("Alexandre");
        $auteur->setBiographie("Alexandre Astier, né le 16 juin 1974 à Lyon, est un acteur, réalisateur, humoriste, producteur, scénariste, compositeur, musicien et auteur français.");
        $auteur->setImageName("astier-612cf693db51f003831844.jpg");
        $manager->persist($auteur);
        $this->addReference(self::AUTEUR3, $auteur);

        $auteur = new Auteur();
        $auteur->setPseudo("Bilal");
        $auteur->setNom("Bilal");
        $auteur->setPrenom("Enki");
        $auteur->setBiographie("Enes Bilal, dit Enki Bilal /ɛŋki bilal/, est auteur de bande dessinée et réalisateur français, né le 7 octobre 1951 à Belgrade en Yougoslavie. Son œuvre se situe en partie dans la science-fiction et aborde les thèmes du temps ou de la mémoire. En 1987, il obtient le Grand prix du festival d'Angoulême.");
        $auteur->setImageName("bilal-612cf5dd83c6a890863216.jpg");
        $manager->persist($auteur);
        $this->addReference(self::AUTEUR4, $auteur);

        $auteur = new Auteur();
        $auteur->setPseudo("Oba");
        $auteur->setNom("Oba");
        $auteur->setPrenom("Tsugumi");
        $auteur->setBiographie("Tsugumi Ōba (大場つぐみ, Ōba Tsugumi) est un pseudonyme associé à un scénariste de manga né à Tokyo, dont on ne connait pas l'identité officielle. Il est notamment connu pour ses collaborations avec le dessinateur Takeshi Obata, parmi lesquelles Death Note (2003-2006), Bakuman (2008-2012) et Platinum End (2015-2021).");
        $auteur->setImageName("ohba-612cf644d251f033112793.jpg");
        $manager->persist($auteur);
        $this->addReference(self::AUTEUR5, $auteur);

        $auteur = new Auteur();
        $auteur->setPseudo("Blancou");
        $auteur->setNom("Blancou");
        $auteur->setPrenom("Daniel");
        $auteur->setBiographie("Après un bac Art appliqué, Daniel Blancou tente des concours de bande dessinée et obtient le premier prix au concours scolaire du festival d'Angoulême. Puis il part pour l'École des Arts Déco de Strasbourg. ... Son premier album de bande dessinée paraît en 2008 (Le roi de la savane, Delcourt).");
        $auteur->setImageName("blancou-612cf61aca88d111054273.jpeg");
        $manager->persist($auteur);
        $this->addReference(self::AUTEUR6, $auteur);

        $manager->flush();
    }
}
