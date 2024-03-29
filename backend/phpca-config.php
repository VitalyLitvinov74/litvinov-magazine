<?php

use Chetkov\PHPCleanArchitecture\Service\Report\DefaultReport\ReportRenderingService;
use Chetkov\PHPCleanArchitecture\Service\Report\ReportRenderingServiceInterface;
use Psr\Log\LoggerInterface;

return [
    // Директория в которую будут складываться файлы отчета
    'reports_dir' => __DIR__ . '/reports/phpca',

    // Анализ с учетом пакетов подключенных через composer
    'vendor_based_modules' => [
        'enabled' => false,
        'vendor_path' => __DIR__ . '/vendor',
        'excluded' => [
            // '/excluded/vendor/package/dir',
        ],
    ],

    // Общие для всех модулей ограничения
    'restrictions' => [
        // Включение/отключение обнаружения нарушений принципа ацикличности зависимостей.
        'check_acyclic_dependencies_principle' => true,

        // Включение/отключение обнаружения нарушений принципа устойчивых зависимостей.
        'check_stable_dependencies_principle' => true,

        // Максимально допустимое расстояние до главной диагонали.
        // Элемент может отсутствовать или быть null, в таком случае ограничения не будут применены.
        'max_allowable_distance' => 0.3,
    ],

    // Описание модулей и их ограничений
    'modules' => [
        [
            'name' => 'model',
            'roots' => [
                [
                    'path' => __DIR__ . '/shop',
                    'namespace' => 'app\shop',
                ],
                // Иногда, особенно в старых проектах, код логически относимый к одному модулю, разбросан по разным частям
                // системы. В таком случае можно указать в конфиге несколько корневых директорий и, т.о. отнести их содержимое
                // какому-то одному модулю.
                //
                // [
                //     'path' => '/path/to/module/first',
                //     'namespace' => 'Module\First',
                // ],
            ],
            //Директории или файлы, которые будут пропущены в процессе анализа
            'excluded' => [
                // '/path/to/First/Module/dir1',
                // '/path/to/First/Module/dir2',
            ],
            'restrictions' => [
                // Имеет приоритет над общей настройкой restrictions->max_allowable_distance
                'max_allowable_distance' => 0.492,

                // Список РАЗРЕШЕННЫХ исходящих зависимостей. Заполняется именами других модулей.
                // Может отсутствовать, быть [] или null, в таком случае никакие ограничения накладываться не будут.
                // Не должен содержать значений, перечисленных в элементе forbidden_dependencies!
                // 'allowed_dependencies' => ['SecondModule'],

                // Список ЗАПРЕЩЕННЫХ исходящих зависимостей. Заполняется именами других модулей.
                // Может отсутствовать, быть [] или null, в таком случае никакие ограничения накладываться не будут.
                // Не должен содержать значений, перечисленных в элементе allowed_dependencies!
                'forbidden_dependencies' => ['infrastructure'],

                // Список публичных элементов модуля. Если отсутствует или пустой, все элементы считаются публичными.
                // Если не пустой, не перечисленные в списке элементы будут считаться приватными.
                // Не должен содержать элементов, перечисленных в private_elements!
                // 'public_elements' => [
                //     \PHPCAEP\Model\User\User::class,
                //     \PHPCAEP\Model\Shop\Order::class,
                // ],

                // Список приватных элементов модуля. Если отсутствует или пустой, все элементы считаются публичными.
                // Не должен содержать элементов, перечисленных в public_elements!
                // 'private_elements' => [
                //     \PHPCAEP\Model\User\Fio::class,
                // ],
            ],
        ],
        [
            'name' => 'infrastructure',
            'roots' => [
                [
                    'path' => __DIR__ . '/src/Infrastructure',
                    'namespace' => 'PHPCAEP\Infrastructure',
                ],
            ],
        ],
        [
            'name' => 'services',
            'roots' => [
                [
                    'path' => __DIR__ . '/src/UseCase',
                    'namespace' => 'PHPCAEP\UseCase',
                ],
            ],
        ],
        [
            'name' => 'http-entry-points',
            'roots' => [
                [
                    'path' => __DIR__ . '/src/EntryPoint/Http',
                    'namespace' => 'PHPCAEP\EntryPoint\Http',
                ],
            ],
        ],
        [
            'name' => 'console-entry-points',
            'roots' => [
                [
                    'path' => __DIR__ . '/src/EntryPoint/Console',
                    'namespace' => 'PHPCAEP\EntryPoint\Console',
                ],
            ],
        ],
    ],
    'factories' => [
        'dependencies_finder' => function (): DependenciesFinderInterface {
            return new AggregationDependenciesFinder(...[
                new ReflectionDependenciesFinder(),
                new CodeParsingDependenciesFinder(),
            ]);
        },
        'report_rendering_service' => function (): ReportRenderingServiceInterface {
            return new ReportRenderingService();
        },
        'logger' => function (): LoggerInterface {
            $loggerConfig = new LoggerConfig();
            $loggerConfig
                ->setIsShowDateTime(true)
                ->setIsShowLevel(false)
                ->setIsShowData(false)
                ->setDateTimeFormat('H:i:s')
                ->setFieldDelimiter(' :: ');
            return new StyledLoggerDecorator(
                ConsoleLoggerFactory::create($loggerConfig),
                new LoggerStyle()
            );
        }
    ],
];