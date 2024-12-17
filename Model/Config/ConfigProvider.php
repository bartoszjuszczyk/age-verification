<?php

/**
 * File: ConfigProvider.php
 *
 * @author Bartosz Juszczyk <b.juszczyk@bjuszczyk.pl>
 * @copyright Copyright (c) 2024.
 **/

declare(strict_types=1);

namespace Juszczyk\AgeVerification\Model\Config;

use Juszczyk\AgeVerification\Api\Config\ConfigProviderInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Session\Config;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class ConfigProvider implements ConfigProviderInterface
{
    public function __construct(
        protected readonly ScopeConfigInterface $scopeConfig,
        protected readonly StoreManagerInterface $storeManager
    ) {
    }

    /**
     * @inheritDoc
     */
    public function isModuleEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_GENERAL_ENABLED,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }

    /**
     * @inheritDoc
     */
    public function getVerificationAge(): ?int
    {
        $value = $this->scopeConfig->getValue(
            self::XML_PATH_GENERAL_VERIFICATION_AGE,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
        if ($value === null) {
            return null;
        }
        return (int) $value;
    }

    /**
     * @inheritDoc
     */
    public function getCookieTtl(): ?string
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_GENERAL_COOKIE_TTL,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }

    /**
     * @inheritDoc
     */
    public function getHeadingText(): ?string
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_APPEARANCE_HEADING,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }

    /**
     * @inheritDoc
     */
    public function getDescriptionText(): ?string
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_APPEARANCE_DESCRIPTION,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }

    /**
     * @inheritDoc
     */
    public function getContinueButtonText(): ?string
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_APPEARANCE_CONTINUE_BUTTON,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }

    /**
     * @inheritDoc
     */
    public function getBackButtonText(): ?string
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_APPEARANCE_BACK_BUTTON,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }

    /**
     * @inheritDoc
     */
    public function getDefaultCookiePath(): ?string
    {
        return $this->scopeConfig->getValue(
            Config::XML_PATH_COOKIE_PATH,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }

    /**
     * @inheritDoc
     */
    public function getDefaultCookieDomain(): ?string
    {
        return $this->scopeConfig->getValue(
            Config::XML_PATH_COOKIE_DOMAIN,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()->getId()
        );
    }

}
