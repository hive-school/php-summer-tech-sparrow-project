<?php

namespace BionicUniversity\Bundle\WallBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

class BundleFixturesLoader extends DataFixtureLoader
{
    /**
     * {@inheritDoc}
     */
    protected function getFixtures()
    {
        return  array(
            __DIR__ . '/../../Resources/fixtures/articles.yml',

        );
    }
}
