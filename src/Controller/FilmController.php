<?php
/**
 * Created by PhpStorm.
 * User: crespeau
 * Date: 12/03/2018
 * Time: 11:21
 */

namespace App\Controller;

use App\Entity\Film;
use App\Entity\User;
use App\Entity\UserFilm;
use App\Form\FormFilmType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/films")
 */
class FilmController extends Controller
{
    /**
     * @Route("/", name="films")
     */
    public function films(){

        $films = $this->getDoctrine()->getRepository(Film::class)->findBy([],['sortie' => 'DESC']);;

        return $this->render('film/films.html.twig', array("films" => $films));
    }

    /**
     * @Route("/add/", name="add_film")
     */
    public function addFilm(Request $request){

        $film = new Film();

        $form = $this->createForm(FormFilmType::class, $film);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();

            $this->addFlash("ajout", "Film Ajouter");

            return $this->redirectToRoute('films');
        }

        return $this->render('film/film_add.html.twig', ['formulaire' => $form->createView()]);

    }

    /**
     * @Route("/datail/{id}", name="detail_film")
     */
    public function detailFilm(Film $film){

        return $this->render('film/film_detail.html.twig', array("film" => $film));
    }

    /**
     * @Route("/edit/{id}", name="edit_film")
     */
    public function editFilm(Film $film, Request $request){
        $form = $this->createForm(FormFilmType::class, $film);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();

            $this->addFlash("update", "Film Modifier");

            return $this->redirectToRoute('films');
        }

        return $this->render('film/film_edit.html.twig', ['formulaire' => $form->createView()]);

    }

    /**
     * @Route("/delete/{id}", name="delete_film")
     */
    public function deleteFilm(Film $film){

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($film);
        $entityManager->flush();

        $this->addFlash("delete", "Film delete");

        return $this->redirectToRoute('films');

    }

    /**
     * @Route("/vue/{id}", name="film_add_vu")
     */
    public function addVu(Film $film){


        $user = $this->getUser();

        $userFilm = $this->getDoctrine()->getRepository(UserFilm::class)
            ->findOneBy(['user' => $user, 'film' => $film]);

        $em = $this->getDoctrine()->getManager();

        if(empty($userFilm)){
            $userFilm = new UserFilm();
            $userFilm->setFilm($film);
            $userFilm->setUser($user);
            $userFilm->setStatus('vu');

            $em->persist($userFilm);
            $em->flush();
        }else{
            $userFilm->setStatus('vu');

            $em->persist($userFilm);
            $em->flush();
        }


        $this->addFlash("profil", "Film Ajouter dans vu");

        return $this->redirectToRoute('detail_film', array("id" => $film->getId()));
    }

    /**
     * @Route("/after/{id}", name="film_add_after")
     */
    public function addAfter(Film $film){


        $user = $this->getUser();

        $userFilm = $this->getDoctrine()->getRepository(UserFilm::class)
            ->findOneBy(['user' => $user, 'film' => $film]);

        $em = $this->getDoctrine()->getManager();

        if(empty($userFilm)){
            $userFilm = new UserFilm();
            $userFilm->setFilm($film);
            $userFilm->setUser($user);
            $userFilm->setStatus('after');

            $em->persist($userFilm);
            $em->flush();
        }else{
            $userFilm->setStatus('after');

            $em->persist($userFilm);
            $em->flush();
        }

        $this->addFlash("profil", "Film Ajouter dans a voir");

        return $this->redirectToRoute('detail_film', array("id" => $film->getId()));
    }
}