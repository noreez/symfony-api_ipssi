<?php

namespace App\Controller;

use App\Entity\Subscription;
use App\Entity\User;
use App\Repository\SubscriptionRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AnonymousController extends AbstractFOSRestController
{
    private $subscriptionRepository;
    private $userRepository;
    private $em;

    public function __construct(UserRepository $userRepository, SubscriptionRepository $subscriptionRepository, EntityManagerInterface $em)
    {
        $this->userRepository = $userRepository;
        $this->subscriptionRepository = $subscriptionRepository;
        $this->em = $em;
    }

    /**
     * @Rest\View(serializerGroups={"AnonymousUser"})
     * @Rest\Get("/api/anonymous/user/{id}")
     */
    public function getApiUser(User $user) 
    {
        return $this->view($user);
    }

    /**
     * @Rest\View(serializerGroups={"AnonymousUser"})
     * @Rest\Get("/api/anonymous/users")
     */
    public function getApiUsers() 
    {
        $users = $this->userRepository->findAll();
        return $this->view($users);
    }

    /**
     * @Rest\View(serializerGroups={"InformationSubcription"})
     * @Rest\Get("/api/anonymous/subscription/{id}")
     */
    public function getApiSubscription(Subscription $subscription) 
    {
        return $this->view($subscription);
    }

    /**
     * @Rest\View(serializerGroups={"InformationSubcription"})
     * @Rest\Get("/api/anonymous/subscriptions")
     */
    public function getApiSubscriptions() 
    {
        $subscription = $this->subscriptionRepository->findAll();
        return $this->view($subscription);
    }

    /**
     * @Rest\View(serializerGroups={"AnonymousUser", "InformationSubcription"})
     * @Rest\Post("/api/anonymous/postUser")
     * @ParamConverter("user", converter="fos_rest.request_body")
     */
    public function postApiUser(User $user)
    {
        $this->em->persist($user);
        $this->em->flush();
        return $this->view($user);
    }

}
