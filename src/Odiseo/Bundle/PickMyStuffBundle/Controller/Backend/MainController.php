<?php

namespace Odiseo\Bundle\ConAgraBundle\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function dashboardAction()
    {
        return $this->render('OdiseoConAgraBundle:Backend/Main:dashboard.html.twig');
    }
}
