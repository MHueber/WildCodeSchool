<?php

namespace App\Controller;

use App\Entity\Argonaute;
use App\Form\ArgonauteType;
use App\Repository\ArgonauteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Valid;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(EntityManagerInterface $em, ArgonauteRepository $argonauteRepository, Request $request): Response
    {
        // Création du formulaire
        $argonaute = new Argonaute();
        $argonauteForm = $this->createForm(ArgonauteType::class, $argonaute);

        // Traitement du formulaire
        $argonauteForm -> handleRequest($request);

        if ($argonauteForm-> isSubmitted() && $argonauteForm->isValid()){
            $em->persist($argonaute);
            $em->flush();

            // Ajout d'un message flash et reirection sur la même page.
            $this->addFlash('success','Argonaute ajouté avec succès.');
            return $this->redirectToRoute('home');
        }

        // Affichage des Argonautes en BDD
        $argonautes = $argonauteRepository ->findAll();

        return $this->render('main/index.html.twig', [
            "argonauteForm" => $argonauteForm->createView(),
            "argonautes" => $argonautes ,
        ]);
    }
}
