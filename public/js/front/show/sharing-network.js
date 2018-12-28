var facebookShare = null;

jQuery(document).ready(function () {
    facebookShare = {
        setFacebookGraphMarkup (url, title, description, image) {
            $('meta[name="og:url"]').attr('content', url);
            $('meta[name="og:title"]').attr('content', title);
            $('meta[name="og:description"]').attr('content', description);
            $('meta[name="og:image"]').attr('content', image);
        },
        shareHandle (url) {
            FB.ui({
                method: 'share',
                href: url,
                app_id: 2235973836688408
            }, function(response){});
        }
    };
});