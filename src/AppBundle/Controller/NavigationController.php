<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class NavigationController
 * @Route("/",)
 */
class NavigationController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function menuAction(Request $request)
    {
        return $this->render('navigation/menu.html.twig', ['title' => "Menu"]);
    }

    /**
     * @Route("/faq", name="FAQ")
     */
    public function faqAction(Request $request){
        return $this->render('navigation/FAQ.html.twig', ['title' => "FAQ"]);
    }
    
    /**
     * @Route("/cgu", name="CGU")
     */
    public function cguAction(Request $request){
        return $this->render('navigation/CGU.html.twig', ['title' => "CGU"]);
    }
}