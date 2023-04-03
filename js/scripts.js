

window.onload = function () {
  addEventListeners();
  fixDownloadOfSliderOne();
  makeVideoControlButton();
}

function addEventListeners() {
  if (document.getElementById('scroll-down') != null) {
    document.getElementById('scroll-down').addEventListener('click', scrollDown, false);
  }
  document.getElementById('scroll-top').addEventListener('click', scrollTop, false);
  addEventLictenerToClass('click', 'menu-filter', menuFilter, false);

}

function scrollDown() {
  let headerHeight = document.getElementById('header').offsetHeight;
  window.scrollTo(0, window.innerHeight - headerHeight);
}

function scrollTop() {
  window.scrollTo(0, 0);
}

function addEventLictenerToClass(listener, className, functionName, boolean) {
  let list = document.getElementsByClassName(className);
  for (i = 0; i < list.length; i++) {
    list[i].addEventListener(listener, functionName, boolean);
  }
}

function removeClassByClassList(className, removeClass) {
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
  removeClassByClassList('menu-filter', 'active');
  removeClassByClassList('menu-banner', 'active');
  removeClassByClassList('menu-details-container-positions', 'active');

  element = e.target;
  element.classList.add('active');

  let position = getPositionOfElementInArray('menu-filter', element);
  addClassToElementOnPosition('menu-banner', position, 'active');
  addClassToElementOnPosition('menu-details-container-positions', position, 'active');
}



// fix vith visibility of hidden slides in page download's moment
function fixDownloadOfSliderOne() {
  let list = document.getElementsByClassName('slider-one');

  for (i = 0; i < list.length; i++) {
    list[i].style.opacity = '1';
    list[i].style.visibility = 'visible';
  }
}



// // video banner mechanic
function makeVideoControlButton() {

  let video = document.getElementById("video-banner");
  let playButton = document.getElementById("play-video-banner-button");
  let logo = document.getElementById("section-video-logo");

  if (video == null) {
    return;
  }

  playButton.addEventListener("click", function () {


    video.play();


    playButton.style.opacity = "1";
    logo.style.opacity = "0";
  });

  video.addEventListener("play", function () {
    playButton.style.opacity = "0";
    playButton.style.zIndex = "-1";
    video.style.cursor = "pointer"
  });

  video.addEventListener("pause", function () {
    playButton.style.opacity = "1";
    playButton.style.zIndex = "2";
    video.style.cursor = "auto"
    logo.style.opacity = "1";

    logo.addEventListener('mouseover', function () {
      logo.style.opacity = "0";
    })

    logo.addEventListener('mouseout', function () {
      logo.style.opacity = "1";
    })

  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      video.pause();
    }
  });

  video.addEventListener("click", function () {
    if (!video.paused) {
      video.pause();
    }
  });

}




