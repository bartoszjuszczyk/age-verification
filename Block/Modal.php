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
use Juszczyk\AgeVerification\Service\Cookie\AgeVerificationCookiesService;
use Magento\Framework\View\Element\Template;

class Modal extends Template
{
    /**
     * @param Template\Context $context
     * @param ConfigProviderInterface $configProvider
     * @param AgeVerificationCookiesService $ageVerificationCookiesService
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        protected readonly ConfigProviderInterface $configProvider,
        protected readonly AgeVerificationCookiesService $ageVerificationCookiesService,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * @return bool
     */
    public function canShowModal(): bool
    {
        return $this->configProvider->isModuleEnabled() && ! $this->ageVerificationCookiesService->isCookieSaved();
    }

    /**
     * @return int
     */
    public function getVerificationAge(): int
    {
        return (int) $this->configProvider->getVerificationAge();
    }

    /**
     * @return string
     */
    public function getCookieTtl(): string
    {
        return (string) $this->configProvider->getCookieTtl();
    }

    /**
     * @return string
     */
    public function getModalHeading(): string
    {
        return (string) $this->configProvider->getHeadingText();
    }

    /**
     * @return string
     */
    public function getModalDescription(): string
    {
        return (string) $this->configProvider->getDescriptionText();
    }

    public function getUsingCalendar(): bool
    {
        return $this->configProvider->getUsingCalendar();
    }

    /**
     * @return string
     */
    public function getContinueButtonText(): string
    {
        return (string) $this->configProvider->getContinueButtonText();
    }

    /**
     * @return string
     */
    public function getBackButtonText(): string
    {
        return (string) $this->configProvider->getBackButtonText();
    }

    /**
     * @return string
     */
    public function getDefaultCookiePath(): string
    {
        return (string) $this->configProvider->getDefaultCookiePath();
    }

    /**
     * @return string
     */
    public function getDefaultCookieDomain(): string
    {
        return (string) $this->configProvider->getDefaultCookieDomain();
    }
}
