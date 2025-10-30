<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the main language trait.
 *
 * @see ElementLanguageTrait::getKeywords()
 * @see ElementLanguageTrait::getParticularTitle()
 * @see ElementLanguageTrait::getTitle()
 * @see ElementLanguageTrait::getMetaDescription()
  *
 * @package SDK\Core\Dtos\Traits
 */
trait ElementLanguageTrait {

    protected string $keywords = '';

    protected string $particularTitle = '';

    protected string $title = '';

    protected string $metaDescription = '';

    /**
     * Returns the element keywords on the website current language.
     *
     * @return string
     */
    public function getKeywords(): string {
        return $this->keywords;
    }

    /**
     * Returns the element particular title on the website current language.
     *
     * @return string
     */
    public function getParticularTitle(): string {
        return strlen($this->particularTitle)?$this->particularTitle:$this->title;
    }

    /**
     * Returns the element title on the website current language.
     *
     * @return string
     */
    public function getTitle(): string {
        return strlen($this->title)?$this->title:$this->particularTitle;
    }

    /**
     * Returns the element meta-description on the website current language.
     *
     * @return string
     */
    public function getMetaDescription(): string {
        return $this->metaDescription;
    }

}
