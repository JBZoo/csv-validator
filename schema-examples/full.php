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

return [
    'name'        => 'CSV Blueprint Schema Example',
    'description' => 'This YAML file provides a detailed description and validation rules for CSV files
to be processed by JBZoo/Csv-Blueprint tool. It includes specifications for file name patterns,
CSV formatting options, and extensive validation criteria for individual columns and their values,
supporting a wide range of data validation rules from basic type checks to complex regex validations.
This example serves as a comprehensive guide for creating robust CSV file validations.
',
    'filename_pattern' => '/demo(-\\d+)?\\.csv$/i',
    'csv'              => [
        'header'     => true,
        'delimiter'  => ',',
        'quote_char' => '\\',
        'enclosure'  => '"',
        'encoding'   => 'utf-8',
        'bom'        => false,
    ],
    'columns' => [
        [
            'name'        => 'Column Name (header)',
            'description' => 'Lorem ipsum',
            'example'     => 'Some example',
            'rules'       => [
                'not_empty'        => true,
                'exact_value'      => 'Some string',
                'allow_values'     => ['y', 'n', ''],
                'not_allow_values' => ['invalid'],

                'regex' => '/^[\\d]{2}$/',

                'length'     => 5,
                'length_not' => 4,
                'length_min' => 1,
                'length_max' => 10,

                'is_trimmed'    => true,
                'is_lowercase'  => true,
                'is_uppercase'  => true,
                'is_capitalize' => true,

                'word_count'     => 5,
                'word_count_not' => 4,
                'word_count_min' => 1,
                'word_count_max' => 10,

                'contains'     => 'Hello',
                'contains_one' => ['a', 'b'],
                'contains_all' => ['a', 'b', 'c'],
                'starts_with'  => 'prefix ',
                'ends_with'    => ' suffix',

                'num'      => 5,
                'num_not'  => 4.123,
                'num_min'  => -10.123,
                'num_max'  => 1.2e3,
                'is_int'   => true,
                'is_float' => true,

                'precision'     => 5,
                'precision_not' => 4,
                'precision_min' => 1,
                'precision_max' => 10,

                'date'        => '01 Jan 2000',
                'date_not'    => '2006-01-02 15:04:05 -0700 Europe/Rome',
                'date_min'    => '+1 day',
                'date_max'    => 'now',
                'date_format' => 'Y-m-d',
                'is_date'     => true,

                'is_bool'          => true,
                'is_ip4'           => true,
                'is_url'           => true,
                'is_email'         => true,
                'is_domain'        => true,
                'is_uuid'          => true,
                'is_alias'         => true,
                'is_currency_code' => true,
                'is_base64'        => true,
                'is_json'          => true,

                'is_latitude'           => true,
                'is_longitude'          => true,
                'is_geohash'            => true,
                'is_cardinal_direction' => true,
                'is_usa_market_name'    => true,

                'country_code'  => 'alpha-2',
                'language_code' => 'alpha-2',
            ],

            'aggregate_rules' => [
                'is_unique' => true,

                'first_num'     => 5,
                'first_num_not' => 4.123,
                'first_num_min' => -1,
                'first_num_max' => 20000.0,
                'first'         => 'Expected',
                'first_not'     => 'Not Expected',

                'nth_num'     => [2, 5],
                'nth_num_not' => [2, 4.123],
                'nth_num_min' => [2, -1],
                'nth_num_max' => [2, 20000.0],
                'nth'         => [2, 'Expected'],
                'nth_not'     => [2, 'Not expected'],

                'last_num'     => 5,
                'last_num_not' => 4.123,
                'last_num_min' => -1,
                'last_num_max' => 20000.0,
                'last'         => 'Expected',
                'last_not'     => 'Not Expected',

                'sum'     => 5.123,
                'sum_not' => 4.123,
                'sum_min' => 1.123,
                'sum_max' => 10.123,

                'average'     => 5.123,
                'average_not' => 4.123,
                'average_min' => 1.123,
                'average_max' => 10.123,

                'count'     => 5,
                'count_not' => 4,
                'count_min' => 1,
                'count_max' => 10,

                'count_empty'     => 5,
                'count_empty_not' => 4,
                'count_empty_min' => 1,
                'count_empty_max' => 10,

                'count_not_empty'     => 5,
                'count_not_empty_not' => 4,
                'count_not_empty_min' => 1,
                'count_not_empty_max' => 10,

                'median'     => 5.123,
                'median_not' => 4.123,
                'median_min' => 1.123,
                'median_max' => 10.123,

                'mean_abs_dev'     => 5.123,
                'mean_abs_dev_not' => 4.123,
                'mean_abs_dev_min' => 1.123,
                'mean_abs_dev_max' => 10.123,

                'median_abs_dev'     => 5.123,
                'median_abs_dev_not' => 4.123,
                'median_abs_dev_min' => 1.123,
                'median_abs_dev_max' => 10.123,

                'population_variance'     => 5.123,
                'population_variance_not' => 4.123,
                'population_variance_min' => 1.123,
                'population_variance_max' => 10.123,

                'sample_variance'     => 5.123,
                'sample_variance_not' => 4.123,
                'sample_variance_min' => 1.123,
                'sample_variance_max' => 10.123,

                'stddev'     => 5.123,
                'stddev_not' => 4.123,
                'stddev_min' => 1.123,
                'stddev_max' => 10.123,

                'stddev_pop'     => 5.123,
                'stddev_pop_not' => 4.123,
                'stddev_pop_min' => 1.123,
                'stddev_pop_max' => 10.123,

                'coef_of_var'     => 5.123,
                'coef_of_var_not' => 4.123,
                'coef_of_var_min' => 1.123,
                'coef_of_var_max' => 10.123,
            ],
        ],

        [
            'name'  => 'another_column',
            'rules' => ['not_empty' => true],
        ],

        [
            'name'  => 'third_column',
            'rules' => ['not_empty' => true],
        ],
    ],
];
