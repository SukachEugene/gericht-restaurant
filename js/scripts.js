

window.onload = addEventListeners;

function addEventListeners() {
  document.getElementById('scroll-down').addEventListener('click', scrollDown, false);
  addEventLictenerToClass('click', 'menu-filter', menuFilter, false);

}

function scrollDown() {
    let headerHeight = document.getElementById('header').offsetHeight;
    window.scrollTo(0, window.innerHeight - headerHeight);
}

function addEventLictenerToClass (listener, className, functionName, boolean) {
  let list = document.getElementsByClassName(className);
  for (i = 0; i < list.length; i++) {
    list[i].addEventListener(listener, functionName, boolean);
  }
}

function removeClassByClassList (className, removeClass) {
  let list = document.getElementsByClassName(className);
  for (i = 0; i < list.length; i++) {
    if (list[i].classList.contains(removeClass)) {
    list[i].classList.remove(removeClass);
    }
  }
}

function getPositionOfElementInArray(className, element) {
  let list = document.getElementsByClassName(className);
  for (i = 0; i < list.length; i++) {
    if (list[i] == element) {
    return i
    }
  }
}

function addClassToElementOnPosition(className, position, addClass) {
  let list = document.getElementsByClassName(className);
  list[position].classList.add(addClass);
}

function menuFilter(e) {
  removeClassByClassList('menu-filter','active');
  removeClassByClassList('menu-banner','active');
  removeClassByClassList('menu-details-container-positions','active');

  element = e.target;
  element.classList.add('active');

  let position = getPositionOfElementInArray('menu-filter', element);
  addClassToElementOnPosition('menu-banner', position, 'active');
  addClassToElementOnPosition('menu-details-container-positions', position, 'active');
}



// fix vith visibility of hidden slides in page download's moment
window.onload = fixDownloadOfSliderOne

function fixDownloadOfSliderOne() {
  let list = document.getElementsByClassName('slider-one');

  for (i = 0; i < list.length; i++) {
    list[i].style.opacity = '1';
    list[i].style.visibility = 'visible';
  }
}






