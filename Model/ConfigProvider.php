<?php

namespace Ingenico\Connect\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\Locale\Resolver;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Asset\Repository;
use Magento\Store\Model\StoreManagerInterface;

class ConfigProvider implements ConfigProviderInterface
{
    /**
     * Payment Method code which Magento uses as an identifier for particular payment method
     */
    const CODE = 'ingenico';

    /**
     * Pattern which is used by payment configuration to fetch data like: title, is_available, sort_order etc
     */
    const PATH_PATTERN = '%s_epayments/general/%s';

    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * @var Resolver
     */
    private $resolver;

    /**
     * @var Repository
     */
    private $assetRepo;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * ConfigProvider constructor.
     *
     * @param UrlInterface $urlBuilder
     * @param ConfigInterface $config
     * @param Resolver $resolver
     * @param Repository $assetRepo
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        UrlInterface $urlBuilder,
        ConfigInterface $config,
        Resolver $resolver,
        Repository $assetRepo,
        StoreManagerInterface $storeManager
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->config = $config;
        $this->resolver = $resolver;
        $this->assetRepo = $assetRepo;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $storeId = $this->storeManager->getStore()->getId();
        $checkoutType = $this->config->getCheckoutType($storeId);
        $paymentMethodGroupTitles = $this->config->getProductGroupTitles($storeId);
        return [
            'payment' => [
                'ingenico' => [
                    'hostedCheckoutPageUrl' => $this->urlBuilder->getUrl('epayments/hostedCheckoutPage'),
                    'inlineSuccessUrl' => $this->urlBuilder->getUrl('epayments/inlinePayment'),
                    'locale' => $this->resolver->getLocale(),
                    'paymentMethodGroupTitles' => $paymentMethodGroupTitles,
                    'useInlinePayments' => $checkoutType === Config::CONFIG_INGENICO_CHECKOUT_TYPE_INLINE,
                    'useFullRedirect' => $checkoutType === Config::CONFIG_INGENICO_CHECKOUT_TYPE_REDIRECT,
                    'loaderImage' => $this->assetRepo->getUrlWithParams('images/loader-2.gif', []),
                ],
            ],
        ];
    }
}
