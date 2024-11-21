;(function ($) {
  "use strict"

  // Superfish on nav menu
  jQuery(".nav-menu").superfish({
    animation: { opacity: "show" },
    speed: 400,
  })

  // Typed Initiate
  if (jQuery(".top-header h2").length == 1) {
    var typed_strings = jQuery(".top-header p").text()
    var typed = new Typed(".top-header h2", {
      strings: typed_strings.split(", "),
      typeSpeed: 100,
      backSpeed: 20,
      smartBackspace: false,
      loop: true,
    })
  }

  // Mobile Navigation
  if (jQuery("#nav-menu-container").length) {
    var $mobile_nav = jQuery("#nav-menu-container")
      .clone()
      .prop({ id: "mobile-nav" })
    $mobile_nav.find("> ul").attr({ class: "", id: "" })
    jQuery("body").append($mobile_nav)
    jQuery("body").prepend(
      '<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>'
    )
    jQuery("body").append('<div id="mobile-body-overly"></div>')
    jQuery("#mobile-nav")
      .find(".menu-has-children")
      .prepend('<i class="fa fa-chevron-down"></i>')

    jQuery(document).on("click", ".menu-has-children i", function (e) {
      jQuery(this).next().toggleClass("menu-item-active")
      jQuery(this).nextAll("ul").eq(0).slideToggle()
      jQuery(this).toggleClass("fa-chevron-up fa-chevron-down")
    })

    jQuery(document).on("click", "#mobile-nav-toggle", function (e) {
      jQuery("body").toggleClass("mobile-nav-active")
      jQuery("#mobile-nav-toggle i").toggleClass("fa-times fa-bars")
      jQuery("#mobile-body-overly").toggle()
    })

    jQuery(document).click(function (e) {
      var container = jQuery("#mobile-nav, #mobile-nav-toggle")
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if (jQuery("body").hasClass("mobile-nav-active")) {
          jQuery("body").removeClass("mobile-nav-active")
          jQuery("#mobile-nav-toggle i").toggleClass("fa-times fa-bars")
          jQuery("#mobile-body-overly").fadeOut()
        }
      }
    })
  } else if (jQuery("#mobile-nav, #mobile-nav-toggle").length) {
    jQuery("#mobile-nav, #mobile-nav-toggle").hide()
  }

  // Smooth scrolling on the navbar links
  jQuery(".nav-menu a, #mobile-nav a").on("click", function (event) {
    if (this.hash !== "") {
      event.preventDefault()

      jQuery("html, body").animate(
        {
          scrollTop: jQuery(this.hash).offset().top,
        },
        1500,
        "easeInOutExpo"
      )

      if (jQuery(this).parents(".nav-menu").length) {
        jQuery(".nav-menu .menu-active").removeClass("menu-active")
        jQuery(this).closest("li").addClass("menu-active")
      }
    }
  })

  // Stick the header at top on scroll
  jQuery(".header").sticky({ topSpacing: 0, zIndex: "50" })

  // Back to top button
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery(".back-to-top").fadeIn("slow")
    } else {
      jQuery(".back-to-top").fadeOut("slow")
    }
  })
  jQuery(".back-to-top").click(function () {
    jQuery("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo")
    return false
  })

  // Skills section
  jQuery(".skills").waypoint(
    function () {
      jQuery(".progress .progress-bar").each(function () {
        jQuery(this).css("width", jQuery(this).attr("aria-valuenow") + "%")
      })
    },
    { offset: "80%" }
  )

  // jQuery counterUp
  jQuery('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 1000,
  })

  // Porfolio isotope and filter
  var portfolioIsotope = jQuery(".portfolio-container").isotope({
    itemSelector: ".portfolio-item",
    layoutMode: "fitRows",
  })

  jQuery("#portfolio-flters li").on("click", function () {
    jQuery("#portfolio-flters li").removeClass("filter-active")
    jQuery(this).addClass("filter-active")

    portfolioIsotope.isotope({ filter: jQuery(this).data("filter") })
  })

  // Testimonials carousel
  jQuery(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1,
  })
})(jQuery)
