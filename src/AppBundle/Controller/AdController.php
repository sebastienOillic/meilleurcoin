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
        return new Response('Creation d\'annonce');
    }

    /**
     * @Route(path="/edit/{id}", name="edit", requirements={"id" = "\d+"})
     */
    public function editAction(Request $request)
    {
        return new Response('Edition d\'annonce');
    }

    /**
     * @Route(path="/delete/{id}", name="delete", requirements={"id" = "\d+"})
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $qbCheck = $em->createQueryBuilder();
        $query = $qbCheck->SELECT('a')
            ->FROM('AppBundle\Entity\Ad', 'a')
            ->WHERE('a.id = :id')
            ->setParameter('id', $id)
            ->getQuery();
        $resCheck = $query->getResult();
        if ($resCheck == []){
            //id inexistant
        return new Response('You douche!');

        } else {
            
        }
        return new Response('Suppression d\'annonce');
    }

    /**
     * @Route(path="/view/{id}", name="view", requirements={"id" = "\d+"})
     */
    public function viewAction(Request $request)
    {
        return new Response('Affichage d\'annonce');
    }

    /**
     * @Route(path="/", name="list")
     */
    public function listAction(Request $request)
    {
        return new Response('liste des annonces');
    }
}