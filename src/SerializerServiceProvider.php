<?php

namespace Happensit\Serializer;

use Commty\Simple\ServiceProvider\ServiceProviderInterface;
use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use Commty\Simple\Application;
use JMS\Serializer\SerializerBuilder;

class SerializerServiceProvider implements ServiceProviderInterface
{

    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        // Autoload for JMS Annotations
        AnnotationRegistry::registerLoader('class_exists');

        $serializeBuilder = SerializerBuilder::create()
            ->setCacheDir($app->getStoragePath() . '/cache/serializer')
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
            ->addDefaultHandlers()
            ->build();

        $app->container->setInstance(Serializer::class, $serializeBuilder);
    }
}
