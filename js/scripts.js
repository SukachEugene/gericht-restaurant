

window.onload = function () {
  addEventListeners();
  fixDownloadOfSliderOne();
  makeVideoBannerControlButton();
  makeVideoControlButton();
  makeTimer();
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
function makeVideoBannerControlButton() {


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



// video mechanic
function makeVideoControlButton() {

  let video = document.getElementById("video");
  let playButton = document.getElementById("play-video-button");

  if (video == null) {
    return;
  }

  playButton.addEventListener("click", function () {

    video.play();
    playButton.style.opacity = "1";

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



// Coming soon timer

let current_month
let current_year

function makeTimer() {

  let days_element = document.getElementById('days');

  current_month = days_element.dataset.month + 1;  // becouse ctart count is 0
  current_year = days_element.dataset.year;

  let timer = setInterval(function () {
    checkTime(current_month, current_year);
  }, 1000);

}

function checkTime(m, y) {
  let seconds_element = document.getElementById('seconds');
  let seconds = seconds_element.innerHTML;

  let minutes_element = document.getElementById('minutes');
  let minutes = minutes_element.innerHTML;

  let hours_element = document.getElementById('hours');
  let hours = hours_element.innerHTML;

  let days_element = document.getElementById('days');
  let days = days_element.innerHTML;

  let months_element = document.getElementById('months');
  let months = months_element.innerHTML;
  

  // first check if point time has come
  if (months == 0 && days == 0 && hours == 0 && minutes == 0 && seconds == 0) {
    return;
  }

  // change seconds
  if (seconds != 0) {
    seconds--;
    seconds_element.innerHTML = seconds;
  } else {
    seconds_element.innerHTML = 59;

    minutes--;
    minutes_element.innerHTML = minutes;
  }

  // change minutes
  if (minutes == 0) {
    minutes_element.innerHTML = 59;

    hours--;
    hours_element.innerHTML = hours;
  }

  // change hours
  if (hours == 0) {
    hours_element.innerHTML = 23;

    days--;
    days_element.innerHTML = days;
    
  }

    // change days
    if (days == 0) {

      current_month++;

      let daysInNextMonth = new Date(y, m, 0).getDate();
      
      console.log(daysInNextMonth)
      
      days_element.innerHTML = daysInNextMonth;
  
      months--;
      months_element.innerHTML = months;
    }
  

}


