<?php

namespace App\Controller;

use App\Entity\Localisations;
use App\Form\LocalisationsType;
use App\Repository\LocalisationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/localisations')]
class LocalisationsController extends AbstractController
{
    #[Route('/', name: 'app_localisations_index', methods: ['GET'])]
    public function index(LocalisationsRepository $localisationsRepository): Response
    {
        return $this->render('localisations/index.html.twig', [
            'localisations' => $localisationsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_localisations_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $localisation = new Localisations();
        $form = $this->createForm(LocalisationsType::class, $localisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($localisation);
            $entityManager->flush();

            return $this->redirectToRoute('app_localisations_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('localisations/new.html.twig', [
            'localisation' => $localisation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_localisations_show', methods: ['GET'])]
    public function show(Localisations $localisation): Response
    {
        return $this->render('localisations/show.html.twig', [
            'localisation' => $localisation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_localisations_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Localisations $localisation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LocalisationsType::class, $localisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_localisations_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('localisations/edit.html.twig', [
            'localisation' => $localisation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_localisations_delete', methods: ['POST'])]
    public function delete(Request $request, Localisations $localisation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$localisation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($localisation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_localisations_index', [], Response::HTTP_SEE_OTHER);
    }
}
