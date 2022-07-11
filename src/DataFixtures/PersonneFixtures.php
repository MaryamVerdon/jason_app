<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Personne;
use Faker;

class PersonneFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            RangFixtures::class,
            RoleFixtures::class
        ];
    }

    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 100; $i++) {


            $personne = new Personne();
            $personne->setPrenom($faker->userName());
            $personne->setAge(random_int(18, 60));
            $personne->setDescription("Lorem ipsum dolor sit amet. Qui consequuntur iste quo deserunt voluptatum non nihil molestiae qui reiciendis aspernatur! Et autem dolores nam voluptates saepe eos maxime voluptatem eum voluptatibus accusantium vel impedit blanditiis vel optio explicabo qui aliquam totam. ");
            $personne->setFaiblesse($faker->sentence(1));
            $personne->setPtFort($faker->sentence(1));
            $personne->setMail($personne->getPrenom() . "@gmail.com");
            $personne->setPhoto("https://st3.depositphotos.com/2430771/12865/v/950/depositphotos_128651456-stock-illustration-ancient-greek-helmet-with-a.jpg");
            $personne->setSexe(random_int(0, 1));
            $personne->setVille($faker->city());
            $personne->setRang($this->getReference('rang' . random_int(1, 4)));
            $personne->setRole($this->getReference('role' . random_int(1, 6)));
            $manager->persist($personne);
        }

        $manager->flush();
    }
}
