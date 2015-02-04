<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;

class BackendMenuBuilder
{
    private $factory;
    protected $securityContext;
    
    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory, SecurityContextInterface $securityContext)
    {
        $this->factory = $factory;
        $this->securityContext = $securityContext;
    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root', array(
            'childrenAttributes' => array(
                'class' => 'sidebar-menu'
            )
        ));

        $menu->addChild('dashboard', array(
        		'route' => 'odiseo_pickmystuff_backend_dashboard',
        		'labelAttributes' => array('icon' => 'fa-dashboard'),
        ))->setLabel("Dashboard");
        
        $menu->addChild('listCarrier', array(
        		'route' => 'odiseo_pickmystuff_backend_list_carrier_index',
        		'labelAttributes' => array('icon' => 'fa-file'),
        ))->setLabel("Listado de Transportistas");
        
        $menu->addChild('user', array(
        		'route' => 'odiseo_pickmystuff_backend_user_index',
        		'labelAttributes' => array('icon' => 'fa-user'),
        ))->setLabel("Usuarios");
        
        $menu->addChild('client	', array(
        		'route' => 'odiseo_pickmystuff_backend_client_index',
        		'labelAttributes' => array('icon' => 'fa-user'),
        ))->setLabel("Clientes");
        
        $menu->addChild('order', array(
        		'route' => 'odiseo_pickmystuff_backend_order_index',
        		'labelAttributes' => array('icon' => 'fa-user'),
        ))->setLabel("Pedidos");
        
        $menu->addChild('carrier', array(
        		'route' => 'odiseo_pickmystuff_backend_carrier_index',
        		'labelAttributes' => array('icon' => 'fa-user'),
        ))->setLabel("Transportistas");
        
        $menu->addChild('mercancy', array(
        		'route' => 'odiseo_pickmystuff_backend_mercancy_index',
        		'labelAttributes' => array('icon' => 'fa-user'),
        ))->setLabel("Paquetes");
        
        $menu->addChild('address', array(
        		'route' => 'odiseo_pickmystuff_backend_address_index',
        		'labelAttributes' => array('icon' => 'fa-user'),
        ))->setLabel("Direcciones");
        
        return $menu;
    }
}