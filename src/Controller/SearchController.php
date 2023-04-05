<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route('/search')]
class   SearchController extends AbstractController
{
    /**
     * Search in the title, description and content of the post
     */
    #[Route('/', name: 'app_search', methods: ['GET'])]
    public function index(Request $request, PostRepository $postRepository, CategoryRepository $categoryRepository): Response
    {
        $query = $request->query->get('search');
        if ($query) {
            $posts = $postRepository->findByName($query);
        } else {
            $posts = [];
        }

        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
            'posts' => $posts,
            'query' => $query ?? '',
            'categories' => $categoryRepository->findAll()
        ]);
    }
}
