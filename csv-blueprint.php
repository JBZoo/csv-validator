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

namespace JBZoo\CsvBlueprint;

$_SERVER['argv'] = \array_map('trim', $_SERVER['argv']); // Fix for GitHub actions. See action.yml

\define('PATH_ROOT', __DIR__);
require_once __DIR__ . '/vendor/autoload.php';

\date_default_timezone_set('UTC');
\set_error_handler(static function ($severity, $message, $file, $line): void {
    throw new \ErrorException($message, 0, $severity, $file, $line);
});

$cliApp = (new CliApplication('CSV Blueprint', Utils::getVersion(true)));
$cliApp->setVersion(Utils::getVersion(false));

$cliApp
    ->registerCommandsByPath(PATH_ROOT . '/src/Commands', __NAMESPACE__)
    ->run();
