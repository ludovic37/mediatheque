<?php
/**
 * Created by PhpStorm.
 * User: crespeau
 * Date: 13/03/2018
 * Time: 12:10
 */

namespace App\Controller;

use App\Entity\Serie;
use App\Entity\SerieEpisode;
use App\Form\FormEpisodeSerieType;
use App\Form\FormSerieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/series")
 */
class SerieController extends Controller
{
    /**
     * @Route("/", name="series")
     */
    public function serie(){
        $series = $this->getDoctrine()->getRepository(Serie::class)->findAll();;

        return $this->render('serie/series.html.twig', array("series" => $series));
    }

    /**
     * @Route("/add", name="add_serie")
     */
    public function addSerie(Request $request){

        $serie = new Serie();

        $form = $this->createForm(FormSerieType::class, $serie);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($serie);
            $em->flush();

            return $this->redirectToRoute('series');
        }

        return $this->render('serie/serie_add.html.twig', ['formulaire' => $form->createView()]);

    }

    /**
     * @Route("/datail/{id}", name="detail_serie")
     */
    public function detailSerie(Serie $serie){

        return $this->render('serie/serie_detail.html.twig', array("serie" => $serie));
    }

    /**
     * @Route("/edit/{id}", name="edit_serie")
     */
    public function editSerie(Serie $serie, Request $request){

        $form = $this->createForm(FormSerieType::class, $serie);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($serie);
            $em->flush();

            return $this->redirectToRoute('series');
        }

        return $this->render('serie/serie_edit.html.twig', ['formulaire' => $form->createView()]);

    }

    /**
     * @Route("/delete/{id}", name="delete_serie")
     */
    public function deleteSerie(Serie $serie){

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($serie);
        $entityManager->flush();

        //$this->addFlash("type", "article delete");

        return $this->redirectToRoute('series');

    }

    /**
     * @Route("/detail/episode/add/{id}", name="add_episode_serie")
     */
    public function addEpisodeSerie(Serie $serie, Request $request){

        $episode = new SerieEpisode();

        $form = $this->createForm(FormEpisodeSerieType::class, $episode);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($episode);
            $episode->setSerie($serie);
            $em->flush();

            return $this->redirectToRoute('series');
        }

        return $this->render('serie/serie_episode_add.html.twig', ['formulaire' => $form->createView()]);

    }

    /**
     * @Route("/datail/episode/{id}", name="detail_episode_serie")
     */
    public function detailEpisodeSerie(SerieEpisode $episode){

        return $this->render('serie/serie_episode_detail.html.twig', array("episode" => $episode));
    }
}