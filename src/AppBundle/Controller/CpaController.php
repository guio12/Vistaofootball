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

        /**  TOUCHES REUSSIES  **/
        $touchesR = $em->TouchesAmis();
        $touchesR = count($touchesR);

        /**  TOUCHES LOUPEES  **/
        $touchesL = $em->TouchesAmis();
        $touchesL = count($touchesL);

        /**  HJ AMIS  **/
        $hjAmis = $em->HjAmis();
        $hjAmis = count($hjAmis);

        /**  HJ ENNEMIS  **/
        $hjEnnemis = $em->HjEnnemis();
        $hjEnnemis = count($hjEnnemis);

        /**  CORNER REUSSIS  **/
        $cornersR = $em->CornerAmis();
        $cornersR = count($cornersR);

        /**  CORNERS LOUPES  **/
        $cornersL = $em->CornerAdversaire();
        $cornersL = count($cornersL);

        /**  FAUTES AMIS  **/
        $fauteR = $em->FauteAmis();
        $fauteR = count($fauteR);

        /**  FAUTEs ADVERSAIRE  **/
        $fauteL = $em->FauteAdversaire();
        $fauteL = count($fauteL);

        /**  FAUTES JAUNES  AMIS  **/
        $fauteJR = $em->FauteJauneAmis();
        $fauteJR = count($fauteJR);

        /**  FAUTES JAUNES  ADVERSAIRE  **/
        $fauteJL = $em->FauteJauneAdversaire();
        $fauteJL = count($fauteJL);

        /**  FAUTES ROUGES AMIS  **/
        $fauteRR = $em->FauteRougeAmis();
        $fauteRR = count($fauteRR);

        /**  FAUTES ROUGES  ADVERSAIRE  **/
        $fauteLR = $em->FauteRougeAdversaire();
        $fauteLR = count($fauteLR);


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
            "equipe" => $_POST, "entraineur" => $user


        ));

    }
}