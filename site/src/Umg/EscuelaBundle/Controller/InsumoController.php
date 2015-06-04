<?php

namespace Umg\EscuelaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Umg\EscuelaBundle\Entity\Insumo;
use Umg\EscuelaBundle\Form\InsumoType;

/**
 * Insumo controller.
 *
 * @Route("/insumo")
 */
class InsumoController extends Controller
{

    /**
     * Lists all Insumo entities.
     *
     * @Route("/", name="insumo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UmgEscuelaBundle:Insumo')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Insumo entity.
     *
     * @Route("/", name="insumo_create")
     * @Method("POST")
     * @Template("UmgEscuelaBundle:Insumo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Insumo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setCantidadDisponible($entity->getCantidad());
            $em->persist($entity);            
            $em->flush();

            return $this->redirect($this->generateUrl('insumo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Insumo entity.
     *
     * @param Insumo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Insumo $entity)
    {
        $form = $this->createForm(new InsumoType(), $entity, array(
            'action' => $this->generateUrl('insumo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array(
            'label' => 'Guardar',
            'attr'  => array('class'=>'link-2')
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Insumo entity.
     *
     * @Route("/new", name="insumo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Insumo();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Insumo entity.
     *
     * @Route("/{id}", name="insumo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:Insumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Insumo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Insumo entity.
     *
     * @Route("/{id}/edit", name="insumo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:Insumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Insumo entity.');
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
    * Creates a form to edit a Insumo entity.
    *
    * @param Insumo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Insumo $entity)
    {
        $form = $this->createForm(new InsumoType(), $entity, array(
            'action' => $this->generateUrl('insumo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array(
            'label' => 'Actualizar',
            'attr'  => array('class'=>'link-2'),
        ));

        return $form;
    }
    /**
     * Edits an existing Insumo entity.
     *
     * @Route("/{id}", name="insumo_update")
     * @Method("PUT")
     * @Template("UmgEscuelaBundle:Insumo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:Insumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Insumo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('insumo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Insumo entity.
     *
     * @Route("/{id}", name="insumo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UmgEscuelaBundle:Insumo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Insumo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('insumo'));
    }

    /**
     * Creates a form to delete a Insumo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('insumo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
