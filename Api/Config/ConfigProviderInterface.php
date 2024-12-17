<?php

/**
 * File: ConfigProviderInterface.php
 *
 * @author Bartosz Juszczyk <b.juszczyk@bjuszczyk.pl>
 * @copyright Copyright (c) 2024.
 **/

declare(strict_types=1);

namespace Juszczyk\AgeVerification\Api\Config;

interface ConfigProviderInterface
{
    public const string XML_PATH_GENERAL_ENABLED = 'juszczyk_age_verification/general/enabled';
    public const string XML_PATH_GENERAL_VERIFICATION_AGE = 'juszczyk_age_verification/general/verification_age';
    public const string XML_PATH_GENERAL_COOKIE_TTL = 'juszczyk_age_verification/general/cookie_ttl';
    public const string XML_PATH_APPEARANCE_HEADING = 'juszczyk_age_verification/appearance/heading';
    public const string XML_PATH_APPEARANCE_DESCRIPTION = 'juszczyk_age_verification/appearance/description';
    public const string XML_PATH_APPEARANCE_USING_CALENDAR = 'juszczyk_age_verification/appearance/using_calendar';
    public const string XML_PATH_APPEARANCE_CONTINUE_BUTTON = 'juszczyk_age_verification/appearance/continue_button';
    public const string XML_PATH_APPEARANCE_BACK_BUTTON = 'juszczyk_age_verification/appearance/back_button';

    /**
     * @return bool
     */
    public function isModuleEnabled(): bool;

    /**
     * @return int|null
     */
    public function getVerificationAge(): ?int;

    /**
     * @return string|null
     */
    public function getCookieTtl(): ?string;

    /**
     * @return string|null
     */
    public function getHeadingText(): ?string;

    /**
     * @return string|null
     */
    public function getDescriptionText(): ?string;

    /**
     * @return bool
     */
    public function getUsingCalendar(): bool;

    /**
     * @return string|null
     */
    public function getContinueButtonText(): ?string;

    /**
     * @return string|null
     */
    public function getBackButtonText(): ?string;

    /**
     * @return string|null
     */
    public function getDefaultCookiePath(): ?string;

    /**
     * @return string|null
     */
    public function getDefaultCookieDomain(): ?string;
}
