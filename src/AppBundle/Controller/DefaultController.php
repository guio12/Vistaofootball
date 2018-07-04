<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\ActionsMatch;
use AppBundle\Entity\Matchs;
use Symfony\Component\Validator\Constraints\DateTime;


class DefaultController extends Controller
{


    /**
     * @Route("/", name="accueil")
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


         $user = $this->getUser();
         return $this->render('coach/menu.html.twig',  [
             'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR, 'user' => $user
         ]);
     }


    /**
     * @Route("/avantMatch", name="AvantMatch")
     */

     public function avantMatchAction(Request $request)
     {

       $userId = $this->getUser()->getId();
       $em = $this->getDoctrine()->getManager();
       $equipes = $em->getRepository('AppBundle:Equipes')->findBy(["entraineurId" => $userId]);

           return $this->render('clavier/AvantMatch.html.twig', array(
               'equipes' => $equipes,
           ));

     }
    /**
     * @Route("/joueurByEquipe/{x}", name="joueurByEquipe")
     *
     */

     public function joueurByEquipeAction(Request $request, $x)
     {

           $em = $this->getDoctrine()->getManager();
           $id = $x;
           $Joueur = $em->getRepository('AppBundle:Joueurs')->findBy(["equipeId" => $id]);

           $Joueur = json_encode($Joueur);

          return  new Response($Joueur);
        /*   return $this->render('equipes/index.html.twig', array(
               'equipes' => $equipes, 'equipesId' => $equipeId
           )); */

     }

     /**
      * @Route("/envoisClavier", name="envoisClavier")
      *
      */
     public function envoisClavierAction(Request $request)
     {

     $userId = $this->getUser()->getId();
     $em = $this->getDoctrine()->getManager();

     $match = new Matchs;
     $match->setEquipe1Id(66);
     $match->setActionId(666);
     $date = date('Y-m-d');
     $match->setDate($date);
     $match->setEquipe2($_POST['adverse']);
     $match->setEquipe1Id($_POST['equipe']);
     $match->setJoueur1($_POST['joueur1']);
     $match->setJoueur2($_POST['joueur2']);
     $match->setJoueur3($_POST['joueur3']);
     $match->setJoueur4($_POST['joueur4']);
     $match->setJoueur5($_POST['joueur5']);
     $match->setJoueur6($_POST['joueur6']);
     $match->setJoueur7($_POST['joueur7']);
     $match->setJoueur8($_POST['joueur8']);
     $match->setJoueur9($_POST['joueur9']);
     $match->setJoueur10($_POST['joueur10']);
     $match->setJoueur11($_POST['joueur11']);
     $match->setJoueur12($_POST['joueur12']);
     $match->setJoueur13($_POST['joueur13']);
     $match->setJoueur14($_POST['joueur14']);
     $match->setJoueur15($_POST['joueur15']);
     $match->setJoueur16($_POST['joueur16']);
     $em->persist($match);
     $em->flush();
      }

    /**
     * @Route("/clavier", name="clavier")
     */
    public function clavierAction(Request $request)
    {

         $user = $this->getUser();
        // replace this example code with whatever you need
        return $this->render('clavier/index.html.twig',array( "equipe" => $_POST, "entraineur" => $user
        ));
    }

    /**
     * @Route("/statsmatch", name="statsmatch")
     */
    public function statsAction(Request $request)
    {
        $user = $this->getUser();
        // replace this example code with whatever you need
        return $this->render('stats/general.html.twig',array( "equipe" => $_POST, "entraineur" => $user
        ));
    }

    /**
     * @Route("/tirs", name="tirs")
     */
    public function tirsAction(Request $request)
    {
        $user = $this->getUser();
        // replace this example code with whatever you need
        return $this->render('stats/tirs.html.twig',array( "equipe" => $_POST, "entraineur" => $user
        ));
    }

    /**
     * @Route("/possession", name="possession")
     */
    public function possessionAction(Request $request)
    {
        $user = $this->getUser();
        // replace this example code with whatever you need
        return $this->render('stats/possession.html.twig',array( "equipe" => $_POST, "entraineur" => $user
        ));
    }

    /**
     * @Route("/recuperation", name="recuperation")
     */
    public function recuperationAction(Request $request)
    {
        $user = $this->getUser();
        // replace this example code with whatever you need
        return $this->render('stats/recuperation.html.twig',array( "equipe" => $_POST, "entraineur" => $user
        ));
    }

    /**
     * @Route("/cpa", name="cpa")
     */
    public function cpaAction(Request $request)
    {
        $user = $this->getUser();
        // replace this example code with whatever you need
        return $this->render('stats/cpa.html.twig',array( "equipe" => $_POST, "entraineur" => $user
        ));
    }


    /**
     * @Route("/envoiAjax/{actionneur}/{action}/{receveur}/{temps}", name="envoiAjax")
     * @param $actionneur
     * @param $action
     * @param $receveur
     */
    public function ajaxEnvoi($actionneur, $action, $receveur, $temps)
    {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $actions_match = new ActionsMatch();

        $actions_match->setMatchId(2);
        $actions_match->setJoueurAction($actionneur);
        $actions_match->setActionId($action);
        $actions_match->setJoueurReceveur($receveur);

        $em->persist($actions_match);
        $em->flush();

        return true;

    }


}
