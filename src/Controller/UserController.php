<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserController extends AbstractController
{
//    #[Route('/', name: 'app_user_index', methods: ['GET'])]
//    public function index(UserRepository $userRepository): Response
//    {
//        return $this->render('user/index.html.twig', [
//            'users' => $userRepository->findAll(),
//        ]);
//    }
//
//
//
//    #[Route('/register', name: 'app_user_new', methods: ['GET', 'POST'])]
//    public function new(Request $request, UserRepository $userRepository): Response
//    {
//        $user = new User();
//        $form = $this->createForm(UserType::class, $user);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $userRepository->save($user, true);
//
//            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
//        }
//
//        return $this->renderForm('user/new.html.twig', [
//            'user' => $user,
//            'form' => $form,
//        ]);
//    }
}
