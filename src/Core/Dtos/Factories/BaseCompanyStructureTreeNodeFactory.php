<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Factory;
use SDK\Dtos\Accounts\BaseCompanyStructureTreeNode;
use SDK\Dtos\Accounts\CompanyStructureTreeNode;
use SDK\Dtos\Accounts\CompanyStructureTreeNodeSubCompanyDivisionsToLoad;

/**
 * Factory for creating base company structure tree nodes.
 * 
 * @package SDK\Core\Dtos\Factories
 */
abstract class BaseCompanyStructureTreeNodeFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Accounts';

    protected const DEFAULT_CLASS = self::NAMESPACE . '\CompanyStructureTreeNode';

    /**
     * Creates a base company structure tree node.
     * @param array $data
     * @return BaseCompanyStructureTreeNode|null
     */
    public static function create(array $data): ?BaseCompanyStructureTreeNode {
        if (!$data) {
            return null;
        } else if (isset($data["error"]) && $data["error"] != null) {
            return new CompanyStructureTreeNode($data);
        } else if (isset($data['subCompanyDivisions']) && $data['subCompanyDivisions'] != null) {
            $data['subCompanyDivisions'] = self::buildSubCompanyDivisionsCollection($data['subCompanyDivisions']);
            return new CompanyStructureTreeNode($data);
        } else {
            return new CompanyStructureTreeNodeSubCompanyDivisionsToLoad($data);
        }
    }

    private static function buildSubCompanyDivisionsCollection(array $data): ElementCollection {
        $elements = [];
        foreach ($data['items'] ?? [] as $item) {
            $elements[] = self::create($item);
        }
        $data['items'] = $elements;
        return new ElementCollection($data);
    }

    public static function getElement(array $data = []): ?BaseCompanyStructureTreeNode {
        return self::create($data);
    }
}
