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
    // private $em;
    private $movieRepository;

    // public function __construct(EntityManagerInterface $em)
    // {
    //     $this->em = $em;
    // }

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    #[Route('/movies', methods: ['GET'], name: 'movies')]
    public function index(): Response
    {
        // findAll() - SELECT * FROM movies
        // find() - SELECT * FROM movies WHERE id = ?
        // findBy() - SELECT * FROM movies ORDER BY id DESC
        // findOneBy() - SELECT * FROM movies WHERE id = ? AND title = ? ORDER BY id DESC
        // count() - SELECT COUNT(*) FROM movies WHERE id = ?

        // $repository = $this->em->getRepository(Movie::class);
        // $movies = $repository->getClassName();
        
        // dd($movies);
        $movies = $this->movieRepository->findAll();

        return $this->render('movies/index.html.twig', [
            'movies' => $movies
        ]);
    }

    #[Route('/movies/{id}', methods: ['GET'], name: 'movie')]
    public function show($id): Response
    {
        $movie = $this->movieRepository->find($id);

        return $this->render('movies/show.html.twig', [
            'movie' => $movie
        ]);
    }
}
