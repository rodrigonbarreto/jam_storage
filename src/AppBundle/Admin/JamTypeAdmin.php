<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class JamTypeAdmin
 * @package AppBundle\Admin
 */
class JamTypeAdmin extends AbstractAdmin
{
    public function preUpdate($jam)
    {
        $jam->setSuccursales($jam->getSuccursales());
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
            $formMapper->add('name', 'text', array());
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');

    }
}