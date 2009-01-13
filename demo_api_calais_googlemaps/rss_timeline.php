<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<script src="http://simile.mit.edu/timeline/api/timeline-api.js" type="text/javascript"></script>
		<style >
			#t { overflow-x:hidden; overflow-y:scroll;}
		
		</style>


		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>RSS-TIMELINE</title>
		<script language="JavaScript">
		  var tl;
        function onLoad(){
			var eventSource = new Timeline.DefaultEventSource(0);
			
			var theme = Timeline.ClassicTheme.create();
			//theme.event.bubble.width = 320;
			//theme.event.bubble.height = 400;
			var d = Timeline.DateTime.parseGregorianDateTime("2009")
			var bandInfos = [Timeline.createBandInfo({
				eventSource: eventSource,
				date: "Jan 13 2009 00:00:00 GMT",
				width: "80%",
				intervalUnit: Timeline.DateTime.DAY,
				intervalPixels: 100
			}), 
			Timeline.createBandInfo({
				showEventText: false,
				trackHeight: 0.5,
				trackGap: 0.4,
				eventSource: eventSource,
				date: "Jan 13 2009 00:00:00 GMT",
				width: "20%",
				intervalUnit: Timeline.DateTime.DAY,
				intervalPixels: 50
			})];
			bandInfos[1].syncWith = 0;
			bandInfos[1].highlight = true;
			
			tl = Timeline.create(document.getElementById("t"), bandInfos, Timeline.HORIZONTAL);
			tl.loadJSON("cubism.js", function(json, url){
				eventSource.loadJSON(json, url);
			});
		}

        var resizeTimerID = null;
        function onResize() {
            if (resizeTimerID == null) {
                resizeTimerID = window.setTimeout(function() {
                    resizeTimerID = null;
                    t.layout();
                }, 500);
            }
        }

		</script>
		
	</head>
	<body onload="onLoad();" onresize="onResize();">
		<div id="t" style="height: 400px; border: 1px solid #aaa"></div>
		
	</body>
</html>
