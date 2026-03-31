window.htmlEscape = function(text) {
  return String(text)
    .replaceAll("&", "&amp")
    .replaceAll("<", "&lt")
    .replaceAll(">", "&gt")
    .replaceAll('"', "&quot")
    .replaceAll("'", "&#39");
}