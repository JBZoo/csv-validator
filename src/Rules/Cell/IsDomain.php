<?php

/**
 * JBZoo Toolbox - Csv-Blueprint.
 *
 * This file is part of the JBZoo Toolbox project.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    MIT
 * @copyright  Copyright (C) JBZoo.com, All rights reserved.
 * @see        https://github.com/JBZoo/Csv-Blueprint
 */

declare(strict_types=1);

namespace JBZoo\CsvBlueprint\Rules\Cell;

final class IsDomain extends AbstarctCellRule
{
    protected const HELP_OPTIONS = [
        self::DEFAULT => ['true', 'Only domain name. Example: "example.com"'],
    ];

    public function validateRule(string $cellValue): ?string
    {
        $domainPattern = '/^(?!-)[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,})$/';

        if (\preg_match($domainPattern, $cellValue) === 0) {
            return "Value \"<c>{$cellValue}</c>\" is not a valid domain";
        }

        return null;
    }
}