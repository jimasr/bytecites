<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'app_admin_admin')]
    public function index(): Response
    {
        $user = $this->getUser();

        if(!$user || in_array('ROLE_ADMIN', $user->getRoles())) {
            return $this->createNotFoundException('Page not found');
        }

        return $this->render('admin/admin/index.html.twig', [
            'user' => $user,
        ]);
    }
}
