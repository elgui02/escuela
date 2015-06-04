<?php

namespace Umg\EscuelaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UmgEscuelaBundle:Default:index.html.twig', array('name' => $name));
    }
}
