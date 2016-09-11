<?php

namespace AppBundle\Controller;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends Controller
{
    /**
     * @Route("/blog", name="blog")
     */
    public function indexAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $query = $entityManager->createQueryBuilder()
            ->select('post')
            ->from('AppBundle:Post', 'post')
            ->setFirstResult(0)
            ->setMaxResults(100);

        $paginator = new Paginator($query);

        return $this->render('blog/index.html.twig', [
            'posts' => $paginator,
        ]);
    }

    /**
     * @Route("/blog/{slug}", name="blog-detail")
     */
    public function detailAction($slug)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $blogRepository = $entityManager->getRepository('AppBundle:Post');
        $post = $blogRepository->findOneBySlug($slug);

        if (empty($post)) {
            throw $this->createNotFoundException('The post does not exist');
        }

        return $this->render('blog/detail.html.twig', [
            'post' => $post,
        ]);
    }
}
