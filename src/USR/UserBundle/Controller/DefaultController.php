<?php

namespace USR\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('USRUserBundle:Default:index.html.twig');
    }
}
