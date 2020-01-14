<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Game;

class GamesController extends AbstractController
{
    /**
     * @Route("/", name="games")
     */
    public function index()
    {
      $games = $this->getDoctrine()
      ->getRepository(Game::class)
      ->findBy([],['name'=>'ASC']);

    

      return $this->render('games/index.html.twig', [
          'games' => $games,
      ]);
    }

    /**
     * @Route("/game/{id}", name="game")
     */
    public function currentGame($id)
    {
      $game = $this->getDoctrine()
      ->getRepository(Game::class)
      ->find($id);

      return $this->render('game/index.html.twig', [
          'game' => $game,
      ]);
    }
}
