

window.onload = function () {
  addEventListeners();

  fixDownloadOfSliderOne();
  makeVideoBannerControlButton();
  makeVideoControlButton();

  if (document.querySelector('.page-coming-soon')) {
    makeTimer();
  }

  if (document.querySelector('.section-faq')) {
    makeFAQ();
  }

  if (document.querySelector('.section-single-blog-post')) {
    teleportLikesButton();
    makeCorrectWithForHeading();
    makeCorrectReplyScroll();
  }

}


function addEventListeners() {
  if (document.getElementById('scroll-down') != null) {
    document.getElementById('scroll-down').addEventListener('click', scrollDown, false);
  }
  document.getElementById('scroll-top').addEventListener('click', scrollTop, false);
  addEventLictenerToClass('click', 'menu-filter', menuFilter, false);

  document.getElementById('open-main-nav').addEventListener('click', menuSwitch, false);
  document.getElementById('close-main-nav').addEventListener('click', menuSwitch, false);


  // Variable for controlling correct change of nav menu size and appearance
  let query = window.matchMedia("(max-width: 800px)");
  // Event listener for closeMenu function
  query.addEventListener('change', closeMenu);

}

function scrollDown() {
  let headerHeight = document.getElementById('header').offsetHeight;
  window.scrollTo({
    top: window.innerHeight - headerHeight,
    behavior: 'smooth'
  });
}

function scrollTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
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

  let seconds_element = document.getElementById('seconds');
  let minutes_element = document.getElementById('minutes');
  let hours_element = document.getElementById('hours');
  let days_element = document.getElementById('days');
  let months_element = document.getElementById('months');

  if (days_element) {
    current_month = days_element.dataset.month;
    current_year = days_element.dataset.year;
  }


  let worker = new Worker('../wp-content/themes/Gericht/js/timeWorker.js');
  worker.postMessage({
    current_month: current_month,
    current_year: current_year,
    seconds: parseInt(seconds_element.textContent),
    minutes: parseInt(minutes_element.textContent),
    hours: parseInt(hours_element.textContent),
    days: parseInt(days_element.textContent),
    months: parseInt(months_element.textContent),
  });

  worker.onmessage = function (event) {
    const { days, hours, minutes, seconds, months } = event.data;
    seconds_element.innerHTML = seconds;
    minutes_element.innerHTML = minutes;
    hours_element.innerHTML = hours;
    days_element.innerHTML = days;
    months_element.innerHTML = months;

    if (months == 0 && days == 0 && hours == 0 && minutes == 0 && seconds == 0) {
      makeEndTimerAnimation();
    }
  };

}

function makeEndTimerAnimation() {

  let array = Array.from(document.getElementsByClassName('number'));

  array.forEach(element => {
    if (element.classList.contains('active')) {
      element.classList.remove('active')
    } else {
      element.classList.add('active');
    }
  });

}




// FAQ mechanic
function makeFAQ() {
  addEventLictenerToClass("click", "faq-element", showFAQ, false)
}

function showFAQ(e) {
  element = e.target;

  // get all FAQ element
  while (!element.classList.contains("faq-element")) {
    element = element.parentNode;
  }

  if (element.classList.contains("active")) {
    element.classList.remove("active");
  } else {
    removeClassByClassList("faq-element", "active")
    element.classList.add('active');
  }

}



// Likes element transform position
function teleportLikesButton() {
  let element = document.getElementsByClassName('pld-like-dislike-wrap')[0];
  let container = document.getElementById('likes-container');
  container.appendChild(element);
}



// make correct width for heading in post's block without picture
function makeCorrectWithForHeading() {
  let blocks = document.getElementsByClassName('text-content-element-in-post');

  for (i = 0; i < blocks.length; i++) {

    if (!blocks[i].querySelector('.post-content-image-right') && !blocks[i].querySelector('.post-content-image-left')) {
      let header = blocks[i].querySelector("h3");
      if (header) {
        header.style.width = '100%';
      }
    }

  }
}



function makeCorrectReplyScroll() {
  let element = document.getElementById('reply-title');
  let link = element.querySelector('a');

  link.addEventListener('click', function (event) {

    event.preventDefault();

    let id = link.href.split('#')[1];
    let comment = document.getElementById(id);

    const offset = -150; //height of header
    const bodyRect = document.body.getBoundingClientRect().top;
    const elementRect = comment.getBoundingClientRect().top;
    const elementPosition = elementRect - bodyRect;
    const offsetPosition = elementPosition + offset;

    window.scrollTo({
      top: offsetPosition,
      behavior: "smooth"
    });

    console.log(offsetPosition)

  });
}





// mobile menu
function menuSwitch() {

  let openButton = document.getElementById('open-main-nav');
  let closeButton = document.getElementById('close-main-nav');

  let element1 = document.getElementsByClassName('menu-header-menu-container')[0];
  let element2 = document.getElementsByClassName('header-elements-right-part')[0];


  if (openButton.className == 'show') {

    openButton.className = 'hide'
    closeButton.className = 'show';

    element1.style.display = 'flex'
    element2.style.display = 'flex'

  } else {

    openButton.className = 'show'
    closeButton.className = 'hide';

    element1.style.display = 'none'
    element2.style.display = 'none'
  }

}


// For correct appearance of nav menu with different width of view vindow
function closeMenu(inputQuery) {

  console.log("++")

  let openButton = document.getElementById('open-main-nav');
  let closeButton = document.getElementById('close-main-nav');

  let element1 = document.getElementsByClassName('menu-header-menu-container')[0];
  let element2 = document.getElementsByClassName('header-elements-right-part')[0];


  if (openButton.className == 'hide') {
    openButton.className = 'show'
  } 

  if (closeButton.className == 'show') {
    closeButton.className = 'hide';
  }

  element1.style.display = 'flex';
  element2.style.display = 'flex';




  if (inputQuery.currentTarget.matches) {

    if (element1.style.display == 'flex') {
      element1.style.display = 'none'
    }

    if (element2.style.display == 'flex') {
      element2.style.display = 'none'
    }


  }
}










