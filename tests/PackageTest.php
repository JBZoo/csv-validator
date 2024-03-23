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

final class PackageTest extends \JBZoo\Codestyle\PHPUnit\AbstractPackageTest
{
    protected string $packageName = 'Csv-Blueprint';

    protected array $params = [
        'packagist_latest_stable_version'   => true,
        'packagist_latest_unstable_version' => true,
        'packagist_license'                 => true,
        'packagist_version'                 => true,

        'packagist_dependents' => false,
        'packagist_suggesters' => false,

        'packagist_downloads_total'   => true,
        'packagist_downloads_daily'   => true,
        'packagist_downloads_monthly' => true,

        'packagist_composerlock'  => true,
        'packagist_gitattributes' => true,

        'github_issues'  => true,
        'github_license' => true,
        'github_forks'   => true,
        'github_stars'   => true,
        'github_actions' => true,

        'github_actions_demo'           => true,
        'github_actions_release_docker' => true,

        'docker_pulls' => true,

        'psalm_coverage' => true,
        'psalm_level'    => false,
        'codacy'         => true,
        'codefactor'     => false,
        'sonarcloud'     => true,
        'coveralls'      => true,
        'circle_ci'      => true,
    ];

    protected array $badgesTemplate = [
        'github_actions',
        'github_actions_demo',
        'github_actions_release_docker',
        'docker_build',
        'codecov',
        'coveralls',
        'psalm_coverage',
        'psalm_level',
        'codefactor',
        'scrutinizer',
        '__BR__',
        'packagist_latest_stable_version',
        'packagist_downloads_total',
        'docker_pulls',
        'packagist_dependents',
        'visitors',
        'github_license',
    ];

    protected function setUp(): void
    {
        $this->excludePaths[] = 'assets';

        parent::setUp();
    }

    public function testGithubActionsWorkflow(): void
    {
        success('It uses different workflows for CI');
    }

    protected function checkBadgeGithubActionsDemo(): ?string
    {
        $path = 'https://github.com/__VENDOR_ORIG__/__PACKAGE_ORIG__/actions/workflows';

        return $this->getPreparedBadge(
            $this->getBadge(
                'CI',
                $path . '/demo.yml/badge.svg',
                $path . '/demo.yml',
            ),
        );
    }

    protected function checkBadgeGithubActionsReleaseDocker(): ?string
    {
        $path = 'https://github.com/__VENDOR_ORIG__/__PACKAGE_ORIG__/actions/workflows';

        return $this->getPreparedBadge(
            $this->getBadge(
                'CI',
                $path . '/release-docker.yml/badge.svg',
                $path . '/release-docker.yml',
            ),
        );
    }

    protected function checkBadgeDockerPulls(): ?string
    {
        return $this->getPreparedBadge(
            $this->getBadge(
                'Docker Pulls',
                'https://img.shields.io/docker/pulls/__VENDOR__/__PACKAGE__.svg',
                'https://hub.docker.com/r/__VENDOR__/__PACKAGE__/tags',
            ),
        );
    }

    protected function getTitle(): string
    {
        return '# JBZoo / CSV Blueprint';
    }
}
