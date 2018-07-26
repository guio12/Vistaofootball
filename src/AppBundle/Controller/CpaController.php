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

        /**  5M50 LOUPE  **/
        $cinqL = $em->cinqMetreAdversaire();
        $cinqL = count($cinqL);

        $cinq = $cinqR + $cinqL == 0?  1 : $cinqR + $cinqL ;

        /**  TOUCHES REUSSIES  **/
        $touchesR = $em->TouchesAmis();
        $touchesR = count($touchesR);

        /**  TOUCHES LOUPEES  **/
        $touchesL = $em->TouchesAdversaires();
        $touchesL = count($touchesL);

        $touches = $touchesR + $touchesL == 0?  1 : $touchesR + $touchesL ;


        /**  HJ AMIS  **/
        $hjAmis = $em->HjAmis();
        $hjAmis = count($hjAmis);

        /**  HJ ENNEMIS  **/
        $hjEnnemis = $em->HjEnnemis();
        $hjEnnemis = count($hjEnnemis);

        $hj = $hjEnnemis + $hjAmis == 0?  1 : $hjEnnemis + $hjAmis ;


        /**  CORNER REUSSIS  **/
        $cornersR = $em->CornerAmis();
        $cornersR = count($cornersR);

        /**  CORNERS LOUPES  **/
        $cornersL = $em->CornerAdversaire();
        $cornersL = count($cornersL);

        $corners = $cornersR + $cornersL == 0?  1 : $cornersR + $cornersL ;


        /**  FAUTES AMIS  **/
        $fauteR = $em->FauteAmis();
        $fauteR = count($fauteR);

        /**  FAUTEs ADVERSAIRE  **/
        $fauteL = $em->FauteAdversaire();
        $fauteL = count($fauteL);

        $faute = $fauteR + $fauteL == 0?  1 : $fauteR + $fauteL ;


        /**  FAUTES JAUNES  AMIS  **/
        $fauteJR = $em->FauteJauneAmis();
        $fauteJR = count($fauteJR);

        /**  FAUTES JAUNES  ADVERSAIRE  **/
        $fauteJL = $em->FauteJauneAdversaire();
        $fauteJL = count($fauteJL);

        $fauteJ = $fauteJR + $fauteJL == 0?  1 : $fauteJR + $fauteJL ;


        /**  FAUTES ROUGES AMIS  **/
        $fauteRR = $em->FauteRougeAmis();
        $fauteRR = count($fauteRR);

        /**  FAUTES ROUGES  ADVERSAIRE  **/
        $fauteLR = $em->FauteRougeAdversaire();
        $fauteLR = count($fauteLR);

        $fauteRouge = $fauteRR + $fauteLR == 0?  1 : $fauteRR + $fauteLR ;



        $user = $this->getUser();


        return $this->render('stats/cpa.html.twig', array(
            'cinqR' => $cinqR,
            'cinqL' => $cinqL,
            'cinq' => $cinq,
            'touchesR' => $touchesR,
            'touchesL' => $touchesL,
            'touches' => $touches,
            'hjAmis' => $hjAmis,
            'hjEnnemis' => $hjEnnemis,
            'hj' => $hj,
            'cornersR' => $cornersR,
            'cornersL' => $cornersL,
            'corners' => $corners,
            'fauteR' => $fauteR,
            'fauteL' => $fauteL,
            'faute' => $faute,
            'fauteJR' => $fauteJR,
            'fauteJL' => $fauteJL,
            'fauteJ' => $fauteJ,
            'fauteRR' => $fauteRR,
            'fauteLR' => $fauteLR,
            'fauteRouge' => $fauteRouge,
            "equipe" => $_POST, "entraineur" => $user,
            'but' => $_SESSION['but'],


        ));

    }
}
