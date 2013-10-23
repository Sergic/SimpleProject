<?php

namespace FS\Bundle\CoreBundle\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator;

class ModelController extends Controller
{
    /**
     * Gets entity manager object
     *
     * @return EntityManager
     */
    public function getManager()
    {
        return $this->container->get('doctrine.orm.entity_manager');
    }

    /**
     * Gets repository object of entity
     *
     * @param $resource
     * @return EntityRepository
     */
    protected function getRepository($resource)
    {
        return $this->container->get('fs_core.repository.' . $resource);
    }

    /**
     * Remove object entity
     *
     * @param object $resource
     */
    public function remove($resource)
    {
        $this->removeAndFlush($resource);
    }

    public function persistAndFlush($resource)
    {
        $manager = $this->getManager();

        $manager->persist($resource);
        $manager->flush();
    }

    public function removeAndFlush($resource)
    {
        $manager = $this->getManager();

        $manager->remove($resource);
        $manager->flush();
    }

    /**
     * Gets service by id
     *
     * @param string $name
     * @return object The associated service
     *
     * @see Reference
     *
     * @api
     */
    protected function getService($name)
    {
        return $this->container->get($name);
    }

    /**
     * Gets form factory service
     *
     * @return FormFactory
     */
    protected function getFormFactory()
    {
        return $this->container->get('form.factory');
    }

    /**
     * Gets validator service
     *
     * @return Validator
     */
    protected function getValidator()
    {
        return $this->container->get('validator');
    }

    public function sendAnswer($data, $statusCode = 200, $headers = array())
    {
        if (!isset($data['success'])) {
            $data['success'] = 1;
        }

        $response = new JsonResponse($data, $statusCode, $headers);

        return $response;
    }

    protected function sendError(array $errors)
    {

        $answer = array(
            'success' => 0,
            'errors' => $errors
        );

        return $this->sendAnswer($answer);
    }

    protected function getFormErrors(FormInterface $form)
    {
        $errors = array();
        $globalErrors = array();

        $formErrors = $form->getErrors();
        foreach ($formErrors as $error) {
            $globalErrors[] = $error->getMessage() . '<br />';
        }
        if (!empty($globalErrors)) {
            $errors['global'] = join('.', $globalErrors);
        }

        foreach ($form as $name => $field) {
            $local = array();
            $fieldErrors = $field->getErrors();
            foreach ($fieldErrors as $error) {
                $local[] = $error->getMessage();
            }
            if (!empty($fieldErrors)) {
                $errors[$name] = join('. ', $local);
            }
        }

        return $errors;
    }
}