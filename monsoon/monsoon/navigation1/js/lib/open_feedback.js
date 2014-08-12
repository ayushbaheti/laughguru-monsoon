var openFeedback = function() {
  if (typeof logFeedbackOpenEvent == 'function') {
    logFeedbackOpenEvent();
  }
  window.open('#openModal', '_self');
};
