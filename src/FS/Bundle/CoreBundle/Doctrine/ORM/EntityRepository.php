<?php

namespace FS\Bundle\CoreBundle\Doctrine\ORM;

use Doctrine\ORM\EntityRepository as BaseEntityRepository;
use Doctrine\ORM\QueryBuilder;

use FS\Bundle\CoreBundle\Doctrine\ORM\ProxyQuery;
use FS\Bundle\CoreBundle\Model\RepositoryInterface;

class EntityRepository extends BaseEntityRepository implements RepositoryInterface
{
    public function createNew()
    {
        $className = $this->getClassName();

        return new $className;
    }

    public function find($id)
    {
        return $this
            ->getQueryBuilder()
            ->andWhere($this->getAlias().'.id = '.intval($id))
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    public function findAll()
    {
        return $this
            ->getCollectionQueryBuilder()
            ->getQuery()
            ->getResult()
            ;
    }

    public function findOneBy(array $criteria)
    {
        $queryBuilder = $this->getQueryBuilder();

        $this->applyCriteria($queryBuilder, $criteria);

        return $queryBuilder
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        $queryBuilder = $this->getCollectionQueryBuilder();

        $this->applyCriteria($queryBuilder, $criteria);
        $this->applySorting($queryBuilder, $orderBy);

        if (null !== $limit) {
            $queryBuilder->setMaxResults($limit);
        }

        if (null !== $offset) {
            $queryBuilder->setFirstResult($offset);
        }

        return $queryBuilder
            ->getQuery()
            ->getResult()
            ;
    }

    protected function getQueryBuilder()
    {
        return $this->createQueryBuilder($this->getAlias());
    }

    protected function getCollectionQueryBuilder()
    {
        return $this->createQueryBuilder($this->getAlias());
    }

    protected function applyCriteria($queryBuilder, array $criteria = null)
    {
        if (null === $criteria) {
            return;
        }

        $alias = $this->getAlias();

        foreach ($criteria as $property => $value) {
            $queryBuilder
                ->andWhere($alias.'.'.$property.' = :'.$property)
                ->setParameter($property, $value)
            ;
        }
    }

    protected function applySorting($queryBuilder, array $sorting = null)
    {
        if (null === $sorting) {
            return;
        }

        $alias = $this->getAlias();

        foreach ($sorting as $property => $order) {
            $queryBuilder->orderBy($alias.'.'.$property, $order);
        }
    }

    protected function getAlias()
    {
        return 'entity';
    }
}