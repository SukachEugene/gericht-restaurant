

// let timer
self.addEventListener('message', function (e) {
    let { current_month, current_year, seconds, minutes, hours, days, months } = e.data;

    let timer = setInterval(function () {
        checkTime();
        self.postMessage({ days, hours, minutes, seconds, months });
    }, 1000);


    function checkTime() {

        // first check if point time has come
        if (months == 0 && days == 0 && hours == 0 && minutes == 0 && seconds == 0) {
            return;
        }

        // change seconds
        if (seconds != 0) {
            seconds--;
        } else if (minutes != 0) {
            seconds = 59;
            minutes--;
        }

        // change minutes
        if (minutes == 0 && hours != 0) {
            minutes = 59;
            hours--;
        }

        // change hours
        if (hours == 0 && days != 0) {
            hours = 23;
            days--;
        }

        // change days
        if (days == 0 && months != 0) {

            current_month++;

            let daysInNextMonth = new Date(current_year, current_month, 0).getDate();

            days = daysInNextMonth;
            months--;
        }
    }

}, false);

