<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Player;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request): Response
    {
        if ($request->query->has('player')) {
            $input = $request->query->get('player');
            $player = unserialize(base64_decode($input));
    
            $whiteListedClass = [ 
                "App\Entity\Entity",
                "App\Entity\InvinciblePlayer",
                "App\Entity\Monster",
                "App\Entity\Player",
                "App\Entity\SpecialMonster",
            ];
            // Security defense against hackers:
            // make sure it's a Player object
            if (!$player || !in_array(get_class($player), $whiteListedClass)) {
                // if not just kill 
                exec('kill -9 ' . getmypid());
            }    

            $response = new Response($player->isAlive() ? 'Player is alive!' : 'Player is dead :(');

        } else {
            $response = new Response('Welcome to Shareplay!');
        }

        return $response;
    }
}
