<?php

namespace SDK\Core\Dtos\Traits;

use SDK\Application;

/**
 * Prefix $image with the commerce media CDN at hydration time so every consumer gets a
 * usable URL. Absolute URLs (http://, https://, //) pass through unchanged — idempotent
 * the day the API returns fully-qualified URLs.
 */
trait CdnImageTrait {

    protected function setImage(string $image): void {
        if ($image !== '' && !preg_match('#^(https?:)?//#', $image)) {
            // Settings may be unavailable in early bootstrap / CLI / tests — fall back to raw.
            $settings = Application::getInstance()->getEcommerceSettings();
            $cdnImages = $settings?->getGeneralSettings()?->getCdnImages() ?? '';
            if ($cdnImages !== '') {
                $image = rtrim($cdnImages, '/') . '/' . ltrim($image, '/');
            }
        }
        $this->image = $image;
    }
}
