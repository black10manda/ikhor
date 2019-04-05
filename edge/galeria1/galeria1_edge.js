/*jslint */
/*global AdobeEdge: false, window: false, document: false, console:false, alert: false */
(function (compId) {

    "use strict";
    var im='images/',
        aud='media/',
        vid='media/',
        js='js/',
        fonts = {
        },
        opts = {
            'gAudioPreloadPreference': 'auto',
            'gVideoPreloadPreference': 'auto'
        },
        resources = [
        ],
        scripts = [
        ],
        symbols = {
            "stage": {
                version: "6.0.0",
                minimumCompatibleVersion: "5.0.0",
                build: "6.0.0.400",
                scaleToFit: "none",
                centerStage: "none",
                resizeInstances: false,
                content: {
                    dom: [
                        {
                            id: 'Rectangle3',
                            type: 'rect',
                            rect: ['0%', '70.7%', '100%', '28.8%', 'auto', 'auto'],
                            fill: ["rgba(17,9,9,1.00)"],
                            stroke: [0,"rgb(0, 0, 0)","none"]
                        },
                        {
                            id: 'Banner12',
                            type: 'image',
                            rect: ['36%', '78.7%', '27.3%', '15.9%', 'auto', 'auto'],
                            cursor: 'pointer',
                            fill: ["rgba(0,0,0,0)",im+"Banner1.png",'0px','0px']
                        },
                        {
                            id: 'WhatsApp-Image-2017-12-03-at-63551-PM2',
                            type: 'image',
                            rect: ['66.6%', '78.8%', '28.1%', '15.7%', 'auto', 'auto'],
                            cursor: 'pointer',
                            fill: ["rgba(0,0,0,0)",im+"WhatsApp-Image-2017-12-03-at-6.35.51-PM.jpeg",'0px','0px']
                        },
                        {
                            id: 'Rectangle',
                            type: 'rect',
                            rect: ['0%', '0%', '100%', '70.7%', 'auto', 'auto'],
                            fill: ["rgba(23,20,20,1.00)"],
                            stroke: [0,"rgba(0,0,0,1)","none"]
                        },
                        {
                            id: 'WhatsApp-Image-2017-12-03-at-63551-PM4',
                            type: 'image',
                            rect: ['2.5%', '4.3%', '95.6%', '64.2%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"WhatsApp-Image-2017-12-03-at-6.35.51-PM.jpeg",'0px','0px']
                        },
                        {
                            id: 'Banner14',
                            type: 'image',
                            rect: ['2.5%', '4.3%', '95.6%', '64.2%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"Banner1.png",'0px','0px']
                        },
                        {
                            id: 'bane3',
                            type: 'image',
                            rect: ['2.5%', '4.3%', '98.2%', '66.4%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"bane.png",'0px','0px']
                        },
                        {
                            id: 'bane2',
                            type: 'image',
                            rect: ['4.5%', '78.7%', '28.8%', '15.7%', 'auto', 'auto'],
                            cursor: 'pointer',
                            fill: ["rgba(0,0,0,0)",im+"bane.png",'0px','0px']
                        }
                    ],
                    style: {
                        '${Stage}': {
                            isStage: true,
                            rect: [undefined, undefined, '100%', '100%'],
                            overflow: 'hidden',
                            fill: ["rgba(0,0,0,1.00)"]
                        }
                    }
                },
                timeline: {
                    duration: 19000,
                    autoPlay: true,
                    labels: {
                        "1": 0,
                        "2": 6000,
                        "3": 12000
                    },
                    data: [
                        [
                            "eid20",
                            "opacity",
                            11000,
                            1000,
                            "linear",
                            "${Banner14}",
                            '1',
                            '0'
                        ],
                        [
                            "eid2",
                            "background-color",
                            0,
                            0,
                            "linear",
                            "${Stage}",
                            'rgba(0,0,0,1.00)',
                            'rgba(0,0,0,1.00)'
                        ],
                        [
                            "eid21",
                            "opacity",
                            17000,
                            1000,
                            "linear",
                            "${WhatsApp-Image-2017-12-03-at-63551-PM4}",
                            '1',
                            '0'
                        ],
                        [
                            "eid17",
                            "opacity",
                            5000,
                            1000,
                            "linear",
                            "${bane3}",
                            '1',
                            '0'
                        ],
                        [
                            "eid25",
                            "opacity",
                            16500,
                            2483,
                            "linear",
                            "${bane3}",
                            '0.000000',
                            '1'
                        ],
                        [
                            "eid26",
                            "opacity",
                            18983,
                            17,
                            "linear",
                            "${bane3}",
                            '1',
                            '0.000000'
                        ],
                        [
                            "eid27",
                            "height",
                            0,
                            0,
                            "linear",
                            "${bane3}",
                            '66.36%',
                            '66.36%'
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("galeria1_edgeActions.js");
})("EDGE-815595522");
