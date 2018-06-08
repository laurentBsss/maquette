<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Post;

class HomeController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {   
    	//$entityManager = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getRepository(Post::class);
    	// look for *all* Product objects
        $products = $repository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'products' => $products,
        ]);
    }
}
