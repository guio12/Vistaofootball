<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Equipes;
use AppBundle\Entity\Joueurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Joueur controller.
 *
 * @Route("joueurs")
 */
class JoueursController extends Controller
{
    /**
     * Lists all joueur entities.
     *
     * @Route("/", name="joueurs_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $joueurs = $em->getRepository('AppBundle:Joueurs')->findAll();

        return $this->render('joueurs/index.html.twig', array(
            'joueurs' => $joueurs,
        ));
    }

    /**
     * Creates a new joueur entity.
     *
     * @Route("/new", name="joueurs_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $joueur = new Joueurs();

        $id_equipe = $request->query->get('id');
        $club = $this->getUser()->getNomClub();
        $joueur->setEquipe($id_equipe);

        $form = $this->createForm('AppBundle\Form\JoueursType', $joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($joueur);
            $em->flush();

            return $this->redirectToRoute('joueurs_new', array('id' => $joueur->getEquipe()));
        }

        return $this->render('joueurs/new.html.twig', array(
            'joueur' => $joueur,
            'id' => $id_equipe,
            'club' => $club,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a joueur entity.
     *
     * @Route("/{id}", name="joueurs_show")
     * @Method("GET")
     */
    public function showAction(Joueurs $joueur)
    {
        $deleteForm = $this->createDeleteForm($joueur);

        return $this->render('joueurs/show.html.twig', array(
            'joueur' => $joueur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing joueur entity.
     *
     * @Route("/{id}/edit", name="joueurs_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Joueurs $joueur)
    {
        $deleteForm = $this->createDeleteForm($joueur);
        $editForm = $this->createForm('AppBundle\Form\JoueursType', $joueur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('joueurs_edit', array('id' => $joueur->getId()));
        }

        return $this->render('joueurs/edit.html.twig', array(
            'joueur' => $joueur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a joueur entity.
     *
     * @Route("/{id}", name="joueurs_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Joueurs $joueur)
    {
        $form = $this->createDeleteForm($joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($joueur);
            $em->flush();
        }

        return $this->redirectToRoute('joueurs_index');
    }

    /**
     * Creates a form to delete a joueur entity.
     *
     * @param Joueurs $joueur The joueur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Joueurs $joueur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('joueurs_delete', array('id' => $joueur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
