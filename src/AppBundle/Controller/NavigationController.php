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
        $lolTitles = [
            'On vous laisse deviner qui on concurrence.',
            'L\'occasion au prix du neuf !',
            'Si vous avez une meilleure idée de nom, on prend!',
            'Les enfants sont maintenant acceptés dans nos annonces!',
            'Là où l\'arnaque est légale!'
        ];
        $rand = rand(0, count($lolTitles) - 1);
        $lolTitle = $lolTitles[$rand];
        return $this->render('navigation/menu.html.twig', ['title' => "Menu",
        'lolTitle' => $lolTitle]);
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