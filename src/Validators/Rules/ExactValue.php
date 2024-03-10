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

namespace JBZoo\CsvBlueprint\Validators\Rules;

final class ExactValue extends AbstarctRule
{
    public function validateRule(?string $cellValue): ?string
    {
        if ($this->getOptionAsString() !== (string)$cellValue) {
            return "Value \"{$cellValue}\" is not strict equal to \"{$this->getOptionAsString()}\"";
        }

        return null;
    }
}
