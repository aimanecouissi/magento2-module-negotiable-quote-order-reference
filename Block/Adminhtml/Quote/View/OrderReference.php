<?php
/**
 * Aimane Couissi - https://aimanecouissi.com
 * Copyright © Aimane Couissi 2025–present. All rights reserved.
 * Licensed under the MIT License. See LICENSE for details.
 */

declare(strict_types=1);

namespace AimaneCouissi\NegotiableQuoteOrderReference\Block\Adminhtml\Quote\View;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Directory\Helper\Data as DirectoryHelper;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Json\Helper\Data as JsonHelper;
use Magento\NegotiableQuote\Helper\Quote as NegotiableQuoteHelper;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\OrderRepositoryInterface;

class OrderReference extends Template
{
    /**
     * @param Context $context
     * @param OrderRepositoryInterface $orderRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param NegotiableQuoteHelper $negotiableQuoteHelper
     * @param array $data
     * @param JsonHelper|null $jsonHelper
     * @param DirectoryHelper|null $directoryHelper
     */
    public function __construct(
        Template\Context                          $context,
        private readonly OrderRepositoryInterface $orderRepository,
        private readonly SearchCriteriaBuilder    $searchCriteriaBuilder,
        private readonly NegotiableQuoteHelper    $negotiableQuoteHelper,
        array                                     $data = [],
        ?JsonHelper                               $jsonHelper = null,
        ?DirectoryHelper                          $directoryHelper = null
    )
    {
        parent::__construct($context, $data, $jsonHelper, $directoryHelper);
    }

    /**
     * Returns the related order with the current negotiable quote.
     *
     * @return OrderInterface|null
     */
    public function getRelatedOrder(): ?OrderInterface
    {
        $quote = $this->negotiableQuoteHelper->resolveCurrentQuote();
        if (!$quote || !$quote->getId()) {
            return null;
        }
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter(OrderInterface::QUOTE_ID, $quote->getId())
            ->setPageSize(1)
            ->create();
        $orders = $this->orderRepository->getList($searchCriteria)->getItems();
        return count($orders) ? reset($orders) : null;
    }
}
