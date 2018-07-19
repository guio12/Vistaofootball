<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\ActionsMatch;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 15000; $i++) {
            $action = new ActionsMatch();
            $action->setMatchId(46);
            $action->setJoueurAction(rand(1,16));
						$action->setActionId(rand(1,150));
						$action->setJoueurReceveur(123);

            $manager->persist($action);
        }
        for ($i = 0; $i < 15000; $i++) {
            $action = new ActionsMatch();
            $action->setMatchId(46);
            $action->setJoueurAction(123);
						$action->setActionId(rand(1,150));
						$action->setJoueurReceveur(rand(1,16));

            $manager->persist($action);
        }
        for ($i = 0; $i < 15000; $i++) {
            $action = new ActionsMatch();
            $action->setMatchId(46);
            $action->setJoueurAction(rand(1,16));
						$action->setActionId(rand(1,150));
						$action->setJoueurReceveur(rand(1,16));

            $manager->persist($action);
        }
        for ($i = 0; $i < 15000; $i++) {
            $action = new ActionsMatch();
            $action->setMatchId(46);
            $action->setJoueurAction(123);
						$action->setActionId(rand(1,150));
						$action->setJoueurReceveur(123);

            $manager->persist($action);
        }

        $manager->flush();
    }
}
