<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Entity\Post;

class ViewController extends Controller
{
    /**
     * @Route("/view/{id}", name="view")
     */
    public function index($id)
    {   
    	$repository = $this->getDoctrine()->getRepository(Post::class);
        $post = $repository->find($id);
      
	    if (null === $post) {
	      throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
	    }

        return $this->render('view/index.html.twig', [
            'controller_name' => 'ViewController',
            'post'           => $post,
        ]);
    }
}
