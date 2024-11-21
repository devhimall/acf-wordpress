;(function ($) {
  /**
   * initializeBlock
   *
   * Adds custom JavaScript to the block HTML.
   *
   * @date    15/4/19
   * @since   1.0.0
   *
   * @param   object $block The block jQuery element.
   * @return  void
   */

  var initializeBlock = function ($block) {
    // Ensure the correct Swiper instance is created for the current block
    const swiperContainer = $block.find(".mySwiper")[0] // Select Swiper container
    const nextButton = $block.find(".swiper-button-next")[0] // Select navigation next button
    const prevButton = $block.find(".swiper-button-prev")[0] // Select navigation prev button

    if (swiperContainer) {
      new Swiper(swiperContainer, {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        speed: 1000,
        pagination: {
          el: $block.find(".swiper-pagination")[0], // Pagination element
          clickable: true,
        },
        navigation: {
          nextEl: nextButton, // Next navigation button
          prevEl: prevButton, // Prev navigation button
        },
        breakpoints: {
          320: {
            slidesPerView: 1,
          },
          480: {
            slidesPerView: 2,
          },
          768: {
            slidesPerView: 3,
          },
          1200: {
            slidesPerView: 4,
          },
        },
      })
    }
  }

  // Initialize each block on page load (front end).
  $(document).ready(function () {
    $(".slider").each(function () {
      initializeBlock($(this))
    })
  })

  // Initialize dynamic block preview (editor).
  if (window.acf) {
    window.acf.addAction("render_block_preview/type=slider", function ($block) {
      initializeBlock($block)
    })
  }
})(jQuery)
