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

namespace JBZoo\PHPUnit;

use JBZoo\Utils\Cli;
use Symfony\Component\Console\Input\StringInput;

use function JBZoo\Data\yml;

final class ReadmeTest extends TestCase
{
    public function testCreateCsvHelp(): void
    {
        isFileContains(\implode("\n", [
            '```',
            './csv-blueprint validate:csv --help',
            '',
            '',
            Tools::realExecution('validate:csv', ['help' => null]),
            '```',
        ]), Tools::README);
    }

    public function testTableOutputExample(): void
    {
        $options = [
            'csv'    => './tests/fixtures/batch/*.csv',
            'schema' => './tests/schemas/demo_invalid.yml',
        ];
        $optionsAsString     = new StringInput(Cli::build('', $options));
        [$actual, $exitCode] = Tools::virtualExecution('validate:csv', $options);

        isSame(1, $exitCode, $actual);

        isFileContains(\implode("\n", [
            '```',
            "./csv-blueprint validate:csv {$optionsAsString}",
            '',
            '',
            $actual,
            '```',
        ]), Tools::README);
    }

    public function testBadgeOfRules(): void
    {
        $cellRules = \count(yml(Tools::SCHEMA_FULL)->findArray('columns.0.rules'));
        $aggRules  = \count(yml(Tools::SCHEMA_FULL)->findArray('columns.0.aggregate_rules'));

        isFileContains(
            \implode('', [
                "![Static Badge](https://img.shields.io/badge/Cell_Rules-{$cellRules}-green?label=Cell%20Rules&color=green)",
                '    ',
                "![Static Badge](https://img.shields.io/badge/Aggregate_Rules-{$aggRules}-green?label=Aggregate%20Rules&color=green)",
            ]),
            Tools::README,
        );
    }
}
