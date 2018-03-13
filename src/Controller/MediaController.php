<?php
/**
 * Created by PhpStorm.
 * User: crespeau
 * Date: 12/03/2018
 * Time: 11:21
 */

namespace App\Controller;

use App\Entity\Film;
use App\Form\FormFilmType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MediaController extends Controller
{
    /**
     * @Route("/films", name="films")
     */
    public function films(){

        $films = $this->getDoctrine()->getRepository(Film::class)->findBy([],['sortie' => 'DESC']);;

        return $this->render('film/films.html.twig', array("films" => $films));
    }

    /**
     * @Route("/films/add/", name="add_film")
     */
    public function addFilm(Request $request){

        $film = new Film();

        // See https://symfony.com/doc/current/book/forms.html#submitting-forms-with-multiple-buttons
        $form = $this->createForm(FormFilmType::class, $film)
            ->add('saveAndCreateNew', SubmitType::class);

        $form->handleRequest($request);

        // the isSubmitted() method is completely optional because the other
        // isValid() method already checks whether the form is submitted.
        // However, we explicitly add it to improve code readability.
        // See https://symfony.com/doc/current/best_practices/forms.html#handling-form-submits
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            //$this->addFlash('success', 'post.created_successfully');

            return $this->redirectToRoute('films');
        }

        return $this->render('film/film_add.html.twig', ['formulaire' => $form->createView()]);

    }

    /**
     * @Route("/films/datail/{id}", name="detail_film")
     */
    public function detailFilm(Film $film){

        return $this->render('film/detail.html.twig', array("film" => $film));
    }

    /**
     * @Route("/films/edit/{id}", name="edit_film")
     */
    public function editFilm(Film $film, Request $request){
        //$films = $this->getDoctrine()->getRepository(Media::class)->findAllFilm();
        //$film = new Film();

        // See https://symfony.com/doc/current/book/forms.html#submitting-forms-with-multiple-buttons
        $form = $this->createForm(FormFilmType::class, $film)
            ->add('saveAndCreateNew', SubmitType::class);

        $form->handleRequest($request);

        // the isSubmitted() method is completely optional because the other
        // isValid() method already checks whether the form is submitted.
        // However, we explicitly add it to improve code readability.
        // See https://symfony.com/doc/current/best_practices/forms.html#handling-form-submits
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            //$this->addFlash('success', 'post.created_successfully');

            return $this->redirectToRoute('films');
        }

        return $this->render('film/film_edit.html.twig', ['formulaire' => $form->createView()]);

    }

    /**
     * @Route("/films/delete/{id}", name="delete_film")
     */
    public function deleteFilm(Film $film){

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($film);
        $entityManager->flush();

        $this->addFlash("type", "article delete");

        return $this->redirectToRoute('films');

    }
}