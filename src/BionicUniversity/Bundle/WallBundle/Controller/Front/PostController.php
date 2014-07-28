<?php

namespace BionicUniversity\Bundle\WallBundle\Controller\Front;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BionicUniversity\Bundle\WallBundle\Entity\Post;
use BionicUniversity\Bundle\UserBundle\Entity\User;
use BionicUniversity\Bundle\WallBundle\Form\PostType;

/**
 * Post controller.
 */
class PostController extends Controller
{
    /**
     * Creates a new Post entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Post();
        $entity->setAuthor($this->getUser());
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $id = $this->getUser()->getId();

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_profile' , ['id'=>$id]));
        }

        return $this->render('BionicUniversityUserBundle:User/Front:profile.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'id'=>$id,
        ));
    }

    /**
     * Creates a form to create a Post entity.
     *
     * @param Post $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Post $entity)
    {
        $form = $this->createForm(new PostType(), $entity, array(
            'action' => $this->generateUrl('create_post'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
}
