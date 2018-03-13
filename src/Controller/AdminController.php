<?php
/**
 * Created by PhpStorm.
 * User: crespeau
 * Date: 12/03/2018
 * Time: 11:20
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 * @Security("has_role('ROLE_ADMIN')")
 *
 */
class AdminController extends Controller
{

}