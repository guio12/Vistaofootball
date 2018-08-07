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


    /**Passes Amies Perdues**/
    $passesPerdues = $em->PassesAmisPerdues();
    $passesPerdues = count($passesPerdues);

      $passesAmis = $passesReussies + $passesPerdues == 0?  1 : $passesReussies + $passesPerdues ;

    /**Passes Ennemies Perdues**/
    $passesEPerdues = $em->PassesEnnemiesPerdues();
    $passesEPerdues = count($passesEPerdues);

    /**  Passes Ennemies Reussies */
    $passesEReussies = $em->PassesEnnemiesReussies();
    $passesEReussies = count($passesEReussies);

    $passesEnnemies = $passesEPerdues + $passesEReussies == 0?  1 : $passesEPerdues + $passesEReussies ;

    /**                   CENTRES                 **/

    /** Centres Amis Reussies */
    $centresReussies = $em->CentresAmisReussies();
    $centresReussies = count($centresReussies);


    /**Centres Amis Perdus**/
    $centresPerdus = $em->CentresAmisPerdues();
    $centresPerdus = count($centresPerdus);

      $centresAmis = $centresReussies + $centresPerdus == 0?  1 : $centresReussies + $centresPerdus ;

    /**Passes Ennemies Perdues**/
    $centresEPerdues = $em->CentresEnnemiesPerdues();
    $centresEPerdues = count($centresEPerdues);

    /** centres Ennemis Reussis */
    $centresEReussis = $em->CentresEnnemiesReussies();
    $centresEReussis = count($centresEReussis);


      $centresEnnemies = $centresEReussis + $centresEPerdues == 0?  1 : $centresEReussis + $centresEPerdues ;

    /**PASSES LONGUES**/

    /** PL Amis Reussies */
    $PLReussies = $em->PLAmisReussies();
    $PLReussies = count($PLReussies);

    /**Centres Amis Perdus**/
    $PLPerdues = $em->PLAmisPerdues();
    $PLPerdues = count($PLPerdues);


      $PLAmis = $PLReussies + $PLPerdues == 0?  1 : $PLReussies + $PLPerdues ;

    /**Passes Ennemies Perdues**/
    $PLEPerdues = $em->PLEnnemiesPerdues();
    $PLEPerdues = count($PLEPerdues);

    /**PL Ennemies reussies**/
    $PLEReussies = $em->PLEnnemiesReussies();
    $PLEReussies = count($PLEReussies);

    $PLEnnemis = $PLEReussies + $PLEPerdues == 0?  1 : $PLEReussies + $PLEPerdues ;

    $user = $this->getUser();


    return $this->render('stats/possession.html.twig', array(
      'passesPerdues' => $passesPerdues,
      'passesReussies' => $passesReussies,
      'passesAmis' => $passesAmis,
      'passesEPerdues' => $passesEPerdues,
      'passesEReussies' => $passesEReussies,
      'passesEnnemies' => $passesEnnemies,
      'centresReussies' => $centresReussies,
      'centresPerdus' => $centresPerdus,
      'centresAmis' => $centresAmis,
      'centresEPerdues' => $centresEPerdues,
      'centresEReussis' => $centresEReussis,
      'centresEnnemies' => $centresEnnemies,
      'PLReussies' => $PLReussies,
      'PLPerdues' => $PLPerdues,
      'PLAmis' => $PLAmis,
      'PLEPerdues' => $PLEPerdues,
      'PLEReussies' => $PLEReussies,
      'PLEnnemis' => $PLEnnemis,

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
