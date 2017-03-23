Doctrine JMS Serializer Service Provider
========================================

Installation
------------

Use [composer](http://getcomposer.org) to install the provider

    composer require happensit/serializer
    
Usage
-----

Register the service provider on your app:

    $app->register(new Happensit\Serializer\SerializerServiceProvider());