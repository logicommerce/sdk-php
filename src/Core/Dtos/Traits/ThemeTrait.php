<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

use SDK\Core\Dtos\Theme;

/**
 * This is the theme trait.
 *
 * @see ThemeTrait::getTheme()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait ThemeTrait {

    protected ?Theme $theme = null;

    /**
     * Returns the element theme data.
     *
     * @return Theme|NULL
     */
    public function getTheme(): ?Theme {
        return $this->theme;
    }

    protected function setTheme(array $theme): void {
        $this->theme = new Theme($theme);
    }
}
