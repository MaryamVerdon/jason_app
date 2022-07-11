<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Role;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $roles = [
            "Héros",
            "Combattant",
            "guérisseur",
            "Mage",
            "Navigateur",
            "Cuisinier"
        ];
        $i = 0;
        foreach ($roles as $r) {
            $i++;
            $role = new Role();
            $role->setLibelle($r);
            $manager->persist($role);
            $this->addReference('role' . $i, $role);
        }

        $manager->flush();
    }
}
