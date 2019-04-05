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
                            id: 'bane6',
                            type: 'image',
                            rect: ['0%', '-0.1%', '103.5%', '102.7%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"bane.png",'0px','0px']
                        },
                        {
                            id: 'baneruno4',
                            type: 'image',
                            rect: ['0%', '0%', '100%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"baneruno.png",'0px','0px']
                        },
                        {
                            id: 'banner33',
                            type: 'image',
                            rect: ['0%', '0%', '99.9%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"banner3.png",'0px','0px']
                        },
                        {
                            id: 'banner43',
                            type: 'image',
                            rect: ['-0.1%', '-0.2%', '99.9%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"banner4.png",'0px','0px']
                        },
                        {
                            id: 'WhatsApp-Image-2017-12-03-at-63551-PM3',
                            type: 'image',
                            rect: ['0%', '0%', '99.8%', '100%', 'auto', 'auto'],
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"WhatsApp-Image-2017-12-03-at-6.35.51-PM.jpeg",'0px','0px']
                        },
                        {
                            id: 'Rectangle',
                            type: 'rect',
                            rect: ['-0.1%', '80.8%', '100.5%', '19.2%', 'auto', 'auto'],
                            opacity: '0.67479675378257',
                            fill: ["rgba(0,0,0,1)"],
                            stroke: [0,"rgb(0, 0, 0)","none"]
                        },
                        {
                            id: 'WhatsApp-Image-2017-12-03-at-63551-PM5',
                            type: 'image',
                            rect: ['1.4%', '82.3%', '16.8%', '16.1%', 'auto', 'auto'],
                            opacity: '0.79487179487179',
                            fill: ["rgba(0,0,0,0)",im+"WhatsApp-Image-2017-12-03-at-6.35.51-PM.jpeg",'0px','0px']
                        },
                        {
                            id: 'banner44',
                            type: 'image',
                            rect: ['19.3%', '82.3%', '18.4%', '16.2%', 'auto', 'auto'],
                            opacity: '0.78632478632479',
                            fill: ["rgba(0,0,0,0)",im+"banner4.png",'0px','0px']
                        },
                        {
                            id: 'banner34',
                            type: 'image',
                            rect: ['38.7%', '82.5%', '18.4%', '15.9%', 'auto', 'auto'],
                            opacity: '0.79487179487179',
                            fill: ["rgba(0,0,0,0)",im+"banner3.png",'0px','0px']
                        },
                        {
                            id: 'baneruno5',
                            type: 'image',
                            rect: ['58.4%', '82.5%', '18.5%', '15.8%', 'auto', 'auto'],
                            opacity: '0.78632478632479',
                            fill: ["rgba(0,0,0,0)",im+"baneruno.png",'0px','0px']
                        },
                        {
                            id: 'bane9',
                            type: 'image',
                            rect: ['78.3%', '82.6%', '18.4%', '15.8%', 'auto', 'auto'],
                            opacity: '0.79487179487179',
                            fill: ["rgba(0,0,0,0)",im+"bane.png",'0px','0px']
                        }
                    ],
                    style: {
                        '${Stage}': {
                            isStage: true,
                            rect: ['null', 'null', '100%', '100%', 'auto', 'auto'],
                            overflow: 'hidden',
                            fill: ["rgba(66,62,62,1.00)"]
                        }
                    }
                },
                timeline: {
                    duration: 34000,
                    autoPlay: true,
                    labels: {
                        "1": 0,
                        "2": 6154,
                        "tres": 10157,
                        "3": 12000,
                        "cuatro": 15298,
                        "4": 18000,
                        "cinco": 20190,
                        "5": 24049,
                        "6": 29000
                    },
                    data: [
                        [
                            "eid125",
                            "opacity",
                            5000,
                            1000,
                            "linear",
                            "${WhatsApp-Image-2017-12-03-at-63551-PM3}",
                            '1',
                            '0'
                        ],
                        [
                            "eid128",
                            "opacity",
                            19000,
                            1000,
                            "linear",
                            "${baneruno4}",
                            '1',
                            '0'
                        ],
                        [
                            "eid126",
                            "opacity",
                            9000,
                            1000,
                            "linear",
                            "${banner43}",
                            '1',
                            '0.0085470085470085'
                        ],
                        [
                            "eid137",
                            "opacity",
                            24750,
                            750,
                            "linear",
                            "${bane6}",
                            '1',
                            '0'
                        ],
                        [
                            "eid127",
                            "opacity",
                            14000,
                            1000,
                            "linear",
                            "${banner33}",
                            '1',
                            '0'
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("galeria3_edgeActions.js");
})("EDGE-44497148");
