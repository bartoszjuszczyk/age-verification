<?php

/**
 * File: Modal.php
 *
 * @author Bartosz Juszczyk <b.juszczyk@bjuszczyk.pl>
 * @copyright Copyright (c) 2024.
 **/

declare(strict_types=1);

namespace Juszczyk\AgeVerification\Block;

use Juszczyk\AgeVerification\Api\Config\ConfigProviderInterface;
use Magento\Framework\View\Element\Template;

class Modal extends Template
{
    public function __construct(
        Template\Context $context,
        protected readonly ConfigProviderInterface $configProvider,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function canShowModal(): bool
    {
        return $this->configProvider->isModuleEnabled();
    }

    public function getVerificationAge(): int
    {
        return (int) $this->configProvider->getVerificationAge();
    }

    public function getCookieTtl(): string
    {
        return (string) $this->configProvider->getCookieTtl();
    }

    public function getModalHeading(): string
    {
        return (string) $this->configProvider->getHeadingText();
    }

    public function getModalDescription(): string
    {
        return (string) $this->configProvider->getDescriptionText();
    }

    public function getContinueButtonText(): string
    {
        return (string) $this->configProvider->getContinueButtonText();
    }

    public function getBackButtonText(): string
    {
        return (string) $this->configProvider->getBackButtonText();
    }
}
