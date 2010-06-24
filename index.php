<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
  <title>Placefinder Explorer</title>
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/combo?2.8.0/build/reset-fonts-grids/reset-fonts-grids.css&2.8.0/build/base/base-min.css">
  <link rel="stylesheet" type="text/css" href="placefinder.css">
</head>
<body class="yui-skin-sam">
<div id="doc3" class="yui-t7">

  <div id="hd" role="banner">
    <h1><span>Placefinder </span>Explorer</h1>
  </div>
  <div id="bd" role="main">
    <p>This is a demo of the information the new <a href="http://developer.yahoo.com/geo/placefinder/">Yahoo Placefinder</a> API has available for you. Simply <strong>double-click</strong> on the map below to set a marker and see the information stored in the Placefinder dataset.</p>
    <div class="yui-gc">
      <div class="yui-u first">
        <div id="map"></div>
      </div>
      <div class="yui-u">
        <form id="f2"><label for="earlier">Earlier Locations:</label><select name="earlier" id="earlier"></select><input type="submit" value="Go"></form>
        <div id="info"></div>
      </div>
    </div>
    <script src="http://api.maps.yahoo.com/ajaxymap?v=3.8&appid=YD-bs4vWJU_JXrmPwSfQ8yStcfWoDA5n51J"></script>
    <script src="placefinder.js"></script>
  </div>
  <div id="ft" role="contentinfo">
    <p>Written by <a href="http://wait-till-i.com">Christian Heilmann</a> using <a href="http://developer.yahoo.com/yui">YUI</a> and <a href="http://developer.yahoo.com/geo">Yahoo Geo Technologies</a></p>
  </div>
</div>
</body>
</html>
