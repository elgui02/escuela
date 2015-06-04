<?php

namespace Umg\EscuelaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Umg\EscuelaBundle\Entity\InsumoPersonal;
use Umg\EscuelaBundle\Form\InsumoPersonalType;

/**
 * InsumoPersonal controller.
 *
 * @Route("/insumopersonal")
 */
class InsumoPersonalController extends Controller
{

    /**
     * Lists all InsumoPersonal entities.
     *
     * @Route("/", name="insumopersonal")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UmgEscuelaBundle:InsumoPersonal')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new InsumoPersonal entity.
     *
     * @Route("/", name="insumopersonal_create")
     * @Method("POST")
     * @Template("UmgEscuelaBundle:InsumoPersonal:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new InsumoPersonal();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('insumopersonal_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a InsumoPersonal entity.
     *
     * @param InsumoPersonal $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(InsumoPersonal $entity)
    {
        $form = $this->createForm(new InsumoPersonalType(), $entity, array(
            'action' => $this->generateUrl('insumopersonal_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new InsumoPersonal entity.
     *
     * @Route("/new", name="insumopersonal_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new InsumoPersonal();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a InsumoPersonal entity.
     *
     * @Route("/{id}", name="insumopersonal_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:InsumoPersonal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InsumoPersonal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing InsumoPersonal entity.
     *
     * @Route("/{id}/edit", name="insumopersonal_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:InsumoPersonal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InsumoPersonal entity.');
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
    * Creates a form to edit a InsumoPersonal entity.
    *
    * @param InsumoPersonal $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(InsumoPersonal $entity)
    {
        $form = $this->createForm(new InsumoPersonalType(), $entity, array(
            'action' => $this->generateUrl('insumopersonal_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing InsumoPersonal entity.
     *
     * @Route("/{id}", name="insumopersonal_update")
     * @Method("PUT")
     * @Template("UmgEscuelaBundle:InsumoPersonal:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:InsumoPersonal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InsumoPersonal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('insumopersonal_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a InsumoPersonal entity.
     *
     * @Route("/{id}", name="insumopersonal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UmgEscuelaBundle:InsumoPersonal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find InsumoPersonal entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('insumopersonal'));
    }

    /**
     * Creates a form to delete a InsumoPersonal entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('insumopersonal_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
