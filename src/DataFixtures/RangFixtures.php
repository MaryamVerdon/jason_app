<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Rang;

class RangFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $rangs = [
            "Dieu",
            "Demi Dieu",
            "Mortel",
            "Gorgone"
        ];
        $i = 0;
        foreach ($rangs as $r) {
            $i++;
            $rang = new Rang();
            $rang->setLibelle($r);
            $manager->persist($rang);
            $this->addReference('rang' . $i, $rang);
        }

        $manager->flush();
    }
}
