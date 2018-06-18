<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/accueil", name="accueil")
     */
    public function accueilAction()
    {
        return $this->render('/accueil/index.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('/contact/index.html.twig');
    }


    /**
     * @Route("/coach", name="coachMenu")
     */

     public function coachAction(Request $request)
     {
         // replace this example code with whatever you need
         return $this->render('coach/menu.html.twig', [
             'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
         ]);
     }

    /**
     * @Route("/avantMatch", name="AvantMatch")
     */

     public function avantMatchAction(Request $request)
     {

           $em = $this->getDoctrine()->getManager();

           $equipes = $em->getRepository('AppBundle:Equipes')->findAll();

           return $this->render('clavier/AvantMatch.html.twig', array(
               'equipes' => $equipes,
           ));

     }
    /**
     * @Route("/joueurByEquipe/{x}", name="joueurByEquipe")
     */

     public function joueurByEquipeAction(Request $request, $x)
     {

           $em = $this->getDoctrine()->getManager();
           $id = $x;
           $Joueur = $em->getRepository('AppBundle:Joueurs')->findBy(["equipeId" => $id]);
        

           function __ToString($Joueur){
             return $this->Joueur;
           };
          return new Response($Joueur);
        /*   return $this->render('equipes/index.html.twig', array(
               'equipes' => $equipes, 'equipesId' => $equipeId
           )); */

     }

    /**
     * @Route("/clavier", name="clavier")
     */
    public function clavierAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('clavier/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/statsmatch", name="statsmatch")
     */
    public function statsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('stats/general.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/cpa", name="cpa")
     */
    public function cpaAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('stats/cpa.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

}
