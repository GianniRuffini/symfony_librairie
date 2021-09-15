<?php

namespace App\DataFixtures;

use App\Entity\Livre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LivreFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $date = new \DateTimeImmutable();
        
        $livre = new Livre();
        $livre->setTitre("Boule et bill");
        $livre->setDescription("La BD préférée des enfants revient après son succès en dessin animé et au cinéma ! Boule, c'est un petit garçon joyeux, espiègle, pas très travailleur mais extrêmement malin. Bill, vous avez dit chien ? Oui, mais pas n'importe lequel, ce coquin de cocker est aussi adorable, hilarant, menteur, parfois réfractaire au bain mais avec un coeur gros comme ça. Entre Boule & Bill, c'est une grande histoire d'amitié, de bêtises, d'aventures rocambolesques et surtout de complicité.");
        //comme on a des reference au auteur dans auteurfixtures, on rezcupere ces reference (objet de type auteur) afin de la declarer dans la proprieter auteur livre
        $livre->setAuteur($this->getReference(AuteurFixtures::AUTEUR1));
        $livre->setUpdatedAt($date);
        $livre->setImageName("boule-et-bill-612cb42b54ea2279774935.jpg");
        $manager->persist($livre);

        $livre = new Livre();
        $livre->setTitre("Death note");
        $livre->setDescription("Light Yagami est un lycéen surdoué qui juge le monde actuel criminel, pourri et corrompu. Sa vie change du tout au tout le jour où il ramasse par hasard un mystérieux cahier intitulé « Death Note ». Son mode d'emploi indique que « la personne dont le nom est écrit dans ce cahier meurt ».");
        $livre->setAuteur($this->getReference(AuteurFixtures::AUTEUR5));
        $livre->setUpdatedAt($date);
        $livre->setImageName("death-note-612cb43290491935083968.jpg");
        $manager->persist($livre);

        $livre = new Livre();
        $livre->setTitre("Dragon ball");
        $livre->setDescription("Dragon Ball est une série de mangas créée par Akira Toriyama, celui-ci s'inspirant librement du roman de Wu Cheng'en La Pérégrination vers l'Ouest. Elle est prépubliée dans le magazine Weekly Shōnen Jump de 1984 à 1995 et éditée en 42 volumes reliés de 1985 à 1995 par Shūeisha.");
        $livre->setAuteur($this->getReference(AuteurFixtures::AUTEUR2));
        $livre->setUpdatedAt($date);
        $livre->setImageName("dragon-ball-612cb44db38e9177434040.jpg");
        $manager->persist($livre);

        $livre = new Livre();
        $livre->setTitre("Dragon ball super");
        $livre->setDescription("Dragon Ball Super (ドラゴンボール超) est une série produite par Tôei Animation en 2015 et achevée le 25 mars 2018. ... L'histoire est écrite directement par Akira Toriyama et ne prend pas en compte le scénario de Dragon Ball GT.La série compte à ce jour 131 épisodes, divisés en cinq sagas, bien que la dernière soit la plus longue.");
        $livre->setAuteur($this->getReference(AuteurFixtures::AUTEUR2));
        $livre->setUpdatedAt($date);
        $livre->setImageName("dragon-ball-super-612cb43c845e1021485157.jpg");
        $manager->persist($livre);

        $livre = new Livre();
        $livre->setTitre("Dragon ball z");
        $livre->setDescription("Dragon Ball Z (ドラゴンボールZ(ゼット), Doragon Bōru Zetto, abréviation commune DBZ) est une série télévisée d'animation japonaise adaptée de la franchise Dragon Ball d'Akira Toriyama et produite par Toei Animation. Cette série fait suite à l'anime Dragon Ball et adapte les vingt-six derniers volumes du manga.");
        $livre->setAuteur($this->getReference(AuteurFixtures::AUTEUR2));
        $livre->setUpdatedAt($date);
        $livre->setImageName("dragon-ball-z-612cb44536dd0744461347.jpg");
        $manager->persist($livre);

        $livre = new Livre();
        $livre->setTitre("Kaamelott livre 1");
        $livre->setDescription("Kaamelott est une série télévisée française humoristique et dramatique de fantasy historique créée par Alexandre Astier, Alain Kappauf et Jean-Yves Robin et diffusée entre le 3 janvier 2005 et le 31 octobre 2009 sur M6. ... L'évolution du format et des scénarios transforme ce qui était une série en feuilleton télévisé.");
        $livre->setAuteur($this->getReference(AuteurFixtures::AUTEUR3));
        $livre->setUpdatedAt($date);
        $livre->setImageName("kaamelott-livre-1-612cb55d27cba478306095.jpg");
        $manager->persist($livre);

        $livre = new Livre();
        $livre->setTitre("Kaamelott livre 2");
        $livre->setDescription("Kaamelott est une série télévisée française humoristique et dramatique de fantasy historique créée par Alexandre Astier, Alain Kappauf et Jean-Yves Robin et diffusée entre le 3 janvier 2005 et le 31 octobre 2009 sur M6. ... L'évolution du format et des scénarios transforme ce qui était une série en feuilleton télévisé.");
        $livre->setAuteur($this->getReference(AuteurFixtures::AUTEUR3));
        $livre->setUpdatedAt($date);
        $livre->setImageName("kaamelott-livre-2-612cb5930d46f737185925.jpg");
        $manager->persist($livre);

        $livre = new Livre();
        $livre->setTitre("Kaamelott livre 3");
        $livre->setDescription("Kaamelott est une série télévisée française humoristique et dramatique de fantasy historique créée par Alexandre Astier, Alain Kappauf et Jean-Yves Robin et diffusée entre le 3 janvier 2005 et le 31 octobre 2009 sur M6. ... L'évolution du format et des scénarios transforme ce qui était une série en feuilleton télévisé.");
        $livre->setAuteur($this->getReference(AuteurFixtures::AUTEUR3));
        $livre->setUpdatedAt($date);
        $livre->setImageName("kaamelott-livre-3-612cb455ccc7d981439080.jpg");
        $manager->persist($livre);

        $livre = new Livre();
        $livre->setTitre("Kaamelott livre 4");
        $livre->setDescription("Kaamelott est une série télévisée française humoristique et dramatique de fantasy historique créée par Alexandre Astier, Alain Kappauf et Jean-Yves Robin et diffusée entre le 3 janvier 2005 et le 31 octobre 2009 sur M6. ... L'évolution du format et des scénarios transforme ce qui était une série en feuilleton télévisé.");
        $livre->setAuteur($this->getReference(AuteurFixtures::AUTEUR3));
        $livre->setUpdatedAt($date);
        $livre->setImageName("kaamelott-livre-4-612cb4f7826c9396812227.jpg");
        $manager->persist($livre);

        $livre = new Livre();
        $livre->setTitre("Kaamelott livre 5");
        $livre->setDescription("Kaamelott est une série télévisée française humoristique et dramatique de fantasy historique créée par Alexandre Astier, Alain Kappauf et Jean-Yves Robin et diffusée entre le 3 janvier 2005 et le 31 octobre 2009 sur M6. ... L'évolution du format et des scénarios transforme ce qui était une série en feuilleton télévisé.");
        $livre->setAuteur($this->getReference(AuteurFixtures::AUTEUR3));
        $livre->setUpdatedAt($date);
        $livre->setImageName("kaamelott-livre-5-612cb52e76606327316552.jpg");
        $manager->persist($livre);

        $livre = new Livre();
        $livre->setTitre("Kaamelott livre 6");
        $livre->setDescription("Kaamelott est une série télévisée française humoristique et dramatique de fantasy historique créée par Alexandre Astier, Alain Kappauf et Jean-Yves Robin et diffusée entre le 3 janvier 2005 et le 31 octobre 2009 sur M6. ... L'évolution du format et des scénarios transforme ce qui était une série en feuilleton télévisé.");
        $livre->setAuteur($this->getReference(AuteurFixtures::AUTEUR3));
        $livre->setUpdatedAt($date);
        $livre->setImageName("kaamelott-livre-6-612cb5c6e01d4055023876.jpg");
        $manager->persist($livre);


        $manager->flush();
    }
}
