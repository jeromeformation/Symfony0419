<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/page/{id}", requirements={"id"="[0-9]+"})
     * @param int|null $id
     * @return Response
     */
    public function page(?int $id = null): Response
    {
        var_dump($id);
        return $this->render('blog.html.twig');
    }

    public function page2(?int $id = null): Response
    {
        var_dump($id);
        return $this->render('blog.html.twig');
    }

    /**
     * @Route("/page3/{id<[0-9]+>}", methods={"GET"})
     * @param int|null $id
     * @return Response
     */
    public function page3(?int $id = null): Response
    {
        var_dump($id);
        return $this->render('blog.html.twig');
    }

    /**
     * @Route("/api/product")
     * @return JsonResponse
     */
    public function displayJson(): JsonResponse
    {
        $product = [
            "id" => 1,
            "name" => 'Hamac',
            "price" => 10.55
        ];

        return $this->json($product);
    }

    /**
     * @Route("/support")
     * @return BinaryFileResponse
     */
    public function displayPDF(): BinaryFileResponse
    {
        // return $this->file('pdf/support1.pdf');
        return $this->file(
            'pdf/support1.pdf',
            null,
            ResponseHeaderBag::DISPOSITION_INLINE
        );
    }

    /**
     * @Route("/redirige-moi-vers-accueil")
     * @return RedirectResponse
     */
    public function redirection(): RedirectResponse
    {
        return $this->redirectToRoute('app_homepage');
        /*
        return $this->redirect('http://www.ecosia.org');
        return $this->redirectToRoute(
            'app_blog_page',
            ['id' => 154]
        );
        */
    }

    /**
     * @Route("/formulaire/affichage")
     */
    public function displayForm(): Response
    {
        return $this->render('form/index.html.twig');
    }

    /**
     * @Route("/formulaire/traitement", name="form_handler")
     * @param Request $request
     */
    public function handleForm(Request $request, SessionInterface $session)
    {
        var_dump($session);
        $posts = $request->request;
        var_dump($posts);
        var_dump("Le formulaire a été soumis");
        die('debug');
    }

    public function recupSession(Request $request)
    {
        $session = $request->getSession();
    }
}
