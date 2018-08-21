(function ($){
    $(document).ready( function () {
        var last_search = '';
        var delay_search = false;
        var ajax_request = false;
        var $current_search = $('');
        $(document).on('click', '.br_products_search', function() {
            $(this).find('.br_search_input').focus();
        });
        $(document).on('click', '.br_products_search .button', function(event) {
            event.stopPropagation();
            $(this).remove();
        });
        $(document).on('click', '.br_search_box', function(event) {
            event.stopPropagation();
            var $current = $(this).find('.br_search_result');
            if( $current.length == 0 ) {
                $('.br_search_result').remove();
                last_search = '';
                $current_search = $('');
            } 
        });
        $(document).on('keyup focus', '.br_search_input', function(event) {
            if( delay_search ) {
                clearTimeout(delay_search);
            }
            var $search_block = $(this);
            var $search_box = $search_block.parents('.br_search_box');
            $current_search = $(this).parents('.br_search_box');
            delay_search = setTimeout( function () {
                if( $search_block.val().length >= 3 && $search_block.val() != last_search ) {
                    $('.br_search_result').remove();
                    last_search = $search_block.val();
                    var exists = [];
                    $search_box.find('.br_products_suggest input').each(function( i, o ) {
                        exists.push($(o).val());
                    });
                    var data = {
                        action: $search_block.data('action'),
                        term: $search_block.val(),
                        security: berocket_global_admin.security
                    };
                    stop_search();
                    $search_box.find('.br_products_suggest_search').append($('<span class="br_loads"><i class="fa fa-spinner fa-spin"></i></span>'));
                    ajax_request = $.get(ajaxurl, data, function (data) {
                        $current_search = $search_box;
                            var count = 0;
                            var html = '<ul class="br_search_result">';
                            $.each(data, function(index, value) {
                                if( $.inArray(index, exists) == -1 ) {
                                    html += '<li data-id="'+index+'">'+value+'</li>';
                                    count++;
                                }
                            });
                            html += '</ul>';
                            if( count > 0 ) {
                                $result_block = $(html);
                                $result_block = $('body').append($result_block);
                                $('.br_search_result').css('position', 'absolute')
                                .css('top', $search_box.offset().top+$search_box.height())
                                .css('left', $search_box.offset().left)
                                .outerWidth($search_box.outerWidth());
                            }
                            $('.br_products_suggest_search .br_loads').remove();
                        }, 'json');
                } else {
                    stop_search();
                }
            }, 500 );
        });
        $(document).on('click', '.br_search_result li', function(event) {
            var html = '<li class="br_products_suggest button"><input data-name="'+$current_search.data('name')+'" name="'+$current_search.data('name')+'" type="hidden" value="'+$(this).data('id')+'"><i class="fa fa-times"></i>'+$(this).text()+'</li>';
            $current_search.find('.br_products_search li').last().before($(html));
            $('.br_search_result').remove();
            last_search = '';
            $current_search.find('.br_search_input').val('');
            $current_search = $('');
        });
        $(document).on('click', function(event) {
            $('.br_search_result').remove();
            last_search = '';
            $current_search = $('');
            stop_search();
        });
        function stop_search() {
            if ( ajax_request !== false ) {
                ajax_request.abort();
            }
            $('.br_products_suggest_search .br_loads').remove();
        }
    });
})(jQuery);