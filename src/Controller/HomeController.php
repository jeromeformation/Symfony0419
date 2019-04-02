<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @return Response
     */
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

    public function contact(): Response
    {
        return new Response('<h1>Contact</h1>');
    }

    /**
     * @Route("/a-propos", name="app_about")
     */
    public function about()
    {
        return new Response('<h1>A propos</h1>');
    }
}
