<?php
/**
 * Created by PhpStorm.
 * User: crespeau
 * Date: 12/03/2018
 * Time: 11:20
 */

namespace App\Controller;

use App\Entity\User;
use App\Form\FormUserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/admin")
 * @Security("has_role('ROLE_ADMIN')")
 *
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="admin")
     */
    public function admin(){
        $users = $this->getDoctrine()->getRepository(User::class)->findAllAnime();;

        $userID = $this->getUser()->getId();

        return $this->render('admin/admin.html.twig', array("users" => $users, "userID" => $userID));
    }

    /**
     * @Route("/delete/{id}", name="delete_user")
     */
    public function deleteAdmin(User $user){


        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        //$this->addFlash("type", "article delete");

        return $this->redirectToRoute('admin');

    }

    /**
     * @Route("/add/", name="add_user")
     */
    public function addUser(Request $request, UserPasswordEncoderInterface $passwordEncoder){

        $user = new User();

        $form = $this->createForm(FormUserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/user_add.html.twig', ['formulaire' => $form->createView()]);

    }

}