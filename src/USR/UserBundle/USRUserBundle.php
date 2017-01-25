<?php

namespace USR\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class USRUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
