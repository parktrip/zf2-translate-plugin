<?php
namespace ZfTranslate\Factory;

use Zend\Mvc\I18n\Translator;
use ZfTranslate\Controller\Plugin\TranslatePlugin;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TranslatePluginFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        return $this($services, TranslatePlugin::class);
    }
    
     public function __invoke(ContainerInterface $containerInterface, $requestedName, array $options = null)
    {
        /** @var ServiceLocatorInterface $sm */
        $sm = $containerInterface->getServiceLocator();
        /** @var Translator $translator */
        $translator = $sm->get('MvcTranslator');

        return new TranslatePlugin($translator);
    }
}
