

    $(function() {

        // Owl Carousel
        $("#owl-demo").owlCarousel({
            singleItem:true
        });

        // nivoLightbox
        $('a.nivoLightbox').nivoLightbox({
            effect: 'fadeScale',
            errorMessage: 'O conteúdo requisitado não pode ser carregado. Por favor tente mais tarde.'
        });

        // niceSelect
        $('select').niceSelect();

        // Tooltip
        $('[data-toggle="tooltip"]').tooltip();
    });