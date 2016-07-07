/**
 * Created by Ladislav.Niderle on 28.06.2016.
 */
var fb_param = {};
fb_param.pixel_id = '6007046190250';
fb_param.value = '0.00';
(function(){
    var fpw = document.createElement('script');
    fpw.async = true;
    fpw.src = '//connect.facebook.net/en_US/fp.js';
    var ref = document.getElementsByTagName('script')[0];
    ref.parentNode.insertBefore(fpw, ref);
})();