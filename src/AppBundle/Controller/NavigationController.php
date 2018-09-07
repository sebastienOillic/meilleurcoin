<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class NavigationController
 * @Route("/", name="navigation")
 */
class NavigationController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function menuAction(Request $request)
    {
        return $this->render('navigation/menu.html.twig');
    }
}