<?php

namespace App\Controller;
use  App\Entity\Section;
# on va charger le Repository (manager) de Section
use App\Repository\SectionRepository;
use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(SectionRepository $sections): Response
    {
        return $this->render('home/index.html.twig', [
            'title' => 'Homepage',
            'sections' => $sections->findAll(),
        ]);
    }

    # A FAIRE
    #[Route('/section/{id}', name: 'section')]
    public function section(int $id, SectionRepository $sections): Response
    {
        $section = $sections->findOneBy(['id' => $id]);
        return $this->render('section/section.html.twig', [
            'title' => $section->getSectionTitle(),
            'section' => $section,
            'sections' => $sections->findAll(),
        ]);
    }
}
