<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Chart Colors Configuration
    |--------------------------------------------------------------------------
    |
    | This section defines the default colors to be used for each type of chart
    | and what are the colors of each dataset that is used. Consequently, increasing the
    | number of datasets, you must increase the colors.
    |
    */
    'colours' => [

        'line' => [
            'rgba(70,191,189,0.5)',
            'rgba(24, 164, 103, 0.7)',
            'rgba(151,187,205,0.2)',
            'rgba(24, 164, 103, 0.7)',
        ],

        'bar' => [
            'rgba(70,191,189,0.5)',
            'rgba(151,187,205,0.8)',
            'rgba(24, 164, 103, 0.7)',
        ],

        'radar' => [
            'rgba(220,220,220,0.2)',
            'rgba(24, 164, 103, 0.7)',
            'rgba(151,187,205,0.2)',
            'rgba(24, 164, 103, 0.7)',
        ],

        /**
         * If the number of data exceeds the number of colors configured,
         * the data will use default color definied in ChartPieAndDougnhut.php
         */
        'pie' => [
            [ 'colour' => "#F7464A",  'highlight' => "#FF5A5E" ],
            [ 'colour' => "#46BFBD",  'highlight' => "#5AD3D1" ],
            [ 'colour' => "#FDB45C",  'highlight' => "#FFC870" ],
            [ 'colour' => "#ffd700",  'highlight' => "#ffd900" ],
            [ 'colour' => "#a8b17a",  'highlight' => "#b8c19a" ],
            [ 'colour' => "#FF4500",  'highlight' => "#383b8b" ],
            [ 'colour' => "#4169E1",  'highlight' => "#335771" ],
            [ 'colour' => "#2E8B57",  'highlight' => "#1a5f45" ],
            [ 'colour' => "#D2B48C",  'highlight' => "#Ddf9bc" ],
            [ 'colour' => "#FF6347",  'highlight' => "#5a9296" ],
            [ 'colour' => "#B0C4DE",  'highlight' => "#383b8b" ],
            [ 'colour' => "#87CEFA",  'highlight' => "#335771" ],
            [ 'colour' => "#FFA07A",  'highlight' => "#1a5f45" ],
            [ 'colour' => "#DAA520",  'highlight' => "#Ddf9bc" ],
            [ 'colour' => "#228B22",  'highlight' => "#5a9296" ]
        ]
    ],


    /*
    |--------------------------------------------------------------------------
    |
    |--------------------------------------------------------------------------
    |
    */

];
