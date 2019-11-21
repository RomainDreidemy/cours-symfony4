<?php

namespace App\Controller;

use App\Entity\Label;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LabelController extends AbstractController
{
    /**
     * @Route("/label", name="label_page")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/LabelController.php',
        ]);
    }

    /**
     * @Route("/label/informations/{id}", name="label_pageById")
     */
    public function information(Label $label, EntityManagerInterface $em)
    {
        return $this->render('label/information.html.twig', [
            'label' => $label
        ]);
    }
}
