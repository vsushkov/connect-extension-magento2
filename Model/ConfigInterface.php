<?php

namespace Ingenico\Connect\Model;

interface ConfigInterface
{

    /**
     * Returns boolean for modul activation status
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isActive($storeId = null);

    /**
     * Returns version of current extension
     *
     * @param int|null $storeId
     * @return string
     */
    public function getVersion($storeId = null);

    /**
     * Returns Api Key
     *
     * @param int|null $storeId
     * @return string
     */
    public function getApiKey($storeId = null);

    /**
     * Returns Api Secret
     *
     * @param int|null $storeId
     * @return string
     */
    public function getApiSecret($storeId = null);

    /**
     * Returns Merchant Id
     *
     * @param int|null $storeId
     * @return string
     */
    public function getMerchantId($storeId = null);

    /**
     * Returns Api Endpoint
     *
     * @param int|null $storeId
     * @return string
     */
    public function getApiEndpoint($storeId = null);

    /**
     * Returns Secondary Api Endpoint
     *
     * @param int|null $storeId
     * @return string
     */
    public function getSecondaryApiEndpoint($storeId = null);

    /**
     * @param int|null $storeId
     * @return string
     */
    public function getCheckoutType($storeId = null);

    /**
     * @param null|int $storeId
     * @return string
     */
    public function getCaptureMode($storeId = null);

    /**
     * Returns WebHooks Key Id
     *
     * @param int|null $storeId
     * @return string
     */
    public function getWebHooksKeyId($storeId = null);

    /**
     * Returns WebHooks Secret Key
     *
     * @param int|null $storeId
     * @return string
     */
    public function getWebHooksSecretKey($storeId = null);

    /**
     * Returns WebHooks Key Id
     *
     * @param int|null $storeId
     * @return string
     */
    public function getWebHooksKeyId2($storeId = null);

    /**
     * Returns WebHooks Secret Key
     *
     * @param int|null $storeId
     * @return string
     */
    public function getWebHooksSecretKey2($storeId = null);

    /**
     * Returns Fraud Manager Email
     *
     * @param int|null $storeId
     * @return string
     */
    public function getFraudManagerEmail($storeId = null);

    /**
     * Returns Fraud Email Sender
     *
     * @param int|null $storeId
     * @return string
     */
    public function getFraudEmailSender($storeId = null);

    /**
     * Returns Fraud Email Template
     *
     * @param int|null $storeId
     * @return string
     */
    public function getFraudEmailTemplate($storeId = null);

    /**
     * Returns Soft Descriptor
     *
     * @param int|null $storeId
     * @return string
     */
    public function getDescriptor($storeId = null);

    /**
     * Returns Hosted Checkout SubDomain
     *
     * @param int|null $storeId
     * @return string
     */
    public function getHostedCheckoutSubDomain($storeId = null);

    /**
     * Return Hosted Checkout Variant
     *
     * @param null|int $storeId
     * @return string
     */
    public function getHostedCheckoutVariant($storeId = null);

    /**
     * Returns period after which pending orders will be canceled
     *
     * @param int|null $storeId
     * @return string
     */
    public function getPendingOrdersCancellationPeriod($storeId = null);

    /**
     * Returns flag (enable/disable) to log all requests
     *
     * @param int|null $storeId
     * @return bool
     */
    public function getLogAllRequests($storeId = null);

    /**
     * Returns file name of log file
     *
     * @param int|null $storeId
     * @return string
     */
    public function getLogAllRequestsFile($storeId = null);

    /**
     * Returns Email Sender to be used for update notification emails
     *
     * @param int|null $storeId
     * @return string
     */
    public function getUpdateEmailSender($storeId = null);

    /**
     * Returns flag whether update notification enabled for specific status
     *
     * @param $code
     * @param string $storeId
     * @return bool
     */
    public function getUpdateEmailEnabled($code, $storeId = null);

    /**
     * Return shoppingCartExtension name
     *
     * @return mixed
     */
    public function getShoppingCartExtensionName();

    /**
     * Returns integrator information
     *
     * @return string
     */
    public function getIntegrator();

    /**
     * @param int|null $storeId
     * @return array
     */
    public function getProductGroupTitles($storeId = null);

    /**
     * Returns payment status info
     *
     * @param int|null $storeId
     * @param $status
     * @return string
     */
    public function getPaymentStatusInfo($status, $storeId = null);

    /**
     * Returns if sftp usage is active
     *
     * @param int|null $storeId
     * @return string
     */
    public function getSftpActive($storeId = null);

    /**
     * Returns sftp host
     *
     * @param int|null $storeId
     * @return string
     */
    public function getSftpHost($storeId = null);

    /**
     * Returns sftp name
     *
     * @param int|null $storeId
     * @return string
     */
    public function getSftpUsername($storeId = null);

    /**
     * Returns sftp password
     *
     * @param int|null $storeId
     * @return string
     */
    public function getSftpPassword($storeId = null);

    /**
     * Returns sftp remote path
     *
     * @param int|null $storeId
     * @return string
     */
    public function getSftpRemotePath($storeId = null);

    /**
     * @return string
     */
    public function getReferencePrefix();
}
