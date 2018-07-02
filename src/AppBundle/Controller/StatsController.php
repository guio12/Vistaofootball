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
     * @Route("/testpasse", name="testpasse")
     */
    public function PasseAction()
    {
        /**$em = $this->getDoctrine()->getManager();

        $passes = $em->getRepository('AppBundle:ActionsMatch')->findBy(["actionId" => 0]);

        $passesamere = implode($passes);

        return $this->render('stats/possession.html.twig', array(
            'passesamere' => $passesamere,
        ));**/



        /**$Joueur = $em->getRepository('AppBundle:ActionsMatch')->findBy(["equipeId" => $id]);**/



        /**$em = $this->getDoctrine()->getManager();
        $results = $em->getRepository('AppBundle:ActionsMatch')->PassesStats();

        $em = $this->getDoctrine()->getManager();

        $passes = $em->getRepository('AppBundle:ActionsMatch')->findBy(["actionId" => 0]);



        return $this->render('stats/possession.html.twig', array(
            'passes' => $passes,
        ));**/

        /**$em = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:ActionsMatch');
        $passes = $em->PassesStats();

        $passes = count($passes);

        $em = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:ActionsMatch');
        $passesAmis = $em->PassesAmis();

        $passesAmis = count($passesAmis);

        return $this->render('stats/possession.html.twig', array(
            'passes' => $passes,
            'passesAmis' => $passesAmis,
        ));**/

        /**$em = $this->getDoctrine()->getManager();

       $test = $em->getRepository('AppBundle:ActionsMatch')->findAll();

       $PassesAmisreussies = [];
       foreach($test as $PassesAmisR => $PassesAmisRe){
           if ($PassesAmisR == joueur_action > 0 && action_id == 0 && joueur_receveur == 0){
               $PassesAmisreussies = $PassesAmisRe;
           }
       }

        return $this->render('stats/possession.html.twig', array(
            'PassesAmisreussies' => $PassesAmisreussies,
        ));**/


        $em = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:ActionsMatch');
        $passesReussies = $em->PassesAmisReussies();

        $passesReussies = count($passesReussies);



        /**Passes Amies Perdues**/
        $em = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:ActionsMatch');
        $passesPerdues = $em->PassesAmisPerdues();

        $passesPerdues = count($passesPerdues);


        /**Passes Ennemies Perdues**/
        $em = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:ActionsMatch');
        $passesEPerdues = $em->PassesEnnemiesPerdues();

        $passesEPerdues = count($passesEPerdues);


        $em = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:ActionsMatch');
        $passesEReussies = $em->PassesEnnemiesReussies();

        $passesEReussies = count($passesEReussies);




        return $this->render('stats/possession.html.twig', array(
            'passesPerdues' => $passesPerdues,
            'passesReussies' => $passesReussies,
            'passesEPerdues' => $passesEPerdues,
            'passesEReussies' => $passesEReussies,
        ));


    }



}