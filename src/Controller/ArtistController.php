<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Repository\ArtistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="artist_list")
     * @IsGranted("ROLE_USER")
     */
    public function index(ArtistRepository $artistRepo)
    {
        $results = $artistRepo->findDj();

        return $this->render('artists/list.html.twig', [
            'res' => $results,
        ]);
    }

    /**
     * @Route("/artist/information/{id}", name="artist_byId")
     */
    public function informations(Artist $artist, ArtistRepository $artistRepo)
    {
        return $this->render('artists/information.html.twig', [
            'artist' => $artist,
        ]);
    }
}
