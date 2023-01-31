$(document).ready(function() {

    $('#top_sidebar').blurjs({
        source: '#top_sidebar',
        radius: 10,
        cache: true
    });

});

//PJAX
$(document).pjax('a[data-pjax]');

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-55691247-1', 'auto');
ga('send', 'pageview');