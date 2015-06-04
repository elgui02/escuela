<?php

namespace Umg\EscuelaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Umg\EscuelaBundle\Entity\AlumnoSalon;
use Umg\EscuelaBundle\Form\AlumnoSalonType;

/**
 * AlumnoSalon controller.
 *
 * @Route("/alumnosalon")
 */
class AlumnoSalonController extends Controller
{

    /**
     * Lists all AlumnoSalon entities.
     *
     * @Route("/", name="alumnosalon")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UmgEscuelaBundle:AlumnoSalon')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AlumnoSalon entity.
     *
     * @Route("/", name="alumnosalon_create")
     * @Method("POST")
     * @Template("UmgEscuelaBundle:AlumnoSalon:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new AlumnoSalon();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('alumnosalon_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a AlumnoSalon entity.
     *
     * @param AlumnoSalon $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(AlumnoSalon $entity)
    {
        $form = $this->createForm(new AlumnoSalonType(), $entity, array(
            'action' => $this->generateUrl('alumnosalon_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AlumnoSalon entity.
     *
     * @Route("/new", name="alumnosalon_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AlumnoSalon();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AlumnoSalon entity.
     *
     * @Route("/{id}", name="alumnosalon_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:AlumnoSalon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AlumnoSalon entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AlumnoSalon entity.
     *
     * @Route("/{id}/edit", name="alumnosalon_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:AlumnoSalon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AlumnoSalon entity.');
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
    * Creates a form to edit a AlumnoSalon entity.
    *
    * @param AlumnoSalon $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AlumnoSalon $entity)
    {
        $form = $this->createForm(new AlumnoSalonType(), $entity, array(
            'action' => $this->generateUrl('alumnosalon_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AlumnoSalon entity.
     *
     * @Route("/{id}", name="alumnosalon_update")
     * @Method("PUT")
     * @Template("UmgEscuelaBundle:AlumnoSalon:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:AlumnoSalon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AlumnoSalon entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('alumnosalon_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AlumnoSalon entity.
     *
     * @Route("/{id}", name="alumnosalon_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UmgEscuelaBundle:AlumnoSalon')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AlumnoSalon entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('alumnosalon'));
    }

    /**
     * Creates a form to delete a AlumnoSalon entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('alumnosalon_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
