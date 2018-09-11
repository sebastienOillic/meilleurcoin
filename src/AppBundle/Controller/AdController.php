<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Ad;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/ad", name="ad_")
 */
class AdController extends Controller
{
    /**
     * @Route(path="/create", name="create")
     */
    public function addAction(Request $request)
    {
        //form to create
        


        //fetching form
        return new Response('Creation d\'annonce');
    }

    /**
     * @Route(path="/edit/{id}", name="edit", requirements={"id" = "\d+"})
     */
    public function editAction(Request $request)
    {

        $repoAd = $this->getDoctrine()->getRepository(Ad::class);
        $resCheck = $repoAd->findOneBy(['id' => $id]);
        if ($resCheck == null){
            //id non-existing
            return new Response('You douche!');

        } else {
        //form to create

        }

        //fetching form
        return new Response('Edition d\'annonce');
    }

    /**
     * @Route(path="/delete/{id}", name="delete", requirements={"id" = "\d+"})
     */
    public function deleteAction(Request $request, $id)
    {
        $repoAd = $this->getDoctrine()->getRepository(Ad::class);
        $resCheck = $repoAd->findOneBy(['id' => $id]);
        if ($resCheck == null){
            //id non-existing
            return new Response('You douche!');

        } else {
            
        }
        return new Response('Suppression d\'annonce');
    }

    /**
     * @Route(path="/view/{id}", name="view", requirements={"id" = "\d+"})
     */
    public function viewAction(Request $request, $id)
    {
        $repoAd = $this->getDoctrine()->getRepository(Ad::class);
        $resCheck = $repoAd->findOneBy(['id' => $id]);
        dump($resCheck);
        if ($resCheck == null){
            //id non-existing
            return new Response('You douche!');

        } else {
            
            return $this->render('ad/view.html.twig', [
                'ad' => $resCheck,
                'title' => $resCheck->getTitle()
            ] );
        }
    }

    /**
     * @Route(path="/", name="list")
     */
    public function listAction(Request $request)
    {
        return new Response('liste des annonces');
    }

    
}