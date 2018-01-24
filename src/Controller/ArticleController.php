<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 24/01/18
 * Time: 18:05
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    /**
     * @Route("/")
     */
    public function homepage(){
        return new Response('OMG! My first page already!!');
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug){
        return new Response($slug);
    }
}