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
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * @Route("/",name="home_page")
     */
    public function homepage(){
        return $this->render('services/home.html.twig');
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug){
        $test = 'trtr';

        return $this->render('article/home.html.twig', [
            'title' => ucwords(str_replace('_',' ',$slug))
        ]);


    }
}