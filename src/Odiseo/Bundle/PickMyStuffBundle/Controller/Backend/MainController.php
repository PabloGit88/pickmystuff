<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function dashboardAction()
    {
        return $this->render('OdiseoPickMyStuffBundle:Backend/Main:dashboard.html.twig');
    }
}
