/*
The MIT License (MIT)

Copyright (c) 2013 Chris Silich

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/


/*
v0.4 Features Wanted
	A few more options for transition, i.e. flash fade vs crossfade, maybe a slide or two.
*/


var Ace = Ace || {};

Ace.slideshow = function(options) {

	try {console.log("Creating AceSlideshow v0.4 in element \"" + options.element + "\", with slides: ", options.slides);} catch(e) {}
	
	function shuffle(a) {
		return a.sort(function(){return (Math.round(Math.random())-0.5)})
	}


	// translate simple slide list into complex
	for (var i = 0; i < options.slides.length; i++) {
		if (typeof options.slides[i]  === 'string') {
			options.slides[i] = {src: options.slides[i]};
		}
	};
	

	if (!options.hasOwnProperty("debug")) options.debug = true;
	if (!options.hasOwnProperty("fade_time")) options.fade_time = 400;
	if (!options.hasOwnProperty("time_between")) options.time_between = 3000;
	if (!options.hasOwnProperty("shuffle")) options.shuffle = false;
	if (!options.hasOwnProperty("random_start")) options.random_start = false;
	if (!options.hasOwnProperty("preload")) options.preload = true;
	if (!options.hasOwnProperty("loop")) options.loop = true;
	if (!options.hasOwnProperty("mouse_over_pause")) options.mouse_over_pause = false;
	if (!options.hasOwnProperty("title_element")) options.title_element = "";
	if (!options.hasOwnProperty("other_1_element")) options.other_1_element = "";
	if (!options.hasOwnProperty("other_2_element")) options.other_2_element = "";
	if (!options.hasOwnProperty("other_3_element")) options.other_3_element = "";
	if (!options.hasOwnProperty("indicator_element")) options.indicator_element = "a";
	if (!options.hasOwnProperty("indicator_container")) options.indicator_container = "";

	if (typeof options.element == "string") {
		options.element = document.getElementById(options.element);
	}
	if (typeof options.other_1_element == "string") {
		options.other_1_element = document.getElementById(options.other_1_element);
	}
	if (typeof options.other_2_element == "string") {
		options.other_2_element = document.getElementById(options.other_2_element);
	}
	if (typeof options.other_3_element == "string") {
		options.other_3_element = document.getElementById(options.other_3_element);
	}
	if (typeof options.indicator_container == "string") {
		options.indicator_container = document.getElementById(options.indicator_container);
	}




	var element = options.element;
	var last = options.slides.length - 1;
	var images = [];
	var indicators = [];
	var currentImageIndex = 0;
	var timeout;



	if (element.style.position == "static") {
		var msg = "The element your slideshow is created in must have a non-\"static\" position in it's CSS. Turn the debug option to false to hide this message.";
		if (options.debug) {
			alert(msg);
		} else {
			try {console.log(msg);} catch(e) {}
		}
	}
	if (parseInt(element.style.height) == 0 || !element.style.height) {
		var msg = "The element your slideshow is created in currently has zero height. Give it dimensions in CSS, or you're going to have some crazy overlapping layout problems. Turn the debug option to false to hide this message.";
		if (options.debug) {
			alert(msg);
		} else {
			try {console.log(msg);} catch(e) {}
		}
	}


	


	if (options.mouse_over_pause) {
		try {
			element.addEventListener("mouseover", function() {
				clearTimeout(timeout);
			})
			element.addEventListener("mouseout", function() {
				clearTimeout(timeout);
				timeout = setTimeout(loadImage, options.time_between);
			})
		} catch(e) {
			var msg = "Mouse over hiding is not supported on old versions of IE.";
			if (options.debug) {
				try {console.log(msg);} catch(e) {}
			} else {}
		}
	}



	if (options.shuffle) {
		options.slides = shuffle(options.slides)
	}
	if (options.random_start) {
		var i = Math.floor(Math.random() * options.slides.length) + 1;
		while (i--) {
			options.slides.push(options.slides.shift());
		}
	}



	// create the indicators
	if (options.indicator_container && typeof options.indicator_container != "undefined") { 
		for (var i = 0; i < options.slides.length; i++) {
			//options.slides[i]
			var newIndicator = document.createElement(options.indicator_element);
			indicators.push(newIndicator);
			options.indicator_container.appendChild(newIndicator);
			newIndicator.indicatorIndex = i;
			newIndicator.style.cursor = "pointer";
			newIndicator.onclick = function(e) {
				e.preventDefault();
				currentImageIndex = this.indicatorIndex;
				loadImage();
				clearTimeout(timeout);
			}
		};
	}



	function loadImage() {
		if (currentImageIndex >= options.slides.length) {
			try {console.log("Hit end of slideshow, and loop is off.");} catch(e) {}
			return;
		}
		if (currentImageIndex == images.length) {
			try {console.log("Loading "+options.slides[currentImageIndex].src);} catch(e) {}
			var newLink = document.createElement("a");
			if (options.slides[currentImageIndex].hasOwnProperty("href")) {
				newLink.href = options.slides[currentImageIndex].href
				if (options.slides[currentImageIndex].hasOwnProperty("new_window") && options.slides[currentImageIndex].new_window) {
					newLink.setAttribute("target", "_blank");
				}
			}
			if (options.slides[currentImageIndex].hasOwnProperty("alt")) {
				newLink.setAttribute("title", options.slides[currentImageIndex].alt);
				newLink.setAttribute("alt", options.slides[currentImageIndex].alt);
			}
			newLink.nicesrc = options.slides[currentImageIndex].src;
			var newImage = document.createElement("img");
			if (options.slides[currentImageIndex].hasOwnProperty("alt")) {
				newImage.setAttribute("title", options.slides[currentImageIndex].alt);
				newImage.setAttribute("alt", options.slides[currentImageIndex].alt);
			}
			newLink.appendChild(newImage);
			newImage.src = options.slides[currentImageIndex].src;
			newImage.onload = changeImage;
			images.push(newLink);
		} else {
			changeImage();
		}
	}




	function preloadImages() {
		for (var i = 0; i < options.slides.length; i++) {
			
			if (i == images.length) {
				try {console.log("Preloading "+options.slides[i].src);} catch(e) {}
				var newLink = document.createElement("a");
				if (options.slides[i].hasOwnProperty("href")) newLink.href = options.slides[i].href;
				if (options.slides[i].hasOwnProperty("href")) {
					if (options.slides[i].hasOwnProperty("new_window") && options.slides[i].new_window) {
						newLink.setAttribute("target", "_blank");
					}
				}
				if (options.slides[i].hasOwnProperty("alt")) {
					newLink.setAttribute("title", options.slides[i].alt);
					newLink.setAttribute("alt", options.slides[i].alt);
				}
				newLink.nicesrc = options.slides[i].src;
				var newImage = document.createElement("img");
				if (options.slides[i].hasOwnProperty("alt")) {
					newImage.setAttribute("title", options.slides[i].alt);
					newImage.setAttribute("alt", options.slides[i].alt);
				}
				newLink.appendChild(newImage);
				newImage.src = options.slides[i].src;
				images.push(newLink);
			}
		}
	}

	function changeImage() {
		
		try {console.log("Showing "+images[currentImageIndex].nicesrc);} catch(e) {}

		images[currentImageIndex].onload = null;
		images[currentImageIndex].style.display = "block";
		images[currentImageIndex].style.opacity = 0;
		images[currentImageIndex].style.position = "absolute";
		
		element.appendChild(images[currentImageIndex]);

		if (options.title_element) {
			if (options.slides[currentImageIndex].hasOwnProperty("title")) {
				options.title_element.innerHTML = options.slides[currentImageIndex].title;
			} else {
				options.title_element.innerHTML = "";
			}
		}
		if (options.other_1_element) {
			if (options.slides[currentImageIndex].hasOwnProperty("other_1")) {
				options.other_1_element.innerHTML = options.slides[currentImageIndex].other_1;
			} else {
				options.other_1_element.innerHTML = "";
			}
		}
		if (options.other_2_element) {
			if (options.slides[currentImageIndex].hasOwnProperty("other_2")) {
				options.other_2_element.innerHTML = options.slides[currentImageIndex].other_2;
			} else {
				options.other_2_element.innerHTML = "";
			}
		}
		if (options.other_3_element) {
			if (options.slides[currentImageIndex].hasOwnProperty("other_3")) {
				options.other_3_element.innerHTML = options.slides[currentImageIndex].other_3;
			} else {
				options.other_3_element.innerHTML = "";
			}
		}


		function transitionComplete() {
			
			// $(images).each(function(i) {
			// 	if (i != currentImageIndex) $(images[i]).remove();
			// })
			while (element.children.length > 1) {
				element.removeChild(element.children[0]);
			}
			
			currentImageIndex++;
			if (options.loop && currentImageIndex > last) {
				currentImageIndex = 0;
			}
			
		}


		// the animation part!
		if (typeof TweenLite != "undefined") {
			console.log("using TweenLite");
			TweenLite.to(images[currentImageIndex], options.fade_time/1000, {opacity: 1, onComplete: transitionComplete});
		} else if (typeof jQuery != "undefined") {
			jQuery(images[currentImageIndex]).animate({opacity: 1}, {duration: options.fade_time,  complete: transitionComplete });
		} else {
			// css3? nope, instant for now
			images[currentImageIndex].style.display = "block";
			images[currentImageIndex].style.opacity = 1;
			transitionComplete();
		}


		// change the indicators
		if (indicators.length) {
			for (var i = 0; i < indicators.length; i++) {
				indicators[i].className = "";
			};
			indicators[currentImageIndex].className = "active";
		}


		if (options.preload) {
			options.preload = false;
			preloadImages();
		}

		timeout = setTimeout(loadImage, options.time_between);
	}


	loadImage();

}
