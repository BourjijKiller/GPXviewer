var ensemblePoints = document
	.querySelector('#points')
	.innerText
;

$.get('https://roads.googleapis.com/v1/snapToRoads',
{
	interpolate: true,
	key: 'AIzaSyD9PD-kNhF4SjYBqzPAXmDUTX1Au32rCjQ',
	path: ensemblePoints
}, function(data)
{
	var points = [];
	data
		.snappedPoints
		.forEach(function (point)
		{
			points.push({
				lat: point.location.latitude,
				lng: point.location.longitude
			});
		});

	var pos =
	{
		lat: points[0].lat,
		lng: points[0].lng
	};

	mapOptions =
	{
		zoom: 17,
		center: pos
	};

	var map = new google.maps.Map(document.getElementById('map'), mapOptions);
	map.controls[google.maps.ControlPosition.RIGHT_TOP].push(
		document.getElementById('back'));

	var drawPath = new google.maps.Polyline({
		path: points,
		geodesic: true,
		strokeColor: '#FF0000',
		strokeOpacity: 1.0,
		strokeWeight: 2
	});
	
	drawPath.setMap(map);
});