<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Twig;

use Symfony\Component\HttpFoundation\RequestStack;

class RouteUtilsExtension extends \Twig_Extension
{	
	protected $requestStack;
	
	public function __construct(RequestStack $requestStack)
	{
		$this->requestStack = $requestStack;
	}
	
	public function getFunctions() {
		return array(
			'is_on_routes' => new \Twig_Function_Method($this, 'isOnRoutes')
		);
	}

	public function isOnRoutes(array $routes)
	{
		$request = $this->requestStack->getCurrentRequest();
		
		$isOnRoute = false;
		
		foreach ($routes as $route)
		{
			if(strpos($request->get('_route'), $route) !== false)
			{
				$isOnRoute = true;
			} 	
		}
		
		return $isOnRoute;
	}

	public function getName()
	{
		return 'route_utils_extension';
	}
}