<?php
/**
 * Created by PhpStorm.
 * User: crespeau
 * Date: 14/03/2018
 * Time: 14:18
 */

namespace App\Controller;


use App\Entity\Anime;
use App\Entity\Film;
use App\Entity\Serie;
use App\Entity\UserAnime;
use App\Entity\UserFilm;
use App\Entity\UserSerie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil")
 */
class ProfilController extends Controller
{
    /**
     * @Route("/", name="profil")
     */
    public function films(){

        $user = $this->getUser();

        //$films = $this->getDoctrine()->getRepository(Film::class)->findAllFilmUser($user);
        $userfilm = $this->getDoctrine()->getRepository(UserFilm::class)->findAllFilmUser($user);
        $userserie = $this->getDoctrine()->getRepository(UserSerie::class)->findAllSerieUser($user);
        $useranime = $this->getDoctrine()->getRepository(UserAnime::class)->findAllAnimeUser($user);
        //$serie = $this->getDoctrine()->getRepository(Serie::class)->findBy(['user'=> $user]);
        //$anime = $this->getDoctrine()->getRepository(Anime::class)->findBy(['user'=> $user]);

        return $this->render('profil/profil.html.twig', array("userfilms" => $userfilm,"userseries" => $userserie,"useranimes" => $useranime));
        //return $this->render('profil/profil.html.twig', array("films" => $films/*,"serie" => $serie,"anime" => $anime*/));
    }
}