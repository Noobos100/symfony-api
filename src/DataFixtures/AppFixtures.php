<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 300; $i++) {
            $user = new User();
            $user->setEmail('a.a' . $i . 'gmail.com');
            $manager->persist($user);
        }
        $manager->flush();
    }
}
