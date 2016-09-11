<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BlogDashboardController extends Controller
{
    /**
     * @Route("/admin/blog", name="admin-blog")
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

        return $this->render('admin/blog/index.html.twig', [
            'posts' => $paginator,
        ]);
    }

    /**
     * @Route("/admin/blog/{id}/edit", name="admin-blog-edit")
     */
    public function editAction(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $blogRepository = $entityManager->getRepository('AppBundle:Post');
        $post = $blogRepository->find($id);

        if (empty($post)) {
            throw $this->createNotFoundException('The post does not exist');
        }

        $form = $this->createFormBuilder($post, [
            'csrf_protection' => false,
        ])
            ->add('title', TextType::class)
            ->add('slug', TextType::class)
            ->add('content', TextareaType::class)
            ->add('save', SubmitType::class, array('label' => 'Update Post'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $post = $form->getData();

            if ($form->isValid()) {
                $post->setDateOfModification(new \DateTime());

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($post);
                $entityManager->flush();

                $this->addFlash('success', 'Post has been modified');

                return $this->redirect($this->generateUrl('admin-blog'), 301);
            }
        }

        return $this->render('admin/blog/edit.html.twig', [
            'form' => $form->createView(),
            'post' => $post,
        ]);
    }

    /**
     * @Route("/admin/blog/add", name="admin-blog-add")
     */
    public function addAction(Request $request)
    {
        $post = new Post();

        $form = $this->createFormBuilder($post, [
            'csrf_protection' => false,
        ])
            ->add('title', TextType::class)
            ->add('slug', TextType::class)
            ->add('content', TextareaType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Post'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $post = $form->getData();

            if ($form->isValid()) {
                $post->setDateOfCreation(new \DateTime());

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($post);
                $entityManager->flush();

                $this->addFlash('success', 'Post has been created');

                return $this->redirect($this->generateUrl('admin-blog'), 301);
            }
        }

        return $this->render('admin/blog/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/blog/{id}/delete", name="admin-blog-delete")
     */
    public function deleteAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $blogRepository = $entityManager->getRepository('AppBundle:Post');
        $post = $blogRepository->find($id);

        if (empty($post)) {
            throw $this->createNotFoundException('The post does not exist');
        }

        $entityManager->remove($post);
        $entityManager->flush();

        $this->addFlash('success', 'Post has been removed');

        return $this->redirect($this->generateUrl('admin-blog'), 301);
    }
}
