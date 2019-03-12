$(“document”).ready(function() {

 

$(“h4:first”).css(“background-color”, “yellow”);

 

$(“p:last”).css({“background-color”: “purple”, “color”: “white”});

 

$(“p span:first-child”).css(“background-color”, “orange”);

 

$(“div p:last-child”).css(“background-color”, “cyan”);

 

$(“div p:last-child”).css(“background-color”, “cyan”);

 

$(“div:nth-child(1)”).css(“background-color”, “pink”);

 

$(“span:eq(2)”).css(“background-color”, “purple”); // These are 0 based

 

$(“h4:gt(1)”).css(“background-color”, “green”); // All h4 after index 1

 

$(“h4:lt(2)”).css(“background-color”, “olive”); // All h4 before index 2

 

$(‘#clickToHide’).click(function() {

$(‘#clickToHide’).hide(); });

 

$(‘#bringItBack’).click(function() {

if ($(‘#clickToHide’).is(‘:visible’)) {

$(‘#clickToHide’).hide();

$(this).val(‘Bring Back’);

// This changes the value on the button

}

else {

$(‘#clickToHide’).show();

$(this).val(‘Delete Text’);

// This changes the value on the button

}

});

// You can also replace hide & show with fadeIn or fadeOut

// Also you can use slideDown & slideUp

// You can play with the speed by giving values in milliseconds or slow // fast, or normal ex. fadeIn(1000) or fadeOut(slow)

 

 

});