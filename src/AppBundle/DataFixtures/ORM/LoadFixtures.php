<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Enum\JamTypeEnum;
use AppBundle\Entity\Enum\YearEnum;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

/**
 * Class LoadFixtures
 * @package AppBundle\DataFixtures\ORM
 */
class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $objects = Fixtures::load(
            __DIR__.'/fixtures.yml',
            $manager,
            [
                'providers' => [$this]
            ]
        );
    }

    /**
     * @return string
     */
    public function JamYears()
    {
        $years = YearEnum::YEARS;
        $key = array_rand($years);
        return $years[$key];
    }

    /**
     * @return string
     */
    public function jamTypes()
    {
        $jamTypes = JamTypeEnum::JAMS;
        $key = array_rand($jamTypes);
        return $jamTypes[$key];
    }
}