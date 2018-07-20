<?php
/**
* Created by PhpStorm.
* User: wilder
* Date: 25/06/18
* Time: 11:16
*/

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Repository\ActionsMatchRepository;
use AppBundle\Entity\ActionsMatch;

class StatsController extends Controller
{

  /**
  * @Route("/possession", name="possession")
  */
  public function PasseAction()
  {

    /**             PASSES          **/

    $em = $this->getDoctrine()
    ->getManager()
    ->getRepository('AppBundle:ActionsMatch');



    /**  Passes Amies Reussies */
    $passesReussies = $em->PassesAmisReussies();
    $passesReussies = count($passesReussies);
    if ($passesReussies == 0) {
      $passesReussies = 1;
    }

    /**Passes Amies Perdues**/
    $passesPerdues = $em->PassesAmisPerdues();
    $passesPerdues = count($passesPerdues);
    if ($passesPerdues == 0) {
      $passesPerdues = 1;
    }

    /**Passes Ennemies Perdues**/
    $passesEPerdues = $em->PassesEnnemiesPerdues();
    $passesEPerdues = count($passesEPerdues);
    if ($passesEPerdues == 0) {
      $passesEPerdues = 1;
    }

    /**  Passes Ennemies Reussies */
    $passesEReussies = $em->PassesEnnemiesReussies();
    $passesEReussies = count($passesEReussies);
    if ($passesEReussies == 0) {
      $passesEReussies = 1;
    }

    /**                   CENTRES                 **/

    /** Centres Amis Reussies */
    $centresReussies = $em->CentresAmisReussies();
    $centresReussies = count($centresReussies);
    if ($centresReussies == 0) {
      $centresReussies = 1;
    }

    /**Centres Amis Perdus**/
    $centresPerdus = $em->CentresAmisPerdues();
    $centresPerdus = count($centresPerdus);
    if ($centresPerdus == 0) {
      $centresPerdus = 1;
    }

    /**Passes Ennemies Perdues**/
    $centresEPerdues = $em->CentresEnnemiesPerdues();
    $centresEPerdues = count($centresEPerdues);
    if ($centresEPerdues == 0) {
      $centresEPerdues = 1;
    }

    /** centres Ennemis Reussis */
    $centresEReussis = $em->CentresEnnemiesReussies();
    $centresEReussis = count($centresEReussis);
    if ($centresEReussis == 0) {
      $centresEReussis = 1;
    }
    /**PASSES LONGUES**/

    /** PL Amis Reussies */
    $PLReussies = $em->PLAmisReussies();
    $PLReussies = count($PLReussies);
    if ($PLReussies == 0) {
      $PLReussies = 1;
    }
    /**Centres Amis Perdus**/
    $PLPerdues = $em->PLAmisPerdues();
    $PLPerdues = count($PLPerdues);
    if ($PLPerdues == 0) {
      $PLPerdues = 1;
    }
    /**Passes Ennemies Perdues**/
    $PLEPerdues = $em->PLEnnemiesPerdues();
    $PLEPerdues = count($PLEPerdues);
    if ($PLEPerdues == 0) {
      $PLEPerdues = 1;
    }
    /**PL Ennemies reussies**/
    $PLEReussies = $em->PLEnnemiesReussies();
    $PLEReussies = count($PLEReussies);
    if ($PLEReussies == 0) {
      $PLEReussies = 1;
    }

    $user = $this->getUser();


    return $this->render('stats/possession.html.twig', array(
      'passesPerdues' => $passesPerdues,
      'passesReussies' => $passesReussies,
      'passesEPerdues' => $passesEPerdues,
      'passesEReussies' => $passesEReussies,
      'centresReussies' => $centresReussies,
      'centresPerdus' => $centresPerdus,
      'centresEPerdues' => $centresEPerdues,
      'centresEReussis' => $centresEReussis,
      'PLReussies' => $PLReussies,
      'PLPerdues' => $PLPerdues,
      'PLEPerdues' => $PLEPerdues,
      'PLEReussies' => $PLEReussies,
      "equipe" => $_POST, "entraineur" => $user,
      'but' => $_SESSION['but']
    ));


  }

  /**
  * @Route("/testrecup", name="recup")
  */
  public function recupAction()
  {




    /**  Passes Amies Reussies */
    $recup = $em->recuperation(16);



  recup(3, $recup);
  }

}
