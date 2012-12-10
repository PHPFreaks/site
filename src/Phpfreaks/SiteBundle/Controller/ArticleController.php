<?php

namespace Phpfreaks\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Phpfreaks\SiteBundle\Entity\Article;
use Phpfreaks\SiteBundle\Entity\BaseEntity;
use Phpfreaks\SiteBundle\Form\ArticleType;

/**
 * Article controller.
 */
class ArticleController extends Controller
{
    /**
     * Lists all Article entities.
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PhpfreaksSiteBundle:Article')->findAll();

        return $this->render('PhpfreaksSiteBundle:Article:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Article entity.
     */
    public function showAction( $slug )
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PhpfreaksSiteBundle:Article')->findOneBySlug( $slug );

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Article entity.');
        }

        $deleteForm = $this->createDeleteForm( $entity->getId() );

        return $this->render('PhpfreaksSiteBundle:Article:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Article entity.
     */
    public function newAction()
    {
        $entity  = new Article();
        $form = $this->createForm(new ArticleType(), $entity);

        return $this->render('PhpfreaksSiteBundle:Article:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Article entity.
     */
    public function createAction(Request $request)
    {
        $entity  = new Article();
        $entity->setAuthor($this->get('security.context')->getToken()->getUser());
        $form = $this->createForm(new ArticleType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('article_show', array('slug' => $entity->getSlug())));
        }

        return $this->render('PhpfreaksSiteBundle:Article:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Article entity.
     */
    public function editAction( $id )
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PhpfreaksSiteBundle:Article')->find( $id );

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Article entity.');
        }

        $editForm = $this->createForm(new ArticleType(), $entity);
        $deleteForm = $this->createDeleteForm( $id );

        return $this->render('PhpfreaksSiteBundle:Article:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Article entity.
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PhpfreaksSiteBundle:Article')->find( $id );

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Article entity.');
        }

        $deleteForm = $this->createDeleteForm( $id );
        $editForm = $this->createForm(new ArticleType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('article_edit', array('id' => $id)));
        }

        return $this->render('PhpfreaksSiteBundle:Article:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Article entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm( $id );
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PhpfreaksSiteBundle:Article')->find( $id );

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Article entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('article'));
    }

    private function createDeleteForm( $id )
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
