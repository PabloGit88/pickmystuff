<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('OdiseoPickMyStuffBundle:Frontend:index.html.twig');
    }
}
