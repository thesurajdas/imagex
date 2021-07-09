<?php
	require('../auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
            <script src="../js/jquery-3.5.1.slim.min.js"></script>
            <script src="../js/jquery.min.js"></script>
            <script src="../js/bootstrap.bundle.min.js"></script>
            <link href="../css/aboutus.css" rel="stylesheet">
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <!-- Map CSS -->
   <style>
		* {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}

		.leaflet-popup-content-wrapper {
			padding: 0;
			overflow: hidden;
		}

		.leaflet-popup-content-wrapper .leaflet-popup-content {
			margin: 0;
		}

		.leaflet-popup-content-wrapper h4 {
			padding: 12px;
			background-color: #ff6808;
			color: white;
			font-size: 14px;
		}

		.leaflet-popup-content-wrapper p {
			padding: 0 16px;
			font-size: 14px;
			margin-bottom: 14px;
		}

		img{
			object-fit: cover;
		}
	</style>

                <!-------bootstrap css custom styling -> (OVERRIDE) <- --------------------->
            <style>
                .dropleft .dropdown-toggle::before{
                    border-right: 0;
                }
                .dropdown-toggle::after{
                    border-top: 0;
                }
            </style>
    <script src="../js/fontawesome.js"></script>
</head>
<body>
    <?php require_once('include/header.php'); ?>
        <div class="container shadow-lg p-3 mb-5 bg-white glry" style="border-radius: 1.25rem;">
            <div  class="col-md-12 pb-3 pt-2"><h1 class="text-center" style="color: rgb(23 109 222 / 72%);"><i class="fad fa-globe-asia"></i> Images From The Globe</h1></div>
            <div class="container bg-light shadow-lg p-3" style="border-radius: 1.25rem;">
                <div class="row pl-3 pr-3 pt-3">
                    <div class="text-right col-12">
                        <div class="btn-group btn-group-sm" role="group">
                            <div class="dropdown-menu" style="min-width: auto;" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item " style="text-align: start; color: rgba(99, 96, 96, 0.856); font-size: 80%; font-weight: 700;" href="?id=<?php echo $cat_id; ?>&s=views">View Item</a>
                                <a class="dropdown-item " style="text-align: start; color: rgba(220, 20, 60, 0.842); font-size: 80%; font-weight: 700;" href="?id=<?php echo $cat_id; ?>&s=likes">View Item</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- -------------map start------------------- -->
                <div id="map" style="width: 100%; height: 90vh; padding: 10px; margin-top: 10px; border-radius: 1.25rem;"></div>
                <!-- -------------map end------------------- -->
            </div>
        </div>
    <?php require_once('include/footer.php'); ?>    
    <script src="map-data.php"></script>
	<script>
		var map = L.map('map').setView([45, 0], 2);
		map.options.minZoom = 2;
		map.options.maxZoom = 15;

		L.control.scale().addTo(map);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		function makeContent(ix) {
			return `
				<div>
					<h4>${ix.properties.title}</h4>
					<p><a href="${ix.properties.iurl}" target="_blank"><img src="${ix.properties.url}" height="100px" width="150px"></a></p>
				</div>
				`;
		}

		function onEachFeature(feature, layer) {
			layer.bindPopup(makeContent(feature), { closeButton: false });
		}

		const imgLayer = L.geoJSON(imgList, {
			onEachFeature: onEachFeature,
			pointToLayer: function (feature, latlng) {
				return L.marker(latlng);
			}
		});
		imgLayer.addTo(map);
	</script>
</body>
</html>