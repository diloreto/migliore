function pixflow_productCategory() {
    "use strict";
    if (!$('.product-categories').length) {
        return;
    }
    $('.product-categories').each(function () {
        var $this = $(this),
            mainWidth = $this.width(),
            catwidth;
        catwidth = Math.floor(mainWidth / $this.attr('data-cols'));
        $this.find('.category').css({'width': catwidth});
    })

    $('.product-categories .category').each(function () {
        var $this = $(this),
            thumbHeight;
        thumbHeight = $this.parents('.product-categories').attr('data-thumbnail-height');
        $this.css({'height': thumbHeight});
    })
}
document_ready_functions.pixflow_productCategory = [];
window_resize_functions.pixflow_productCategory = [];
responsive_functions.pixflow_productCategory = [];