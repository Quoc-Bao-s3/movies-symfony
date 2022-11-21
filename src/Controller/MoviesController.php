<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/movies', name: 'movies')]
    public function index(EntityManagerInterface $em): Response
    {
        // findAll() - SELECT * FROM movies
        // find() - SELECT * FROM movies WHERE id = ?
        // findBy() - SELECT * FROM movies ORDER BY id DESC
        // findOneBy() - SELECT * FROM movies WHERE id = ? AND title = ? ORDER BY id DESC
        // count() - SELECT COUNT(*) FROM movies WHERE id = ?

        $repository = $this->em->getRepository(Movie::class);
        $movies = $repository->getClassName();
        
        dd($movies);

        return $this->render('index.html.twig');
    }
}
