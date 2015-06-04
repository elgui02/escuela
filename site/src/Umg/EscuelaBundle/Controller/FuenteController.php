<?php

namespace Umg\EscuelaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Umg\EscuelaBundle\Entity\Fuente;
use Umg\EscuelaBundle\Form\FuenteType;

/**
 * Fuente controller.
 *
 * @Route("/fuente")
 */
class FuenteController extends Controller
{

    /**
     * Lists all Fuente entities.
     *
     * @Route("/", name="fuente")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UmgEscuelaBundle:Fuente')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Fuente entity.
     *
     * @Route("/", name="fuente_create")
     * @Method("POST")
     * @Template("UmgEscuelaBundle:Fuente:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Fuente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fuente_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Fuente entity.
     *
     * @param Fuente $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Fuente $entity)
    {
        $form = $this->createForm(new FuenteType(), $entity, array(
            'action' => $this->generateUrl('fuente_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array(
            'label' => 'Guardar',
            'attr'  => array('class'=>'link-2'),
        ));
        return $form;
    }

    /**
     * Displays a form to create a new Fuente entity.
     *
     * @Route("/new", name="fuente_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Fuente();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Fuente entity.
     *
     * @Route("/{id}", name="fuente_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:Fuente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fuente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Fuente entity.
     *
     * @Route("/{id}/edit", name="fuente_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:Fuente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fuente entity.');
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
    * Creates a form to edit a Fuente entity.
    *
    * @param Fuente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Fuente $entity)
    {
        $form = $this->createForm(new FuenteType(), $entity, array(
            'action' => $this->generateUrl('fuente_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array(
            'label' => 'Actualizar',
            'attr'  => array('class'=>'link-2'),
        ));

        return $form;
    }
    /**
     * Edits an existing Fuente entity.
     *
     * @Route("/{id}", name="fuente_update")
     * @Method("PUT")
     * @Template("UmgEscuelaBundle:Fuente:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UmgEscuelaBundle:Fuente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fuente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fuente_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Fuente entity.
     *
     * @Route("/{id}", name="fuente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UmgEscuelaBundle:Fuente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Fuente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fuente'));
    }

    /**
     * Creates a form to delete a Fuente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fuente_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
