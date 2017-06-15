<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class JamYearAdmin
 * @package AppBundle\Admin
 */
class JamYearAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->add('year', 'integer', array());
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('year');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('year');

    }
}