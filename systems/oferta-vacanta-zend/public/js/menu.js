jQuery(function($) {

	/* highlight current menu group
	------------------------------------------------------------------------- */
//	$('#menu-group li[id="group-' + current_group_id + '"]').addClass('current');

	/* global ajax setup
	------------------------------------------------------------------------- */
	$.ajaxSetup({
		type: 'GET',
		datatype: 'json',
		timeout: 20000
	});
	$('#loading').ajaxStart(function() {
		$(this).show();
	});
	$('#loading').ajaxStop(function() {
		$(this).hide();
	});

	/* modal box
	------------------------------------------------------------------------- */
	gbox = {
		defaults: {
			autohide: false,
			buttons: {
				'Close': function() {
					gbox.hide();
				}
			}
		},
		init: function() {
			var winHeight = $(window).height();
			var winWidth = $(window).width();
			var box =
				'<div id="gbox">' +
					'<div id="gbox_content"></div>' +
				'</div>' +
				'<div id="gbox_bg"></div>';

			$('body').append(box);

			$('#gbox').css({
				top: '15%',
				left: winWidth / 2 - $('#gbox').width() / 2
			});

			$('#gbox_close, #gbox_bg').click(gbox.hide);
		},
		show: function(options) {
			var options = $.extend({}, this.defaults, options);
			switch (options.type) {
				case 'ajax':
					$.ajax({
						type: 'GET',
						datatype: 'html',
						url: options.url,
						success: function(data) {
							options.content = data;
							gbox._show(options);
						}
					});
					break;
				default:
					this._show(options);
					break;
			}
		},
		_show: function(options) {
			$('#gbox_footer').remove();
			if (options.buttons) {
				$('#gbox').append('<div id="gbox_footer"></div>');
				$.each(options.buttons, function(k, v) {
					buttonclass = '';
					if (k == 'Save' || k == 'Yes' || k == 'OK') {
						buttonclass = 'primary';
					}
					$('<button></button>').addClass(buttonclass).text(k).click(v).appendTo('#gbox_footer');
				});
			}

			$('#gbox, #gbox_bg').fadeIn();
			$('#gbox_content').html(options.content);
			$('#gbox_content input:first').focus();
			if (options.autohide) {
				setTimeout(function() {
					gbox.hide();
				}, options.autohide);
			}
		},
		hide: function() {
			$('#gbox').fadeOut(function() {
				$('#gbox_content').html('');
				$('#gbox_footer').remove();
			});
			$('#gbox_bg').fadeOut();
		}
	};
	gbox.init();

	/* same as baseUrl() in php
	------------------------------------------------------------------------- */
	function site_url(url) {
		return BASE_URL + url;
	}

	/* nested sortables
	------------------------------------------------------------------------- */
	var menu_serialized;
	var fixSortable = function() {
		if (!$.browser.msie) return;
		//this is fix for ie
		$('#menu').NestedSortableDestroy();
		$('#menu').NestedSortable({
			accept: 'sortable',
			helperclass: 'ns-helper',
			opacity: .8,
			handle: '.ns-title',
			onStop: function() {
				fixSortable();
			},
			onChange: function(serialized) {
				menu_serialized = serialized[0].hash;
				$('#btn-save-menu').attr('disabled', false);
			}
		});
	};
	$('#menu').NestedSortable({
		accept: 'sortable',
		helperclass: 'ns-helper',
		opacity: .8,
		handle: '.ns-title',
		onStop: function() {
			fixSortable();
		},
		onChange: function(serialized) {
			menu_serialized = serialized[0].hash;
			$('#btn-save-menu').attr('disabled', false);
		}
	});

	/* edit menu item
	------------------------------------------------------------------------- */
	$('.edit-menu').live('click', function() {
		var menu_id = $(this).next().next().val();
		var menu_div = $(this).parent().parent();
		var li = $(this).closest('li');
		gbox.show({
            type: 'ajax',
            url: site_url('/admin/menu/edit-form/id/' + menu_id),
			buttons: {
				'Save': function() {
					$.ajax({
						type: 'POST',
						url: $('#gbox form').attr('action'),
						data: $('#gbox form').serialize(),
						success: function(data) {
							switch (data.status) {
								case 1:
                                    gbox.show({
                                        content: 'Menu item edited successfully.',
                                        autohide: 2000
                                    });
									menu_div.find('.ns-title').html(data.menu.title);
									menu_div.find('.ns-url').html(data.menu.url);
									menu_div.find('.ns-class').html(data.menu.klass);
									break;
								case 2:
									gbox.hide();
									break;
								case 4:
									gbox.hide();
									li.remove();
									break;
							}
						}
					});
				},
				'Cancel': gbox.hide
			}
		});
		return false;
	});

	/* delete menu item
	------------------------------------------------------------------------- */
	$('.delete-menu').live('click', function() {
		var li = $(this).closest('li');
		var param = { id : $(this).next().val() };
		var menu_title = $(this).parent().parent().children('.ns-title').text();
		gbox.show({
			content: '<h2>Delete Menu Item</h2>Are you sure you want to delete this menu item?<br><b>'
				+ menu_title +
				'</b><br><br>This will also delete all sub items.',
			buttons: {
				'Yes': function() {
					$.ajax({
                        type: 'POST',
                        url: site_url('/admin/menu/delete/'),
                        data: param,
                        success: function(data) {
                            console.log(data);
                            if (data.success) {
                                gbox.show({
                                    content: 'Menu item deleted successfully.',
                                    autohide: 2000
                                });
                                li.remove();
                            } else {
                                gbox.show({
                                    content: 'Failed to delete this menu item.',
                                    autohide: 2000
                                });
                            }
                        }
                    });
				},
				'No': gbox.hide
			}
		});
		return false;
	});

	/* add menu item
	------------------------------------------------------------------------- */
	$('#form-add-menu').submit(function() {
		if ($('#menu-title').val() == '') {
			$('#menu-title').focus();
		} else {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				error: function(e) {
                    console.log(e);
					gbox.show({
						content: 'Add menu item error. Please try again.',
						autohide: 2000
					});
				},
				success: function(data) {
                    console.log(data);
					switch (data.status) {
						case 1:
							$('#form-add-menu')[0].reset();
							$('#menu')
								.append(data.li)
								.SortableAddItem($('#'+data.li_id)[0]);
                            gbox.show({
                                content: data.msg,
                                autohide: 2000
                            });
							break;
						case 2:
							gbox.show({
								content: data.msg,
                                autohide: 2000
							});
							break;
						case 3:
							$('#menu-title').val('').focus();
							break;
					}
				}
			});
		}
		return false;
	});

	$('#gbox form').live('submit', function() {
		return false;
	});

	/* update menu / save order
	------------------------------------------------------------------------- */
	$('#form-menu').submit(function() {
		$('#btn-save-menu').attr('disabled', true);
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: menu_serialized,
			error: function() {
				$('#btn-save-menu').attr('disabled', false);
				gbox.show({
					content: '<h2>Error</h2>Save menu error. Please try again.',
                    autohide: 2000
				});
			},
			success: function(data) {
                console.log(data);
				gbox.show({
					content: '<h2>Success</h2>Menu has been saved',
                    autohide: 2000
				});
                $('#btn-save-menu').attr('disabled', false);
			}
		});
		return false;
	});

});