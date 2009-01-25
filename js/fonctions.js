/**
 * @author B.bachir Master Thyp 2009
 */

<script type="text/javascript" language="JavaScript" src="js/Timeline/api/timeline-api.js"></script>
/* loadTimeline : permet de charger le timeline dans le div elemnt div 
 * 
 */
function loadTimeline(elemntdiv, data_json){
	
	
	var eventSource = Timeline.DefaultEventSource();
	
	for(var i=0;i<data_json['events'].length;i++) {
	  var dateEvent = new Date();
	  var sec=data_json['events'][i]['start'];
	  dateEvent.setTime(sec * 1000);
	  var evt = new Timeline.DefaultEventSource.Event(
         dateEvent,
		 dateEvent,
		 dateEvent,
		 dateEvent,         
         true, //instant
         data_json['events'][i]['title'], //text
         data_json['events'][i]['description'], //description
         data_json['events'][i]['image'],
		 data_json['events'][i]['link'],
		 data_json['events'][i]['icon'] 
      );
      eventSource.add(evt);
  	}
	
	var bandInfos = [
    Timeline.createBandInfo({
        trackGap:       0.2,
        width:          "80%", 
        intervalUnit:   Timeline.DateTime.HOUR, 
        intervalPixels: 50,
        eventSource: eventSource
    }),
    Timeline.createBandInfo({
        showEventText:  false,
        trackHeight:    0.5,
        trackGap:       0.2,
        width:          "20%", 
        intervalUnit:   Timeline.DateTime.DAY, 
        intervalPixels: 100,
        eventSource: eventSource
    })
  ];
  bandInfos[1].syncWith = 0;
  bandInfos[1].highlight = true;
  tl = Timeline.create(document.getElementById(elemntdiv), bandInfos,0);
}

