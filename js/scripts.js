

window.onload = addEventListeners;

function addEventListeners() {
  document.getElementById('scroll-down').addEventListener('click', scrollDown, false);
}

function scrollDown() {
    window.scrollBy(0, window.innerHeight);
}