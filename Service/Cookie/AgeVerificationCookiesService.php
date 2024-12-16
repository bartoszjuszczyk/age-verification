<?php

/**
 * File: AgeVerificationCookiesService.php
 *
 * @author Bartosz Juszczyk <b.juszczyk@bjuszczyk.pl>
 * @copyright Copyright (c) 2024.
 **/

declare(strict_types=1);

namespace Juszczyk\AgeVerification\Service\Cookie;

use Magento\Framework\Stdlib\CookieManagerInterface;

class AgeVerificationCookiesService
{
    public const COOKIE_NAME = 'j-agever';

    public function __construct(
        protected readonly CookieManagerInterface $cookieManager
    ) {
    }

    public function isCookieSaved(): bool
    {
        return $this->cookieManager->getCookie(self::COOKIE_NAME) === 'true';
    }
}
