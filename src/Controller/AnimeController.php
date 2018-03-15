<?php
/**
 * Created by PhpStorm.
 * User: crespeau
 * Date: 13/03/2018
 * Time: 15:48
 */

namespace App\Controller;


use App\Entity\Anime;
use App\Entity\AnimeEpisode;
use App\Entity\UserAnime;
use App\Form\FormAnimeType;
use App\Form\FormEpisodeAnimeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/animes")
 */
class AnimeController extends Controller
{
    /**
     * @Route("/", name="animes")
     */
    public function anime(){
        $animes = $this->getDoctrine()->getRepository(Anime::class)->findAll();;

        return $this->render('anime/animes.html.twig', array("animes" => $animes));
    }

    /**
     * @Route("/add", name="add_anime")
     */
    public function addAnime(Request $request){

        $anime = new Anime();

        $form = $this->createForm(FormAnimeType::class, $anime);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($anime);
            $em->flush();

            return $this->redirectToRoute('animes');
        }

        return $this->render('anime/anime_add.html.twig', ['formulaire' => $form->createView()]);
    }

    /**
     * @Route("/datail/{id}", name="detail_anime")
     */
    public function detailAnime(Anime $anime){

        return $this->render('anime/anime_detail.html.twig', array("anime" => $anime));
    }

    /**
     * @Route("/edit/{id}", name="edit_anime")
     */
    public function editAnime(Anime $anime, Request $request){

        $form = $this->createForm(FormAnimeType::class, $anime);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($anime);
            $em->flush();

            return $this->redirectToRoute('animes');
        }

        return $this->render('anime/anime_edit.html.twig', ['formulaire' => $form->createView()]);

    }

    /**
     * @Route("/delete/{id}", name="delete_anime")
     */
    public function deleteAnime(Anime $anime){

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($anime);
        $entityManager->flush();

        //$this->addFlash("type", "article delete");

        return $this->redirectToRoute('animes');

    }

    /**
     * @Route("/detail/episode/add/{id}", name="add_episode_anime")
     */
    public function addEpisodeAnime(Anime $anime, Request $request){

        $episode = new AnimeEpisode();

        $form = $this->createForm(FormEpisodeAnimeType::class, $episode);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($episode);
            $episode->setAnime($anime);
            $em->flush();

            return $this->redirectToRoute('detail_anime', ['id'=> $anime->getId()]);
        }

        return $this->render('anime/anime_episode_add.html.twig', ['formulaire' => $form->createView()]);

    }

    /**
     * @Route("/detail/episode/{id}", name="detail_episode_anime")
     */
    public function detailEpisodeAnime(AnimeEpisode $episode){

        return $this->render('anime/anime_episode_detail.html.twig', array("episode" => $episode));
    }

    /**
     * @Route("/vue/{id}", name="anime_add_vu")
     */
    public function addVu(Anime $anime){

        $user = $this->getUser();

        $userAnime = $this->getDoctrine()->getRepository(UserAnime::class)
            ->findOneBy(['user' => $user, 'anime' => $anime]);

        $em = $this->getDoctrine()->getManager();

        if(empty($userAnime)){
            $userAnime = new UserAnime();
            $userAnime->setAnime($anime);
            $userAnime->setUser($user);
            $userAnime->setStatus('vu');

            $em->persist($userAnime);
            $em->flush();
        }else{
            $userAnime->setStatus('vu');

            $em->persist($userAnime);
            $em->flush();
        }

        return $this->redirectToRoute('detail_anime', array("id" => $anime->getId()));
    }

    /**
     * @Route("/after/{id}", name="anime_add_after")
     */
    public function addAfter(Anime $anime){

        $user = $this->getUser();

        $userSerie = $this->getDoctrine()->getRepository(UserAnime::class)
            ->findOneBy(['user' => $user, 'anime' => $anime]);

        $em = $this->getDoctrine()->getManager();

        if(empty($userAnime)){
            $userAnime = new UserAnime();
            $userAnime->setAnime($anime);
            $userAnime->setUser($user);
            $userAnime->setStatus('after');

            $em->persist($userAnime);
            $em->flush();
        }else{
            $userAnime->setStatus('after');

            $em->persist($userAnime);
            $em->flush();
        }

        return $this->redirectToRoute('detail_anime', array("id" => $anime->getId()));
    }

    /**
     * @Route("/now/{id}", name="anime_add_now")
     */
    public function addNow(Anime $anime){

        $user = $this->getUser();

        $userAnime = $this->getDoctrine()->getRepository(UserAnime::class)
            ->findOneBy(['user' => $user, 'anime' => $anime]);

        $em = $this->getDoctrine()->getManager();

        if(empty($userAnime)){
            $userAnime = new UserAnime();
            $userAnime->setAnime($anime);
            $userAnime->setUser($user);
            $userAnime->setStatus('now');

            $em->persist($userAnime);
            $em->flush();
        }else{
            $userAnime->setStatus('now');

            $em->persist($userAnime);
            $em->flush();
        }

        return $this->redirectToRoute('detail_anime', array("id" => $anime->getId()));
    }
}