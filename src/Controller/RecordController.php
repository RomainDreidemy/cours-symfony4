<?php

namespace App\Controller;

use App\Entity\Record;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecordController extends AbstractController
{
    /**
     * @Route("/record", name="record_page")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/RecordController.php',
        ]);
    }

    /**
     * @Route("/record/informations/{id}", name="record_pageById")
     */
    public function information(Record $record, EntityManagerInterface $em)
    {
        return $this->render('record/info.html.twig', [
            'record' => $record
        ]);
    }
}
