<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 11.04.18
 * Time: 19:50
 */


namespace PaulCheckoutSurvey;

use Shopware\Bundle\AttributeBundle\Service\CrudService;
use Shopware\Components\Model\ModelManager;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class PaulCheckoutSurvey extends Plugin
{
    /**
     * @param InstallContext $context
     */
    public function install(InstallContext $context)
    {
        $this->createSurveyAttr();
    }

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('paul_checkout_survey.plugin_dir', $this->getPath());
        parent::build($container);
    }

    private function createSurveyAttr()
    {
        /** @var CrudService $crudService */
        $crudService = $this->container->get('shopware_attribute.crud_service');

        $crudService->update('s_order_attributes', 'paul_order_survey',
            'text', [
                'label' => 'Wo gefunden',
                'supportText' => 'Auf welcher Plattform hat der Kunde uns ZUERST gefunden.',
                'displayInBackend' => true
            ]);

        // Rebuild attribute models
        /** @var ModelManager $modelManager */
        $modelManager = $this->container->get('models');
    }

}