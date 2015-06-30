jQuery(document).ready(function ($) {
    var wrapper = $(".github-advanced-title").parents('.widgets-holder-wrap');
    wrapper.on('click', '.github-advanced-title', function () {
        $(".github-advanced").stop().slideToggle(500);
    });
});