<?php

namespace WykopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WykopBundle\Entity\Training;
use WykopBundle\Form\TrainingType;

/**
 * Training controller.
 *
 * @Route("/training")
 */
class TrainingController extends Controller
{

    /**
     * Lists all Training entities.
     *
     * @Route("/", name="training")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WykopBundle:Training')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Training entity.
     *
     * @Route("/", name="training_create")
     * @Method("POST")
     * @Template("WykopBundle:Training:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Training();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
	    
	    //Deal with multiple trainings in one form
	    
	    //Send distance to @getTrainingDetails - retrvie details
	    //$training_details = $this->get('getTrainingDetails');
	    //$training_details->get('https://www.endomondo.com/workouts/546810831/10959221');
	    $em = $this->getDoctrine()->getManager();
	    
	    //Set username from session
	    $entity->setNameUser('W KONTROLERZE');
	    
            $em->persist($entity);
            $em->flush();
	    
	    
	    //Get last distance
	    //$lastDistance = $this->get('LastDistance');
	    //$lastDistance->get($entity->getTag()->getName());
	    
	    //Subtract distances, build operation
	    //Compile new entry
	    
	    //Send new entry to Wykop
	    
	    
	    //If Success then redirect to Index(or training_show?)
	    //elseif forwardTo Index -> with all data from form
	    
            return $this->redirect($this->generateUrl('training_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Training entity.
     *
     * @param Training $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Training $entity)
    {
        $form = $this->createForm(new TrainingType(), $entity, array(
            'action' => $this->generateUrl('training_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Dodaj', 'attr' => array('class' => 'btn')));

        return $form;
    }

    /**
     * Displays a form to create a new Training entity.
     *
     * @Route("/new", name="training_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Training();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Training entity.
     *
     * @Route("/{id}", name="training_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WykopBundle:Training')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Training entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Training entity.
     *
     * @Route("/{id}/edit", name="training_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WykopBundle:Training')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Training entity.');
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
    * Creates a form to edit a Training entity.
    *
    * @param Training $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Training $entity)
    {
        $form = $this->createForm(new TrainingType(), $entity, array(
            'action' => $this->generateUrl('training_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Training entity.
     *
     * @Route("/{id}", name="training_update")
     * @Method("PUT")
     * @Template("WykopBundle:Training:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WykopBundle:Training')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Training entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('training_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Training entity.
     *
     * @Route("/{id}", name="training_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WykopBundle:Training')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Training entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('training'));
    }

    /**
     * Creates a form to delete a Training entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('training_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
