<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostRepository;
use App\Entity\Post;
use App\Form\PostType;
use App\Repository\CategoryRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'posts' => $posts,
        ]);
    }



    public function latest(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findBy([], ['publishedAt' => 'DESC'], 6);

        return $this->render('home/latest.html.twig', [
            'posts' => $posts
        ]);
    }

    public function popular(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();
        $comments = [];
        $popular = [];

        foreach ($posts as $post) {
            $comments[$post->getId()] = $post->getComments()->count();
        }

        //sort array maintaining the index association
        if ($comments){
            arsort($comments);
        }

        //store 6 most popular posts
        for($i = 0; $i < 6 && $i< count($comments); $i++) {
            $popular[$i] = $postRepository->find(array_keys($comments)[$i]);
        }

        return $this->render('home/popular.html.twig', [
            'posts' => $popular,
        ]);
    }
}
