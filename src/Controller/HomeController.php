<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[IsGranted('ROLE_USER')]
class HomeController extends AbstractController
{
    #[Route('/')]
    public function indexNoLocale(): Response
    {
    return $this->redirectToRoute('app_home', ['_locale' => 'fr']);
    }
    
    #[Route('/{_locale<%app.supported_locales%>}/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
