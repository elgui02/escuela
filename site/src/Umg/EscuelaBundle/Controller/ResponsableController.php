<?php

namespace Umg\EscuelaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Umg\EscuelaBundle\Entity\Responsable;
use Umg\EscuelaBundle\Form\ResponsableType;

/**
 * Responsable controller.
 *
 * @Route("/responsable")
 */
class ResponsableController extends Controller
{

    /**
     * Lists all Responsable entities.
     *
     * @Route("/", name="responsable")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UmgEscuelaBundle:Responsable')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Responsable entity.
     *
     * @Route("/", name="responsable_create")
     * @Method("POST")
     * @Template("UmgEscuelaBundle:Responsable:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Responsable();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('responsable_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Responsable entity.
     *
     * @param Responsable $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Responsable $entity)
    {
        $form = $this->createForm(new ResponsableType(), $entity, array(
            'action' => $this->generateUrl('responsable_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Responsable entity.
     *
     * @Route("/new", name="responsable_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Responsable();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Responsable entity.
     *
     * @Route("/{id}", name="responsable_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:Responsable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Responsable entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Responsable entity.
     *
     * @Route("/{id}/edit", name="responsable_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:Responsable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Responsable entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Responsable entity.
    *
    * @param Responsable $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Responsable $entity)
    {
        $form = $this->createForm(new ResponsableType(), $entity, array(
            'action' => $this->generateUrl('responsable_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Responsable entity.
     *
     * @Route("/{id}", name="responsable_update")
     * @Method("PUT")
     * @Template("UmgEscuelaBundle:Responsable:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:Responsable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Responsable entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('responsable_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Responsable entity.
     *
     * @Route("/{id}", name="responsable_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UmgEscuelaBundle:Responsable')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Responsable entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('responsable'));
    }

    /**
     * Creates a form to delete a Responsable entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('responsable_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
