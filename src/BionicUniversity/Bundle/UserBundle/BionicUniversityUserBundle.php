<?php

namespace BionicUniversity\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BionicUniversityUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
