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

    var streets = L.tileLayer("https://api.maptiler.com/maps/streets/{z}/{x}/{y}@2x.png?key=qvqxLqNoUMF4r69N6hLx", {
      maxZoom: 20,
      attribution: "© Street",
    });

    var satellite = L.tileLayer("https://api.maptiler.com/maps/hybrid/{z}/{x}/{y}@2x.jpg?key=qvqxLqNoUMF4r69N6hLx", {
      maxZoom: 20,
      attribution: "© Satellite",
    });
    var mapConfig = {
      minZoom: 5,
      maxZoom: 20,
      attributionControl: false, // để ko hiện watermark nữa, nếu bị liên hệ đòi thì nhớ open nha
      center: defaultCoord, // vị trí map mặc định hiện tại
      zoom: zoomLevel, // level zoom
      layers: [streets], //layers thiết lập tile mặc định ban đầu của map
    };

    // init map
    mapObj = L.map("sethPhatMap", mapConfig);

    // Sử dụng tiles layer group
    //add group tile layer map start------------------------------------------

    var baseMaps = {
      OpenStreetMap: osm,
      "Mapbox Streets": streets,
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

    var imageUrl = theme_directory + "/assets/images/map/HoangSa11.png";
    var errorOverlayUrl = "https://cdn-icons-png.flaticon.com/512/110/110686.png";
    var altText = "Hoàng Sa Việt Nam";
    var latLngBounds = L.latLngBounds([
      [15.564836205125268, 110.92071533203126],
      [17.35063837604883, 110.92071533203126],
      [17.35063837604883, 113.07403564453126],
      [15.564836205125268, 113.07403564453126],
    ]);

    var imageOverlay = L.imageOverlay(imageUrl, latLngBounds, {
      opacity: 1,
      errorOverlayUrl: errorOverlayUrl,
      alt: altText,
      interactive: true,
    }).addTo(mapObj);
    // L.rectangle(latLngBounds, { color: "red" }).addTo(mapObj);

    var imageUrl = theme_directory + "/assets/images/map/HoangSa2.png";
    var altText = "Hoàng Sa 2";
    var latLngBounds2 = L.latLngBounds([
      [15.310677799416561, 113.39263916015626],
      [16.415009267332383, 113.39263916015626],
      [16.415009267332383, 115.18890380859376],
      [15.310677799416561, 115.18890380859376],
    ]);

    var imageOverlay2 = L.imageOverlay(imageUrl, latLngBounds2, {
      opacity: 1,
      errorOverlayUrl: errorOverlayUrl,
      alt: altText,
      interactive: true,
    }).addTo(mapObj);
    // L.rectangle(latLngBounds2, { color: "red" }).addTo(mapObj);

    var imageUrl = theme_directory + "/assets/images/map/TruongSa1.png";
    var altText = "Trường Sa Việt Nam";
    var latLngBounds3 = L.latLngBounds([
      [8.309341443917631, 111.41784667968751],
      [11.576906799408968, 111.41784667968751],
      [11.576906799408968, 116.33972167968751],
      [8.309341443917631, 116.35070800781251],
    ]);

    var imageOverlay3 = L.imageOverlay(imageUrl, latLngBounds3, {
      opacity: 1,
      errorOverlayUrl: errorOverlayUrl,
      alt: altText,
      interactive: true,
    }).addTo(mapObj);
    // L.rectangle(latLngBounds3, { color: "red" }).addTo(mapObj);



    // L.polygon(latLngBounds, { color: "red" }).addTo(mapObj);

    L.Control.Watermark = L.Control.extend({
      onAdd: function (mapObj) {
        var img = L.DomUtil.create("img");

        img.src = theme_directory + "/assets/images/col.png";
        img.style.width = "200px";

        return img;
      },

      onRemove: function (mapObj) {
        // Nothing to do here
      },
    });

    L.control.watermark = function (opts) {
      return new L.Control.Watermark(opts);
    };

    L.control.watermark({ position: "bottomleft" }).addTo(mapObj);
    // map.fitBounds(latLngBounds);

    mapObj.on("click", function (e) {
      console.log("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng);
    });
    // -----------------------------------OPEN STREET MAP end--------------------------------------------------
  });
})(jQuery);

// -------------------

/**
(function ($) {
  $(document).ready(function () {
    document.getElementById("card-click-popup").style.backgroundImage = 'url("' + theme_directory + '/assets/images/partner3.png")';
    // -----------------------------------OPEN STREET MAP overlays START--------------------------------------------------

    var map = L.map("sethPhatMap").setView([37.8, -96], 4);

    var osm = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }).addTo(map);
var link = theme_directory;
console.log(link);
    var imageUrl = theme_directory + "/assets/images/partner3.png";
    var errorOverlayUrl = "https://cdn-icons-png.flaticon.com/512/110/110686.png";
    var altText =
      "Image of Newark, N.J. in 1922. Source: The University of Texas at Austin, UT Libraries Map Collection.";
    var latLngBounds = L.latLngBounds([
      [40.799311, -74.118464],
      [40.68202047785919, -74.33],
    ]);

    var imageOverlay = L.imageOverlay(imageUrl, latLngBounds, {
      opacity: 0.8,
      errorOverlayUrl: errorOverlayUrl,
      alt: altText,
      interactive: true,
    }).addTo(map);

    L.rectangle(latLngBounds).addTo(map);
    // map.fitBounds(latLngBounds);

    // -----------------------------------OPEN STREET MAP overlays end--------------------------------------------------
  });
})(jQuery);
 */
