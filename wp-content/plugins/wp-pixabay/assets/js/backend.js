var wppb_imgs = {};
var wppb_selected = new Array();
var wppb_opened = false;
var wppb_current = '';

jQuery( document ).ready( function( jQuery ) {
	jQuery( "#wppb_search" ).click( function() {
		wppb_showimages( 1 );
	} );

	jQuery( '.wppb_btn' ).live( 'click', function() {
		eid = jQuery( this ).attr( 'data-editor' );
		jQuery( '#wppb_eid' ).val( eid )
	} );

	jQuery( '.wppb_btn' ).live( 'click', function() {
		if ( wppb_opened ) {
			jQuery.colorbox( {
				width: "930px",
				height: "460px",
				inline: true,
				href: "#wppb_popup",
				scrolling: false,
				fixed: true
			} );
		} else {
			jQuery.colorbox( {
				width: "648px",
				height: "460px",
				inline: true,
				href: "#wppb_popup",
				scrolling: false,
				fixed: true
			} );
		}
	} );

	jQuery( "#wppb_page a" ).live( "click", function() {
		jQuery( '#wppb_page' ).html( '' );
		wppb_showimages( jQuery( this ).attr( "rel" ) );
	} );

	jQuery( "#wppb_page-select" ).live( "change", function() {
		wppb_showimages( jQuery( this ).val() );
	} );

	jQuery( "#wppb_insert" ).live( "click", function() {
		for ( var i = 0; i < wppb_selected.length; i ++ ) {
			vinsert = '';
			valign = '';
			valign2 = '';
			eid = jQuery( '#wppb_eid' ).val();
			if ( jQuery( '#wppb_align' ).val() != '' ) {
				valign = ' align="' + wppb_esc_html( jQuery( '#wppb_align' ).val() ) + '"';
				valign2 = ' class="' + wppb_esc_html( jQuery( '#wppb_align' ).val() ) + '"';
			}
			var cid = wppb_selected[i];
			if ( wppb_imgs[cid].img_caption != '' ) {
				vinsert = '[caption id="" ' + valign + ']';
			}
			if ( jQuery( '#wppb_link' ).val() == 1 ) {
				vinsert += '<a href="' + wppb_esc_html( wppb_imgs[cid].img_site ) + '" title="' + wppb_esc_html( wppb_imgs[cid].img_title ) + '"';
			}
			if ( jQuery( '#wppb_link' ).val() == 2 ) {
				vinsert += '<a href="' + wppb_esc_html( wppb_imgs[cid].img_full ) + '" title="' + wppb_esc_html( wppb_imgs[cid].img_title ) + '"';
			}
			if ( (
				     jQuery( '#wppb_link' ).val() != 0
			     ) && jQuery( '#wppb_blank' ).is( ':checked' ) ) {
				vinsert += ' target="_blank"';
			}
			if ( (
				     jQuery( '#wppb_link' ).val() != 0
			     ) && jQuery( '#wppb_nofollow' ).is( ':checked' ) ) {
				vinsert += ' rel="nofollow"';
			}
			if ( jQuery( '#wppb_link' ).val() != 0 ) {
				vinsert += '>';
			}
			vinsert += '<img ' + valign2 + ' src="' + wppb_esc_html( wppb_imgs[cid].img_full ) + '" width="' + wppb_esc_html( wppb_imgs[cid].img_width.toString() ) + '" height="' + wppb_esc_html( wppb_imgs[cid].img_height.toString() ) + '" title="' + wppb_esc_html( wppb_imgs[cid].img_title ) + '" alt="' + wppb_esc_html( wppb_imgs[cid].img_title ) + '"/>';
			if ( jQuery( '#wppb_link' ).val() != 0 ) {
				vinsert += '</a>';
			}
			if ( wppb_imgs[cid].img_caption != '' ) {
				vinsert += ' ' + wppb_esc_html( wppb_imgs[cid].img_caption ) + '[/caption]';
			}
			vinsert += '\n';
			if ( ! tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden() ) {
				wppb_insert_caret( eid, vinsert );
			} else {
				tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, vinsert );
			}
		}
		jQuery.colorbox.close();
	} );

	jQuery( "#wppb_featured" ).live( "click", function() {
		var file_url = jQuery( '#wppb_url' ).val();
		var title = jQuery( '#wppb_title' ).val();
		var caption = jQuery( '#wppb_caption' ).val();
		jQuery( '#wppb_featured_url' ).val( file_url );
		jQuery( '#wppb_featured_title' ).val( title );
		jQuery( '#wppb_featured_caption' ).val( caption );
		jQuery( '#postimagediv div.inside img' ).remove();
		jQuery( '#postimagediv div.inside' ).prepend( '<img src="' + file_url + '" width="270"/>' );
		jQuery.colorbox.close();
	} );

	jQuery( "#remove-post-thumbnail" ).live( "click", function() {
		jQuery( '#wppb_featured_url' ).val( '' );
	} );

	jQuery( ".wppb_item-overlay" ).live( "click", function( event ) {
		var checkbox = jQuery( this ).parent().find( ':checkbox' );
		var checkbox_id = jQuery( this ).attr( 'rel' );

		jQuery.colorbox.resize( {width: "930px", height: "460px"} );
		wppb_opened = true;
		wppb_current = checkbox_id;

		if ( event.ctrlKey ) {

			if ( ! checkbox.is( ':checked' ) ) {
				wppb_selected.push( checkbox_id );
			} else {
				wppb_selected.splice( wppb_selected.indexOf( checkbox_id ), 1 );
			}

			checkbox.attr( 'checked', ! checkbox.is( ':checked' ) );
		} else {
			if ( ! checkbox.is( ':checked' ) ) {
				wppb_selected = [checkbox_id];
				jQuery( '#wppb_popup' ).find( 'input:checkbox' ).removeAttr( 'checked' );
				checkbox.attr( 'checked', ! checkbox.is( ':checked' ) );
			}
		}

		jQuery( "#wppb_use-image" ).show();
		jQuery( '#wppb_title' ).val( wppb_imgs[checkbox_id].img_title );
		jQuery( '#wppb_caption' ).val( wppb_imgs[checkbox_id].img_caption );
		jQuery( '#wppb_width' ).val( wppb_imgs[checkbox_id].img_width );
		jQuery( '#wppb_height' ).val( wppb_imgs[checkbox_id].img_height );
		jQuery( '#wppb_url' ).val( wppb_imgs[checkbox_id].img_full );
		jQuery( '#wppb_view' ).html( '<img src="' + wppb_imgs[checkbox_id].img_full + '"/>' );
		jQuery( '#wppb_error' ).html( '' );

		jQuery( '#wppb_insert' ).val( 'Insert (' + wppb_selected.length + ')' );
		jQuery( '#wppb_save' ).val( 'Save&Insert (' + wppb_selected.length + ')' );
	} );

	jQuery( "#wppb_title" ).change( function() {
		wppb_change_value( wppb_current, 'img_title', jQuery( this ).val() );
	} );

	jQuery( "#wppb_caption" ).change( function() {
		wppb_change_value( wppb_current, 'img_caption', jQuery( this ).val() );
	} );

	jQuery( "#wppb_width" ).change( function() {
		wppb_change_value( wppb_current, 'img_width', jQuery( this ).val() );
	} );

	jQuery( "#wppb_height" ).change( function() {
		wppb_change_value( wppb_current, 'img_height', jQuery( this ).val() );
	} );
} );

function wppb_showimages( page ) {
	if ( jQuery( "#wppb_input" ).val() == '' ) {
		alert( 'Please enter keyword to search!' );
	} else {
		var pxb_url = '';
		var pxb_key = wppb_vars.wppb_key;
		var pxb_number = 8;
		var pxb_hires = jQuery( '#wppb_hires' ).val();
		if ( pxb_hires != 'no' ) {
			pxb_url = "https://pixabay.com/api/?response_group=high_resolution&key=" + pxb_key + "&lang=" + jQuery( '#wppb_language' ).val() + "&category=" + jQuery( '#wppb_category' ).val() + "&image_type=" + jQuery( '#wppb_type' ).val() + "&orientation=" + jQuery( '#wppb_orientation' ).val() + "&editors_choice=" + jQuery( '#wppb_editorchoice' ).val() + "&order=" + jQuery( '#wppb_order' ).val() + "&safesearch=" + jQuery( '#wppb_safesearch' ).val() + "&q=" + encodeURIComponent( jQuery( '#wppb_input' ).val() ) + "&per_page=" + pxb_number + "&page=" + page;
		} else {
			pxb_url = "https://pixabay.com/api/?key=" + pxb_key + "&lang=" + jQuery( '#wppb_language' ).val() + "&category=" + jQuery( '#wppb_category' ).val() + "&image_type=" + jQuery( '#wppb_type' ).val() + "&orientation=" + jQuery( '#wppb_orientation' ).val() + "&editors_choice=" + jQuery( '#wppb_editorchoice' ).val() + "&order=" + jQuery( '#wppb_order' ).val() + "&safesearch=" + jQuery( '#wppb_safesearch' ).val() + "&q=" + encodeURIComponent( jQuery( '#wppb_input' ).val() ) + "&per_page=" + pxb_number + "&page=" + page;
		}
		jQuery( '#wppb_search' ).val( 'Search...' );
		jQuery( '#wppb_container' ).html( '' );
		jQuery( '#wppb_page' ).html( '' );
		jQuery.ajax( {
			url: pxb_url,
			dataType: 'jsonp',
			success: function( data ) {
				jQuery( '#wppb_search' ).val( 'Search' );
				if ( data.totalHits > 0 ) {
					for ( var i = 0; i < data.hits.length; i ++ ) {
						img_id = data.hits[i].id;
						img_ext = data.hits[i].webformatURL.split( '.' ).pop().toUpperCase().substring( 0, 4 );
						img_thumb = data.hits[i].previewURL;
						if ( data.hits[i].hasOwnProperty( 'pageURL' ) ) {
							img_site = data.hits[i].pageURL;
						} else {
							img_site = 'https://pixabay.com';
						}
						if ( data.hits[i].hasOwnProperty( 'tags' ) ) {
							img_title = String( data.hits[i].tags );
						} else if ( data.hits[i].hasOwnProperty( 'user' ) ) {
							img_title = data.hits[i].user + ' (CC0), Pixabay';
						} else {
							img_title = '';
						}
						if ( data.hits[i].hasOwnProperty( 'user' ) ) {
							img_caption = data.hits[i].user + ' (CC0), Pixabay';
						} else {
							img_caption = '';
						}

						img_full = data.hits[i].webformatURL;
						img_width = data.hits[i].webformatWidth;
						img_height = data.hits[i].webformatHeight;

						if ( (
							     pxb_hires == 'large'
						     ) && data.hits[i].hasOwnProperty( 'largeImageURL' ) ) {
							img_id = data.hits[i].id_hash;
							img_full = data.hits[i].largeImageURL;
							img_width = 1280;
							img_height = '';
							img_site = 'https://pixabay.com/goto/' + img_id;
						}

						if ( (
							     pxb_hires == 'fullhd'
						     ) && data.hits[i].hasOwnProperty( 'fullHDURL' ) ) {
							img_id = data.hits[i].id_hash;
							img_full = data.hits[i].fullHDURL;
							img_width = 1920;
							img_height = '';
							img_site = 'https://pixabay.com/goto/' + img_id;
						}

						if ( (
							     pxb_hires == 'original'
						     ) && data.hits[i].hasOwnProperty( 'imageURL' ) ) {
							img_id = data.hits[i].id_hash;
							img_full = data.hits[i].imageURL;
							img_width = data.hits[i].imageWidth;
							img_height = data.hits[i].imageHeight;
							img_site = 'https://pixabay.com/goto/' + img_id;
						}
						if ( img_height != '' ) {
							jQuery( '#wppb_container' ).append( '<div class="wppb_item" bg="' + img_thumb + '"><div class="wppb_item-overlay" rel="' + img_id + '"></div><div class="wppb_check"><input type="checkbox" value="' + img_id + '"/></div><span>' +
							                                    img_ext + ' | ' + img_width + ' x ' + img_height + '</span></div>' );
						} else {
							jQuery( '#wppb_container' ).append( '<div class="wppb_item" bg="' + img_thumb + '"><div class="wppb_item-overlay" rel="' + img_id + '"></div><div class="wppb_check"><input type="checkbox" value="' + img_id + '"/></div><span>' +
							                                    img_ext + ' | ' + img_width + '</span></div>' );
						}
						wppb_imgs[img_id] = {
							img_ext: img_ext,
							img_site: img_site,
							img_thumb: img_thumb,
							img_full: img_full,
							img_width: img_width,
							img_height: img_height,
							img_title: img_title,
							img_caption: img_caption
						};
					}

					jQuery( '.wppb_item' ).each( function() {
						imageUrl = jQuery( this ).attr( 'bg' );
						jQuery( this ).css( 'background-image', 'url(' + imageUrl + ')' );
					} );

					var vpages = "About " + data.totalHits + " results / Pages: ";

					if ( (
						     data.totalHits / pxb_number + 1
					     ) < 10 ) {
						for ( var j = 1; j < data.totalHits / pxb_number + 1; j ++ ) {
							vpages += '<a href="javascript: void (0);" rel="' + j + '" title="Page ' + j + '">' + j + '</a> ';
						}
					} else {
						vpages += '<select id="wppb_page-select" class="wppb_page-select">';
						for ( var j = 1; j < data.totalHits / pxb_number + 1; j ++ ) {
							vpages += '<option value="' + j + '"';
							if ( j == page ) {
								vpages += ' selected';
							}
							vpages += '>' + j + '</option> ';
						}
						vpages += '</select>';
					}

					jQuery( '#wppb_page' ).html( vpages );
				} else {
					jQuery( '#wppb_container' ).html( 'No result! Please try again!' );
					jQuery( '#wppb_page' ).html( '' );
				}
			}
		} );
	}
}

function wppb_isurl( str ) {
	var pattern = new RegExp( '^(https?:\\/\\/)?' + // protocol
	                          '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|' + // domain name
	                          '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
	                          '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
	                          '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
	                          '(\\#[-a-z\\d_]*)?$', 'i' ); // fragment locator
	return pattern.test( str );
}

function wppb_change_value( img_id, img_field, img_value ) {
	wppb_imgs[img_id][img_field] = img_value;
}

function wppb_insert_caret( areaId, text ) {
	var txtarea = document.getElementById( areaId );
	var scrollPos = txtarea.scrollTop;
	var strPos = 0;
	var br = (
		(
			txtarea.selectionStart || txtarea.selectionStart == '0'
		) ?
			"ff" : (
			document.selection ? "ie" : false
		)
	);
	if ( br == "ie" ) {
		txtarea.focus();
		var range = document.selection.createRange();
		range.moveStart( 'character', - txtarea.value.length );
		strPos = range.text.length;
	}
	else if ( br == "ff" ) {
		strPos = txtarea.selectionStart;
	}

	var front = (
		txtarea.value
	).substring( 0, strPos );
	var back = (
		txtarea.value
	).substring( strPos, txtarea.value.length );
	txtarea.value = front + text + back;
	strPos = strPos + text.length;
	if ( br == "ie" ) {
		txtarea.focus();
		var range = document.selection.createRange();
		range.moveStart( 'character', - txtarea.value.length );
		range.moveStart( 'character', strPos );
		range.moveEnd( 'character', 0 );
		range.select();
	}
	else if ( br == "ff" ) {
		txtarea.selectionStart = strPos;
		txtarea.selectionEnd = strPos;
		txtarea.focus();
	}
	txtarea.scrollTop = scrollPos;
}

function wppb_esc_html( html ) {
	var fn = function( tag ) {
		var charsToReplace = {
			'&': '&amp;',
			'<': '&lt;',
			'>': '&gt;',
			'"': '&#34;'
		};
		return charsToReplace[tag] || tag;
	}
	if ( typeof html !== 'string' ) {
		return '';
	} else {
		return html.replace( /[&<>"]/g, fn );
	}
}