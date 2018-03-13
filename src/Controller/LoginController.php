<?php
/**
 * Created by PhpStorm.
 * User: crespeau
 * Date: 12/03/2018
 * Time: 11:34
 */

namespace App\Controller;

use App\Entity\Anime;
use App\Entity\Film;
use App\Entity\Media;
use App\Entity\Serie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function home(){
        $films = $this->getDoctrine()->getRepository(Film::class)->findBy([],['sortie' => 'DESC'],5,null);
        $series = $this->getDoctrine()->getRepository(Serie::class)->findBy([],['id' => 'DESC'],5,null);
        $animes = $this->getDoctrine()->getRepository(Anime::class)->findBy([],['id' => 'DESC'],5,null);

        //$films = $this->getDoctrine()->getRepository(Film::class)->findBy([], ['sortie' => 'DESC'], 5, null);
        //$series = $this->getDoctrine()->getRepository(Serie::class)->findBy([], ['sortie' => 'DESC'], 5, null);
        //$animes = $this->getDoctrine()->getRepository(Anime::class)->findBy([], ['sortie' => 'DESC'], 5, null);

        return $this->render('home.html.twig', array("films" => $films, "series" => $series, "animes" => $animes));
    }
}