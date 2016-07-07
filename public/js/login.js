(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-55581850-1', 'auto', {'allowLinker': true});
ga('require', 'linker');
ga('linker:autoLink', ['danstools.com','unixtimestamp.com','url-encode-decode.com','cssfontstack.com','hexcolortool.com','htaccessredirect.net','jspretty.com','jsmini.com','jsobfuscate.com','md5hashgenerator.com','regextester.com','cleancss.com','favicon-generator.org','website-performance.org','permissions-calculator.org','conversoes.org','convertissez.fr','convertitore.net','elconvertidor.com','files-conversion.com','henkan-muryo.com','konvertirung.org','konvertor.org','tahwil.net','zhuan-huan.com','bootsnipp.com'] );
ga('send', 'pageview');

window.onload = function() {
    setTimeout(function() {
        var ad = document.querySelector(".bsap_ac1f95c148ce6148393fd34e69a52240");
        var promos = document.querySelectorAll(".tr9z2");
        var isblock = 0;
        for (var i = 0; i < promos.length; i++) {
            var promo = promos[i];
            if (isblock ==1 || (ad && ad.innerHTML.replace(/\s/g, "").length == 0)) {
                isblock = 1;
//            ad.style.cssText = 'display:block !important';
//          promo.style.cssText = 'display:none !important';
                promo.innerHTML = '<a href="https://www.bidnapper.com/?refuser=danstools" ><div id="tr9z22" style="background-color:#FCFCFC;width: 728px;height:90px;padding:10px;border:1px solid #cccccc;text-align:left;">\
<h4 style="margin-top:0px;margin-bottom:2px">\
<i class="fa fa-screenshot"></i> Win More eBay Auctions</h4>\
<span style="color:#000000;text-decoration:none;">Bid in the final seconds on eBay. Win more, save money, fast, and free.</span>\
</div></a>';
                promo.style.display= 'inline-block';
                promo.style.visibility= 'visible';
                promo.style.maxWidth= '';
            } else if (promo) {
                promo.innerHTML = '<center>\
<div id="tr9z22" style="background-color:#FCFCFC;width: 728px;height:90px;padding:10px;border:1px solid #cccccc;text-align:left;">\
<h5 style="margin-top:0px;margin-bottom:2px">\
<i class="fa fa-screenshot"></i> <a href="https://www.bidnapper.com/?refuser=danstools" >Win More eBay Auctions</a></h5>\
Bid in the final seconds on eBay. Win more, save money, fast, and free.\
</div>\
</center>';
//            var promotwo = document.querySelector("#toppromo2");
                promo.childNodes[0].childNodes[0].style.width= '';
            }
        }
    }, 1000);
};