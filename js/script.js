$("footer .info .connect img").on('mouseenter',function(e) {
	var $radio = $(e.target).parent().children('input:radio');
	$radio.prop('checked', true);
});

var entryregtimer = 500;
function hideentry(showreg) {
	$('.entry').addClass("entry_out_an");
	setTimeout(function () {
      $('.entry').removeClass('entry_out_an');
      $('.entry').css('display','none');

      if (showreg) {
      	 $('.reg').css('display', 'block');
      }
    }, entryregtimer);/*зависит от времени окончания css анимации!!!*/
}

function hidereg(showentry) {
	if ($('.help').css('display') == 'block') $('.help').fadeOut(500);
	$('.reg').addClass("reg_out_an");
	setTimeout(function () {
      $('.reg').removeClass('reg_out_an');
      $('.reg').css('display','none');

      if (showentry) {
      	 $('.entry').css('display', 'block');
      }
    }, entryregtimer);/*зависит от времени окончания css анимации!!!*/
}

function entryOn() {
	$('.cover').fadeOut(500);
    
    if ($('header .login span').text() == 'Вход'){
		hidereg(false);
	}else{
		hideentry(false);
	}

	$('header .login').removeClass("red");
	$('header .login span').text('Вход');
}

function entryOff() {
	$('.entry').removeClass('entry_out_an');
	$('.reg').removeClass('reg_out_an');
    $('.entry').css('display', 'none');
    $('.cover').css('display', 'none');
    $('.reg').css('display', 'none');

	$('.cover').css('display', 'block');
	$('.entry').css('display', 'block');
	$('header .login').addClass("red");
	$('header .login span').text('Регистрация');
}

var enlogin = false;
$("header .login").on('click', function() {
	if (enlogin) {
		if ($('header .login span').text() == 'Вход'){
			hidereg(true);
			$('header .login span').text('Регистрация');
		}else {
			hideentry(true);
			$('header .login span').text('Вход');
		}
	}else {
		entryOff();
		enlogin = true;
	}

	
});

$(".cover").on('click', function() {
	entryOn();
	enlogin = false;
});


$('form').submit(function(event){
	event.preventDefault();

	$.ajax({
		type: $(this).attr('method'),
		url: $(this).attr('action'),
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success: function(data){
			alert(data);
		}
	});
});

function getChar(event) {
  if (event.which == null) { // IE
    if (event.keyCode < 32) return null; // спец. символ
    return String.fromCharCode(event.keyCode)
  }

  if (event.which != 0 && event.charCode != 0) { // все кроме IE
    if (event.which < 32) return null; // спец. символ
    return String.fromCharCode(event.which); // остальные
  }

  return null; // спец. символ
}

var helpfollow = $(".reg .login");
var helptimer = 6000;
var timeoutID;
$(window).resize(function(){
	if ($('.help').css('display') == 'block'){
		$('.help').css('top', helpfollow.offset().top);
		$('.help').css('left', helpfollow.offset().left + helpfollow.width());
	}
});

var fltline = "qwertyuiopasdfghjklzxcvbnmZXCVBNMASDFGHJKLQWERTYUIOP1234567890-._";
$(".reg .flt").keypress(function(event) {
	if ($(event.target).val().length >= 20) { event.preventDefault(); return;}
	if (fltline.indexOf(getChar(event)) == -1) {
		if (timeoutID != null) clearTimeout(timeoutID);

		$('.help span').text('Логин и пароль могут состоять только из букв латинского алфавита, цифр, а также символов: "-", "." и "_"');
		helpfollow = $(event.target);
		$('.help').css('top', helpfollow.offset().top);
		$('.help').css('left', helpfollow.offset().left + helpfollow.width());
		$('.help').fadeIn(500);
		
		timeoutID = setTimeout(function(){$('.help').fadeOut(500);}, helptimer);
		event.preventDefault();
	}
});

$('.help').click(function(){
	if (timeoutID != null) clearTimeout(timeoutID);
	$('.help').fadeOut(500);
});

 $(".reg .flt").bind("paste", function(){ return false; });
