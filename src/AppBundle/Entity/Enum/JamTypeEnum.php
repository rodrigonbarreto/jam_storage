<?php

namespace AppBundle\Entity\Enum;

/**
 * Class JamTypeEnum
 * @package AppBundle\Entity\Enum
 */
class JamTypeEnum
{
    const STRAWBERRY = 'StrawBerry';
    const PEACH = 'Peach';
    const BLUE_BERRY = 'BLUEBERRY';
    const ORANGE = 'ORANGE';
    const WHITE_GUAVA = 'WHITE_GUAVA';
    const RED_GUAVA = 'RED_GUAVA';

    const  JAMS =
        [
            self::STRAWBERRY => self::STRAWBERRY,
            self::PEACH => self::PEACH,
            self::BLUE_BERRY => self::BLUE_BERRY,
            self::ORANGE => self::ORANGE,
            self::WHITE_GUAVA => self::WHITE_GUAVA,
            self::WHITE_GUAVA => self::WHITE_GUAVA,
        ];

}