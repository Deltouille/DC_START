<?php

namespace App\Controller;

use App\Entity\UserInfo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ProfilController extends AbstractController
{
    public function __construct(ManagerRegistry $doctrine){
        $this->doctrine = $doctrine;
    }

    #[Route('/profil', name: 'app_profil')]
    public function index(ChartBuilderInterface $chartBuilder): Response
    {
        $entityManager = $this->doctrine->getManager();
        $userInfoRepository = $entityManager->getRepository(UserInfo::class);
        $userInfo = $userInfoRepository->findBy(['user' => $this->getUser()->getId()]);

        $chart  = $chartBuilder->createChart(Chart::TYPE_LINE);

        $chart->setData([
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [0, 10, 5, 2, 20, 30, 45],
                ],
            ],
        ]);

        $chart->setOptions([
            'responsive' => true,
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
        ]);

        return $this->render('profil/index.html.twig', [
            'userInfo' => $userInfo[0],
            'chart' => $chart,
        ]);
    }


}
