<?php

namespace Phpfreaks\SiteBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Phpfreaks\SiteBundle\Entity\Article;
use Phpfreaks\SiteBundle\Form\ArticleType;

/**
 * Article controller.
 * @Route("/article")
 */
class ArticleController extends Controller
{
    /**
     * Lists all Article entities.
     * @Route("", name="article");
     * @Method("GET")
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
     * Displays a form to create a new Article entity.
     * @Route("/new", name="article_new");
     * @Method("GET")
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
     * @Route("/create", name="article_create");
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity  = new Article();
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
     * @Route("/{slug}/edit", name="article_edit");
     * @Method("GET")
     */
    public function editAction( $slug )
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PhpfreaksSiteBundle:Article')->findOneBySlug( $slug );

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Article entity.');
        }

        $editForm = $this->createForm(new ArticleType(), $entity);
        $deleteForm = $this->createDeleteForm( $entity->getId() );

        return $this->render('PhpfreaksSiteBundle:Article:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Save an updated Article.
     * @Route("/{slug}/update", name="article_update");
     * @Method("POST")
     */
    public function updateAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PhpfreaksSiteBundle:Article')->findOneBySlug( $slug );

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Article entity.');
        }

        $deleteForm = $this->createDeleteForm( $entity->getId() );
        $editForm = $this->createForm(new ArticleType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('article_edit', array('slug' => $slug)));
        }

        return $this->render('PhpfreaksSiteBundle:Article:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Article entity.
     * @Route("/{slug}/delete", name="article_delete");
     * @Method("POST")
     *
     */
    public function deleteAction(Request $request, $slug)
    {
        $form = $this->createDeleteForm( $slug );
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PhpfreaksSiteBundle:Article')->find( $slug );

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Article entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('article'));
    }
    
    /**
     * Finds and displays a Article entity.
     * @Route("/{slug}", name="article_show");
     * @Method("GET")
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

    private function createDeleteForm( $id )
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    

    
}
