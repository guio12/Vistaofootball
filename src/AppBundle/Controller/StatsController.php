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

    /**Passes Ennemies Perdues**/
    $passesEPerdues = $em->PassesEnnemiesPerdues();
    $passesEPerdues = count($passesEPerdues);

    /**  Passes Ennemies Reussies */
    $passesEReussies = $em->PassesEnnemiesReussies();
    $passesEReussies = count($passesEReussies);

    /**                   CENTRES                 **/

    /** Centres Amis Reussies */
    $centresReussies = $em->CentresAmisReussies();
    $centresReussies = count($centresReussies);

    /**Centres Amis Perdus**/
    $centresPerdus = $em->CentresAmisPerdues();
    $centresPerdus = count($centresPerdus);

    /**Passes Ennemies Perdues**/
    $centresEPerdues = $em->CentresEnnemiesPerdues();
    $centresEPerdues = count($centresEPerdues);

    /** centres Ennemis Reussis */
    $centresEReussis = $em->CentresEnnemiesReussies();
    $centresEReussis = count($centresEReussis);

    /**PASSES LONGUES**/

    /** PL Amis Reussies */
    $PLReussies = $em->PLAmisReussies();
    $PLReussies = count($PLReussies);

    /**Centres Amis Perdus**/
    $PLPerdues = $em->PLAmisPerdues();
    $PLPerdues = count($PLPerdues);

    /**Passes Ennemies Perdues**/
    $PLEPerdues = $em->PLEnnemiesPerdues();
    $PLEPerdues = count($PLEPerdues);

    /**PL Ennemies reussies**/
    $PLEReussies = $em->PLEnnemiesReussies();
    $PLEReussies = count($PLEReussies);


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
