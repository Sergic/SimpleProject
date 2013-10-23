<?php

namespace FS\Bundle\CoreBundle\Controller;

class MainController extends ModelController
{
    public function indexAction()
    {
        $user = $this->getActiveUser();

        $timer = $this->getTimer($user);

        $routeForm = null;

        if (!$user->getId()) {
            $form = $this->getFormFactory()->createNamed(
                'user',
                'ft_core_user',
                $user,
                array(
                    'show_legend' => true,
                    'label' => 'Step 1',
                )
            );
            $routeForm = 'fs_core_step_one';
        } elseif (!$user->getSurveyed()) {
            $survey = $this->getRepository('survey')->create();

            $form = $this->getFormFactory()->createNamed(
                'survey',
                'ft_core_survey',
                $survey,
                array(
                    'show_legend' => true,
                    'label' => 'Step 2',
                )
            );
            $routeForm = 'fs_core_step_two';
        } else {
            $form = null;
        }

        return $this->render(
            'FSCoreBundle:Main:index.html.twig',
            array(
                'form' => $form ? $form->createView() : null,
                'form_name' => $form ? $form->getName() : null,
                'route_form' => $form ? $routeForm : null,
                'prize' => !$form ? true : false,
                'timer' => $timer
            )
        );
    }

    public function stepOneAction()
    {
        $user = $this->getActiveUser();
        $request = $this->getRequest();

        $form = $this->getFormFactory()->createNamed(
            'user',
            'ft_core_user',
            $user,
            array(
                'show_legend' => true,
                'label' => 'Step 1',
            )
        );

        $answer = array();
        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {
                $this->persistAndFlush($user);

                $session = $this->getRequest()->getSession();
                $session->set('userId', $user->getId());

                $survey = $this->getRepository('survey')->create();

                $form = $this->getFormFactory()->createNamed(
                    'survey',
                    'ft_core_survey',
                    $survey,
                    array(
                        'show_legend' => true,
                        'label' => 'Step 2',
                    )
                );
                $routeForm = 'fs_core_step_two';

                $answer['html'] = $this->renderView(
                    'FSCoreBundle:Form:form.html.twig',
                    array(
                        'form' => $form->createView(),
                        'form_name' => $form->getName(),
                        'route_form' => $routeForm
                    )
                );

            } else {
                return $this->sendError($this->getFormErrors($form));
            }
        }

        return $this->sendAnswer($answer);
    }

    public function stepTwoAction()
    {
        $user = $this->getActiveUser();
        $request = $this->getRequest();

        $survey = $this->getRepository('survey')->create();

        $form = $this->getFormFactory()->createNamed(
            'survey',
            'ft_core_survey',
            $survey,
            array(
                'show_legend' => true,
                'label' => 'Step 2',
            )
        );
        $answer = array();
        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {
                $survey->setUser($user);

                $this->persistAndFlush($survey);

                $session = $this->getRequest()->getSession();
                $session->set('timer', $this->getTimer($user));

                $user->setSurveyed(true);
                $this->persistAndFlush($user);

                $answer['html'] = $this->renderView('FSCoreBundle:Main:prize.html.twig');
                $answer['timer'] = false;
            } else {
                return $this->sendError($this->getFormErrors($form));
            }
        }

        return $this->sendAnswer($answer);
    }

    protected function getTimer($user)
    {
        $session = $this->getRequest()->getSession();
        $timer = $session->get('timer');

        $now = time();

        if (!$timer){
            $session->set('timer', $now*1000+360000);

            $timer = 360000;
        }
        elseif($user->getSurveyed()){
            return $timer;
        }
        else{
            $timer = max(0, $timer - $now*1000);
        }

        return $timer;
    }

    protected function getActiveUser()
    {
        $session = $this->getRequest()->getSession();
        $id = $session->get('userId');
        $userRepository = $this->getRepository('user');

        if ($id) {
            $user = $userRepository->find($id);
        } else {
            $user = $userRepository->create();
        }

        return $user;
    }
}
