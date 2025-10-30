<?php

namespace SDK\Dtos\Catalog\Page;

use SDK\Dtos\Catalog\DataValidation;
use SDK\Services\FormService;

/**
 * This is the Contact Page class.
 *
 * @see Page
 *
 * @package SDK\Dtos\Catalog\Page
 */
class ContactPage extends Page {

    protected ?DataValidation $contactForm = null;

    /**
     * Contact page constructor.
     *
     * @param array $data
     *            Array that contains all the values to the page to initialize
     */
    public function __construct(array $data = []) {
        parent::__construct($data);
        $this->setContactForm();
    }

    /**
     * Returns the contact form structure.
     *
     * @return DataValidation|NULL
     */
    public function getContactForm(): ?DataValidation {
        return $this->contactForm;
    }

    protected function setContactForm(): void {
        if ($this->itemId !== 0) {
            $this->contactForm = FormService::getInstance()->getDataValidation($this->itemId);
        }
    }

    /**
     * Returns the particular content of this page type.
     *
     * @see ContactPage::getContactForm()
     */
    public function getAdditionalData(): ?DataValidation {
        return $this->getContactForm();
    }
}
