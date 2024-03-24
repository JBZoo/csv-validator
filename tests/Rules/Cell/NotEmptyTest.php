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

namespace JBZoo\PHPUnit\Rules\Cell;

use JBZoo\CsvBlueprint\Rules\Cell\NotEmpty;
use JBZoo\PHPUnit\Rules\TestAbstractCellRule;

use function JBZoo\PHPUnit\isSame;

final class NotEmptyTest extends TestAbstractCellRule
{
    protected string $ruleClass = NotEmpty::class;

    public function testPositive(): void
    {
        $rule = $this->create(true);
        isSame('', $rule->test('0'));
        isSame('', $rule->test('false'));
        isSame('', $rule->test('1'));
        isSame('', $rule->test(' 0'));
        isSame('', $rule->test(' '));

        $rule = $this->create(false);
        isSame(null, $rule->validate(''));
    }

    public function testNegative(): void
    {
        $rule = $this->create(true);
        isSame(
            'Value is empty',
            $rule->test(''),
        );
    }
}
