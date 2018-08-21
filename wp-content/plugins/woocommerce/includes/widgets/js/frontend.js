(function ($){
    $(document).ready( function () {
        products_of_day_execute_func( the_products_of_day_js_data.script.js_page_load );
    });
})(jQuery);
function products_of_day_execute_func ( func ) {
    if( the_products_of_day_js_data.script != 'undefined'
        && the_products_of_day_js_data.script != null
        && typeof func != 'undefined' 
        && func.length > 0 ) {
        try{
            eval( func );
        } catch(err){
            alert('You have some incorrect JavaScript code (Product Of The Day)');
        }
    }
}