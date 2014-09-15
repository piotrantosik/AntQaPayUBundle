<?php

namespace AntQa\Bundle\PayUBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use AntQa\Bundle\PayUBundle\DependencyInjection\AntQaPayUBundleExtension;
use Symfony\Component\Yaml\Parser;

class AntQaPayUBundleExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadThrowsExceptionUnlessPosIdSet()
    {
        $loader = new AntQaPayUBundleExtension();
        $config = $this->getConfig();
        unset($config['pos_id']);
        $loader->load([$config], new ContainerBuilder());
    }

    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadThrowsExceptionUnlessPosEnvSet()
    {
        $loader = new AntQaPayUBundleExtension();
        $config = $this->getConfig();
        unset($config['pos_env']);
        $loader->load([$config], new ContainerBuilder());
    }

    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadThrowsExceptionUnlessPosSignatureKeySet()
    {
        $loader = new AntQaPayUBundleExtension();
        $config = $this->getConfig();
        unset($config['pos_signature_key']);
        $loader->load([$config], new ContainerBuilder());
    }

    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testLoadThrowsExceptionUnlessPosPaymentClassSet()
    {
        $loader = new AntQaPayUBundleExtension();
        $config = $this->getConfig();
        unset($config['payment_class']);
        $loader->load([$config], new ContainerBuilder());
    }

    public function testLoadPosId()
    {
        $configuration = new ContainerBuilder();
        $loader = new AntQaPayUBundleExtension();
        $config = $this->getConfig();
        $loader->load([$config], $configuration);
        $this->assertTrue($configuration instanceof ContainerBuilder);

        $this->assertEquals('145227', $configuration->getParameter('payu_bundle.pos_id'), 'payu_bundle.pos_id parameter is correct');
    }

    public function testLoadPosSignatureKey()
    {
        $configuration = new ContainerBuilder();
        $loader = new AntQaPayUBundleExtension();
        $config = $this->getConfig();
        $loader->load([$config], $configuration);
        $this->assertTrue($configuration instanceof ContainerBuilder);

        $this->assertEquals('13a980d4f851f3d9a1cfc792fb1f5e50', $configuration->getParameter('payu_bundle.pos_signature_key'), 'payu_bundle.pos_signature_key parameter is correct');
    }

    public function testLoadPosEnv()
    {
        $configuration = new ContainerBuilder();
        $loader = new AntQaPayUBundleExtension();
        $config = $this->getConfig();
        $loader->load([$config], $configuration);
        $this->assertTrue($configuration instanceof ContainerBuilder);

        $this->assertEquals('secure', $configuration->getParameter('payu_bundle.pos_env'), 'payu_bundle.pos_env parameter is correct');
    }

    public function testLoadPosPaymentClass()
    {
        $configuration = new ContainerBuilder();
        $loader = new AntQaPayUBundleExtension();
        $config = $this->getConfig();
        $loader->load([$config], $configuration);
        $this->assertTrue($configuration instanceof ContainerBuilder);

        $this->assertEquals('AntQa\Bundle\PaymentBundle\Entity\Payment', $configuration->getParameter('payu_bundle.payment_class'), 'payu_bundle.payment_class parameter is correct');
    }

    public function testGetAlias()
    {
        $loader = new AntQaPayUBundleExtension();
        $this->assertEquals('payu_bundle', $loader->getAlias());
    }

    /**
     * getEmptyConfig
     *
     * @return array
     */
    protected function getConfig()
    {
        $yaml = <<<EOF
pos_env: secure
pos_id: 145227
pos_signature_key: 13a980d4f851f3d9a1cfc792fb1f5e50
payment_class: AntQa\Bundle\PaymentBundle\Entity\Payment
EOF;
        $parser = new Parser();

        return $parser->parse($yaml);
    }
}
