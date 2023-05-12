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
    #[Route('/{id}', name: 'app_agences_show', methods: ['GET'])]
    public function show(Agences $agence): Response
    {
        return $this->render('agences/show.html.twig', [
            'agence' => $agence,
        ]);
    }
}
