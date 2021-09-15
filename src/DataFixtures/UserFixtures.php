<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    //On déclere une propriété (privée parce qu'elle ne concerne que la fixture) qui va nous permettre d'accéder au UserPasswordHasherInterface partout dans les méthodes de la classe
    private $encoder;
    /**
     * On met en place un constructeur afin de pouvoir injecter le UserPasswordHasherInterface dans la classe
     * et pouvoir l'utiliser notament dans la méthode load (méthode native dans laquelle on ne peut pas faire l'injection)
     */
    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        // On "mémorise" le UserPasswordHasherInterface injecté dans la propriété de la classe de sorte qu'on aura accès depuis toutes les méthodes de classe
        $this->encoder =$userPasswordHasherInterface;
    }
    public function load(ObjectManager $manager)
    {
        //ADMIN
        //on instancie un utilisateur
        $user = new User();
        //on renseigne la propriété email à l'aide du setter
        $user->setEmail('admin@admin.com');
        // Gestion du mot de passe
        $plainPassword = "pass"; //le mot de passe en claire que l'ont veut encoder
        $encodedPassword = $this->encoder->hashPassword($user, $plainPassword);//on encode le password avec l'encoder mémorisé lors de l'injection dans le constructeur
        $user->setPassword($encodedPassword); //on renseigne la propriété password de l'utilisateur avec le setter
        $user->setRoles(["ROLE_USER", "ROLE_ADMIN"]); //on affecte un role à l'utilisateur
        //on mémorise l'instance d'utilisateur afin de l'ajouter ultérieurment dans la base de données
        $user->setIsVerified(1);//On met la propriété is verified a 1 pour les utilisateurs aient le droit de se connecter sans passer par le proccess du mail de confirmation
        $manager->persist($user);
        
        //SIMPLE USER
        $user = new User();
        $user->setEmail('user@user.com');
        $plainPassword = "pass"; //le mot de passe en claire que l'ont veut encoder
        $encodedPassword = $this->encoder->hashPassword($user, $plainPassword);//on encode le password avec l'encoder mémorisé lors de l'injection dans le constructeur
        $user->setPassword($encodedPassword);
        $user->setRoles(["ROLE_USER"]);//on affecte un role à l'utilisateur
        $user->setIsVerified(1);
        $manager->persist($user);
        //on met en BDD
        $manager->flush();
    }
}
