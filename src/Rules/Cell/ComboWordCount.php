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

use JBZoo\CsvBlueprint\Rules\AbstractCombo;

final class ComboWordCount extends AbstractCombo
{
    protected const NAME = 'word count';

    protected const HELP_TOP = [
        'Count number of words used in a string',
        'Note that multibyte locales are not supported.',
        'Example: "Hello World, 123" - 2 words only (123 is not a word).',
    ];

    protected function getExpected(): float|int|string
    {
        return $this->getOptionAsInt();
    }

    protected function getCurrent(string $cellValue): float|int|string
    {
        // @phan-suppress-next-line PhanPartialTypeMismatchReturn
        return \str_word_count($cellValue, 0);
    }
}