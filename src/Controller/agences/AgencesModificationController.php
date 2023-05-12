<?php

namespace App\Controller\agences;

use App\Entity\Agences;
use App\Form\AgencesType;
use App\Repository\AgencesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/agences')]
class AgencesController extends AbstractController
{
    #[Route('/{id}/edit', name: 'app_agences_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Agences $agence, AgencesRepository $agencesRepository): Response
    {
        $form = $this->createForm(AgencesType::class, $agence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $agencesRepository->save($agence, true);

            return $this->redirectToRoute('app_agences_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('agences/edit.html.twig', [
            'agence' => $agence,
            'form' => $form,
        ]);
    }
}
