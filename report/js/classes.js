var classes = [
    {
        "name": "ServerPlanning\\Hardware",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "setConfig",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setHardware",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getHardware",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "validateConfiguration",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCPU",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCPU",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getRAM",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setRAM",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getHDD",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setHDD",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 10,
        "nbMethods": 4,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 3,
        "wmc": 21,
        "ccn": 12,
        "ccnMethodMax": 10,
        "externals": [
            "Exception",
            "Exception",
            "Exception"
        ],
        "parents": [],
        "lcom": 1,
        "length": 121,
        "vocabulary": 22,
        "volume": 539.59,
        "difficulty": 20.77,
        "effort": 11205.51,
        "level": 0.05,
        "bugs": 0.18,
        "time": 623,
        "intelligentContent": 25.98,
        "number_operators": 32,
        "number_operands": 89,
        "number_operators_unique": 7,
        "number_operands_unique": 15,
        "cloc": 49,
        "loc": 129,
        "lloc": 80,
        "mi": 78.55,
        "mIwoC": 37.74,
        "commentWeight": 40.81,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 0.79,
        "relativeSystemComplexity": 81.79,
        "totalStructuralComplexity": 810,
        "totalDataComplexity": 7.9,
        "totalSystemComplexity": 817.9,
        "package": "ServerPlanning\\",
        "pageRank": 0.75,
        "afferentCoupling": 1,
        "efferentCoupling": 1,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "ServerPlanning\\Controller",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "newInstance",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "init",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "calculate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_calculate",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isVirtualMachineValid",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "subtract",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "sortArray",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 7,
        "nbMethods": 7,
        "nbMethodsPrivate": 4,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 33,
        "ccn": 27,
        "ccnMethodMax": 7,
        "externals": [
            "self",
            "ServerPlanning\\Hardware",
            "ServerPlanning\\Hardware",
            "Exception",
            "ServerPlanning\\Hardware",
            "ServerPlanning\\Hardware",
            "Exception",
            "ServerPlanning\\Hardware",
            "ServerPlanning\\Hardware",
            "ServerPlanning\\Hardware"
        ],
        "parents": [],
        "lcom": 2,
        "length": 255,
        "vocabulary": 49,
        "volume": 1431.75,
        "difficulty": 27.73,
        "effort": 39702.07,
        "level": 0.04,
        "bugs": 0.48,
        "time": 2206,
        "intelligentContent": 51.63,
        "number_operators": 84,
        "number_operands": 171,
        "number_operators_unique": 12,
        "number_operands_unique": 37,
        "cloc": 44,
        "loc": 174,
        "lloc": 130,
        "mi": 63.29,
        "mIwoC": 28.16,
        "commentWeight": 35.13,
        "kanDefect": 2.14,
        "relativeStructuralComplexity": 100,
        "relativeDataComplexity": 0.94,
        "relativeSystemComplexity": 100.94,
        "totalStructuralComplexity": 700,
        "totalDataComplexity": 6.55,
        "totalSystemComplexity": 706.55,
        "package": "ServerPlanning\\",
        "pageRank": 0.25,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    }
]