<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\ProductRowPinnedRequestImageParametersValidator;

/**
 * This is the ProductRowPinnedRequestImage parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class ProductRowPinnedRequestImageParametersGroup extends ParametersGroup {

    protected string $base64Content;

    protected string $extension;

    /**
     * Base64 representation of the file. Format example: 'data:image/png;base64,YWRmYXNmYXNkZnNh'
     *
     * @param string $base64Content
     *
     * @return void
     */
    public function setBase64Content(string $base64Content): void {
        $this->base64Content = $base64Content;
    }

    /**
     * Specifies the extension of the image file.<br>&emsp;&emsp;- Only these extensions are accepted: 'bmp', 'gif', 'heic', 'heif', 'ico', 'jpeg', 'jpg', 'png', 'svg', 'webp'
     *
     * @param string $extension
     *
     * @return void
     */
    public function setExtension(string $extension): void {
        $this->extension = $extension;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ProductRowPinnedRequestImageParametersValidator {
        return new ProductRowPinnedRequestImageParametersValidator();
    }
}
