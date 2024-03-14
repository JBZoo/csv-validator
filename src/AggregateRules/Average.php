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

use MathPHP\Statistics\Average as AverageMath;

final class Average extends AbstarctAggregateRule
{
    public function validateRule(array $columnValues): ?string
    {
        if (\count($columnValues) === 0) {
            return null; // Cannot find the average of an empty list of numbers
        }

        $expAverage = $this->getOptionAsFloat();
        $average    = AverageMath::mean($columnValues);

        if ($expAverage !== $average) {
            return 'Column average is not equal to expected. ' .
                "Actual: <c>{$average}</c>, expected: <green>{$expAverage}</green>";
        }

        return null;
    }
}
