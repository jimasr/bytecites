<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use App\Entity\Post;
use App\Form\PostType;
use App\Repository\CategoryRepository;
use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/post')]
class PostController extends AbstractController
{
    /**
     * The function create a comment form in the post show page and save it in the database
     * @param Request $request 
     * @param Post $post
     * @param CommentRepository $commentRepository
     * @return Response
     */
    #[Route('/{id}', name: 'app_post_show', methods: ['GET', 'POST'])]
    public function show(Request $request, Post $post, CommentRepository $commentRepository, CategoryRepository $categoryRepository): Response
    {
        // Create a comment form
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new \DateTimeImmutable());
            $comment->setValid(false);
            $comment->setPost($post);
            $commentRepository->save($comment, true);
            
            return $this->redirectToRoute($request->attributes->get('_route'), $request->attributes->get('_route_params'));
        }

        return $this->renderForm('post/show.html.twig', [
            'post' => $post,
            'form' => $form,
            'categories' => $categoryRepository->findAll(),
        ]);
    }
}
