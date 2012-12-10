<?php

namespace Phpfreaks\SiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Phpfreaks\SiteBundle\Entity\User;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('testuser');
        $user->setEmail('testuser@phpfreaks.com');

        $encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($user);
        $user->setPassword($encoder->encodePassword('testpass', $user->getSalt()));
        $manager->persist($user);
        $manager->flush();
    }
}