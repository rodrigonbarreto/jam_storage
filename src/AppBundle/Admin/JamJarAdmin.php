<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Enum\JamTypeEnum;
use AppBundle\Entity\Enum\YearEnum;
use AppBundle\Entity\JamType;
use AppBundle\Entity\JamYear;
use AppBundle\Service\JamJarService;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Validator\Constraints as Assert;


class JamJarAdmin extends AbstractAdmin
{
    /**
     * @var JamJarService
     */
    protected $jamJarService;

    /**
     * @param JamJarService $jamJarService
     */
    public function setJamJarService(JamJarService $jamJarService)
    {
        $this->jamJarService = $jamJarService;
    }


    protected function configureFormFields(FormMapper $formMapper)
    {

        if ($this->isCurrentRoute('create')) {

            $formMapper->add('quantity', 'integer', array(
                'constraints' => new Assert\Range(['min' => 1]),
                'mapped' => false,
                'data' => 1,
            ));
        }

        $formMapper->add('jamType', 'entity',
            array(
                'class' => JamType::class,
                'placeholder' => 'Select a type'
            ));

        $formMapper->add('jamYear', 'entity',
            array(
                'class' => JamYear::class,
                'placeholder' => 'Select a Year'
            ));

        $formMapper->add('comment', 'textarea');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('jamYear');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('jamType');
        $listMapper->addIdentifier('jamYear');
        $listMapper->addIdentifier('comment');
    }

    /**
     * @param mixed $jamJar
     */
    public function postPersist($jamJar)
    {
        $form = $this->getForm();
        $quantity = $form->get('quantity')->getData();
        $this->jamJarService->saveJamJar($quantity, $jamJar);
    }
}