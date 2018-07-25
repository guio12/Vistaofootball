<?php

namespace AppBundle\Repository;

/**
* ActionsMatchRepository
*
* This class was generated by the Doctrine ORM. Add your own custom
* repository methods below.
*/

use Doctrine\ORM\Entityrepository;


class ActionsMatchRepository extends EntityRepository
{

  /**                    METHODES POUR LA POSSESSION             **/
  public function Possession($id)
  {
    $query = $this->createQueryBuilder('c')
    ->where('c.joueurAction <= 16 AND c.joueurReceveur <= 16')
    ->andWhere('c.actionId = 1 OR c.actionId = 112')
    ->andWhere('c.matchId = :id')
    ->setParameter(':id', $id)
    ->getQuery();
    $possessionClub = $query->getResult();
    $possessionClub = count($possessionClub);

    $query = $this->createQueryBuilder('d');
    $query->where('d.actionId = 1 OR d.actionId = 112')
    ->andWhere('d.joueurAction = 123 AND d.joueurReceveur = 123 ')
    ->andWhere('d.matchId = :id')
    ->setParameter(':id', $id);
    $possessionClubToto = $query->getQuery()->getResult();
    $possessionClubToto = count($possessionClubToto);
    $possessionClubToto == 0? $possessionClubToto = 1 : "";
    $possessionClub == 0? $possessionClub = 1: "";
    $possession = ['club' => $possessionClub, 'toto'=> $possessionClubToto];
    return $possession;
  }

  public function TirsToto($idMatch)
  {
    $tirs = [];
    $query = $this->createQueryBuilder('c')
    ->select('c')
    ->where('c.joueurAction <= 16')
    ->andWhere('c.actionId = 110 OR c.actionId = 111 OR c.actionId = 113 OR c.actionId = 114')
    ->andWhere('c.matchId = :id')
    ->setParameter(':id', $idMatch)
    ->getQuery();
    $tirsClub = $query->getResult();
    $tirsClub = count($tirsClub);


    $query = $this->createQueryBuilder('d');
    $query->where('d.actionId = 110 OR d.actionId = 111 OR d.actionId = 113 OR d.actionId = 114')
    ->andWhere('d.matchId = :id')
    ->setParameter(':id', $idMatch);
    $tirsClubToto = $query->getQuery()->getResult();
    $tirsClubToto = count($tirsClubToto);
    $tirsClubToto++;
    $tirs = ['tirsClubToto' => $tirsClubToto, 'tirsClub' => $tirsClub];

    return $tirs;
  }
  public function CPA($idMatch)
  {
    $cpa = [];
    $query = $this->createQueryBuilder('c')
    ->select('c')
    ->where('c.joueurAction <= 16')
    ->andWhere('c.actionId = 106 OR c.actionId = 101')
    ->andWhere('c.matchId = :id')
    ->setParameter(':id', $idMatch)
    ->getQuery();
    $nbCpa = $query->getResult();
    $nbCpa = count($nbCpa);
    $nbCpa++;

    $query = $this->createQueryBuilder('d');
    $query->where('d.actionId = 106 OR d.actionId = 101')
    ->andWhere('d.matchId = :id')
    ->setParameter(':id', $idMatch);
    $cpaToto = $query->getQuery()->getResult();
    $cpaToto = count($cpaToto);
    $cpaToto++;
    $cpa = ['nous' => $nbCpa, 'Toto' => $cpaToto];

    return $cpa;
  }

  public function but($idMatch){
    $query = $this->createQueryBuilder('c')
    ->select('c')
    ->where('c.actionId = 115 OR c.actionId = 116 OR c.actionId = 117')
    ->andWhere('c.joueurAction <= 16')
    ->andWhere('c.matchId = :id')
    ->setParameter(':id', $idMatch)
    ->getQuery();
    $but = $query->getResult();

    $query = $this->createQueryBuilder('c')
    ->select('c')
    ->where('c.actionId = 666')
    ->andWhere('c.joueurAction <= 16')
    ->andWhere('c.matchId = :id')
    ->setParameter(':id', $idMatch)
    ->getQuery();
    $butcamp = $query->getResult();

    $query = $this->createQueryBuilder('d')
    ->select('d')
    ->where('d.actionId = 115 OR d.actionId = 116 OR d.actionId = 117 OR d.actionId = 666')
    ->andWhere('d.joueurAction = 123')
    ->andWhere('d.matchId = :id')
    ->setParameter(':id', $idMatch)
    ->getQuery();
    $butadv = $query->getResult();
    $query = $this->createQueryBuilder('d')
    ->select('d')
    ->where('d.actionId = 666')
    ->andWhere('d.joueurAction = 123')
    ->andWhere('d.matchId = :id')
    ->setParameter(':id', $idMatch)
    ->getQuery();
    $butadvcamp = $query->getResult();
    $but = count($but);
    $butcamp = count($butcamp);
    $butadv = count($butadv);
    $butadvcamp = count($butadvcamp);

    $but += $butadvcamp;
    $butadv += $butcamp;
    return $but = ['but' => $but, 'adv' => $butadv];
  }

  /**Perte passes equipe 1**/
  public function PassesAmisPerdues()
  {





    $dql = 'SELECT c FROM AppBundle:ActionsMatch c WHERE c.matchId = :id AND c.joueurAction <= 16 AND c.actionId = 1 AND c.joueurReceveur = 123';
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setParameter('id', $_SESSION['matchId']);
    return $query->execute();
  }

  /** passes reussies equipe 1**/
  public function PassesAmisReussies()
  {
    $dql = 'SELECT c FROM AppBundle:ActionsMatch c WHERE c.matchId = :id AND c.joueurAction <= 16 AND c.actionId = 1 AND c.joueurReceveur <= 16';
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setParameter('id', $_SESSION['matchId']);
    return $query->execute();
  }

  /**Perte passes equipe 2**/
  public function PassesEnnemiesPerdues()
  {
    $dql = 'SELECT c FROM AppBundle:ActionsMatch c WHERE c.matchId = :id AND c.joueurAction = 123 AND c.actionId = 1 AND c.joueurReceveur <= 16';
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setParameter('id', $_SESSION['matchId']);
    return $query->execute();
  }

  public function PassesEnnemiesReussies()
  {
    $dql = 'SELECT c FROM AppBundle:ActionsMatch c WHERE c.matchId = :id AND c.joueurAction = 123 AND c.actionId = 1 AND c.joueurReceveur = 123';
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setParameter('id', $_SESSION['matchId']);
    return $query->execute();
  }

  /**CENTRES**/

  /**Perte centre equipe 1**/
  public function CentresAmisPerdues()
  {
    $dql = 'SELECT c FROM AppBundle:ActionsMatch c WHERE c.matchId = :id AND c.joueurAction <= 16 AND c.actionId = 109 AND c.joueurReceveur = 123';
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setParameter('id', $_SESSION['matchId']);
    return $query->execute();
  }

  /** centres reussies equipe 1**/
  public function CentresAmisReussies()
  {
    $dql = 'SELECT c FROM AppBundle:ActionsMatch c WHERE c.matchId = :id AND c.joueurAction <= 16 AND c.actionId = 109 AND c.joueurReceveur <= 16';
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setParameter('id', $_SESSION['matchId']);
    return $query->execute();
  }

  /**centres passes equipe 2**/
  public function CentresEnnemiesPerdues()
  {
    $dql = 'SELECT c FROM AppBundle:ActionsMatch c WHERE c.matchId = :id AND c.joueurAction =123 AND c.actionId = 109 AND c.joueurReceveur <=16 ';
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setParameter('id', $_SESSION['matchId']);
    return $query->execute();
  }

  public function CentresEnnemiesReussies()
  {
    $dql = 'SELECT c FROM AppBundle:ActionsMatch c WHERE c.matchId = :id AND c.joueurAction = 123 AND c.actionId = 109 AND c.joueurReceveur = 123';
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setParameter('id', $_SESSION['matchId']);
    return $query->execute();
  }

  /**PASSES LONGUES**/

  /**PL equipe 1**/
  public function PLAmisPerdues()
  {
    $dql = 'SELECT c FROM AppBundle:ActionsMatch c WHERE c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 112 AND c.joueurReceveur = 123';
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setParameter('id', $_SESSION['matchId']);
    return $query->execute();
  }

  /** PL reussies equipe 1**/
  public function PLAmisReussies()
  {
    $dql = 'SELECT c FROM AppBundle:ActionsMatch c WHERE c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 112 AND c.joueurReceveur <= 16';
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setParameter('id', $_SESSION['matchId']);
    return $query->execute();
  }

  /**PL passes equipe 2**/
  public function PLEnnemiesPerdues()
  {
    $dql = 'SELECT c FROM AppBundle:ActionsMatch c WHERE c.matchId = :id AND c.joueurAction =123 AND c.actionId = 112 AND c.joueurReceveur <= 16';
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setParameter('id', $_SESSION['matchId']);
    return $query->execute();
  }

  /**PL ennemies perdues**/
  public function PLEnnemiesReussies()
  {
    $dql = 'SELECT c FROM AppBundle:ActionsMatch c WHERE c.matchId = :id AND c.joueurAction =123 AND c.actionId = 112 AND c.joueurReceveur = 123';
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setParameter('id', $_SESSION['matchId']);
    return $query->execute();
  }



  /**                    METHODES POUR LA DISCPLINE            **/






  public function cinqMetreAmis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 107 AND c.joueurReceveur <= 16')
    ->setParameter('id', $_SESSION['matchId'])
        ;
    return $query
    ->getQuery()
    ->getResult()
    ;
    /**$dql = 'SELECT c FROM AppBundle:ActionsMatch c WHERE c.joueurAction <=16 AND c.actionId = 107 AND c.joueurReceveur = 123';
    $query = $this->getEntityManager()->createQuery($dql);
    return $query->execute();**/
  }

  public function cinqMetreAdversaire(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 107 AND c.joueurReceveur = 123')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function TouchesAmis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 105 AND c.joueurReceveur <= 16')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function TouchesAdversaires(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 105 AND c.joueurReceveur = 123')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function HjAmis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 108')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function HjEnnemis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 106')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function CornerAmis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 106 AND c.joueurReceveur <= 16')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function CornerAdversaire(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 101 AND c.joueurReceveur = 123')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function FauteAmis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 101')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function FauteAdversaire(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction =123 AND c.actionId = 101')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function FauteJauneAmis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 102')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function FauteJauneAdversaire(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction =123 AND c.actionId = 102')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function FauteRougeAmis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 102')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function FauteRougeAdversaire(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction =123 AND c.actionId = 102')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }


  /**                 TIRS             **/

  public function TirCadreAmis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 110')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function TirNonCadreAmis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 111')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function DriblesReussiesAmis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 113')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function DriblesEchoueesAmis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction <=16 AND c.actionId = 114')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }




  public function TirCadreEnnemis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction =123 AND c.actionId = 110')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function TirNonCadreEnnemis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction =123 AND c.actionId = 111')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function DriblesReussiesEnnemis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction =123 AND c.actionId = 113')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }

  public function DriblesEchoueesEnnemis(){

    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId = :id AND c.joueurAction =123 AND c.actionId = 114')
    ->setParameter('id', $_SESSION['matchId'])
    ;
    return $query
    ->getQuery()
    ->getResult()
    ;
  }
  public function Recuperation($id){



    $query = $this->createQueryBuilder('c');
    $query->where('c.matchId=:id');
    $query->setParameter(':id',$id);
    $recup = $query->getQuery()->getResult();

    $idrecup = [];
    $nous = [];
    $vous = [];
  foreach ($recup as $key => $value) {
    if ($value->getJoueurAction() == '123' && $value->getJoueurReceveur() <=16) {
    $idrecup[] = $key+1;
  }
  }
  foreach($idrecup as $keyrecup => $idrecup){
    foreach($recup as $key=>$value){
      if ($key == $idrecup) {
        if ($value->getJoueurReceveur() != "123") {
          $nous[] = $value->getJoueurReceveur();
        }
      }
    }
  }
    $idrecupv = [];
  foreach ($recup as $key => $value) {
    if ($value->getJoueurAction() <=16 && $value->getJoueurReceveur() == "123") {
    $idrecupv[] = $key+1;
    }
  }
$z = 1;
  foreach($idrecupv as $keyrecupv => $idrecupv){
    foreach($recup as $key=>$value){
      $value = $value;
      if ($key == $idrecupv) {
        if ($value->getJoueurReceveur() > 16) {
          $z++;
        }
      }
    }
  }

  return $recuperationMatch = ['nous' => $nous, 'vous' => $z];


  }












}
