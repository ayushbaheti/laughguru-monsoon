var logUrlEvent = function(url) {
	if (ga) {
    var l = window.location.pathname;
    ga('send', 'pageview', l.substring(0, l.lastIndexOf('/') + 1) + url);
	}	
};

var logFeedbackOpenEvent = function() {
  if (ga) {
    var subjectId = 'N/A';
    ga('send', 'event', {
      'eventCategory': 'Feedback',
      'eventAction': 'Shown',
      'eventLabel': subjectId
    });
  }
};
