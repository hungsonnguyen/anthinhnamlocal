(function ($) {
	$(document).ready(function () {
		// ----------custome modal add to cart------------------

		$(document).mouseup(function (e) {
			var contact_phone_1 = $(".greeting");
			if (!contact_phone_1.is(e.target) && contact_phone_1.has(e.target).length === 0) {
				contact_phone_1.fadeOut(500);
			}
			$(".btn-close").click(function () {
				contact_phone_1.fadeOut(500);
			});
			$(".btn-danger").click(function () {
				contact_phone_1.fadeOut(500);
			});
		});
		// ----------custome modal add to cart end------------------

		// scroll
		$(document).ready(function () {
			$('html,body').animate({ scrollTop: $(".breadcrumbs").offset().top }, 1000, function () { });
		});
		$(document).ready(function () {
			$('html,body').animate({ scrollTop: $("#breadcrumbs").offset().top }, 1000, function () { });
		});
		$(document).ready(function () {
			$('html,body').animate({ scrollTop: $(".woocommerce-breadcrumb").offset().top }, 1000, function () { });
		});

		if (window.matchMedia('(max-width: 576px)').matches) {
			$(document).ready(function () {
				$('html,body').animate({ scrollTop: $(".breadcrumbs").offset().top - 70 }, 1000, function () { });
			});
			$(document).ready(function () {
				$('html,body').animate({ scrollTop: $("#breadcrumbs").offset().top - 70 }, 1000, function () { });
			});
			$(document).ready(function () {
				$('html,body').animate({ scrollTop: $(".woocommerce-breadcrumb").offset().top - 70 }, 1000, function () { });
			});
		}

		// Disable right click
		$('img').bind('contextmenu', function (e) {
			return false;
		});
		/* AOS Animate */
		AOS.init({ once: false });

		/* Scroll to top */
		$('#bottom_to_top').on("click", function () {
			$('html,body').animate({ scrollTop: $("#scroll-to-top").offset().top }, 'slow', function () {
			});
		});
		$(window).scroll(function () {
			var scrollTop = $(window).scrollTop();
			if (scrollTop >= 500) {
				$("#bottom_to_top").slideDown(500)
			}
			else {
				$("#bottom_to_top").slideUp(500);
			}
		});

		// custome sticky menu
		if (window.matchMedia('(min-width: 992px)').matches) {
			$(window).scroll(function () {
				var scrollTop = $(window).scrollTop();
				if (scrollTop >= 800) {
					$(".header").css({
						"z-index": "999",
						"position": "sticky",
						"top": "-32px",
						"transition": "top 0.3s",
					});
					$(".category-menu").css({
						"display": "none",
					});


					var itemmenuCat = $('.category-top');
					itemmenuCat.click(function () {
						$('.category-menu').fadeIn();
					});

				}
				else {
					$(".header").css({
						"position": "unset",
						"transition": "top 0.3s",
					});
					$(".category-menu").css({
						"display": "block",
					});
				}
			});
		}



		$(window).load(function () {
			$('#loading').hide();
		});
		//------------ Scroll Indicator -------------------
		window.onscroll = function () { scroll_indicator() };
		function scroll_indicator() {
			var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
			var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
			var scrolled = (winScroll / height) * 100;
			document.getElementById("scroll_indicator").style.width = scrolled + "%";
		}


		// --------------section-product related carousel--------------- 

		/* owlcarousel */
		var owlSectionLogo = $('#product-related');
		owlSectionLogo.owlCarousel({
			loop: true,
			autoplay: true,
			nav: false,
			dots: false,

			responsive: {
				0: {
					items: 2,
					margin: 8,
				},
				540: {
					items: 2,
					margin: 15,
				},
				720: {
					items: 3,
					margin: 20,
				},
				960: {
					items: 4,
					margin: 24,

				}
			}
		});
		// --------------section-action carousel--------------- 
		var owlSectionLogo = $('#owl-unitiess');
		owlSectionLogo.owlCarousel({
			loop: true,

			nav: false,
			dots: false,
			// slideTransition: 'linear',
			// autoplayTimeout: 2000,
			// autoplaySpeed: 2000,
			// autoplayHoverPause: true,
			responsive: {
				0: {
					items: 2,
					margin: 8,
					autoplay: true,
				},
				540: {
					items: 2,
					margin: 15,
					autoplay: true,
				},
				720: {
					items: 3,
					margin: 20,
					autoplay: true,
				},
				960: {
					items: 4,
					margin: 24,
					autoplay: false,

				}
			}
		});
		// --------------section-banner carousel--------------- 
		var owlSectionBanner = $('#owl-banner');
		owlSectionBanner.owlCarousel({
			loop: true,
			autoplay: true,
			nav: false,
			dots: false,

			responsive: {
				0: {
					items: 1,

				},

			}
		});

		// --------------section-project carousel---------------
		var owlSectionLogo = $('#owl-snh-atn-our-project');
		owlSectionLogo.owlCarousel({
			loop: true,
			autoplay: true,
			nav: false,
			dots: false,
			responsive: {
				0: {
					items: 1,
					margin: 8,
				},
				540: {
					items: 2,
					margin: 15,
				},
				720: {
					items: 2,
					margin: 20,
				},
				960: {
					items: 3,
					margin: 24,
					autoplay: false,

				}
			}
		});
		// --------------section-product carousel---------------
		var owlSectionLogo = $('.hvn_atn-home-product--owl-carousel');
		owlSectionLogo.owlCarousel({
			loop: true,
			autoplay: false,
			nav: true,
			dots: false,
			responsive: {
				0: {
					items: 1,
				},
				// 540: {
				//     items: 1,
				// },
				// 720: {
				//     items: 1,
				// },
				// 960: {
				//     items: 1,
				// }
			}
		});
		// --------------section-service carousel---------------
		var owlSectionLogo = $('#owl-snh-atn-our-service');
		owlSectionLogo.owlCarousel({
			loop: true,
			autoplay: true,
			nav: false,
			dots: false,
			responsive: {
				0: {
					items: 1,
				},
				540: {
					items: 2,
				},
				720: {
					items: 2,
				},
				960: {
					items: 3,
					autoplay: false,

				}
			}
		});
		// --------------section-new carousel---------------
		var owlSectionLogo = $('#owl-snh-atn-our-new');
		owlSectionLogo.owlCarousel({
			loop: true,
			autoplay: true,
			nav: false,
			dots: false,
			responsive: {
				0: {
					items: 2,
					margin: 8,
				},
				540: {
					items: 3,
					margin: 15,
				},
				720: {
					items: 3,
					margin: 20,
				},
				960: {
					items: 4,
					margin: 24,
					autoplay: false,

				}
			}
		});


	});


	$(document).ready(function () {
		// --------------section-action carousel---------------
		var owlSectionLogo = $("#owl-section-action");
		owlSectionLogo.owlCarousel({
			loop: true,
			autoplay: true,
			nav: false,
			dots: true,
			// slideTransition: 'linear',
			// autoplayTimeout: 2000,
			// autoplaySpeed: 2000,
			// autoplayHoverPause: true,
			responsive: {
				0: {
					items: 2,
					margin: 8,
				},
				540: {
					items: 2,
					margin: 15,
				},
				720: {
					items: 2,
					margin: 20,
				},
				960: {
					items: 4,
					margin: 24,
				},
			},
		});

		// --------------section-action carousel---------------
		var owlSectionLogo = $("#owl-section-new");
		owlSectionLogo.owlCarousel({
			loop: true,
			autoplay: true,
			nav: false,
			dots: false,
			// slideTransition: 'linear',
			// autoplayTimeout: 2000,
			// autoplaySpeed: 2000,
			// autoplayHoverPause: true,
			responsive: {
				0: {
					items: 1,
					margin: 8,
				},
				540: {
					items: 2,
					margin: 15,
				},
				720: {
					items: 2,
					margin: 20,
				},
				960: {
					items: 3,
					margin: 24,
					autoplay: false,
				},
			},
		});
		// --------------section-action carousel--------------- 
		var owlSectionLogo = $('#owl-aboutus');
		owlSectionLogo.owlCarousel({
			loop: true,
			autoplay: true,
			nav: false,
			dots: true,
			// slideTransition: 'linear',
			// autoplayTimeout: 2000,
			// autoplaySpeed: 2000,
			// autoplayHoverPause: true,
			responsive: {
				0: {
					items: 1,
					margin: 0,
				},
				540: {
					items: 2,
					margin: 15,
				},
				720: {
					items: 2,
					margin: 20,
				},
				960: {
					items: 3,
					margin: 24,
				}
			}
		});

		// --------------section-action carousel--------------- 
		var owlSectionLogo = $('#owl-abouticon');
		owlSectionLogo.owlCarousel({
			loop: true,
			autoplay: true,
			autoplayHoverPause: true,
			mouseDrag: false,
			nav: false,
			dots: true,
			items: 10,
			// slideTransition: 'linear',
			// autoplayTimeout: 2000,
			// autoplaySpeed: 2000,
			// autoplayHoverPause: true,
			responsive: {
				0: {
					items: 1,
					margin: 0,
				},
				540: {
					items: 2,
					margin: 15,
				},
				720: {
					items: 2,
					margin: 20,
				},
				960: {
					items: 3,
					margin: 24,
				}
			}
		});

		// --------------expand navbar--------------
		jQuery.fn.extend({
			expandNav: function () {
				return this.each(function () {
					var containermenu = $(this);

					var itemmenu = containermenu.find('.navbar-toggle');
					itemmenu.click(function () {
						var submenuitem = containermenu.find('.navbar-nor');
						submenuitem.slideToggle(500);
						$('.navbar-nor-overlay').slideToggle(500);
					});

					$(document).click(function (e) {
						if (!containermenu.is(e.target) &&
							containermenu.has(e.target).length === 0) {
							var isopened =
								containermenu.find('.navbar-nor').css("display");

							if (isopened == 'block') {
								containermenu.find('.navbar-nor').slideToggle(500);
								$('.navbar-nor-overlay').slideToggle(500);
							}
						}
					});
					$('.navbar-nor-overlay').click(function () {
						$('.navbar-nor-overlay').slideToggle(500);
						$('.navbar-nor').slideToggle(500);
					})
				});
			},

		});
		$('.header__content').expandNav();


		// --------------expand sidebar - product-filter 1--------------
		// option--1
		jQuery.fn.extend({
			expandSidebarFilterProduct: function () {
				return this.each(function () {
					var containermenu = $(this);

					var itemmenu = containermenu.find('.filter-title');
					itemmenu.click(function () {
						var submenuitem = containermenu.find('.filter-content');
						submenuitem.slideToggle(500);
					});
				});
			},

		});
		$('#filter_226_0').expandSidebarFilterProduct();
		// --------------expand sidebar - product-filter2--------------
		// option--2
		jQuery.fn.extend({
			expandSidebarFilterProduct1: function () {
				return this.each(function () {
					var containermenu = $(this);

					var itemmenu = containermenu.find('.filter-title');
					itemmenu.click(function () {
						var submenuitem = containermenu.find('.filter-content');
						submenuitem.slideToggle(500);
					});
				});
			},

		});
		$('#filter_226_1').expandSidebarFilterProduct1();
		// -----------filter end---------------------------
	});

	/* Show menu mobile */
	$("#mobile-menu-button").click(function () {
		$(this).toggleClass("active");
		$(".header-menu").toggleClass("active");
	});

})(jQuery);

jQuery(function ($) {
	$(".owl-carousel.owl-carousel-partners").owlCarousel({
		loop: true,
		margin: 10,
		nav: false,
		dots: false,
		autoplay: true,
		slideTransition: 'linear',
		autoplayTimeout: 3000,
		autoplaySpeed: 3000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 2,
			},
			600: {
				items: 3,
			},
			1000: {
				items: 6,
			},
		},
	});
});
