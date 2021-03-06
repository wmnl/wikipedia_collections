
$(function() {
    var $content = $('.articleContent');

    var self = this;    
    var museum = Museum(window.app.museum);
    var tracker = new Tracker();
    var menu = new TocMenu();
    var articleExtras = new ArticleExtras();
    var articleBar = new ArticleBar(window.app.museum);
    var textSize = new TextSize();
    var loader = new Loader(menu);
    var languagePicker = new LanguagePicker(window.app.museum);
    var search = new Search(window.app.museum);
    var idling = false;
    var idleTimeout;
    var museumUpdatedAt;
    
    init();
    
    function init() {
        if (!localStorage.noIdle) {
            idleTimeout = setTimeout(startIdle, 2000);
        }

        // Set viewport meta tag
        $(window).on('resize', setMetaTag);
        setMetaTag();
        function setMetaTag() {
            $('meta#viewport').attr('content', 'width=' + $(window).width() + ', initial-scale=1, maximum-scale=1, user-scalable=no');
        }
        
        FastClick.attach(document.body);
        
        $(document).on('touchstart keydown', stopIdle);
        
        $('.articleBar .article').eq(0).click();
        
        // Css fix for messed up black bars in iOS webapp when iPad is upside down when app is launched
        if (window.orientation == 180) {
            $('body').addClass('statusBarFix');
        }
    }
    
    function startIdle() {
        if (!idling) {
            console.log('start-idle');
            idling = true;
            $(document).trigger('start-idle');
            
            // Check if reload is needed
            $.ajax({
                url: Routing.generate('museum_updated_at', {id: window.app.museum.id}),
                cache: false,
                success: function(updatedAt) {
                    if (museumUpdatedAt && museumUpdatedAt != updatedAt) {
                        console.log('New version detected, reloading');
                        document.location.reload();
                    }
                    museumUpdatedAt = updatedAt;
                }
            });
        }
    }
    
    function stopIdle(e) {
        if (idling) {
            console.log('stop-idle');
            $(document).trigger('stop-idle');
            idling = false;
        }
        clearTimeout(idleTimeout);
        if (!localStorage.noIdle) {
            idleTimeout = setTimeout(startIdle, 2 * 60 * 1000);
        }
    }
});
