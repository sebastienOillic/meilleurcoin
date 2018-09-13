<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Ad;
use AppBundle\Form\AdType;
use AppBundle\Repository\AdRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
        $ad = new Ad();
        //form to create
        $form = $this->createForm(AdType::class, $ad);

        $form->handleRequest($request);
        $message = null;
        if ($form->isSubmitted()){
            if($form->isValid()){
                //add to base
                $ad->setDateCreated(new \DateTime);
                dump($ad);
                $em = $this->getDoctrine()->getManager();
                $em->persist($ad);
                $em->flush();
                $this->addFlash('success', 'Votre annonce a été crée!');
                return $this->redirectToRoute('ad_list', [
                    'title' => 'annonces'
                    ]
                );
            } else {
                    $this->addFlash('danger','Nous n\'avons pas pu comprendre votre annonce, veuillez la modifier.');
            }
            
        }
        //fetching form
        return $this->render('ad/create.html.twig', ['title' => 'Création d\'une annonce', 
            'form' => $form->createView()]);
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
        $categoryForm = $this->createFormBuilder()
        ->add('category', EntityType::class, [
            'class' => Category::class,
            'label' => 'Catégorie',
            'choice_label' => 'name',
            'placeholder' => '-- Choisir une catégorie --'
        ])
        ->add('submit', SubmitType::class , ['label' => 'Trier par catégorie'])
        ->getForm();
        $adRepo = $this->getDoctrine()->getRepository(Ad::class);
        dump($request->request);
        if ($request->request->get('form')['category'] != null && is_numeric($request->request->get('form')['category'])){
            $category = (int)$request->request->get('form')['category'];
            $ads = $adRepo->findByCategory($category);
        } else {
            $ads = $adRepo->findAll();
        }
        $message = null;
        return $this->render('ad/list.html.twig', [
            'ads' => $ads,
            'title' => 'Annonces',
            'categoryForm' => $categoryForm->createView()
        ]);
    }

    
}