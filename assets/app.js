/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
//PDF make
import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.vfs = pdfFonts.pdfMake.vfs;

//Importation de bootstrap
//JS de bootstrap
import 'bootstrap';
//Css de bootstrap
import "bootstrap/dist/css/bootstrap.min.css";

//Importation font-awesome
import "@fortawesome/fontawesome-free/css/all.min.css";
import "@fortawesome/fontawesome-free/js/all"
//Jquery
const $ = require('jquery');
import "slick-carousel/slick/slick"
import "slick-carousel/slick/slick.css"

if (document.querySelector("#form_document") !== null) {
  var formDocument = document.querySelector("#form_document")
  formDocument.addEventListener('submit', (e) => {
    e.preventDefault();
    fetch(document.location.href, {
        body: new FormData(e.target),
        method: 'POST'
      })
      
      .then(() => {
        var data = new FormData(e.target)
        
        var titre = data.get("document[title_document]")
        var texte = data.get("document[text]")
        
      
        

        console.log(titre);
        console.log(texte);
        var messageDiv = document.querySelector(".message")
        var dd = {
          content: [{
              text: titre,
              style: 'header'
            },
            texte + '\n\n',
            {
              text: 'Crée par M.',
              style: ['quote', 'small']
            }
          ],
          styles: {
            header: {
              fontSize: 18,
              bold: true
            },
            subheader: {
              fontSize: 15,
              bold: true
            },
            quote: {
              italics: true
            },
            small: {
              fontSize: 8
            }
          }

        }
        messageDiv.innerHTML = '  <div class="alert alert-check" role="alert">Message envoyé au serveur !</div>'


        pdfMake.createPdf(dd).print({}, window);


      })


  })

}


if (numberSlide < 5 && document.querySelector("#next") !== null && document.querySelector("#next" !== null)) {
  var numberSlide = $('.js-slick-carousel > div').length;
  var prev = document.querySelector("#prev")
  var next = document.querySelector("#next")
  prev.remove();
  next.remove();
}


var slickSettings = {
  arrows: true,
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 2,
  prevArrow: $('.prev'),
  nextArrow: $('.next'),
  responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
}


const handleResize = () => {
  const carouselHeight = $('.js-slick-carousel').css('height')
  $('.card').css('height', carouselHeight);
}
// Initialization
// const handleSlickInit = () => {
//   console.log('slick init fired');
//   handleResize();
// }

// $('.js-slick-carousel').on('init', handleSlickInit);
$(window).on("load", () => {
  $('.js-slick-carousel').slick(slickSettings);
})
// reinitialization
$('.js-slick-carousel').on('reInit', () => console.log('slick re-init fired'));
$(window).resize(handleResize);