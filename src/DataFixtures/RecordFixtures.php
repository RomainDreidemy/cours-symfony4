<?php

namespace App\DataFixtures;

use App\Entity\Record;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Provider\DateTime;

class RecordFixtures extends BaseFixture implements DependentFixtureInterface
{
    protected function loadData(ObjectManager $manager)
    {
        // TODO: Implement loadData() method.
        // La fonction anonyme sera exécutée 50 fois
        $this->createMany(200, 'record', function ($num) {

            // Construction du nom d'artiste
            $title = $this->faker->sentence;
            $description = $this->faker->realText($maxNbChars = 200, $indexSize = 2);
            $releaseAt = $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = null);

            $record = (new Record())
                ->setTitle($title)
                ->setDescription($description)
                ->setReleasedAt($releaseAt)
                ->setArtist($this->getRandomReference('artist'))
                ->setLabel($this->getRandomReference('label'))
            ;

            // Toujours retourner l'entité
            return $record;
        });

        // Pour terminer, enregistrer
        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            ArtistFixtures::class,
            LabelFixtures::class
        ];
    }
}
