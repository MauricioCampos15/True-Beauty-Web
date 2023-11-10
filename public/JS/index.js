$(document).ready(function () {
    const sliders = $('.about__body');
    const buttonNext = $('#next');
    const buttonBefore = $('#before');
    let currentIndex = 0;
  
    buttonNext.on('click', () => {
        changePosition(1);
    });
  
    buttonBefore.on('click', () => {
        changePosition(-1);
    });
  
    const changePosition = (offset) => {
        sliders.eq(currentIndex).removeClass('about__body--show');
  
        currentIndex = (currentIndex + offset + sliders.length) % sliders.length;
  
        sliders.eq(currentIndex).addClass('about__body--show');
    }
  });
  
  $(document).ready(function(){
      $('.all-products').slick({
        infinite: true,
        slidesToShow: 5, 
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000, 
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1
            }
          }
        ]
      });
    });
    
    
  