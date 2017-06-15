// BY TAREQ STARTS // 
var baseUrl = '/zaid';

// calender input
$(".ui-datepicker").datepicker({
    inline: true,
    showOtherMonths: true,
    dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
});
// this function to open finder popup to select image
function finderPopup(inputId) {
    var finderPopup = CKFinder.popup( {
	chooseFiles: true,
	width: 800,
	height: 600,
	onInit: function( finder ) {
	    console.log('lol');
	    finder.on( 'files:choose', function( evt ) {
		var file = evt.data.files.first();
		var output = document.getElementById( inputId );
		output.value = file.getUrl();
	    } );

	    finder.on( 'file:choose:resizedImage', function( evt ) {
		var output = document.getElementById( inputId );
		output.value = evt.data.resizedUrl;
	    } );
	}
    } );
}
try{
var ckeditor = CKEDITOR.replace( 'ckeditor',{
    filebrowserBrowseUrl: baseUrl + '/public/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: baseUrl + '/public/ckfinder/ckfinder.html?type=Images',
    filebrowserUploadUrl: baseUrl + '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: baseUrl + '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
});
}catch(err){
    console.log(err);
}

// BY TAREQ ENDS //

//----START--------ANIMATE ON SCROLL----------------//
try{
    wow = new WOW({animateClass: 'animated',
		   offset: 100});
    wow.init();
    //----END----------ANIMATE ON SCROLL------------//
    //----START----Smooth Scroll TO DIV -------------//

    $('.menu ul li a').click(function(){
	$('html, body').animate({
            scrollTop: $('#' + $(this).data('value')).offset().top
	},1000);
    });
    //----END---Smooth Scroll TO DIV ---------------//
    //----START---- Counter -------------//
    $('.count').each(function () {
	$(this).prop('Counter',0).animate({
            Counter: $(this).text()
	}, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
		$(this).text(Math.ceil(now));
            }
	});
    });
    //----END---- Counter -------------//
}catch(err){
    console.log(err);
}
