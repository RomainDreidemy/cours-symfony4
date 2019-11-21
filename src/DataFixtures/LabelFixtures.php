<?php

namespace App\DataFixtures;

use App\Entity\Label;
use App\Entity\Record;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Provider\DateTime;

class LabelFixtures extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        // TODO: Implement loadData() method.
        // La fonction anonyme sera exécutée 50 fois
        $this->createMany(50, 'label', function ($num) {

            // Construction du nom d'artiste
            $name = $this->faker->sentence;

            $label = (new Label())
                ->setName($name)
            ;

            // Toujours retourner l'entité
            return $label;
        });

        // Pour terminer, enregistrer
        $manager->flush();
    }


}
