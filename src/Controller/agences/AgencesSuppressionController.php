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
    #[Route('/{id}', name: 'app_agences_delete', methods: ['POST'])]
    public function delete(Request $request, Agences $agence, AgencesRepository $agencesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$agence->getId(), $request->request->get('_token'))) {
            $agencesRepository->remove($agence, true);
        }

        return $this->redirectToRoute('app_agences_index', [], Response::HTTP_SEE_OTHER);
    }
}
