<?php

namespace FS\Bundle\CoreBundle\Repository;

use Doctrine\ORM\QueryBuilder;
use FS\Bundle\CoreBundle\Doctrine\ORM\EntityRepository;
use FS\Bundle\CoreBundle\Entity\User;

class UserRepository extends EntityRepository
{
    protected function getQueryBuilder()
    {
        return parent::getQueryBuilder()
            ->select('user');
    }

    /**
     * {@inheritdoc}
     */
    protected function getAlias()
    {
        return 'user';
    }

    /**
     * @return User
     */
    public function create()
    {
        /**
         * @var User $user
         */
        $user = $this->createNew();
        $user->setActive(true);

        return $user;
    }

    public function getUserById($id)
    {
        return $this->findOneBy(array('id' => $id));
    }

    public function getUserByEmail($email)
    {
        return $this->findOneBy(array('email' => $email));
    }
}