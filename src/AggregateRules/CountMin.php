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

final class CountMin extends AbstarctAggregateRule
{
    public function validateRule(array $columnValues): ?string
    {
        $expMin = $this->getOptionAsInt();
        $count  = \count($columnValues);

        if ($expMin > $count) {
            return 'Column count is less than expected. ' .
                "Actual: <c>{$count}</c>, expected: <green>{$expMin}</green>";
        }

        return null;
    }
}
