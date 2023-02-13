<?php

namespace App\Controller;

use App\Entity\Servant;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\AtlasAcademyApi\AtlasAcademyApi;

class AdministrationController extends AbstractController
{
    public function __construct(ManagerRegistry $doctrine){
        $this->doctrine = $doctrine;
    }

    #[Route('/administration', name: 'app_administration')]
    public function index(): Response
    {
        return $this->render('administration/index.html.twig', [
            'controller_name' => 'AdministrationController',
        ]);
    }

    #[Route('/update-list-servant', name: 'app_update_list_servant')]
    public function updateListServant(AtlasAcademyApi $atlasAcademyApi){
        $listeServantInsert = [];
        $listeServantApi = $atlasAcademyApi->getServants();

        $entityManager = $this->doctrine->getManager();
        $servantRepository = $entityManager->getRepository(Servant::class);

        foreach ($listeServantApi as $currentApiServant){
            $servant = [
                'id' => $currentApiServant['collectionNo'],
                'name' => $currentApiServant['name'],
                'className' => $currentApiServant['className'],
                'type' => $currentApiServant['type'],
                'flag' => $currentApiServant['flag'],
                'rarity' => $currentApiServant['rarity'],
                'charaGraph' => $currentApiServant['extraAssets']['charaGraph']['ascension'],
                'face' => $currentApiServant['extraAssets']['faces']['ascension'],
            ];

            $listeServantInsert[] = $servant;
        }

        usort($listeServantInsert, function($firstId, $secondId){
            return $firstId['id'] <=> $secondId['id'];
        });

        foreach($listeServantInsert as $currentServant){
            $getServant = $servantRepository->find($currentServant['id']);
            if($getServant == null){

                foreach($currentServant['charaGraph'] as $graph){   //Obligé de faire de cette méthode car $dataAsc = $currentServant['charaGraph'][4] retourne Error : Undefined Offset : 4 alors qu'il existe
                    $dataAsc = $graph;
                }
                foreach($currentServant['face'] as $face){    //Pareil que le foreach au dessus, mais avec $dataIcn = $currentServant['face'][4]
                    $dataIcn = $face;
                }

                $servant = new Servant();
                $servant->setName($currentServant['name']);
                $servant->setClass($currentServant['className']);
                $servant->setRarity($currentServant['rarity']);
                $servant->setGraph($dataAsc);
                $servant->setFace($dataIcn);

                $entityManager->persist($servant);

                $entityManager->flush();
            }
        }

        return new Response('Servants enregistrées');
    }
}
