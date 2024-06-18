
//carrossel de produtos :
$('.owl-carousel').owlCarousel({
    loop:false,
    margin:5,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

$('.loop').owlCarousel({
    center: true,
    items:2,
    loop:true,
    margin:5,
    responsive:{
        600:{
            items:4
        }
    }
});
$('.nonloop').owlCarousel({
    center: true,
    items:2,
    loop:false,
    margin:5,
    responsive:{
        600:{
            items:4
        }
    }
});
//botão voltar para pagina anterior:
// document.getElementById("backbtn").addEventListener("click", 
// function () {
//     window.history.back;
// });