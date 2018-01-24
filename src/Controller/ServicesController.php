<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 24/01/18
 * Time: 18:05
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServicesController extends AbstractController
{
    /**
     * @Route("/",name="home_page")
     */
    public function homepage(){
        return $this->render('services/home.html.twig');
    }

    /**
     * @Route("/trouve",name="trouve_page")
     */
    public function trouve(){
        return $this->render('services/trouve.html.twig');
    }

    /**
     * @Route("/perdu",name="perdu_page")
     */
    public function perdu(){
        return $this->render('services/perdu.html.twig');
    }

    /**
     * @Route("/enregistre",name="enregistre_page")
     */
    public function enregistre(){
        return $this->render('services/enregistre.html.twig');
    }
}
