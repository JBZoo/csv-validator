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

namespace JBZoo\CsvBlueprint\AggregateRules;

final class CountEmptyMin extends AbstarctAggregateRule
{
    public function validateRule(array $columnValues): ?string
    {
        $minCountEmptyLines = $this->getOptionAsInt();
        $countEmptyLines    = \count(\array_filter($columnValues, static fn ($value) => $value === ''));

        if ($minCountEmptyLines > $countEmptyLines) {
            return 'Column count of empty lines is less than expected. ' .
                "Actual: <c>{$countEmptyLines}</c>, expected: <green>{$minCountEmptyLines}</green>";
        }

        return null;
    }
}
