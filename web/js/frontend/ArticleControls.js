function ArticleControls() {

    var $content = $('.articleContent');

    init();

    function init() {
        $content.on('click', '.articleHeader .showFullscreen', function() {
            var $articleHeader = $(this).closest('.articleHeader');
            var $img = $articleHeader.find('img');

            var height = $articleHeader.is('.fullscreen') ? 400 : $img.height();
            $articleHeader
                .toggleClass('fullscreen')
                .velocity({ maxHeight: height }, function() {
                    $img.trigger('content-resized');
                })
            ;
        });
        $content.on('click', 'a', function(e) {
            e.preventDefault();
        });

        $(document).on('start-idle', function() {
            $('html').velocity('scroll', {
                offset: '0px',
                mobileHA: false,
                complete: function() {
                    carousel.enabled = true;
                },
            });
        });
    }
}