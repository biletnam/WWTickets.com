<html>
<head>
<script type="text/javascript" src="jquery-1.6.4.min.js"></script>
<script type="text/javascript">
function getDirections() {
	var parameters = "origin=Boston,MA&destination=Concord,MA&sensor=false";
    $.getJSON("getpage.php?url=" + escape("http://maps.googleapis.com/maps/api/directions/json?" + parameters), function(data){
        var output = ""
        for (x = 0;x < data.routes[0].legs[0].steps.length; x++){
            output = output + data.routes[0].legs[0].steps[x].html_instructions;
            output += " (Distance: " + data.routes[0].legs[0].steps[x].distance.text + ") <br />";
        }
        
        document.getElementById("test").innerHTML=output
    });
}
</script>
</head>
<body>
<h1>Google Direction API Demo</h1>

<div id="test"> </div>

<button type="button" onclick="getDirections()">Get Directions</button>


</body>
</html>