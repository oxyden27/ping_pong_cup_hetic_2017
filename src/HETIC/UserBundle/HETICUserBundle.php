<?php

namespace HETIC\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HETICUserBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }
}
