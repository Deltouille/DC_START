<?php

namespace App\Controller;

use App\Entity\Servant;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServantController extends AbstractController
{
    public function __construct(ManagerRegistry $doctrine){
        $this->doctrine = $doctrine;
    }

    #[Route('/liste-des-servants', name: 'app_servant_list')]
    public function index(): Response
    {
        $entityManager = $this->doctrine->getManager();
        $servantRepository = $entityManager->getRepository(Servant::class);

        $listeServant = $servantRepository->findAll();

        return $this->render('servant/liste-servant.html.twig', [
            'listeServant' => $listeServant
        ]);
    }
}
