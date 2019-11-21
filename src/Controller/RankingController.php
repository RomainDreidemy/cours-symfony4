<?php

namespace App\Controller;

use App\Entity\Record;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RankingController extends AbstractController
{
    /**
     * @Route("/ranking", name="ranking_news")
     */
    public function index(EntityManagerInterface $em)
    {


//        dd($dateFrom->format('Y/m/d'));
        $records = $em->getRepository(Record::class)->getFromLastMonth();

        return $this->render('ranking/news.html.twig', [
            'records' => $records
        ]);
    }
}
