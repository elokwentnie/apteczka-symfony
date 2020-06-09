<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('What a bewithing controller we have conjured!');
    }

    /**
     * @Route("/questions/{slug}")
     */

    public function show($slug)
    {

        $answers = [
            'Hello this is answer no 1',
            'Hello this is answer no 2',
            'Hello this is answer no 3',
        ];

        return $this -> render('question/show.html.twig', [
            'question' => ucwords(str_replace('-', ' ', $slug)),
            'answers' => $answers,
        ]);
    }

}