document.getElementById("barcode").focus();
$(document).ready(function () {
	var padder = function (n) {
		return (n < 10 ? "0" : "") + n;
	};
	var changeMe = function (ele, val) {
		if (ele.data("val") === val) {
			return;
		}
		ele.data("val", val);
		ele.parent().toggleClass("flip");
		ele.fadeOut(100, function () {
			$(this).html(val).fadeIn(100);
		});
		ele.html(val);
	};
	var hourC = $(".hour .clock-val");
	var minC = $(".minute .clock-val");
	var secC = $(".second .clock-val");
	window.setInterval(function () {
		var d = new Date();

		changeMe(hourC, padder(d.getHours()));
		changeMe(minC, padder(d.getMinutes()));
		changeMe(secC, padder(d.getSeconds()));
	}, 1000);
});

function currentTime() {
	var date = new Date(); /* creating object of Date class */
	var hour = date.getHours();
	var min = date.getMinutes();
	var sec = date.getSeconds();
	hour = updateTime(hour);
	min = updateTime(min);
	sec = updateTime(sec);
	// document.getElementById("clocknow").innerText = hour + " : " + min + " : " + sec; /* adding time to the div */

	var months = [
		"Januari",
		"Februari",
		"Maret",
		"April",
		"Mei",
		"Juni",
		"Juli",
		"Agustus",
		"September",
		"Oktober",
		"November",
		"Desember",
	];
	var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

	var curWeekDay = days[date.getDay()]; // get day
	var curDay = date.getDate(); // get date
	var curMonth = months[date.getMonth()]; // get month
	var curYear = date.getFullYear(); // get year
	var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear; // get full date
	document.getElementById("datenow").innerHTML = date;

	var t = setTimeout(function () {
		currentTime();
	}, 1000); /* setting timer */
}

function updateTime(k) {
	if (k < 10) {
		return "0" + k;
	} else {
		return k;
	}
}

if (document.getElementById("clocknow")) {
	currentTime(); /* calling currentTime() function to initiate the process */
}
