<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 02/07/18
 * Time: 17:05
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Repository\ActionsMatchRepository;
use AppBundle\Entity\ActionsMatch;

class CpaController extends Controller
{

    /**
     * @Route("/CPA", name="CPA")
     */
    public function CpaAction()
    {

        $em = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:ActionsMatch');

        /**  5M50 REUSSI  **/
        $cinqR = $em->cinqMetreAmis();
        $cinqR = count($cinqR);
        if ($cinqR == 0) {
        $cinqR = 1;
        }

        /**  5M50 LOUPE  **/
        $cinqL = $em->cinqMetreAdversaire();
        $cinqL = count($cinqL);
        if ($cinqL == 0) {
        $cinqL = 1;
        }

        /**  TOUCHES REUSSIES  **/
        $touchesR = $em->TouchesAmis();
        $touchesR = count($touchesR);
        if ($touchesR == 0) {
        $touchesR = 1;
        }

        /**  TOUCHES LOUPEES  **/
        $touchesL = $em->TouchesAdversaires();
        $touchesL = count($touchesL);
        if ($touchesL == 0) {
        $touchesL = 1;
        }

        /**  HJ AMIS  **/
        $hjAmis = $em->HjAmis();
        $hjAmis = count($hjAmis);
        if ($hjAmis == 0) {
        $hjAmis = 1;
        }

        /**  HJ ENNEMIS  **/
        $hjEnnemis = $em->HjEnnemis();
        $hjEnnemis = count($hjEnnemis);
        if ($hjEnnemis == 0) {
        $hjEnnemis = 1;
        }

        /**  CORNER REUSSIS  **/
        $cornersR = $em->CornerAmis();
        $cornersR = count($cornersR);
        if ($cornersR == 0) {
        $cornersR = 1;
        }

        /**  CORNERS LOUPES  **/
        $cornersL = $em->CornerAdversaire();
        $cornersL = count($cornersL);
        if ($cornersL == 0) {
        $cornersL = 1;
        }

        /**  FAUTES AMIS  **/
        $fauteR = $em->FauteAmis();
        $fauteR = count($fauteR);
        if ($fauteR == 0) {
        $fauteR = 1;
        }

        /**  FAUTEs ADVERSAIRE  **/
        $fauteL = $em->FauteAdversaire();
        $fauteL = count($fauteL);
        if ($fauteL == 0) {
        $fauteL = 1;
        }

        /**  FAUTES JAUNES  AMIS  **/
        $fauteJR = $em->FauteJauneAmis();
        $fauteJR = count($fauteJR);
        if ($fauteJR == 0) {
        $fauteJR = 1;
        }

        /**  FAUTES JAUNES  ADVERSAIRE  **/
        $fauteJL = $em->FauteJauneAdversaire();
        $fauteJL = count($fauteJL);
        if ($fauteJL == 0) {
        $fauteJL = 1;
        }

        /**  FAUTES ROUGES AMIS  **/
        $fauteRR = $em->FauteRougeAmis();
        $fauteRR = count($fauteRR);
        if ($fauteRR == 0) {
        $fauteRR = 1;
        }

        /**  FAUTES ROUGES  ADVERSAIRE  **/
        $fauteLR = $em->FauteRougeAdversaire();
        $fauteLR = count($fauteLR);
        if ($fauteLR == 0) {
        $fauteLR = 1;
        }


        $user = $this->getUser();


        return $this->render('stats/cpa.html.twig', array(
            'cinqR' => $cinqR,
            'cinqL' => $cinqL,
            'touchesR' => $touchesR,
            'touchesL' => $touchesL,
            'hjAmis' => $hjAmis,
            'hjEnnemis' => $hjEnnemis,
            'cornersR' => $cornersR,
            'cornersL' => $cornersL,
            'fauteR' => $fauteR,
            'fauteL' => $fauteL,
            'fauteJR' => $fauteJR,
            'fauteJL' => $fauteJL,
            'fauteRR' => $fauteRR,
            'fauteLR' => $fauteLR,
            "equipe" => $_POST, "entraineur" => $user,
            'but' => $_SESSION['but'],


        ));

    }
}
