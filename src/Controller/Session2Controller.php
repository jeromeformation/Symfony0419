<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class Session2Controller extends AbstractController
{
    /**
     * @Route("/session2/ajout")
     * @param SessionInterface $session
     * @return Response
     */
    public function ajoutSession(SessionInterface $session): Response
    {
        $ancienneValeur =$session->get('compteur', 0);
        $session->set('compteur', $ancienneValeur + 1);

        return $this->render('home.html.twig');
    }

    /**
     * @Route("/session2/panier")
     * @param SessionInterface $session
     * @return Response
     */
    public function affichageSession(SessionInterface $session): Response
    {
        var_dump($session->get('compteur'));


        return $this->render('session/affichage-session.html.twig');
    }
}