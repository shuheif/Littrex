<?php
    $this->layout = false;
    echo $this->Html->css('http://fonts.googleapis.com/css?family=Roboto:400,100,300,500');
    echo $this->Html->css('style.css');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Littrex: Learning Management System</title>
		<meta name="description" content="Littrex: Learning Management System" />

		<!--
			This map was created using Pixel Map Generator by amCharts and is licensed under the Creative Commons Attribution 4.0 International License.
			You may use this map the way you see fit as long as proper attribution to the name of amCharts is given in the form of link to https://pixelmap.amcharts.com/
			To view a copy of this license, visit http://creativecommons.org/licenses/by/4.0/

			If you would like to use this map without any attribution, you can acquire a commercial license for the JavaScript Maps - a tool that was used to produce this map.
			To do so, visit amCharts Online Store: https://www.amcharts.com/online-store/
		-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- amCharts javascript sources -->
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/ammap.js"></script>
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/maps/js/mauritiusHigh.js"></script>

		<style>
			#info {
        margin-top: 100px;
			  width: 25%;
			  height: 650px !important;
			  position: absolute;
			  top: 10px;
			  left: 25px;
			  border: 3.5px solid black;
			  opacity: 0.8;
			  background: #FAFAFA;
			}
      #info p,img,h1 {
        padding: 15px;
      }
      
			#map {
			  width:100%;
			  height:700px !important;
			}
      .navbar-brand {
        padding: 0px;
      }
      nav.navbar.navbar-inverse.navbar-static-top {
        margin-bottom: 0px;
      }

      body{
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        font-weight: 300;
      }
		</style>
		<!-- amCharts javascript code -->
		<script type="text/javascript">
			  AmCharts.makeChart("map",{
      "type": "map",
      "pathToImages": "http://www.amcharts.com/lib/3/images/",
      "addClassNames": true,
      "fontSize": 15,
      "color": "#FFFFFF",
      "projection": "mercator",
      "backgroundAlpha": 1,
      "backgroundColor": "rgba(80,80,80,1)",
      "dataProvider": {
        "map": "mauritiusHigh",
        "getAreasFromMap": true,
        "images": [
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.6451,
            "latitude": -19.9908,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.5759,
            "latitude": -20.0403,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.6933,
            "latitude": -20.0458,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.656,
            "latitude": -20.104,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.5868,
            "latitude": -20.1346,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.747,
            "latitude": -20.1299,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.684,
            "latitude": -20.1818,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.7703,
            "latitude": -20.2124,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.6988,
            "latitude": -20.2658,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.7765,
            "latitude": -20.298,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.6086,
            "latitude": -20.225,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.5184,
            "latitude": -20.1637,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.5028,
            "latitude": -20.2611,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.6031,
            "latitude": -20.3184,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.537,
            "latitude": -20.3443,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.4911,
            "latitude": -20.3867,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.439,
            "latitude": -20.2438,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.4009,
            "latitude": -20.3255,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.4196,
            "latitude": -20.4016,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.3745,
            "latitude": -20.4793,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.4608,
            "latitude": -20.5059,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.5596,
            "latitude": -20.491,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.6607,
            "latitude": -20.4871,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.6397,
            "latitude": -20.4055,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          },
          {
            "title": "School 1",
            "selectable": true,
            "longitude": 57.7058,
            "latitude": -20.3726,
            "svgPath": "M3.5,13.277C3.5,6.22,9.22,0.5,16.276,0.5C23.333,0.5,29.053,6.22,29.053,13.277C29.053,14.54,28.867,15.759,28.526,16.914C26.707,24.271,16.219,32.5,16.219,32.5C16.219,32.5,4.37,23.209,3.673,15.542C3.673,15.542,3.704,15.536,3.704,15.536C3.572,14.804,3.5,14.049,3.5,13.277C3.5,13.277,3.5,13.277,3.5,13.277M16.102,16.123C18.989,16.123,21.329,13.782,21.329,10.895C21.329,8.008,18.989,5.668,16.102,5.668C13.216,5.668,10.876,8.008,10.876,10.895C10.876,13.782,13.216,16.123,16.102,16.123C16.102,16.123,16.102,16.123,16.102,16.123",
            "color": "rgba(194,44,62,0.8)",
            "scale": 1,
            "info":"Northfields International School is a privately owned English medium secondary school situated in Mapou, Pamplemousses District, in the north of Mauritius Island. From its small beginnings in 2001 NIS now has over 400 students."
          }
        ]
      },
"listeners": [ {
  "event": "clickMapObject",
  "method": function( event ) {
    document.getElementById( "info" ).innerHTML = '<h1><b>' + event.mapObject.title + '</b></h1><p>' + event.mapObject.info + '</p>' + '<img src="http://lorempixel.com/300/300/city/' + event.mapObject.title + '/" />';;
  }
} ],

      "balloon": {
        "horizontalPadding": 15,
        "borderAlpha": 0,
        "borderThickness": 1,
        "verticalPadding": 15
      },
      "areasSettings": {
        "color": "rgba(129,129,129,1)",
        "outlineColor": "rgba(80,80,80,1)",
        "rollOverOutlineColor": "rgba(80,80,80,1)",
        "rollOverBrightness": 20,
        "selectedBrightness": 20,
        "selectable": false,
        "unlistedAreasAlpha": 0,
        "unlistedAreasOutlineAlpha": 0
      },
      "imagesSettings": {
        "alpha": 1,
        "color": "rgba(129,129,129,1)",
        "outlineAlpha": 0,
        "rollOverOutlineAlpha": 0,
        "outlineColor": "rgba(80,80,80,1)",
        "rollOverBrightness": 20,
        "selectedBrightness": 20,
        "selectable": true
      },
      "linesSettings": {
        "color": "rgba(129,129,129,1)",
        "selectable": true,
        "rollOverBrightness": 20,
        "selectedBrightness": 20
      },
      "zoomControl": {
        "zoomControlEnabled": true,
        "homeButtonEnabled": false,
        "panControlEnabled": false,
        "right": 38,
        "bottom": 30,
        "minZoomLevel": 0.25,
        "gridHeight": 100,
        "gridAlpha": 0.1,
        "gridBackgroundAlpha": 0,
        "gridColor": "#FFFFFF",
        "draggerAlpha": 1,
        "buttonCornerRadius": 2
      }
    });
		</script>
	</head>
	<body style="margin: 0;background-color: rgba(80,80,80,1);">
                  <div class="row">
                    <div>
                      <div class="example3">
                        <nav class="navbar navbar-inverse navbar-static-top">
                          <div class="container">
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                              <a class="navbar-brand" href="http://disputebills.com"><img src="http://via.placeholder.com/350x150" alt="Dispute Bills">
                              </a>
                            </div>
                            <div id="navbar3" class="navbar-collapse collapse">
                              <ul class="nav navbar-nav navbar-right">
                                <li class=""><a href="http://littrex.com">Home</a></li>
                                <li><a href="http://littrex.com/pages/about_us">About Us</a></li>
                                <li><a href="http://littrex.com/pages/contact_us">Contact Us</a></li>
                              </ul>
                            </div>
                            <!--/.nav-collapse -->
                          </div>
                          <!--/.container-fluid -->
                        </nav>
                      </div>
                    </div>
                    </div>
		<div id="map"></div>
		<div id="info"></div>
	</body>
</html>