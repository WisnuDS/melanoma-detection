/**
 * Global variables
 */
"use strict";
(function () {
	let
		userAgent = navigator.userAgent.toLowerCase(),
		isIE = userAgent.indexOf("msie") !== -1 ? parseInt(userAgent.split("msie")[1], 10) : userAgent.indexOf("trident") !== -1 ? 11 : userAgent.indexOf("edge") !== -1 ? 12 : false;
	
	// Unsupported browsers
	if (isIE !== false && isIE < 12) {
		console.warn("[Core] detected IE" + isIE + ", load alert");
		var script = document.createElement("script");
		script.src = "./js/support.js";
		document.querySelector("head").appendChild(script);
	}
	
	let
		initialDate = new Date(),
		
		$document = $(document),
		$window = $(window),
		$html = $("html"),
		$body = $("body"),
		
		isDesktop = $html.hasClass("desktop"),
		isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
		isFirefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1,
		isRtl = $html.attr("dir") === "rtl",
		windowReady = false,
		onloadCaptchaCallback,
		isNoviBuilder = window.xMode,

		plugins = {
			pointerEvents: isIE < 11 ? "js/pointer-events.min.js" : false,
			bootstrapModalDialog: $('.modal'),
			rdNavbar: $(".rd-navbar"),
			maps: $(".google-map-container"),
			rdMailForm: $(".rd-mailform"),
			rdInputLabel: $(".form-label"),
			regula: $("[data-constraints]"),
			owl: $(".owl-carousel"),
			swiper: $('.swiper-container'),
			isotope: $(".isotope"),
			popover: $('[data-bs-toggle="popover"]'),
			viewAnimate: $('.view-animate'),
			lightGallery: $("[data-lightgallery='group']"),
			lightGalleryItem: $("[data-lightgallery='item']"),
			lightDynamicGalleryItem: $("[data-lightgallery='dynamic']"),
			radio: $("input[type='radio']"),
			checkbox: $("input[type='checkbox']"),
			customToggle: $("[data-custom-toggle]"),
			counter: $(".counter"),
			pageLoader: $(".preloader"),
			customParallax: $(".custom-parallax"),
			countDown: $(".countdown"),
			bootstrapDateTimePicker: $("[data-time-picker]"),
			customWaypoints: $('[data-custom-scroll-to]'),
			captcha: $('.recaptcha'),
			materialParallax: $(".parallax-container"),
			wow: $(".wow")
		};

	/**
	 * Page loader
	 * @description Enables Page loader
	 */
	if (plugins.pageLoader.length > 0 && !isNoviBuilder) {
		$window.on('load', function () {
			plugins.pageLoader.fadeOut('slow');
			$window.trigger("resize");
		});
	} else {
		plugins.pageLoader.remove();
	};

	/**
	 * Initialize All Scripts
	 */
	$(function () {
		
		/**
		 * Wrapper to eliminate json errors
		 * @param {string} str - JSON string
		 * @returns {object} - parsed or empty object
		 */
		function parseJSON ( str ) {
			try {
				if ( str )  return JSON.parse( str );
				else return {};
			} catch ( error ) {
				console.warn( error );
				return {};
			}
		}
		
		/**
		 * @desc Sets the actual previous index based on the position of the slide in the markup. Should be the most recent action.
		 * @param {object} swiper - swiper instance
		 */
		function setRealPrevious(swiper) {
			let element = swiper.$wrapperEl[0].children[swiper.activeIndex];
			swiper.realPrevious = Array.prototype.indexOf.call(element.parentNode.children, element);
		}
		
		/**
		 * @desc Sets slides background images from attribute 'data-slide-bg'
		 * @param {object} swiper - swiper instance
		 */
		function setBackgrounds(swiper) {
			let swipersBg = swiper.el.querySelectorAll('[data-slide-bg]');
			
			for (let i = 0; i < swipersBg.length; i++) {
				let swiperBg = swipersBg[i];
				swiperBg.style.backgroundImage = 'url(' + swiperBg.getAttribute('data-slide-bg') + ')';
			}
		}
		
		/**
		 * @desc Animate captions on active slides
		 * @param {object} swiper - swiper instance
		 */
		function initCaptionAnimate(swiper) {
			let
				animate = function (caption) {
					return function () {
						let duration;
						if (duration = caption.getAttribute('data-caption-duration')) caption.style.animationDuration = duration + 'ms';
						caption.classList.remove('not-animated');
						caption.classList.add(caption.getAttribute('data-caption-animate'));
						caption.classList.add('animated');
					};
				},
				initializeAnimation = function (captions) {
					for (let i = 0; i < captions.length; i++) {
						let caption = captions[i];
						caption.classList.remove('animated');
						caption.classList.remove(caption.getAttribute('data-caption-animate'));
						caption.classList.add('not-animated');
					}
				},
				finalizeAnimation = function (captions) {
					for (let i = 0; i < captions.length; i++) {
						let caption = captions[i];
						if (caption.getAttribute('data-caption-delay')) {
							setTimeout(animate(caption), Number(caption.getAttribute('data-caption-delay')));
						} else {
							animate(caption)();
						}
					}
				};
			
			// Caption parameters
			swiper.params.caption = {
				animationEvent: 'slideChangeTransitionEnd'
			};
			
			initializeAnimation(swiper.$wrapperEl[0].querySelectorAll('[data-caption-animate]'));
			finalizeAnimation(swiper.$wrapperEl[0].children[swiper.activeIndex].querySelectorAll('[data-caption-animate]'));
			
			if (swiper.params.caption.animationEvent === 'slideChangeTransitionEnd') {
				swiper.on(swiper.params.caption.animationEvent, function () {
					initializeAnimation(swiper.$wrapperEl[0].children[swiper.previousIndex].querySelectorAll('[data-caption-animate]'));
					finalizeAnimation(swiper.$wrapperEl[0].children[swiper.activeIndex].querySelectorAll('[data-caption-animate]'));
				});
			} else {
				swiper.on('slideChangeTransitionEnd', function () {
					initializeAnimation(swiper.$wrapperEl[0].children[swiper.previousIndex].querySelectorAll('[data-caption-animate]'));
				});
				
				swiper.on(swiper.params.caption.animationEvent, function () {
					finalizeAnimation(swiper.$wrapperEl[0].children[swiper.activeIndex].querySelectorAll('[data-caption-animate]'));
				});
			}
		}

		/**
		 * Google map function for getting latitude and longitude
		 */
		function getLatLngObject(str, marker, map, callback) {
			var coordinates = {};
			try {
				coordinates = JSON.parse(str);
				callback(new google.maps.LatLng(
					coordinates.lat,
					coordinates.lng
				), marker, map)
			} catch (e) {
				map.geocoder.geocode({'address': str}, function (results, status) {
					if (status === google.maps.GeocoderStatus.OK) {
						var latitude = results[0].geometry.location.lat();
						var longitude = results[0].geometry.location.lng();

						callback(new google.maps.LatLng(
							parseFloat(latitude),
							parseFloat(longitude)
						), marker, map)
					}
				})
			}
		}

		/**
		 * makeWaypointScroll
		 * @description  init smooth anchor animations
		 */
		function makeWaypointScroll(obj) {
			var $this = $(obj);
			if (!isNoviBuilder) {
				$this.on('click', function (e) {
					e.preventDefault();
					$("body, html").stop().animate({
						scrollTop: $("#" + $(this).attr('data-custom-scroll-to')).offset().top
					}, 1000, function () {
						$window.trigger("resize");
					});
				});
			}
		}

		/**
		 * initSwiperWaypoints
		 * @description  toggle waypoints on active slides
		 */
		function initSwiperWaypoints(swiper) {
			var prevSlide = $(swiper.container),
				nextSlide = $(swiper.slides[swiper.activeIndex]);

			prevSlide
				.find('[data-custom-scroll-to]')
				.each(function () {
					var $this = $(this);
					makeWaypointScroll($this);
				});

			nextSlide
				.find('[data-custom-scroll-to]')
				.each(function () {
					var $this = $(this);
					makeWaypointScroll($this);
				});
		}


		/**
		 * initOwlCarousel
		 * @description  Init owl carousel plugin
		 */
		function initOwlCarousel(c) {
			var aliaces = ["-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"],
				values = [0, 576, 768, 992, 1200,  1600],
				responsive = {};

			for (var j = 0; j < values.length; j++) {
				responsive[values[j]] = {};
				for (var k = j; k >= -1; k--) {
					if (!responsive[values[j]]["items"] && c.attr("data" + aliaces[k] + "items")) {
						responsive[values[j]]["items"] = k < 0 ? 1 : parseInt(c.attr("data" + aliaces[k] + "items"), 10);
					}
					if (!responsive[values[j]]["stagePadding"] && responsive[values[j]]["stagePadding"] !== 0 && c.attr("data" + aliaces[k] + "stage-padding")) {
						responsive[values[j]]["stagePadding"] = k < 0 ? 0 : parseInt(c.attr("data" + aliaces[k] + "stage-padding"), 10);
					}
					if (!responsive[values[j]]["margin"] && responsive[values[j]]["margin"] !== 0 && c.attr("data" + aliaces[k] + "margin")) {
						responsive[values[j]]["margin"] = k < 0 ? 30 : parseInt(c.attr("data" + aliaces[k] + "margin"), 10);
					}
				}
			}

			// Enable custom pagination
			if (c.attr('data-dots-custom')) {
				c.on("initialized.owl.carousel", function (event) {
					var carousel = $(event.currentTarget),
						customPag = $(carousel.attr("data-dots-custom")),
						active = 0;

					if (carousel.attr('data-active')) {
						active = parseInt(carousel.attr('data-active'), 10);
					}

					carousel.trigger('to.owl.carousel', [active, 300, true]);
					customPag.find("[data-owl-item='" + active + "']").addClass("active");

					customPag.find("[data-owl-item]").on('click', function (e) {
						e.preventDefault();
						carousel.trigger('to.owl.carousel', [parseInt(this.getAttribute("data-owl-item"), 10), 300, true]);
					});

					carousel.on("translate.owl.carousel", function (event) {
						customPag.find(".active").removeClass("active");
						customPag.find("[data-owl-item='" + event.item.index + "']").addClass("active")
					});
				});
			}

			c.on("initialized.owl.carousel", function () {
				initLightGallery($('[data-lightgallery="group-owl"]'), 'lightGallery-in-carousel');
				initLightGalleryItem($('[data-lightgallery="item-owl"]'), 'lightGallery-in-carousel');
			});

			c.owlCarousel({
				autoplay: isNoviBuilder ? false: c.attr("data-autoplay") === "true",
				loop: isNoviBuilder ? false : c.attr("data-loop") !== "false",
				items: 1,
				rtl: isRtl,
				center: c.attr("data-center") === "true",
				dotsContainer: c.attr("data-pagination-class") || false,
				navContainer: c.attr("data-navigation-class") || false,
				mouseDrag: isNoviBuilder ? false : c.attr("data-mouse-drag") !== "false",
				nav: c.attr("data-nav") === "true",
				dots: c.attr("data-dots") === "true",
				dotsEach: c.attr("data-dots-each") ? parseInt(c.attr("data-dots-each"), 10) : false,
				animateIn: c.attr('data-animation-in') ? c.attr('data-animation-in') : false,
				animateOut: c.attr('data-animation-out') ? c.attr('data-animation-out') : false,
				responsive: responsive,
				navText: function () {
					try {
						return JSON.parse(c.attr("data-nav-text"));
					} catch (e) {
						return [];
					}
				}(),
				navClass: function () {
					try {
						return JSON.parse(c.attr("data-nav-class"));
					} catch (e) {
						return ['owl-prev', 'owl-next'];
					}
				}()
			});
		}

		/**
		 * isScrolledIntoView
		 * @description  check the element whas been scrolled into the view
		 */
		function isScrolledIntoView(elem) {
			if (!isNoviBuilder) {
				return elem.offset().top + elem.outerHeight() >= $window.scrollTop() && elem.offset().top <= $window.scrollTop() + $window.height();
			}
			else {
				return true;
			}
		}

		/**
		 * @desc Calls a function when element has been scrolled into the view
		 * @param {object} element - jQuery object
		 * @param {function} func - init function
		 */
		function lazyInit( element, func ) {
			var scrollHandler = function () {
				if ( ( !element.hasClass( 'lazy-loaded' ) && ( isScrolledIntoView( element ) ) ) ) {
					func.call();
					element.addClass( 'lazy-loaded' );
				}
			};

			scrollHandler();
			$window.on( 'scroll', scrollHandler );
		}

		/**
		 * Owl carousel
		 * @description Enables Owl carousel plugin
		 */
		if (plugins.owl.length) {
			for (var i = 0; i < plugins.owl.length; i++) {
				var c = $(plugins.owl[i]);
				plugins.owl[i].owl = c;

				initOwlCarousel(c);
			}
		}

		/**
		 * attachFormValidator
		 * @description  attach form validation to elements
		 */
		function attachFormValidator(elements) {
			for (var i = 0; i < elements.length; i++) {
				var o = $(elements[i]), v;
				o.addClass("form-control-has-validation").after("<span class='form-validation'></span>");
				v = o.parent().find(".form-validation");
				if (v.is(":last-child")) {
					o.addClass("form-control-last-child");
				}
			}

			elements
				.on('input change propertychange blur', function (e) {
					var $this = $(this), results;

					if (e.type !== "blur") {
						if (!$this.parent().hasClass("has-error")) {
							return;
						}
					}

					if ($this.parents('.rd-mailform').hasClass('success')) {
						return;
					}

					if ((results = $this.regula('validate')).length) {
						for (i = 0; i < results.length; i++) {
							$this.siblings(".form-validation").text(results[i].message).parent().addClass("has-error")
						}
					} else {
						$this.siblings(".form-validation").text("").parent().removeClass("has-error")
					}
				})
				.regula('bind');

			var regularConstraintsMessages = [
				{
					type: regula.Constraint.Required,
					newMessage: "The text field is required."
				},
				{
					type: regula.Constraint.Email,
					newMessage: "The email is not a valid email."
				},
				{
					type: regula.Constraint.Numeric,
					newMessage: "Only numbers are required"
				},
				{
					type: regula.Constraint.Selected,
					newMessage: "Please choose an option."
				}
			];


			for (var i = 0; i < regularConstraintsMessages.length; i++) {
				var regularConstraint = regularConstraintsMessages[i];

				regula.override({
					constraintType: regularConstraint.type,
					defaultMessage: regularConstraint.newMessage
				});
			}
		}

		/**
		 * isValidated
		 * @description  check if all elemnts pass validation
		 */
		function isValidated(elements, captcha) {
			var results, errors = 0;

			if (elements.length) {
				for (var j = 0; j < elements.length; j++) {

					var $input = $(elements[j]);
					if ((results = $input.regula('validate')).length) {
						for (k = 0; k < results.length; k++) {
							errors++;
							$input.siblings(".form-validation").text(results[k].message).parent().addClass("has-error");
						}
					} else {
						$input.siblings(".form-validation").text("").parent().removeClass("has-error")
					}
				}

				if (captcha) {
					if (captcha.length) {
						return validateReCaptcha(captcha) && errors === 0
					}
				}

				return errors === 0;
			}
			return true;
		}


		/**
		 * validateReCaptcha
		 * @description  validate google reCaptcha
		 */
		function validateReCaptcha(captcha) {
			var captchaToken = captcha.find('.g-recaptcha-response').val();

			if (captchaToken.length === 0) {
				captcha
					.siblings('.form-validation')
					.html('Please, prove that you are not robot.')
					.addClass('active');
				captcha
					.closest('.form-wrap')
					.addClass('has-error');

				captcha.on('propertychange', function () {
					var $this = $(this),
						captchaToken = $this.find('.g-recaptcha-response').val();

					if (captchaToken.length > 0) {
						$this
							.closest('.form-wrap')
							.removeClass('has-error');
						$this
							.siblings('.form-validation')
							.removeClass('active')
							.html('');
						$this.off('propertychange');
					}
				});

				return false;
			}

			return true;
		}


		/**
		 * onloadCaptchaCallback
		 * @description  init google reCaptcha
		 */
		window.onloadCaptchaCallback = function () {
			for (var i = 0; i < plugins.captcha.length; i++) {
				var $capthcaItem = $(plugins.captcha[i]);

				grecaptcha.render(
					$capthcaItem.attr('id'),
					{
						sitekey: $capthcaItem.attr('data-sitekey'),
						size: $capthcaItem.attr('data-size') ? $capthcaItem.attr('data-size') : 'normal',
						theme: $capthcaItem.attr('data-theme') ? $capthcaItem.attr('data-theme') : 'light',
						callback: function (e) {
							$('.recaptcha').trigger('propertychange');
						}
					}
				);
				$capthcaItem.after("<span class='form-validation'></span>");
			}
		};

		/**
		 * Copyright Year
		 * @description  Evaluates correct copyright year
		 */
		var o = $("#copyright-year");
		if (o.length) {
			o.text(initialDate.getFullYear());
		}

		/**
		 * Is Mac os
		 * @description  add additional class on html if mac os.
		 */
		if (navigator.platform.match(/(Mac)/i)) $html.addClass("mac-os");

		/**
		 * Is Firefox
		 * @description  add additional class on html if mac os.
		 */
		if (isFirefox) $html.addClass("firefox");

		/**
		 * IE Polyfills
		 * @description  Adds some loosing functionality to IE browsers
		 */
		if (isIE) {
			if (isIE < 10) {
				$html.addClass("lt-ie-10");
			}

			if (isIE < 11) {
				if (plugins.pointerEvents) {
					$.getScript(plugins.pointerEvents)
						.done(function () {
							$html.addClass("ie-10");
							PointerEventsPolyfill.initialize({});
						});
				}
			}

			if (isIE === 11) {
				$("html").addClass("ie-11");
			}

			if (isIE === 12) {
				$("html").addClass("ie-edge");
			}
		}

		/**
		 * bootstrapModalDialog
		 * @description Stap vioeo in bootstrapModalDialog
		 */
		if (plugins.bootstrapModalDialog.length > 0) {
			var i = 0;

			for (i = 0; i < plugins.bootstrapModalDialog.length; i++) {
				var modalItem = $(plugins.bootstrapModalDialog[i]);

				modalItem.on('hidden.bs.modal', $.proxy(function () {
					var activeModal = $(this),
						rdVideoInside = activeModal.find('video'),
						youTubeVideoInside = activeModal.find('iframe');

					if (rdVideoInside.length) {
						rdVideoInside[0].pause();
					}

					if (youTubeVideoInside.length) {
						var videoUrl = youTubeVideoInside.attr('src');

						youTubeVideoInside
							.attr('src', '')
							.attr('src', videoUrl);
					}
				}, modalItem))
			}
		}

		/**
		 * @desc Initialize Google maps
		 */
		function initMaps() {
			var key;

			for ( var i = 0; i < plugins.maps.length; i++ ) {
				if (plugins.maps[i].hasAttribute( "data-key" ) ) {
					key = plugins.maps[i].getAttribute( "data-key" );
					break;
				}
			}

			$.getScript('//maps.google.com/maps/api/js?'+ ( key ? 'key='+ key + '&' : '' ) +'sensor=false&libraries=geometry,places&v=quarterly', function () {
				var head = document.getElementsByTagName('head')[0],
					insertBefore = head.insertBefore;

				head.insertBefore = function (newElement, referenceElement) {
					if (newElement.href && newElement.href.indexOf('//fonts.googleapis.com/css?family=Roboto') !== -1 || newElement.innerHTML.indexOf('gm-style') !== -1) {
						return;
					}
					insertBefore.call(head, newElement, referenceElement);
				};

				var geocoder = new google.maps.Geocoder;
				for (var i = 0; i < plugins.maps.length; i++) {
					var zoom = parseInt(plugins.maps[i].getAttribute("data-zoom")) || 11;
					var styles;
					if (plugins.maps[i].hasAttribute('data-styles')){
						try {
							styles = JSON.parse(plugins.maps[i].getAttribute("data-styles"));
						}
						catch (error){
							styles = [];
						}
					}
					var center = plugins.maps[i].getAttribute("data-center");

					// Initialize map
					var map = new google.maps.Map(plugins.maps[i].querySelectorAll(".google-map")[0], {
						zoom: zoom,
						styles: styles,
						scrollwheel: false,
						center: {lat: 0, lng: 0}
					});
					// Add map object to map node
					plugins.maps[i].map = map;
					plugins.maps[i].geocoder = geocoder;
					plugins.maps[i].keySupported = true;
					plugins.maps[i].google = google;

					// Get Center coordinates from attribute
					getLatLngObject(center, null, plugins.maps[i], function (location, markerElement, mapElement) {
						mapElement.map.setCenter(location);
					})

					// Add markers from google-map-markers array
					var markerItems = plugins.maps[i].querySelectorAll(".google-map-markers li");
					if (markerItems.length){
						var markers = [];
						for (var j = 0; j < markerItems.length; j++){
							var markerElement = markerItems[j];
							getLatLngObject(markerElement.getAttribute("data-location"), markerElement, plugins.maps[i], function(location, markerElement, mapElement){
								var icon = markerElement.getAttribute("data-icon") || mapElement.getAttribute("data-icon");
								var activeIcon = markerElement.getAttribute("data-icon-active") || mapElement.getAttribute("data-icon-active");
								var info = markerElement.getAttribute("data-description") || "";
								var infoWindow = new google.maps.InfoWindow({
									content: info
								});
								markerElement.infoWindow = infoWindow;
								var markerData = {
									position: location,
									map: mapElement.map
								}
								if (icon){
									markerData.icon = icon;
								}
								var marker = new google.maps.Marker(markerData);
								markerElement.gmarker = marker;
								markers.push({markerElement: markerElement, infoWindow: infoWindow});
								marker.isActive = false;
								// Handle infoWindow close click
								google.maps.event.addListener(infoWindow,'closeclick',(function(markerElement, mapElement){
									var markerIcon;
									markerElement.gmarker.isActive = false
									if (markerIcon = markerElement.getAttribute("data-icon") || mapElement.getAttribute("data-icon")){
										markerElement.gmarker.setIcon(markerIcon);
									}
								}).bind(this, markerElement, mapElement));


								// Set marker active on Click and open infoWindow
								google.maps.event.addListener(marker, 'click', (function(markerElement, mapElement) {
									if (markerElement.infoWindow.getContent().length === 0) return;
									var gMarker, currentMarker = markerElement.gmarker, currentInfoWindow;
									for (var k =0; k < markers.length; k++){
										var markerIcon;
										if (markers[k].markerElement === markerElement){
											currentInfoWindow = markers[k].infoWindow;
										}
										gMarker = markers[k].markerElement.gmarker;
										if (gMarker.isActive && markers[k].markerElement !== markerElement){
											gMarker.isActive = false;
											if (markerIcon = markers[k].markerElement.getAttribute("data-icon") || mapElement.getAttribute("data-icon")){
												gMarker.setIcon(markerIcon);
											}
											markers[k].infoWindow.close();
										}
									}

									currentMarker.isActive = !currentMarker.isActive;
									if (currentMarker.isActive) {
										if (markerIcon = markerElement.getAttribute("data-icon-active") || mapElement.getAttribute("data-icon-active")){
											currentMarker.setIcon(markerIcon);
										}

										currentInfoWindow.open(map, marker);
									}else{
										if (markerIcon = markerElement.getAttribute("data-icon") || mapElement.getAttribute("data-icon")){
											currentMarker.setIcon(markerIcon);
										}
										currentInfoWindow.close();
									}
								}).bind(this, markerElement, mapElement))
							})
						}
					}
				}
			});
		}

		// Google maps
		if( plugins.maps.length ) {
			lazyInit( plugins.maps, initMaps );
		}


		/**
		 * Radio
		 * @description Add custom styling options for input[type="radio"]
		 */
		if (plugins.radio.length) {
			var i;
			for (i = 0; i < plugins.radio.length; i++) {
				var $this = $(plugins.radio[i]);
				$this.addClass("radio-custom").after("<span class='radio-custom-dummy'></span>")
			}
		}

		/**
		 * Checkbox
		 * @description Add custom styling options for input[type="checkbox"]
		 */
		if (plugins.checkbox.length) {
			var i;
			for (i = 0; i < plugins.checkbox.length; i++) {
				var $this = $(plugins.checkbox[i]);
				$this.addClass("checkbox-custom").after("<span class='checkbox-custom-dummy'></span>")
			}
		}

		/**
		 * Popovers
		 * @description Enables Popovers plugin
		 */
		if (plugins.popover.length) {
			if (window.innerWidth < 767) {
				plugins.popover.attr('data-bs-placement', 'bottom');
				plugins.popover.popover();
			}
			else {
				plugins.popover.popover();
			}
		}

		/**
		 * UI To Top
		 * @description Enables ToTop Button
		 */
		if (isDesktop && !isNoviBuilder) {
			$().UItoTop({
				easingType: 'easeOutQuart',
				containerClass: 'ui-to-top'
			});
		}


		/**
		 * RD Navbar
		 * @description Enables RD Navbar plugin
		 */
		if (plugins.rdNavbar.length) {
			var aliaces, i, j, len, value, values, responsiveNavbar;

			aliaces = ["-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"];
			values = [0, 576, 768, 992, 1200, 1600];
			responsiveNavbar = {};

			for (i = j = 0, len = values.length; j < len; i = ++j) {
				value = values[i];
				if (!responsiveNavbar[values[i]]) {
					responsiveNavbar[values[i]] = {};
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'layout')) {
					responsiveNavbar[values[i]].layout = plugins.rdNavbar.attr('data' + aliaces[i] + 'layout');
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'device-layout')) {
					responsiveNavbar[values[i]]['deviceLayout'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'device-layout');
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'hover-on')) {
					responsiveNavbar[values[i]]['focusOnHover'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'hover-on') === 'true';
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'auto-height')) {
					responsiveNavbar[values[i]]['autoHeight'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'auto-height') === 'true';
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up')) {
					responsiveNavbar[values[i]]['stickUp'] = isNoviBuilder ? false : (plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up') === 'true');
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up-offset')) {
					responsiveNavbar[values[i]]['stickUpOffset'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up-offset');
				}
			}


			plugins.rdNavbar.RDNavbar({
				anchorNav: !isNoviBuilder,
				stickUpClone: (plugins.rdNavbar.attr("data-stick-up-clone") && !isNoviBuilder) ? plugins.rdNavbar.attr("data-stick-up-clone") === 'true' : false,
				responsive: responsiveNavbar,
				callbacks: {
					onStuck: function () {
						var navbarSearch = this.$element.find('.rd-search input');

						if (navbarSearch) {
							navbarSearch.val('').trigger('propertychange');
						}
					},
					onDropdownOver: function () {
						return !isNoviBuilder;
					},
					onUnstuck: function () {
						if (this.$clone === null)
							return;

						var navbarSearch = this.$clone.find('.rd-search input');

						if (navbarSearch) {
							navbarSearch.val('').trigger('propertychange');
							navbarSearch.trigger('blur');
						}

					}
				}
			});


			if (plugins.rdNavbar.attr("data-body-class")) {
				document.body.className += ' ' + plugins.rdNavbar.attr("data-body-class");
			}
		}
		/**
		 * ViewPort Universal
		 * @description Add class in viewport
		 */
		if (plugins.viewAnimate.length) {
			var i;
			for (i = 0; i < plugins.viewAnimate.length; i++) {
				var $view = $(plugins.viewAnimate[i]).not('.active');
				$document.on("scroll", $.proxy(function () {
					if (isScrolledIntoView(this)) {
						this.addClass("active");
					}
				}, $view))
					.trigger("scroll");
			}
		}
		
		// Swiper
		if (plugins.swiper.length) {
			
			for (let i = 0; i < plugins.swiper.length; i++) {
				
				let
					node = plugins.swiper[i],
					params = parseJSON(node.getAttribute('data-swiper')),
					defaults = {
						speed:      1000,
						loop:       true,
						pagination: {
							el:        '.swiper-pagination',
							clickable: true
						},
						navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev'
						},
						autoplay:   {
							delay: 5000
						}
					},
					xMode = {
						autoplay:      false,
						loop:          false,
						simulateTouch: false
					};
				
				params.on = {
					init: function () {
						setBackgrounds(this);
						setRealPrevious(this);
						initCaptionAnimate(this);
						
						// Real Previous Index must be set recent
						this.on('slideChangeTransitionEnd', function () {
							setRealPrevious(this);
						});
					}
				};
				
				new Swiper( node, Util.merge( isNoviBuilder ? [ defaults, params, xMode ] : [ defaults, params ] ) );
			}
		}

		/**
		 * Isotope
		 * @description Enables Isotope plugin
		 */
		if (plugins.isotope.length) {
			var isogroup = [];
			for (var i = 0; i < plugins.isotope.length; i++) {
				var isotopeItem = plugins.isotope[i],
					isotopeInitAttrs = {
						itemSelector: '.isotope-item',
						layoutMode: isotopeItem.getAttribute('data-isotope-layout') ? isotopeItem.getAttribute('data-isotope-layout') : 'masonry',
						filter: '*'
					};

				if (isotopeItem.getAttribute('data-column-width')) {
					isotopeInitAttrs.masonry = {
						columnWidth: parseFloat(isotopeItem.getAttribute('data-column-width'))
					};
				} else if (isotopeItem.getAttribute('data-column-class')) {
					isotopeInitAttrs.masonry = {
						columnWidth: isotopeItem.getAttribute('data-column-class')
					};
				}

				var iso = new Isotope(isotopeItem, isotopeInitAttrs);
				isogroup.push(iso);
			}


			setTimeout(function () {
				for (var i = 0; i < isogroup.length; i++) {
					isogroup[i].element.className += " isotope--loaded";
					isogroup[i].layout();
				}
			}, 200);

			var resizeTimout;

			$("[data-isotope-filter]").on("click", function (e) {
				e.preventDefault();
				var filter = $(this);
				clearTimeout(resizeTimout);
				filter.parents(".isotope-filters").find('.active').removeClass("active");
				filter.addClass("active");
				var iso = $('.isotope[data-isotope-group="' + this.getAttribute("data-isotope-group") + '"]'),
					isotopeAttrs = {
						itemSelector: '.isotope-item',
						layoutMode: iso.attr('data-isotope-layout') ? iso.attr('data-isotope-layout') : 'masonry',
						filter: this.getAttribute("data-isotope-filter") === '*' ? '*' : '[data-filter*="' + this.getAttribute("data-isotope-filter") + '"]'
					};
				if (iso.attr('data-column-width')) {
					isotopeAttrs.masonry = {
						columnWidth: parseFloat(iso.attr('data-column-width'))
					};
				} else if (iso.attr('data-column-class')) {
					isotopeAttrs.masonry = {
						columnWidth: iso.attr('data-column-class')
					};
				}
				iso.isotope(isotopeAttrs);
			}).eq(0).trigger("click")
		}

		/**
		 * WOW
		 * @description Enables Wow animation plugin
		 */
		if ($html.hasClass("wow-animation") && plugins.wow.length && !isNoviBuilder && isDesktop) {
			new WOW().init();
		}


		/**
		 * RD Input Label
		 * @description Enables RD Input Label Plugin
		 */
		if (plugins.rdInputLabel.length) {
			plugins.rdInputLabel.RDInputLabel();
		}

		/**
		 * Regula
		 * @description Enables Regula plugin
		 */
		if (plugins.regula.length) {
			attachFormValidator(plugins.regula);
		}

		/**
		 * Google ReCaptcha
		 * @description Enables Google ReCaptcha
		 */
		if (plugins.captcha.length) {
			$.getScript("//www.google.com/recaptcha/api.js?onload=onloadCaptchaCallback&render=explicit&hl=en");
		}

		/**
		 * RD Mailform
		 * @version      3.2.0
		 */
		if (plugins.rdMailForm.length) {
			var i, j, k,
				msg = {
					'MF000': 'Successfully sent!',
					'MF001': 'Recipients are not set!',
					'MF002': 'Form will not work locally!',
					'MF003': 'Please, define email field in your form!',
					'MF004': 'Please, define type of your form!',
					'MF254': 'Something went wrong with PHPMailer!',
					'MF255': 'Aw, snap! Something went wrong.'
				};

			for (i = 0; i < plugins.rdMailForm.length; i++) {
				var $form = $(plugins.rdMailForm[i]),
					formHasCaptcha = false;

				$form.attr('novalidate', 'novalidate').ajaxForm({
					data: {
						"form-type": $form.attr("data-form-type") || "contact",
						"counter": i
					},
					beforeSubmit: function (arr, $form, options) {
						if (isNoviBuilder)
							return;

						var form = $(plugins.rdMailForm[this.extraData.counter]),
							inputs = form.find("[data-constraints]"),
							output = $("#" + form.attr("data-form-output")),
							captcha = form.find('.recaptcha'),
							captchaFlag = true;

						output.removeClass("active error success");

						if (isValidated(inputs, captcha)) {

							// veify reCaptcha
							if (captcha.length) {
								var captchaToken = captcha.find('.g-recaptcha-response').val(),
									captchaMsg = {
										'CPT001': 'Please, setup you "site key" and "secret key" of reCaptcha',
										'CPT002': 'Something wrong with google reCaptcha'
									};

								formHasCaptcha = true;

								$.ajax({
									method: "POST",
									url: "bat/reCaptcha.php",
									data: {'g-recaptcha-response': captchaToken},
									async: false
								})
									.done(function (responceCode) {
										if (responceCode !== 'CPT000') {
											if (output.hasClass("snackbars")) {
												output.html('<p><span class="icon text-middle mdi mdi-check icon-xxs"></span><span>' + captchaMsg[responceCode] + '</span></p>')

												setTimeout(function () {
													output.removeClass("active");
												}, 3500);

												captchaFlag = false;
											} else {
												output.html(captchaMsg[responceCode]);
											}

											output.addClass("active");
										}
									});
							}

							if (!captchaFlag) {
								return false;
							}

							form.addClass('form-in-process');

							if (output.hasClass("snackbars")) {
								output.html('<p><span class="icon text-middle fa fa-circle-o-notch fa-spin icon-xxs"></span><span>Sending</span></p>');
								output.addClass("active");
							}
						} else {
							return false;
						}
					},
					error: function (result) {
						if (isNoviBuilder)
							return;

						var output = $("#" + $(plugins.rdMailForm[this.extraData.counter]).attr("data-form-output")),
							form = $(plugins.rdMailForm[this.extraData.counter]);

						output.text(msg[result]);
						form.removeClass('form-in-process');

						if (formHasCaptcha) {
							grecaptcha.reset();
						}
					},
					success: function (result) {
						if (isNoviBuilder)
							return;

						var form = $(plugins.rdMailForm[this.extraData.counter]),
							output = $("#" + form.attr("data-form-output")),
							select = form.find('select');

						form
							.addClass('success')
							.removeClass('form-in-process');

						if (formHasCaptcha) {
							grecaptcha.reset();
						}

						result = result.length === 5 ? result : 'MF255';
						output.text(msg[result]);

						if (result === "MF000") {
							if (output.hasClass("snackbars")) {
								output.html('<p><span class="icon text-middle mdi mdi-check icon-xxs"></span><span>' + msg[result] + '</span></p>');
							} else {
								output.addClass("active success");
							}
						} else {
							if (output.hasClass("snackbars")) {
								output.html(' <p class="snackbars-left"><span class="icon icon-xxs mdi mdi-alert-outline text-middle"></span><span>' + msg[result] + '</span></p>');
							} else {
								output.addClass("active error");
							}
						}

						form.clearForm();

						if (select.length) {
							select.select2("val", "");
						}

						form.find('input, textarea').trigger('blur');

						setTimeout(function () {
							output.removeClass("active error success");
							form.removeClass('success');
						}, 3500);
					}
				});
			}
		}

		/**
		 * @desc Initialize the gallery with set of images
		 * @param {object} itemsToInit - jQuery object
		 * @param {string} addClass - additional gallery class
		 */
		function initLightGallery(itemsToInit, addClass) {
			if (!isNoviBuilder) {
				$(itemsToInit).lightGallery({
					thumbnail: $(itemsToInit).attr("data-lg-thumbnail") !== "false",
					selector: "[data-lightgallery='item']",
					autoplay: $(itemsToInit).attr("data-lg-autoplay") === "true",
					pause: parseInt($(itemsToInit).attr("data-lg-autoplay-delay")) || 5000,
					addClass: addClass,
					mode: $(itemsToInit).attr("data-lg-animation") || "lg-slide",
					loop: $(itemsToInit).attr("data-lg-loop") !== "false",
					download: false
				});
			}
		}

		/**
		 * @desc Initialize the gallery with dynamic addition of images
		 * @param {object} itemsToInit - jQuery object
		 * @param {string} addClass - additional gallery class
		 */
		function initDynamicLightGallery(itemsToInit, addClass) {
			if (!isNoviBuilder) {
				$(itemsToInit).on("click", function () {
					$(itemsToInit).lightGallery({
						thumbnail: $(itemsToInit).attr("data-lg-thumbnail") !== "false",
						download: false,
						selector: "[data-lightgallery='item']",
						autoplay: $(itemsToInit).attr("data-lg-autoplay") === "true",
						pause: parseInt($(itemsToInit).attr("data-lg-autoplay-delay")) || 5000,
						addClass: addClass,
						mode: $(itemsToInit).attr("data-lg-animation") || "lg-slide",
						loop: $(itemsToInit).attr("data-lg-loop") !== "false",
						dynamic: true,
						dynamicEl: JSON.parse($(itemsToInit).attr("data-lg-dynamic-elements")) || []
					});
				});
			}
		}

		/**
		 * @desc Initialize the gallery with one image
		 * @param {object} itemToInit - jQuery object
		 * @param {string} addClass - additional gallery class
		 */
		function initLightGalleryItem(itemToInit, addClass) {
			if (!isNoviBuilder) {
				$(itemToInit).lightGallery({
					selector: "this",
					addClass: addClass,
					counter: false,
					youtubePlayerParams: {
						modestbranding: 1,
						showinfo: 0,
						rel: 0,
						controls: 0
					},
					vimeoPlayerParams: {
						byline: 0,
						portrait: 0
					}
				});
			}
		}

		// lightGallery
		if (plugins.lightGallery.length) {
			for (var i = 0; i < plugins.lightGallery.length; i++) {
				initLightGallery(plugins.lightGallery[i]);
			}
		}

		// lightGallery item
		if (plugins.lightGalleryItem.length) {
			// Filter carousel items
			var notCarouselItems = [];

			for (var z = 0; z < plugins.lightGalleryItem.length; z++) {
				if (!$(plugins.lightGalleryItem[z]).parents('.owl-carousel').length && !$(plugins.lightGalleryItem[z]).parents('.swiper-slider').length && !$(plugins.lightGalleryItem[z]).parents('.slick-slider').length) {
					notCarouselItems.push(plugins.lightGalleryItem[z]);
				}
			}

			plugins.lightGalleryItem = notCarouselItems;

			for (var i = 0; i < plugins.lightGalleryItem.length; i++) {
				initLightGalleryItem(plugins.lightGalleryItem[i]);
			}
		}

		// Dynamic lightGallery
		if (plugins.lightDynamicGalleryItem.length) {
			for (var i = 0; i < plugins.lightDynamicGalleryItem.length; i++) {
				initDynamicLightGallery(plugins.lightDynamicGalleryItem[i]);
			}
		}

		/**
		 * Custom Toggles
		 */
		if (plugins.customToggle.length) {
			for (var i = 0; i < plugins.customToggle.length; i++) {
				var $this = $(plugins.customToggle[i]);

				$this.on('click', $.proxy(function (event) {
					event.preventDefault();

					var $ctx = $(this);
					$($ctx.attr('data-custom-toggle')).add(this).toggleClass('active');
				}, $this));

				if ($this.attr("data-custom-toggle-hide-on-blur") === "true") {
					$body.on("click", $this, function (e) {
						if (e.target !== e.data[0]
							&& $(e.data.attr('data-custom-toggle')).find($(e.target)).length
							&& e.data.find($(e.target)).length === 0) {
							$(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
						}
					})
				}

				if ($this.attr("data-custom-toggle-disable-on-blur") === "true") {
					$body.on("click", $this, function (e) {
						if (e.target !== e.data[0] && $(e.data.attr('data-custom-toggle')).find($(e.target)).length === 0 && e.data.find($(e.target)).length === 0) {
							$(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
						}
					})
				}
			}
		}

		/**
		 * jQuery Count To
		 * @description Enables Count To plugin
		 */
		if (plugins.counter.length) {
			var i;

			for (i = 0; i < plugins.counter.length; i++) {
				var $counterNotAnimated = $(plugins.counter[i]).not('.animated');
				$document
					.on("scroll", $.proxy(function () {
						var $this = this;

						if ((!$this.hasClass("animated")) && (isScrolledIntoView($this))) {
							$this.countTo({
								refreshInterval: 40,
								from: 0,
								to: parseInt($this.text(), 10),
								speed: $this.attr("data-speed") || 1000
							});
							$this.addClass('animated');
						}
					}, $counterNotAnimated))
					.trigger("scroll");
			}
		}

		/**
		 * Bootstrap Date time picker
		 */
		if (plugins.bootstrapDateTimePicker.length) {
			var i;
			for (i = 0; i < plugins.bootstrapDateTimePicker.length; i++) {
				var $dateTimePicker = $(plugins.bootstrapDateTimePicker[i]);
				var options = {};

				options['format'] = 'DD MMMM YYYY - HH:mm';
				if ($dateTimePicker.attr("data-time-picker") === "date") {
					options['format'] = 'DD MMMM YYYY';
					options['minDate'] = new Date();
				} else if ($dateTimePicker.attr("data-time-picker") === "time") {
					options['format'] = 'HH:mm';
				}

				options["time"] = ($dateTimePicker.attr("data-time-picker") !== "date");
				options["date"] = ($dateTimePicker.attr("data-time-picker") !== "time");
				options["shortTime"] = true;

				$dateTimePicker.bootstrapMaterialDatePicker(options);
			}
		}

		/**
		 * Bootstrap collapse
		 *
		 */
		var bootstrapCollapse = $('.calendar-box-list-view');
		bootstrapCollapse.collapse({
			toggle: false
		});

		$("body").on("click", bootstrapCollapse, function (e) {
			bootstrapCollapse.collapse('hide');
		});

		/**
		 * jQuery Countdown
		 * @description  Enable countdown plugin
		 */
		if (plugins.countDown.length) {
			var i;
			for (i = 0; i < plugins.countDown.length; i++) {
				var countDownItem = plugins.countDown[i],
					d = new Date(),
					type = countDownItem.getAttribute('data-type'),
					time = countDownItem.getAttribute('data-time'),
					format = countDownItem.getAttribute('data-format'),
					settings = [];

				d.setTime(Date.parse(time)).toLocaleString();
				settings[type] = d;
				settings['format'] = format;
				$(countDownItem).countdown(settings);
			}
		}

		/**
		 * Custom Waypoints
		 */
		if (plugins.customWaypoints.length && !isNoviBuilder) {
			var i;
			for (i = 0; i < plugins.customWaypoints.length; i++) {
				var $this = $(plugins.customWaypoints[i]);
				makeWaypointScroll($this);
			}
		}

		/**
		 * Material Parallax
		 * @description Enables Material Parallax plugin
		 */
		if (plugins.materialParallax.length) {
			if (!isNoviBuilder && !isIE && !isMobile) {
				plugins.materialParallax.parallax();
			} else {
				for (var i = 0; i < plugins.materialParallax.length; i++) {
					var parallax = $(plugins.materialParallax[i]),
						imgPath = parallax.data("parallax-img");

					parallax.css({
						"background-image": 'url(' + imgPath + ')',
						"background-size": "cover"
					});
				}
			}
		}
		
	});
}());

