<?php

namespace Netresearch\Epayments\Model\Ingenico\Status;

use Ingenico\Connect\Sdk\Domain\Definitions\AbstractOrderStatus;
use Magento\Framework\Exception\LocalizedException;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Model\Order;
use Netresearch\Epayments\Helper\Data;
use Netresearch\Epayments\Model\Order\EmailManager;

class CaptureRequested implements HandlerInterface
{

    /**
     * @var EmailManager
     */
    private $orderEMailManager;

    /**
     * CaptureRequested constructor.
     * @param EmailManager $emailManager
     */
    public function __construct(
        EmailManager $emailManager
    ) {
        $this->orderEMailManager = $emailManager;
    }

    /**
     * @param OrderInterface|Order $order
     * @param AbstractOrderStatus $ingenicoStatus
     * @throws LocalizedException
     */
    public function resolveStatus(OrderInterface $order, AbstractOrderStatus $ingenicoStatus)
    {
        /** @var \Magento\Sales\Model\Order\Payment $payment */
        $payment = $order->getPayment();

        if ($ingenicoStatus instanceof \Ingenico\Connect\Sdk\Domain\Payment\Definitions\Payment) {
            $amount = $ingenicoStatus->paymentOutput->amountOfMoney->amount;
        } elseif ($ingenicoStatus instanceof \Ingenico\Connect\Sdk\Domain\Capture\Definitions\Capture) {
            $amount = $ingenicoStatus->captureOutput->amountOfMoney->amount;
        } else {
            throw new LocalizedException(__('Unknown order status.'));
        }

        $payment->setIsTransactionPending(true);
        $payment->setIsTransactionClosed(false);
        $payment->registerCaptureNotification(Data::reformatMagentoAmount($amount));

        $this->orderEMailManager->process($order, $ingenicoStatus->status);
    }
}