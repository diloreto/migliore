function pixflow_videoShortcode(id, sources, host, extURL) {
    'use strict';
    var $ = jQuery,
        $videoImg = $('.' + id + ' .video-img');
    setTimeout(function () {
        $videoImg.css({
            height: $videoImg.width()
        });
    }, 100);
    var doIt;
    $(window).resize(function () {
        if($('.row-over-height').length){
            $(".row-over-height").getNiceScroll().resize();
        }
        var $videoImg = $('.' + id + ' .video-img');
        if (doIt) {
            clearTimeout(doIt);
        }
        doIt = setTimeout(function () {
            $videoImg.css({
                height: $videoImg.width()
            });
        }, 150)
    });
    if (typeof videojs == 'function') {

        var $video = $('<video id="' + id + '_video" name="sc_video" class="video-js vjs-default-skin" controls width="80%" height="80%" >' + sources + '<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that supports HTML5 video</p></video>');
        if (host == 'youtube') {
            var dataSetup = '{"techOrder": ["youtube"], "src": "' + extURL + '"}';
        } else if (host == 'vimeo') {
            var dataSetup = '{"techOrder": ["vimeo"], "src": "' + extURL + '"}';
        }
        $video.attr('data-setup', dataSetup);
        $video.css('display', 'none');
        $('body').append($video);
        var player = videojs(id + '_video', {/* Options */}, function () {
            // How about an event listener?
            this.on('ended', function () {
                //nothing
            });
        });
        $('.' + id + ' .image-play-btn,.' + id + ' .play-btn').click(function () {
            var $this = $('.' + id),
                $overlay = $('<div class="video-overlay"></div>');

            $('body').append($overlay);
            $overlay.append($('<span class="close"></span>'));
            var videoTime = setTimeout(function () {
                $('#' + id + '_video,#' + id + '_video video,#' + id).css({display: 'block'});
                $('#' + id + '_video video,#' + id).css('opacity', 1);
                $('#' + id + '_video,#' + id).stop(false, true).animate({opacity: 1}, 1500);
                player.play();
            }, 1000);
            $overlay.stop().animate({opacity: .9}, 600);
            $overlay.click(function () {
                clearTimeout(videoTime);
                $(this).stop().animate({
                    opacity: 0
                }, 600, 'swing', function () {
                    $(this).remove();
                });
                $('#' + id + '_video,#' + id).stop().animate({
                    opacity: 0
                }, 600, 'swing', function () {
                    $('#' + id + '_video,#' + id + '_video video,#' + id).css({display: 'none'});
                    player.pause();
                    player.currentTime(0);
                });
            });
        });
    }
}