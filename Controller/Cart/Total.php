<?php

namespace AltoLabs\Snappic\Controller\Cart;

class Total extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Checkout\Model\Cart
     */
    protected $cart;

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $jsonFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Checkout\Model\Cart $cart
     * @param \Magento\Checkout\Model\Session $session
     * @param \Magento\Framework\Json\Helper\Data $helper
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Checkout\Model\Cart $cart,
        \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory
    ) {
        $this->cart = $cart;
        $this->jsonFactory = $jsonResultFactory;

        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function execute()
    {
        return $this->jsonFactory->create()->setData([
            'status' => 'success',
            'total' => ($this->cart->getQuote()->getSubtotal() ?: '0.00')
        ]);
    }
}
