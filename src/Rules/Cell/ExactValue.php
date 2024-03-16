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

final class ExactValue extends AbstarctCellRule
{
    protected const HELP_OPTIONS = [
        self::DEFAULT => ['Some string', 'Case-sensitive. Exact value for string in the column.'],
    ];

    public function validateRule(string $cellValue): ?string
    {
        if ($this->getOptionAsString() !== $cellValue) {
            return "Value \"<c>{$cellValue}</c>\" is not strict equal to " .
                "\"<green>{$this->getOptionAsString()}<green>\"";
        }

        return null;
    }
}