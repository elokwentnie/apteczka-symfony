<?php

namespace App\Controller;

use App\Entity\Apteczka;
use App\Form\ApteczkaType;
use App\Repository\ApteczkaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

/**
 * @Route("/apteczka")
 */
class ApteczkaController extends AbstractController
{
    /**
     * @Route("/", name="apteczka_index", methods={"GET"})
     */
    public function index(ApteczkaRepository $apteczkaRepository, Security $s): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $apteczki = $apteczkaRepository->findBy([
            'user' => $s->getUser()
        ]);
        $prztermonowane = [];
        foreach($apteczki as $apt) {
            foreach ($apt->getMedykamenty() as $med) {
                if ($med->getDatawaznosci() < new \Datetime()) {
                    $prztermonowane[] = sprintf('%s, ilość: %s, data: %s, apteczka: %s', 
                    $med->getslowniklekow()->getnazwahadlowa(),
                    $med->getIlosc(),
                    $med->getDatawaznosci()->format('Y-m-d'),
                    $apt->getNazwa()
                );
                }
            }
        }


        return $this->render('apteczka/index.html.twig', [
            'apteczkas' => $apteczki,
            'przeterminowane' => $prztermonowane
        ]);
    }

    /**
     * @Route("/new", name="apteczka_new", methods={"GET","POST"})
     */
    public function new(Request $request, Security $security): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $apteczka = new Apteczka();

        $form = $this->createForm(ApteczkaType::class, $apteczka);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $user = $security->getUser();
            $apteczka -> setUser($user);
            foreach ($apteczka->getMedykamenty() as $a) {
                $a->setApteczka($apteczka);
            }
            $entityManager->persist($apteczka);
            $entityManager->flush();

            return $this->redirectToRoute('apteczka_index');
        }

        return $this->render('apteczka/new.html.twig', [
            'apteczka' => $apteczka,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="apteczka_show", methods={"GET"})
     */
    public function show(Apteczka $apteczka, Security $security): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if($security->getUser() !== $apteczka->getUser()) {
            die('to nie twoja apteczka złodzieju');
        }
        return $this->render('apteczka/show.html.twig', [
            'apteczka' => $apteczka,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="apteczka_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Apteczka $apteczka, Security $security): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if($security->getUser() !== $apteczka->getUser()) {
            die('to nie twoja apteczka');
        }
        $form = $this->createForm(ApteczkaType::class, $apteczka);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($apteczka->getMedykamenty() as $a) {
                $a->setApteczka($apteczka);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('apteczka_index');
        }

        return $this->render('apteczka/edit.html.twig', [
            'apteczka' => $apteczka,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="apteczka_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Apteczka $apteczka, Security $security): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if($security->getUser() !== $apteczka->getUser()) {
            die('to nie twoja apteczka złodzieju');
        }

        if ($this->isCsrfTokenValid('delete'.$apteczka->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($apteczka);
            $entityManager->flush();
        }

        return $this->redirectToRoute('apteczka_index');
    }
}
