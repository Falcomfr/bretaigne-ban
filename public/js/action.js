$(function () {
            $(".mapcontainer").mapael({
                map: {
                    name: "banner"
                    // Enable zoom on the map
                    , zoom: {
                        enabled: false
                    }
                    , width: 1700
                    // Set default plots and areas style
                    , defaultPlot: {
                        attrs: {
                            fill: "#004a9b"
                            , opacity: 0.1
                        }
                        , attrsHover: {
                            opacity: 0.6
                        }
                        , text: {
                            attrs: {
                                fill: "#505444"
                            }
                            , attrsHover: {
                                fill: "#c9c9bf"
                            }
                        }
                    }
                    , defaultArea: {
                        attrs: {
                            fill: "#000"
                            , stroke: "#fff"
							, opacity: 0.2
                        }
                        , attrsHover: {
                            fill: "#000"
                            , opacity: 0.4
                        }
                        , text: {
                            attrs: {
                                fill: "#505444"
                            }
                            , attrsHover: {
                                fill: "#000"
                            }
                        }
                    }
                },

                // Customize some areas of the map
                areas: {
                    "path4738": {
                        text: {content: "Morbihan", attrs: {"font-size": 40}},
                        tooltip: {content: "Morbihan (56)"},
                        href: "http://fr.wikipedia.org/wiki/Morbihan"
                    },
					"path4784": {
                        tooltip: {content: "<b>Type de terrain</b> :<br/> Forêt <br/><b>Revenu de la zone :</b><br/> 10 gold par heure"},
                        href: "http://fr.wikipedia.org/wiki/Morbihan"
                    },
                    "path4748": {
                        attrs: {
                            fill: "#000"
                        }
                        , attrsHover: {
                            fill: "#a4e100"
                        },
                        href: "http://fr.wikipedia.org/wiki/C%C3%B4te-d%27Or",
                        target: "_blank"
                    },
					"path4647": {
                        attrs: {
                            fill: "#2F54FF"
                        }
                        , attrsHover: {
                            fill: "#a4e100"
                        },
                        href: "http://fr.wikipedia.org/wiki/C%C3%B4te-d%27Or",
                        target: "_blank"
                    }
                },

                // Add some plots on the map
                plots: {
                    // Image plot
                    'paris': {
                        type: "image",
                        url: "http://www.neveldo.fr/mapael/assets/img/marker.png",
                        width: 50,
                        height: 150,
                        latitude: 3000.86,
                        longitude: 2000.3444,
						tooltip: {content: "<b>Chateau détenu par :</b> Olgarth <br/> Quel info mettre ici ? "},
                        attrs: {
                            opacity: 1
                        },
                        attrsHover: {
                            transform: "s1.5"
                        },
                        href: "http://fr.wikipedia.org/wiki/Paris",
                        target: "_blank"
                    },
                    // Circle plot
                    'lyon': {
                        type: "circle",
                        size: 50,
                        latitude: 3000.758888888889,
                        longitude: 2200.8413888888889,
                        value: 700000,
                        tooltip: {content: "<span style=\"font-weight:bold;\">City :</span> Lyon"},
                        href: "http://fr.wikipedia.org/wiki/Lyon"
                    }
                },
				links: {
                    'parisnewyork': {
                        // ... Or with IDs of plotted points
                        factor: 0
                        , between: ['paris', 'lyon']
                        , attrs: {
                            stroke: "#e03131",
                            "stroke-width": 20,
                            "stroke-linecap": "round",
                            opacity: 1
                        }
                        , tooltip: {content: "Arrive dans 1H30"}
                    }
                }
            });
        });