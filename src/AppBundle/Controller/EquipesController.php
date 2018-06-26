<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Entraineurs;
use AppBundle\Entity\Equipes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Equipe controller.
 *
 * @Route("equipes")
 */
class EquipesController extends Controller
{
    /**
     * Lists all equipe entities.
     *
     * @Route("/", name="equipes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $userId = $this->getUser()->getId();
        $nom = $this->getUser()->getNom();
        $prenom = $this->getUser()->getPrenom();
        $em = $this->getDoctrine()->getManager();
        $equipes = $em->getRepository('AppBundle:Equipes')->findBy(["entraineurId" => $userId]);

        return $this->render('equipes/index.html.twig', array(
            'equipes' => $equipes,
            'nom' => $nom,
            'prenom' => $prenom,
        ));
    }

    /**
     * Creates a new equipe entity.
     *
     * @Route("/new", name="equipes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {

        $userId = $this->getUser()->getId();
        $nom = $this->getUser()->getNom();
        $prenom = $this->getUser()->getPrenom();
        $club = $this->getUser()->getNomClub();

        $em = $this->getDoctrine()->getManager();
        $entraineur = $em->getRepository('AppBundle:Equipes')->findBy(["entraineurId" => $userId]);
        var_dump($entraineur);
        $equipe = new Equipes();
        $equipe->setEntraineurId($userId);
        $equipe->setEntraineurNomClub($club);
        $form = $this->createForm('AppBundle\Form\EquipesType', $equipe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipe);
            $em->flush();

            return $this->redirectToRoute('equipes_show', array('id' => $equipe->getId()));
        }

        return $this->render('equipes/new.html.twig', array(
            'entraineur' => $entraineur,
            'equipe' => $equipe,
            'userId' => $userId,
            'nom' => $nom,
            'prenom' => $prenom,
            'club' => $club,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a equipe entity.
     *
     * @Route("/{id}", name="equipes_show")
     * @Method("GET")
     */
    public function showAction(Equipes $equipe)
    {
        $deleteForm = $this->createDeleteForm($equipe);
        $nom = $this->getUser()->getNom();
        $prenom = $this->getUser()->getPrenom();

        return $this->render('equipes/show.html.twig', array(
            'equipe' => $equipe,
            'nom' => $nom,
            'prenom' => $prenom,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing equipe entity.
     *
     * @Route("/{id}/edit", name="equipes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Equipes $equipe)
    {
        $deleteForm = $this->createDeleteForm($equipe);
        $editForm = $this->createForm('AppBundle\Form\EquipesType', $equipe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('equipes_edit', array('id' => $equipe->getId()));
        }

        return $this->render('equipes/edit.html.twig', array(
            'equipe' => $equipe,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a equipe entity.
     *
     * @Route("/{id}", name="equipes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Equipes $equipe)
    {
        $form = $this->createDeleteForm($equipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($equipe);
            $em->flush();
        }

        return $this->redirectToRoute('equipes_index');
    }

    /**
     * Creates a form to delete a equipe entity.
     *
     * @param Equipes $equipe The equipe entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Equipes $equipe)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('equipes_delete', array('id' => $equipe->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
