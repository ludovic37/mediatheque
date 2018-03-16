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
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function home(){

        $user = $this->getUser();

        $films = $this->getDoctrine()->getRepository(Film::class)->findBy([],['sortie' => 'DESC'],5,null);
        $series = $this->getDoctrine()->getRepository(Serie::class)->findFiveLastSerie();
        $animes = $this->getDoctrine()->getRepository(Anime::class)->findFiveLastAnime();

        return $this->render('home.html.twig', array("films" => $films, "series" => $series, "animes" => $animes, "user" => $user));
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(Request $requete , AuthenticationUtils $authentificateur)
    {
        //login => mdp
        //administrateur/admin => dadfba16
        //user1/user2/user3 => user

        $erreur = $authentificateur->getLastAuthenticationError();
        $login = $authentificateur->getLastUsername();
        return $this->render('base/login.html.twig', array ("login"=>$login ,"erreur"=> $erreur ));
    }
}