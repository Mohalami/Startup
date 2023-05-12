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
    #[Route('/', name: 'app_agences_index', methods: ['GET'])]
    public function index(AgencesRepository $agencesRepository): Response
    {
        return $this->render('agences/index.html.twig', [
            'agences' => $agencesRepository->findAll(),
        ]);
    }
}
