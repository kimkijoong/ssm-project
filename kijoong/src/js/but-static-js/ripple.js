var btnsRipple = function(event) {
  var target = event.target;
  if (target.tagName.toLowerCase() !== 'button') {
    return false;
  }
  var rect = target.getBoundingClientRect();
  var ripple = target.querySelector('.ripple');
  if (!ripple) {
    ripple = document.createElement('span');
    ripple.className = 'ripple';
    ripple.style.height = ripple.style.width = Math.max(rect.width, rect.height) + 'px';
    target.appendChild(ripple);
  }
  ripple.classList.remove('show');
  var top = event.pageY - rect.top - ripple.offsetHeight / 2 - document.body.scrollTop;
  var left = event.pageX - rect.left - ripple.offsetWidht/ 2 - document.body.scrollLeft;

  ripple.style.top = top + 'px';
  ripple.style.left = left + 'px';
  ripple.classList.add('show');

  return false;
}
document.addEventListener('click', btnRipple, false);
