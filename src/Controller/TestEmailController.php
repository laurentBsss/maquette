<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestEmailController extends Controller
{
    /**
     * @Route("/test/email", name="test_email")
     */
    public function index()
    {
        return $this->render('test_email/index.html.twig', [
            'controller_name' => 'TestEmailController',
        ]);
    }

    /**
     * @Route("/testemail", name="test_mail")
     */
    public function test( \Swift_Mailer $mailer)
    {  // var_dump(  $mailer);die;
        $message = (new \Swift_Message('Hello Email'))
        ->setFrom('danone97200@gmail.com')
        ->setTo('danone97200@gmail.com')
        ->setBody(
            $this->renderView(
                // templates/emails/registration.html.twig
                'test_email/registration.html.twig',
                array('name' => "jhon")
            ),
            'text/html'
        );
//var_dump(  $message);die;
        $mailer->send($message);

        return $this->render('test_email/index.html.twig', [
            'controller_name' => 'TestEmailController',
        ]);   
    }
}
