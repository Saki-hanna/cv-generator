<?php

namespace App\DataFixtures;

use App\Entity\SkillCategories;
use App\Entity\Skills;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $skillCategoryFramework = new SkillCategories();
        $skillCategoryFramework->setCategoryName('Framework');
        $manager->persist($skillCategoryFramework);

        $skillCategoryCI = new SkillCategories();
        $skillCategoryCI->setCategoryName('CI');
        $manager->persist($skillCategoryCI);

        $skillSF = new Skills();
        $skillSF->setSkillName('Symfony 4');
        $skillSF->setSkillCategory($skillCategoryFramework);
        $manager->persist($skillSF);

        $skillAngular = new Skills();
        $skillAngular->setSkillName('Angular 2');
        $skillAngular->setSkillCategory($skillCategoryFramework);
        $manager->persist($skillAngular);

        $manager->flush();
    }
}
