<!-- In your view file -->
<input id="pac-input-from" class="controls" type="text" placeholder="Enter a location to send from">
<input id="pac-input-to" class="controls" type="text" placeholder="Enter a location to send to">
<div id="map"></div>

<!-- In your JavaScript file -->
<script>
  function initMap() {
    const map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 40.749933, lng: -73.98633},
      zoom: 13,
      mapTypeControl: false,
    });

    // Autocomplete for 'From' input field
    const inputFrom = document.getElementById('pac-input-from');
    const autocompleteFrom = new google.maps.places.Autocomplete(inputFrom);
    autocompleteFrom.bindTo('bounds', map);

    const markerFrom = new google.maps.Marker({
      map,
      anchorPoint: new google.maps.Point(0, -29),
    });

    autocompleteFrom.addListener('place_changed', () => {
      markerFrom.setVisible(false);
      const place = autocompleteFrom.getPlace();
      if (!place.geometry || !place.geometry.location) {
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }

      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);
      }
      markerFrom.setPosition(place.geometry.location);
      markerFrom.setVisible(true);
    });

    // Autocomplete for 'To' input field
    const inputTo = document.getElementById('pac-input-to');
    const autocompleteTo = new google.maps.places.Autocomplete(inputTo);
    autocompleteTo.bindTo('bounds', map);

    const markerTo = new google.maps.Marker({
      map,
      anchorPoint: new google.maps.Point(0, -29),
    });

    autocompleteTo.addListener('place_changed', () => {
      markerTo.setVisible(false);
      const place = autocompleteTo.getPlace();
      if (!place.geometry || !place.geometry.location) {
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }

      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);
      }
      markerTo.setPosition(place.geometry.location);
      markerTo.setVisible(true);
    });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvDClt6LWhzXwHYAn-0jXGK6lYKfJSwZg&libraries=places&callback=initMap"
    async defer></script>
