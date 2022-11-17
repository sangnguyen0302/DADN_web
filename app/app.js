var App = {};

var addRoutes = function () {
    $NB.addRoute('/books/:id', function (params) {
        console.log('Route is ', params.Title, params.id);
    }, 'books');

    $NB.addRoute('/:category/:id', function (params) {
        console.log('Route is ', params.Title, params.category, params.id);
    }, 'category');

    $NB.addRoute('/:category/:id/:action', function (params) {
        console.log('Route is ', params.Title, params.category, params.id, params.action);
    }, 'category action');


    $NB.addRoute(['/', '/:pagename'], function (params) {
        console.log('Route is ', params.Title, params.pagename);
    }, 'page');
};



App.init = function () {
    addRoutes();
    $NB.loadController(location.pathname);
};

App.navigateTo = function (pageUrl) {
    $NB.navigateTo(pageUrl);
    // $.ajax({url: pageUrl, success: function(result){
    //    console.log(result);
    // //     //$('html').html(result);
    // //     //document.open(result, "replace");
    // //     //$('body').load(result);
    // }});
   // $('html').load(pageUrl + " title ~ ");
     //$(document).load(pageUrl+" head");
    // console.log(pageUrl+" body");
     $('head title').load(pageUrl+" title", '', function(data) {
        document.title = $(this).text();
        });
     $('body').load(pageUrl+" title ~");
    return false;
};
function sendTo(url,url2=null){
console.log(url)
var ajaxurl = url,
data =  {};
$.post(ajaxurl, data, function (response) {
    // Response div goes here.
    //javascript:window.top.location.reload(true);
    if (url2===null) javascript:App.navigateTo(window.location.href);
    else sendTo(url2);
    //alert("action performed successfully");
});
return false;
}
