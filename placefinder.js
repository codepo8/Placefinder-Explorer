var placefinder = function(){
  var counter = 0,
      data = [],
      names = [],
      info = document.getElementById('info'),
      locs = document.getElementById('earlier'),
      locsform = document.getElementById('f2'),
      islive = false;
  var map = new YMap(document.getElementById('map'));

  function startMap(){
    map.disablePanOnDoubleClick(); 
    map.addTypeControl();
    map.addZoomLong();
    map.addPanControl();  
    map.drawZoomAndCenter("San Francisco", 3);
    YEvent.Capture(map, EventsList.MouseDoubleClick , placefinder.cb);
  };
  function cb(_e, _c){
    placefinder.counter++;
    var mapCoordCenter = map.convertLatLonXY(map.getCenterLatLon());
    var currentGeoPoint = new YGeoPoint( _c.Lat, _c.Lon);
    getPlacefinderInfo(_c.Lat,_c.Lon);
    placeMarker(currentGeoPoint);
  };
  function datain(data,loc,line){
    locs.innerHTML += '<option value="'+loc+'">'+line+'</option>';
    if(!islive){
      locsform.className = 'live';
    }
    placefinder.data[placefinder.counter] = data;
    placefinder.names[placefinder.counter] = line;
    info.innerHTML = '<h2>'+line+' #'+placefinder.counter+'</h2>'+data;
  };
  locsform.onsubmit = function(){
    var sel = this.getElementsByTagName('select')[0];
    var loc = sel.options[sel.selectedIndex].value.split(',');
    var p = new YGeoPoint(loc[0],loc[1]);
    var current = sel.selectedIndex+1;
    placefinder.info.innerHTML = '<h2>' + placefinder.names[current] + ' #' +
                                  (current) + '</h2>' + 
                                  placefinder.data[current];
    map.panToLatLon(p);
    return false;
  };
  function getPlacefinderInfo(lat,lon){
    var url = 'placefinder.php?latlon='+lat+','+lon;
    var s = document.createElement('script');
    s.setAttribute('src',url);
    document.getElementsByTagName('head')[0].appendChild(s);
  };
  function placeMarker(geoPoint){
    var newMarker= new YMarker(geoPoint);
    newMarker.addLabel(placefinder.counter);
    YEvent.Capture(newMarker, EventsList.MouseClick, 
      function(i){
        var count =  i.thisObj.dom.getElementsByTagName('div')[0].innerHTML;
        info.innerHTML = '<h2>'+placefinder.names[count]+' #' + count +
                         '</h2>'+ placefinder.data[count];
      });
    map.addOverlay(newMarker);
  }
  return{cb:cb,datain:datain,counter:counter,data:data,info:info,
         locs:locs,locsform:locsform,startMap:startMap,names:names};
}();
placefinder.startMap();