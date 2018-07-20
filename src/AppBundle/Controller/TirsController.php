<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 04/07/18
 * Time: 14:04
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Repository\ActionsMatchRepository;
use AppBundle\Entity\ActionsMatch;


class TirsController extends Controller
{

    /**
     * @Route("/tirs", name="tirs")
     */
    public function tirsAction(Request $request)
    {

        $em = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:ActionsMatch');


        /**  TIRS CADRES AMIS  **/
        $tirsCadresR = $em->TirCadreAmis();
        $tirsCadresR = count($tirsCadresR);

        /**  TIRS NON CADRES AMIS  **/
        $tirsNonCadresR = $em->TirNonCadreAmis();
        $tirsNonCadresR = count($tirsNonCadresR);

        /**  DRIBLES REUSSIES AMIS  **/
        $driblesReussiesR = $em->DriblesReussiesAmis();
        $driblesReussiesR = count($driblesReussiesR);

        /**  DRIBLES NON REUSSIES AMIS  **/
        $driblesEchouesR = $em->DriblesEchoueesAmis();
        $driblesEchouesR = count($driblesEchouesR);



        /**  TIRS CADRES ENNEMIS **/
        $tirsCadresL = $em->TirCadreEnnemis();
        $tirsCadresL = count($tirsCadresL);

        /**  TIRS NON CADRES ENNEMIS  **/
        $tirsNonCadresL = $em->TirNonCadreEnnemis();
        $tirsNonCadresL = count($tirsNonCadresL);

        /**  DRIBLES REUSSIES ENNEMIS  **/
        $driblesReussiesL = $em->DriblesReussiesEnnemis();
        $driblesReussiesL = count($driblesReussiesL);

        /**  DRIBLES NON REUSSIES ENNEMIS  **/
        $driblesEchouesL = $em->DriblesEchoueesEnnemis();
        $driblesEchouesL = count($driblesEchouesL);



        $user = $this->getUser();
        // replace this example code with whatever you need

        return $this->render('stats/tirs.html.twig',array(
            "equipe" => $_POST, "entraineur" => $user,
            'tirsCadresR' => $tirsCadresR,
            'tirsNonCadresR' => $tirsNonCadresR,
            'driblesReussiesR' => $driblesReussiesR,
            'driblesEchouesR' => $driblesEchouesR,
            'but' => $_SESSION['but'],
            'tirsCadresL' => $tirsCadresL,
            'tirsNonCadresL' => $tirsNonCadresL,
            'driblesReussiesL' => $driblesReussiesL,
            'driblesEchouesL' => $driblesEchouesL,






        ));
    }




}
