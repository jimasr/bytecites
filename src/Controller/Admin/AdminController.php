<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/{display?}', name: 'app_admin_admin')]
    public function index($display): Response
    {
        $controller = 'App\Controller\Admin\AdminController::dashboard';
        if($display != null) {
            $method = 'index';
            $controller = 'App\Controller\Admin\\' . ucfirst($display) . 'Controller::' . $method;
        }

        return $this->render('admin/admin/index.html.twig', [
            'controller' => $controller,
        ]);
    }

    public function dashboard(): Response
    {
        return $this->render('admin/admin/dashboard.html.twig');
    }
}