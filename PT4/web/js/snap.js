function runSnapToRoad(path)
{
	var pathValues = [];
	for (var i = 0; i < path.getLength(); i++)
	{
		pathValues.push(path.getAt(i).toUrlValue());
	}

	$.get('https://roads.googleapis.com/v1/snapToRoads',
	{
		interpolate: true,
		key: apiKey,
		path: pathValues.join('|')
	}, function(data)
	{
		processSnapToRoadResponse(data);
		drawSnappedPolyline();
		getAndDrawSpeedLimits();
	});
}

// Store snapped polyline returned by the snap-to-road service.
function processSnapToRoadResponse(data)
{
	snappedCoordinates = [];
	placeIdArray = [];
	for(var i = 0; i < data.snappedPoints.length; i++)
	{
		var latlng = new google.maps.LatLng(
			data.snappedPoints[i].location.latitude,
			data.snappedPoints[i].location.longitude);
		snappedCoordinates.push(latlng);
		placeIdArray.push(data.snappedPoints[i].placeId);
	}
}

// Draws the snapped polyline (after processing snap-to-road response).
function drawSnappedPolyline()
{
	var snappedPolyline = new google.maps.Polyline(
	{
		path: snappedCoordinates,
		strokeColor: 'black',
		strokeWeight: 3
	});

	snappedPolyline.setMap(map);
	polylines.push(snappedPolyline);
}

// Gets speed limits (for 100 segments at a time) and draws a polyline
// color-coded by speed limit. Must be called after processing snap-to-road
// response.
function getAndDrawSpeedLimits()
{
	for (var i = 0; i <= placeIdArray.length / 100; i++)
	{
		// Ensure that no query exceeds the max 100 placeID limit.
		var start = i * 100;
		var end = Math.min((i + 1) * 100 - 1, placeIdArray.length);

		drawSpeedLimits(start, end);
	}
}