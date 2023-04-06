<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostRepository;

#[Route('/admin/post')]
class PostController extends AbstractController
{
    #[Route('/', name: 'app_admin_post')]
    public function index(PostRepository $postRepository): Response
    {
        return $this->render('admin/post/index.html.twig', [
            'posts' => $postRepository->findAll(), 
            'controller_name' => 'PostController'
        ]);
    }
}
