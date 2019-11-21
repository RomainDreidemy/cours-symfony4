<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends BaseFixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    public function loadData(ObjectManager $manager)
    {

        $this->createMany(10, 'user_admin', function ($num) {

            $user = new User();
            $user->setEmail('admin' . $num . '@kritik.fr')
                ->setRoles(['ROLE_ADMIN'])
                ->setPassword($this->userPasswordEncoder->encodePassword($user,'admin' . $num))
            ;

            // Toujours retourner l'entité
            return $user;
        });

        $this->createMany(30, 'user_user', function ($num) {

            $user = new User();
            $user->setEmail('user' . $num . '@kritik.fr')
                ->setPassword($this->userPasswordEncoder->encodePassword($user,'admin' . $num))
            ;

            // Toujours retourner l'entité
            return $user;
        });

        $manager->flush();
    }
}
