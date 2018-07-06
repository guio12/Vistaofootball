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
           $Joueur = $em->getRepository('AppBundle:Joueurs')->findBy(["equipe" => $id]);
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
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Matchs');

        $query = $repository->createQueryBuilder('c')
        ->select('c.equipe1Id', 'c.id')

        ->where('c.equipe1Id = :id')
        ->setParameter(':id', $_POST['Equipe'])
        ->orderBy('c.id', 'DESC')
        ->setMaxResults( "1" )
        ->getQuery();

        $idMatch = $query->getResult();
        $idMatch = $idMatch[0]['id'];
        var_dump($idMatch);
        $_SESSION['matchId'] = $idMatch;
        // replace this example code with whatever you need
        return $this->render('clavier/index.html.twig',array("idMatch" => $idMatch, "equipe" => $_POST, "entraineur" => $user
        ));
    }
    /**
    * @Route("/envoiAjax/{actionneur}/{action}/{receveur}/{temps}", name="envoiAjax")
    * @param $actionneur
    * @param $action
    * @param $receveur
    */
    public function ajaxEnvoi()
    {
      $userId = $this->getUser()->getId();
      $em = $this->getDoctrine()->getManager();
      $actions_match = new ActionsMatch();

      $actions_match->setMatchId($_POST['idmatch']);
      $actions_match->setJoueurAction($_POST['actionneur']);
      $actions_match->setActionId($_POST['action']);
      $actions_match->setJoueurReceveur($_POST['receveur']);

      $em->persist($actions_match);
      $em->flush();

      return true;

    }

    /**
     * @Route("/listeEquipe", name="listeEquipe")
     */
    public function listeEquipeAction(Request $request)
    {
        $user = $this->getUser();
        $userId = $this->getUser()->getId();

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Equipes');

        $query = $repository->createQueryBuilder('c')
        ->select('c')
        ->where('c.entraineurId = :id')
        ->setParameter(':id', $userId)
        ->getQuery();
        $equipes = $query->getResult();
        // replace this example code with whatever you need
        return $this->render('stats/listeEquipe.html.twig',array( "equipes"=>$equipes
        ));
    }
    /**
     * @Route("/listeMatch", name="listeMatch")
     */
    public function listeMatchAction(Request $request)
    {

        $userId = $_POST['id'];
        $nomClub = $_POST['nomEquipe'];

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Matchs');

        $query = $repository->createQueryBuilder('c')
        ->select('c')
        ->where('c.equipe1Id = :id')
        ->setParameter(':id', $userId)
        ->getQuery();
        $matchs = $query->getResult();
        $_SESSION['matchs'] = $matchs;
        $_SESSION['nomClub'] = $nomClub;
        // replace this example code with whatever you need
        return $this->render('stats/listeMatchs.html.twig',array( "matchs"=>$matchs, "nomclub"=>$nomClub
        ));
    }

    /**
     * @Route("/statsmatch", name="statsmatch")
     */
    public function statsAction(Request $request)
    {


      $user = $this->getUser();

      if(isset($_POST['matchId'])){
        $_SESSION['matchId'] = $_POST['matchId'];
      }
      isset($_SESSION['nomClub'])?  : $_SESSION['nomClub'] = "Votre club";

      $em = $this->getDoctrine()->getManager();
      $repository = $em->getRepository('AppBundle:Matchs');
      $query = $repository->createQueryBuilder('c')
      ->select('c')
      ->where('c.id = :id')
      ->setParameter(':id', $_SESSION['matchId'])
      ->getQuery();
      $matchs = $query->getResult();

      $_SESSION['matchs'] = $matchs;


      $em = $this->getDoctrine()
      ->getManager()
      ->getRepository('AppBundle:ActionsMatch');

      $possession = $em->Possession($_SESSION['matchId']);
      $tirs = $em->TirsToto($_SESSION['matchId']);
      $recuperation =  $em->Recuperation($_SESSION['matchId']);
      $cpa =  $em->CPA($_SESSION['matchId']);

      $stats = ['cpa'=> $cpa, 'possession' => $possession, 'tirs'=> $tirs, 'recuperation' => $recuperation];

        // replace this example code with whatever you need
        return $this->render('stats/general.html.twig',array("stats" => $stats, "nomClub"=>$_SESSION['nomClub'], "matchs"=>$_SESSION['matchs'], "entraineur" => $user
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




}
