#I have make the <p> in no display just for calling
<p id="geos" name="geos" style="display:none;"></p>
    <script>
		var x = document.getElementById("geos");
		window.onload = function() {
		  if (navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(showPosition);
		  } else { 
		    alert("Please Allow Geolocation by this browser.");
			$('#location').html('Allow Location Share To Begin Games!');
		  }
		}

		function showPosition(position) {
		  var lat = position.coords.latitude;
		  var lng = position.coords.longitude;
		  
		  var geo = lat + "," + lng;	
		  x.innerHTML = geo;
      #In case I have make the direct page to record.php you can change the file name of you insert PHP script file.
		  window.location.href="record.php?geos=" + geo;
		}
	</script>
