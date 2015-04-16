<?php

namespace AntQa\Bundle\PayUBundle\Tests\Controller;

class PaymentControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $controller = $this->getController();
        $this->assertInstanceOf('AntQa\Bundle\PayUBundle\Controller\PaymentController', $controller);
    }

    /**
     * @return \AntQa\Bundle\PayUBundle\Controller\PaymentController
     */
    protected function getController()
    {
        return $this->getMock('AntQa\Bundle\PayUBundle\Controller\PaymentController',[],
            [$this->getEntityManager(), 'secure', '145227', '13a980d4f851f3d9a1cfc792fb1f5e50', '\AntQa\Bundle\PaymentBundle\Entity\Payment']);
    }

    protected function getEntityManager()
    {
        $config = new \Doctrine\ORM\Configuration();
        $config->setEntityNamespaces(['SymfonyTestsDoctrine' => 'Symfony\Bridge\Doctrine\Tests\Fixtures']);
        $config->setAutoGenerateProxyClasses(true);
        $config->setProxyDir(\sys_get_temp_dir());
        $config->setProxyNamespace('SymfonyTests\Doctrine');
        $config->setMetadataDriverImpl(new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(new \Doctrine\Common\Annotations\AnnotationReader()));
        $config->setQueryCacheImpl(new \Doctrine\Common\Cache\ArrayCache());
        $config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache());

        $params = [
            'driver' => 'pdo_sqlite',
            'memory' => true,
        ];

        return \Doctrine\ORM\EntityManager::create($params, $config);
    }
}
