<?php

namespace USR\UserBundle\Controller;

use USR\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all user entities.
     *
     */
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $user_db = $em->getRepository('USRUserBundle:User')->find($user->getId());
         
        return $this->render('user/index.html.twig', array(
            'users' => $user_db->getUsers(),
            'user_id' => $user->getId()
        ));
    }

    /**
     * Creates a new user entity.
     *
     */
    public function newAction()
    {
        $em = $this->getDoctrine()->getManager();        
        $users = $em->getRepository('USRUserBundle:User')->findAll();
        return $this->render('user/new.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     */
    public function showAction(User $user)
    {
        return $this->render('user/show.html.twig', array(
            'user' => $user,
        ));
    }
    

    /**
     * Displays a form to edit an existing user entity.
     *
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('USR\UserBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bonobo_edit', array('id' => $user->getId()));
        }

        return $this->render('user/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user entity.
     *
     */
    public function deleteAction(User $user)
    {    
        $user_current = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $user_remove = $em->getRepository('USRUserBundle:User')->find($user->getId());
        $user_db = $em->getRepository('USRUserBundle:User')->find($user_current->getId());
        $user_db->removeUser($user_remove);
        $em->persist($user_db);
        $em->flush();
        return $this->redirectToRoute('bonobo_index');
    }
    
    public function addAction(User $user)
    {
        $user_current = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $user_add = $em->getRepository('USRUserBundle:User')->find($user->getId());
        $user_db = $em->getRepository('USRUserBundle:User')->find($user_current->getId());
        $user_db->addUser($user_add);
        $em->persist($user_db);
        $em->flush();
        return $this->redirectToRoute('bonobo_new');
    }
    
    public function ajoutAction()
    {
        $request=$this->get('request');
        $userr=new USR\UserBundle\Entity\User();
        if($request->getMethode()=='POST')
        {
            $userr->setAge($request->get("age"));
            $userr->setFamille($request->get("famille"));
            $userr->setNourriture($request->get("nourriture"));
            $userr->setRace($request->get("race"));
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($userr);
            $em->flush();
        }
        return $this->render('user/ajout.html.twig', array(
           
            'user_id' => $userr->getId()
        ));
        
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bonobo_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
