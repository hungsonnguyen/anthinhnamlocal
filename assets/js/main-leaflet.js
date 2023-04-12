(function ($) {
  $(document).ready(function () {
    // -----------------------------------OPEN STREET MAP START--------------------------------------------------

    var mapObj = null;

    if (obj2 != null) {
      //var defaultCoord = [obj2[0]['lat'], obj2[0]['lng']]; // coord mặc định

      var defaultCoord = [16.5052108, 102.3292413]; // coord mặc định Việt nam
    }
    var zoomLevel = 5;
    var osm = L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
    });
    var mapConfig = {
      attributionControl: false, // để ko hiện watermark nữa, nếu bị liên hệ đòi thì nhớ open nha
      center: defaultCoord, // vị trí map mặc định hiện tại
      zoom: zoomLevel, // level zoom
      layers: [osm], //layers thiết lập tile mặc định ban đầu của map
    };

    // init map
    mapObj = L.map("sethPhatMap", mapConfig);

    // Sử dụng tiles layer group
    //add group tile layer map start------------------------------------------

    var streets = L.tileLayer("https://api.maptiler.com/maps/streets/{z}/{x}/{y}@2x.png?key=DXBhrLVYaeuix0IPoCn3", {
      // maxZoom: 20,
      attribution: "© Street",
    });

    var dark = L.tileLayer("https://api.maptiler.com/maps/darkmatter/{z}/{x}/{y}@2x.png?key=DXBhrLVYaeuix0IPoCn3", {
      // maxZoom: 20,
      attribution: "© Dark",
    });

    var satellite = L.tileLayer("https://api.maptiler.com/maps/hybrid/{z}/{x}/{y}@2x.jpg?key=DXBhrLVYaeuix0IPoCn3", {
      // maxZoom: 20,
      attribution: "© Satellite",
    });

    var baseMaps = {
      OpenStreetMap: osm,
      "Mapbox Streets": streets,
      "Mapbox Dark": dark,
      "Mapbox Satellite": satellite,
    };
    var layerControl = L.control.layers(baseMaps).addTo(mapObj);
    //add group tile layer map end------------------------------------------

    // add tile để map có thể hoạt động, xài free từ OSM
    // L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
    // 	attribution:
    // 		'&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
    // }).addTo(mapObj);

    //Geocoder leaflet search location
    L.Control.geocoder().addTo(mapObj);

    // tạo marker
    var popupOption = {
      className: "map-popup-content",
    };

    // marker cluster group
    const markers = L.markerClusterGroup();

    if (obj2 != null) {
      for (var i = 0; i < obj2.length; i++) {
        if (obj2[i] != null || object_Content[i] != null) {
          console.log("vào rồi");
          console.log(object_image[i]);
          console.log(object_title[i]);
          console.log(object_Content[i]);
          var marker = addMarker(
            [obj2[i]["lat"], obj2[i]["lng"]],
            `<div class="card" style="width: 100%;">
							<div class="row no-gutters">
								<div class="col-md-4">
									<a class="h-100" href="` +
              object_link[i] +
              `">
										<img src="` +
              object_image[i] +
              `" class="card-img" alt="...">
									</a>
								</div>
								<div class="col-md-8">
									<div class="card-body">
									<h5 class="card-title">` +
              object_title[i] +
              `</h5>
									<p class="card-text">` +
              object_Content[i] +
              `</p>
									<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
								</div>
							  </div>
							</div>
						  </div>`,
            popupOption
          );
        }
      }
    }
    mapObj.addLayer(markers);

    var popup = L.popup();

    //CLick to open the popup
    function onMapClick(e) {
      popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
    }

    mapObj.on("click", onMapClick);
    function addMarker(coord, popupContent, popupOptionObj, markerObj) {
      if (!popupOptionObj) {
        popupOptionObj = {};
      }
      if (!markerObj) {
        markerObj = {};
      }

      let customIcon = {
        iconUrl:
          "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Map_pin_icon_green.svg/800px-Map_pin_icon_green.svg.png",
        iconSize: [40, 40],
      };

      let myIcon = L.icon(customIcon);

      //nếu không sử dụng group thì dùng câu lệnh này
      // var marker = L.marker(coord, markerObj, myIcon).addTo(mapObj);

      var popup = L.popup(popupOptionObj);
      popup.setContent(popupContent);

      // binding
      //nếu không sử dụng group thì dùng câu lệnh này
      // marker.bindPopup(popup);

      // add layer to group markers
      //sử dụng để import group của cluster lên map
      markers.addLayer(L.marker(coord, markerObj, myIcon).bindPopup(popup));

      return marker;
    }

    //Setting popup when hover
    function onMapClick(lat, long) {
      if (obj2 != null) {
        for (var i = 0; i < obj2.length; i++) {
          if (obj2[i]["lat"] == lat && obj2[i]["lng"] == long) {
            console.log("vào rồi");
            console.log(object_image[i]);
            console.log(object_title[i]);
            console.log(object_Content[i]);
            console.log(object_link[i]);
            popup
              .setLatLng([lat, long])
              .setContent(
                `<div class="card" style="width: 100%;">
									<div class="row no-gutters">
										<div class="col-md-4">
										<a class="h-100" href="` +
                  object_link[i] +
                  `">
											<img src="` +
                  object_image[i] +
                  `" class="card-img" alt="...">
										</a>
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title">` +
                  object_title[i] +
                  `</h5>
											<p class="card-text">` +
                  object_Content[i] +
                  `</p>
											<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
										</div>
									</div>
									</div>
								</div>`
              )
              .openOn(mapObj);
          }
        }
      } else {
        console.log(
          "None post are using cordinates! If you want to render mark on map you nedd set coridnate in the post!"
        );
      }
    }

    //event click post to show zoom marker
    $(".card-click-popup").click(function () {
      var lat = $(this).find(".lat").text();
      var lng = $(this).find(".lng").text();

      //pan to view
      // mapObj.panTo([lat, lng]);

      //zoom to view
      // mapObj.setView([lat, lng], 14);

      //fly to view
      mapObj.flyTo([lat, lng], 16, { animation: true });

      mapObj.on("hover", onMapClick(lat, lng));
    });
    // -----------------------------------OPEN STREET MAP end--------------------------------------------------
  });
})(jQuery);

//-------------------
// (function ($) {
//   $(document).ready(function () {
//     // -----------------------------------OPEN STREET MAP START--------------------------------------------------

//     var mapObj = null;

//     if (obj2 != null) {
//       //var defaultCoord = [obj2[0]['lat'], obj2[0]['lng']]; // coord mặc định

//       var defaultCoord = [16.5052108, 102.3292413]; // coord mặc định Việt nam
//     }
//     var zoomLevel = 5;
//     var osm = L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
//       attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
//     });
//     var mapConfig = {
//       attributionControl: false, // để ko hiện watermark nữa, nếu bị liên hệ đòi thì nhớ open nha
//       center: defaultCoord, // vị trí map mặc định hiện tại
//       zoom: zoomLevel, // level zoom
//       layers: [osm], //layers thiết lập tile mặc định ban đầu của map
//     };

//     // init map
//     mapObj = L.map("sethPhatMap", mapConfig);

//     // Sử dụng tiles layer group
//     //add group tile layer map start------------------------------------------

//     var streets = L.tileLayer("https://api.maptiler.com/maps/streets/{z}/{x}/{y}@2x.png?key=DXBhrLVYaeuix0IPoCn3", {
//       // maxZoom: 20,
//       attribution: "© Street",
//     });

//     var dark = L.tileLayer("https://api.maptiler.com/maps/darkmatter/{z}/{x}/{y}@2x.png?key=DXBhrLVYaeuix0IPoCn3", {
//       // maxZoom: 20,
//       attribution: "© Dark",
//     });

//     var satellite = L.tileLayer("https://api.maptiler.com/maps/hybrid/{z}/{x}/{y}@2x.jpg?key=DXBhrLVYaeuix0IPoCn3", {
//       // maxZoom: 20,
//       attribution: "© Satellite",
//     });

//     var baseMaps = {
//       OpenStreetMap: osm,
//       "Mapbox Streets": streets,
//       "Mapbox Dark": dark,
//       "Mapbox Satellite": satellite,
//     };
//     var layerControl = L.control.layers(baseMaps).addTo(mapObj);
//     //add group tile layer map end------------------------------------------

//     // add tile để map có thể hoạt động, xài free từ OSM
//     // L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
//     // 	attribution:
//     // 		'&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
//     // }).addTo(mapObj);

//     //Geocoder leaflet search location
//     L.Control.geocoder().addTo(mapObj);

//     // tạo marker
//     var popupOption = {
//       className: "map-popup-content",
//     };

//     // marker cluster group
//     const markers = L.markerClusterGroup();

//     if (obj2 != null) {
//       for (var i = 0; i < obj2.length; i++) {
//         if (obj2[i] != null || object_Content[i] != null) {
//           console.log("vào rồi");
//           console.log(object_image[i]);
//           console.log(object_title[i]);
//           console.log(object_Content[i]);
//           var marker = addMarker(
//             [obj2[i]["lat"], obj2[i]["lng"]],
//             `<div class="card" style="width: 100%;">
// 							<div class="row no-gutters">
// 								<div class="col-md-4">
// 									<a class="h-100" href="` +
//               object_link[i] +
//               `">
// 										<img src="` +
//               object_image[i] +
//               `" class="card-img" alt="...">
// 									</a>
// 								</div>
// 								<div class="col-md-8">
// 									<div class="card-body">
// 									<h5 class="card-title">` +
//               object_title[i] +
//               `</h5>
// 									<p class="card-text">` +
//               object_Content[i] +
//               `</p>
// 									<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
// 								</div>
// 							  </div>	
// 							</div>
// 						  </div>`,
//             popupOption
//           );
//         }
//       }
//     }
//     mapObj.addLayer(markers);

//     var popup = L.popup();

//     //CLick to open the popup
//     function onMapClick(e) {
//       popup
//         .setLatLng(e.latlng)
//         .setContent("You clicked the map at " + e.latlng.toString())
//         .openOn(map);
//     }

//     mapObj.on("click", onMapClick);
//     function addMarker(coord, popupContent, popupOptionObj, markerObj) {
//       var svg =
//         '<svg id="mePin" xmlns="http://www.w3.org/2000/svg" width="43.3" height="42.4" viewBox="0 0 43.3 42.4"><path class="ring_outer" fill="#878787" d="M28.6 23c6.1 1.4 10.4 4.4 10.4 8 0 4.7-7.7 8.6-17.3 8.6-9.6 0-17.4-3.9-17.4-8.6 0-3.5 4.2-6.5 10.3-7.9.7-.1-.4-1.5-1.3-1.3C5.5 23.4 0 27.2 0 31.7c0 6 9.7 10.7 21.7 10.7s21.6-4.8 21.6-10.7c0-4.6-5.7-8.4-13.7-10-.8-.2-1.8 1.2-1 1.4z"/><path class="ring_inner" fill="#5F5F5F" d="M27 25.8c2 .7 3.3 1.8 3.3 3 0 2.2-3.7 3.9-8.3 3.9-4.6 0-8.3-1.7-8.3-3.8 0-1 .8-1.9 2.2-2.6.6-.3-.3-2-1-1.6-2.8 1-4.6 2.7-4.6 4.6 0 3.2 5.1 5.7 11.4 5.7 6.2 0 11.3-2.5 11.3-5.7 0-2-2.1-3.9-5.4-5-.7-.1-1.2 1.3-.7 1.5z"/><path class="mePin" d="M21.6 8.1a4 4 0 0 0 4-4 4 4 0 0 0-4-4.1 4.1 4.1 0 0 0-4.1 4 4 4 0 0 0 4 4.1zm4.9 8v-3.7c0-1.2-.6-2.2-1.7-2.6-1-.4-1.9-.6-2.8-.6h-.9c-1 0-2 .2-2.8.6-1.2.4-1.8 1.4-1.8 2.6V16c0 .9 0 2 .2 2.8.2.8.8 1.5 1 2.3l.2.3.4 1 .1.8.2.7.6 3.6c-.6.3-.9.7-.9 1.2 0 .9 1.4 1.7 3.2 1.7 1.8 0 3.2-.8 3.2-1.7 0-.5-.3-.9-.8-1.2l.6-3.6.1-.7.2-.8.3-1 .1-.3c.3-.8 1-1.5 1.1-2.3.2-.8.2-2 .2-2.8z" fill="#282828"/></svg>';

//       console.log(svg.replace("#", "%23"));
//       var meIcon = L.divIcon({
//         className: "leaflet-data-marker",
//         html: svg.replace("#", "%23"),

//         iconAnchor: [22, 28],
//         iconSize: [36, 42],
//         popupAnchor: [0, -30],
//       });

//       if (!popupOptionObj) {
//         popupOptionObj = {};
//       }
//       if (!markerObj) {
//         // markerObj = {
//         //   icon: meIcon,
//         //   title: "@me",
//         // };
//       }

//       var popup = L.popup(popupOptionObj);
//       popup.setContent(popupContent);
//       markers.addLayer(L.marker(coord, markerObj).bindPopup(popup)).addTo(mapObj);
//       $("#mePin").addClass("bounceInDown");
//       return marker;
//     }

//     //Setting popup when hover
//     function onMapClick(lat, long) {
//       if (obj2 != null) {
//         for (var i = 0; i < obj2.length; i++) {
//           if (obj2[i]["lat"] == lat && obj2[i]["lng"] == long) {
//             console.log("vào rồi");
//             console.log(object_image[i]);
//             console.log(object_title[i]);
//             console.log(object_Content[i]);
//             console.log(object_link[i]);
//             popup
//               .setLatLng([lat, long])
//               .setContent(
//                 `<div class="card" style="width: 100%;">
// 									<div class="row no-gutters">
// 										<div class="col-md-4">
// 										<a class="h-100" href="` +
//                   object_link[i] +
//                   `">
// 											<img src="` +
//                   object_image[i] +
//                   `" class="card-img" alt="...">
// 										</a>
// 									</div>
// 									<div class="col-md-8">
// 										<div class="card-body">
// 											<h5 class="card-title">` +
//                   object_title[i] +
//                   `</h5>
// 											<p class="card-text">` +
//                   object_Content[i] +
//                   `</p>
// 											<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
// 										</div>
// 									</div>
// 									</div>
// 								</div>`
//               )
//               .openOn(mapObj);
//           }
//         }
//       } else {
//         console.log(
//           "None post are using cordinates! If you want to render mark on map you nedd set coridnate in the post!"
//         );
//       }
//     }

//     //event click post to show zoom marker
//     $(".card-click-popup").click(function () {
//       var lat = $(this).find(".lat").text();
//       var lng = $(this).find(".lng").text();

//       //pan to view
//       // mapObj.panTo([lat, lng]);

//       //zoom to view
//       // mapObj.setView([lat, lng], 14);

//       //fly to view
//       mapObj.flyTo([lat, lng], 16, { animation: true });

//       mapObj.on("hover", onMapClick(lat, lng));
//     });
//     // -----------------------------------OPEN STREET MAP end--------------------------------------------------
//   });
// })(jQuery);
