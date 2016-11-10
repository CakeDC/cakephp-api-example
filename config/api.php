<?php

return [
    'Api' => [
         'ServiceFallback' => '\\CakeDC\\Api\\Service\\FallbackService',
        'renderer' => 'CakeDC/Api.Jsend',
        'parser' => 'CakeDC/Api.Form',

        'useVersioning' => false,
        'versionPrefix' => 'v',

        'Auth' => [
            'Crud' => [
                 'default' => 'auth'
            ],
        ],

        'Service' => [
            'default' => [
                'options' => [],
                'Action' => [
                    'default' => [
                        //default actions options
                        'Auth' => [
                            'authorize' => [
                                'CakeDC/Api.Crud' => []
                            ],
                            'authenticate' => [
                                'CakeDC/Api.Token' => [
                                    'require_ssl' => false,
                                ]
                            ],
                        ],
                        'Extension' => [
                            'CakeDC/Api.Cors',
                            'CakeDC/Api.Filter',
                            'CakeDC/Api.Sort',
                            // default extensions for all services
                        ]
                    ],
                    'ActionName' => [
                        //action options
                    ],
                    'View' => [
                        //action options
                        'Extension' => [
                            'CakeDC/Api.CrudHateoas',
                        ],
                    ],
                    'Index' => [
                        //action options
                        'Extension' => [
                            'CakeDC/Api.CrudRelations',
                            'CakeDC/Api.CrudAutocompleteList',
                            'CakeDC/Api.Paginate',
                        ],
                    ],
                ],
            ],
        ],
    ]
];
