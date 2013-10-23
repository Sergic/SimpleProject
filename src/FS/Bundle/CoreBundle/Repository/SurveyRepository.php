<?php

namespace FS\Bundle\CoreBundle\Repository;

use FS\Bundle\CoreBundle\Doctrine\ORM\EntityRepository;
use FS\Bundle\CoreBundle\Entity\Survey;

/**
 * SurveyRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SurveyRepository extends EntityRepository
{
    protected function getQueryBuilder()
    {
        return parent::getQueryBuilder()
            ->select('survey');
    }

    /**
     * {@inheritdoc}
     */
    protected function getAlias()
    {
        return 'survey';
    }

    /**
     * @return Survey
     */
    public function create()
    {
        /**
         * @var Survey $user
         */
        $survey = $this->createNew();

        return $survey;
    }
}