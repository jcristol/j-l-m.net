//menu show/hide
$(document).ready(function(){

  if($('.menu-button').hasClass('clicked')) {
    $('body').click(function(){
      $(this).removeClass("clicked");
      $('.menu').css("right","-168");
    });
  }

  $('.menu-button').on("click", function(){
      if($('.menu-button').hasClass('clicked')) {
          $(this).removeClass("clicked");
          $('.menu').css("right","-168");
      }
      else {
          $(this).addClass("clicked");
          $('.menu').css("right","0");
      }
  });

//film info show/hide
  $('.info-btn').on("click", function(){
      if($('.info-btn').hasClass('info-clicked')) {
          $(this).removeClass("info-clicked");
          $('.overlay-info').css("left","-250px");
          $('.info-btn').html('<i class="fa fa-angle-double-right info-btn-ct" aria-hidden="true"></i>');
      } else {
          $(this).addClass("info-clicked");
          $('.overlay-info').css("left","0px");
          $('.info-btn').html('<i class="fa fa-angle-double-left info-btn-ct" aria-hidden="true"></i>');
      }
  });

  $('.film-submit').click(function() {
    //console.log('first checkpoint hurray');
    var formData = new FormData($('.post-film')[0]);

    //console.log('copy');
    //console.log(formData);

  	jQuery.ajax({
  	 type: "POST",
  	 data: formData,
  	 url: "/update.php?type=post",
  	 cache: false,
     contentType: false,
     processData: false,
  	 success: function(response) {
       alert('success'); //will be fetching data/displaying (formdata?) to div on /submit
  	},
     error: function(response) {
       alert('failure'); // alert detailing error
     }
   });

  });

  /*$('.red').hover(
    function(){
      $('.left-cc').css("background-color","rgba(178,34,34,.65)");
      $('.red').css("border","0px solid #ccc");
    },
    function(){
      $('.left-cc').css("background-color","white");
      $('.red').css("border","1px solid #ccc");
    }
  );*/

  function infoHover(type) {

  }
  function filmmakerHover() {
    $('.filmmaker-txt').css("opacity:","1");
    $('.filmmaker-box').css("opacity:","1");

  }

});

$('.left-float').ready(function(){
  $('.info-bar').addClass('ready');
  console.log("hello");
});

//check size of window, correct menu position
$(window).resize(function(){
  if($(window).width() > "601") {
    $('.menu').css("left","0");
    $('.menu').css("right","");
  }
  else {
    $('.menu').css("right","-168");
    $('.menu').css("left","");
  }
});

/*

YOUTUBE OVERYLAY

*/

//calling functions

//onYouTubeIframeAPIReady('AXxnOOh8BMQ');

var player, playing = false;
var paused = true;

    function onPlayerStateChange(event) {
        if(!playing){

            $('.overlay-info').css("left","-250px");
            $('.overlay-info').css("z-index","0");

            if($(window).width() > 600) {
              $('.info-btn').css("left","0px");
            }
            else {
              $('.info-btn').css("left","-55px");
            }

            playing = true;
        }
    }

//quotes array
$(document).ready(function() {

var quotes = [
  "You're not wrong,<br>you're just an asshole.",
  "Damn!<br>We're in a tight spot.",
  "Of course it depends,<br>of course it depends.",
  //"There is no eleven,<br>you fucking whore!",
  "We must make an idol of our fear, and call it god.",
  "Is this it?<br>Is this really it?"
];

var source = [
  "The Dude",
  "Ulysses Everett McGill",
  "Zero",
  //"Church",
  "Antonius Block",
  "Kohayagawa Manbei"
];

var source_link = [
  "http://www.imdb.com/title/tt0118715/quotes/qt0464814?mavIsAdult=false",
  "http://www.imdb.com/title/tt0190590/quotes/qt0403999?mavIsAdult=false",
  "http://www.imdb.com/title/tt2278388/quotes/qt2214528?mavIsAdult=false",
  //"http://rvb.wikia.com/wiki/Baby_Steps",
  "http://www.imdb.com/title/tt0050976/quotes/qt0196765?mavIsAdult=false",
  "https://en.wikipedia.org/wiki/The_End_of_Summer"
]

var random = Math.floor((Math.random() * quotes.length));
//console.log(random);
$('.quote-text').html(quotes[random]);
$('.quote-author').html(source[random]);
$('.quote-source').attr('href',source_link[random]);

});



/**************************** / JS-PHP FUNCTIONS / ****************************/

// GRAVEYARD
// I NEVER CAN GET THESE MFKRS TO WORK

/*function post_film(title, summary, yt, img, d, p, w, dp, pd) {
	jQuery.ajax({
	type: "POST",
	data: {'title': title, 'summary': summary, 'yt':yt,
          'img': img, 'd': d, 'p': p, 'w': w, 'dp': dp, 'pd': pd},
	url: "/_admin/update.php?type=post",
	cache: false,
	success: function(response) {
		alert('success');
	}
	});
}*/

/*function post_note() {
  var title = document.getElementById("title").value;
  var date = Date.now();
  var content = document.getElementById("content").value;
  var dataString = 'title1=' + title + '&date1=' + date + '&content1=' + content;
	jQuery.ajax({
	type: "POST",
	url: "../notes/input.php?type=post_note",
  data: dataString,
	cache: false,
	success: function(response) {
		alert("success");
	}
	});
}*/

function loaded() {
  $('.loaded').text("loaded").delay(500).fadeOut(500);
}

$(document).ready(function(){

  //record player
  var records = [
    "dq.mp3",
    "tc.mp3",
    "wl.mp3"
  ];
  var random = Math.floor((Math.random() * records.length));


});


$(document).ready(function(){

  $('.sleepy-box').hover(function(){
    var color = $('.sleepy').css("background-color");
    $(document.body).css("background-color", color);
    },
    function(){$(document.body).css("background-color", "white");
  });
  $('.commie-box').hover(function(){
    var color = $('.commie').css("background-color");
    $(document.body).css("background-color", color);
    },
    function(){$(document.body).css("background-color", "white");
  });
  $('.turkey-box').hover(function(){
    var color = $('.turkey').css("background-color");
    $(document.body).css("background-color", color);
    },
    function(){$(document.body).css("background-color", "white");
  });
  $('.pom-box').hover(function(){
    var color = $('.pom').css("background-color");
    $(document.body).css("background-color", color);
    },
    function(){$(document.body).css("background-color", "white");
  });
  $('.blur-box').hover(function(){
    var color = $('.blur').css("background-color");
    $(document.body).css("background-color", color);
    },
    function(){$(document.body).css("background-color", "white");
  });
  $('.teeny-box').hover(function(){
    var color = $('.teeny').css("background-color");
    $(document.body).css("background-color", color);
    },
    function(){$(document.body).css("background-color", "white");
  });

  /*function choose_bon(bon, song, x, y) {

      var select = confirm("ARE YOU SURE?");
      if(select == true) {
        $('.record').attr('src',"ch.mp3");
        $('.bon-container').css("visibility","hidden");
        $('.bon-title').fadeOut(500, function(){
          $(this).text("you've chosen").fadeIn(500);
        });
        var color = $('.'+bon).css("background-color");
        $('.chosen-bon').text(bon+" bon").delay(2000).css("color", color).animate({opacity: 1}, 1000);
        var bgimg = $('.'+bon+'-box').css("background-image");
        $('.bon-img').css({"background-image": bgimg,"background-position": x+" "+y}).delay(2000).animate({opacity: 1},1000);
        $('html, body').css({
          overflow: 'hidden',
          height: '100%'
        });
        audio.play();
      }
  }*/

  $('.sleepy-box').click(function(){
    var select = confirm("ARE YOU SURE?");
    if(select == true) {
      $('.record').attr('src',"ch.mp3");
      $('.bon-container').css("visibility","hidden");
      $('.bon-title').fadeOut(500, function(){
        $(this).text("you've chosen").fadeIn(500);
      });
      var color = $('.sleepy').css("background-color");
      $('.chosen-bon').text("sleepy bon").delay(2000).css("color", color).animate({opacity: 1}, 1000);
      var bgimg = $('.sleepy-box').css("background-image");
      $('.bon-img').css({"background-image": bgimg,"background-position": "-25px -50px"}).delay(2000).animate({opacity: 1},1000);
      $('.loaded').css("opacity", 1);
      var dyk = [
        "did you know:<br>bons have been known to sleep sitting<br>straight up in the middle of the day.",
        "did you know:<br>bons don't actually sleep at all<br>instead using this time to plot against Jake",
        "did you know:<br>bons who don't sleep tend to grumpily<br>hurumph around their house like their dog gracie"
      ];
      var random = Math.floor((Math.random() * dyk.length));
      $('.dyk').html(dyk[random]).delay(6500).animate({opacity: 1}, 500);
      $('html, body').css({
        overflow: 'hidden',
        height: '100%'
      });
      audio.play();
    }
  });
  $('.commie-box').click(function(){
    var select = confirm("ARE YOU SURE?");
    if(select == true) {
      $('.record').attr('src',"wl.mp3");
      $('.bon-container').css("visibility","hidden");
      $('.bon-title').fadeOut(500, function(){
        $(this).text("you've chosen").fadeIn(500);
      });
      var color = $('.commie').css("background-color");
      $('.chosen-bon').text("commie bon").delay(2000).css("color", color).animate({opacity: 1}, 1000);
      var bgimg = $('.commie-box').css("background-image");
      $('.bon-img').css({"background-image": bgimg,"background-position": "-25px -50px"}).delay(2000).animate({opacity: 1},1000);
      $('.loaded').css("opacity", 1);
      var dyk = [
        "did you know:<br>bons have been known to volunteer their<br>families for the weekly proletariat march",
        "did you know:<br>bons tend to agree on one international policy:<br>tissues for all",
        "did you know:<br>the only man for bon is Vlady Put"
      ];
      var random = Math.floor((Math.random() * dyk.length));
      $('.dyk').html(dyk[random]).delay(6500).animate({opacity: 1}, 500);
      $('html, body').css({
        overflow: 'hidden',
        height: '100%'
      });
      audio.play();
    }
  });
  $('.turkey-box').click(function(){
    var select = confirm("ARE YOU SURE?");
    if(select == true) {
      $('.record').attr('src',"tc.mp3");
      $('.bon-container').css("visibility","hidden");
      $('.bon-title').fadeOut(500, function(){
        $(this).text("you've chosen").fadeIn(500);
      });
      var color = $('.turkey').css("background-color");
      $('.chosen-bon').text("turkey bon").delay(2000).css("color", color).animate({opacity: 1}, 1000);
      var bgimg = $('.turkey-box').css("background-image");
      $('.bon-img').css({"background-image": bgimg,"background-position": "-25px -50px"}).delay(2000).animate({opacity: 1},1000);
      $('.loaded').css("opacity", 1);
      var dyk = [
        "did you know:<br>turkey bons are actually just regular bons but<br>are good at jazz",
        "did you know:<br>in the event of a thanksgiving<br>these types of bon can be used as cannon fodder to the masses",
        "did you know:<br>if a turkey bon starts to sing<br>run for the hills there's nothing you can do"
      ];
      var random = Math.floor((Math.random() * dyk.length));
      $('.dyk').html(dyk[random]).delay(6500).animate({opacity: 1}, 500);
      $('html, body').css({
        overflow: 'hidden',
        height: '100%'
      });
      audio.play();
    }
  });
  $('.pom-box').click(function(){
    var select = confirm("ARE YOU SURE?");
    if(select == true) {
      $('.record').attr('src',"la.mp3");
      $('.bon-container').css("visibility","hidden");
      $('.bon-title').fadeOut(500, function(){
        $(this).text("you've chosen").fadeIn(500);
      });
      var color = $('.pom').css("background-color");
      $('.chosen-bon').text("pom bon").delay(2000).css("color", color).animate({opacity: 1}, 1000);
      var bgimg = $('.pom-box').css("background-image");
      $('.bon-img').css({"background-image": bgimg,"background-position": "-25px -50px"}).delay(2000).animate({opacity: 1},1000);
      $('.loaded').css("opacity", 1);
      var dyk = [
        "did you know:<br>there are approximately 613 seeds in every pomegranate<br>incidentally, this is how many times I had to hear bon crunch<br>on one of those mfkn seeds.",
        "did you know:<br>pom bons don't just look like they've mauled someone to death<br>they probably have.",
      ];
      var random = Math.floor((Math.random() * dyk.length));
      $('.dyk').html(dyk[random]).delay(6500).animate({opacity: 1}, 500);
      $('html, body').css({
        overflow: 'hidden',
        height: '100%'
      });
      audio.play();
    }
  });
  $('.blur-box').click(function(){
    var select = confirm("ARE YOU SURE?");
    if(select == true) {
      $('.record').attr('src',"dq.mp3");
      $('.bon-container').css("visibility","hidden");
      $('.bon-title').fadeOut(500, function(){
        $(this).text("you've chosen").fadeIn(500);
      });
      var color = $('.blur').css("background-color");
      $('.chosen-bon').text("blurry bon").delay(2000).css("color", color).animate({opacity: 1}, 1000);
      var bgimg = $('.blur-box').css("background-image");
      $('.bon-img').css({"background-image": bgimg,"background-position": "-25px -50px"}).delay(2000).animate({opacity: 1},1000);
      $('.loaded').css("opacity", 1);
      var dyk = [
        "did you know:<br>if you see something in the corner of your eye, don't fret<br>it's probably just a blurry bon- <br>they're harmless and exist soley to complain to jake about jake",
        "did you know:<br>whoa, what was that in the corner of my eye?",
        "did you know:<br>the faster a bon moves the less blurry they get<br>this is because bons actually don't really move at all"
      ];
      var random = Math.floor((Math.random() * dyk.length));
      $('.dyk').html(dyk[random]).delay(6500).animate({opacity: 1}, 500);
      $('html, body').css({
        overflow: 'hidden',
        height: '100%'
      });
      audio.play();
    }
  });
  $('.teeny-box').click(function(){
    var select = confirm("ARE YOU SURE?");
    if(select == true) {
      $('.record').attr('src',"st.mp3");
      $('.bon-container').css("visibility","hidden");
      $('.bon-title').fadeOut(500, function(){
        $(this).text("you've chosen").fadeIn(500);
      });
      var color = $('.teeny').css("background-color");
      $('.chosen-bon').text("teeny bon").delay(2000).css("color", color).animate({opacity: 1}, 1000);
      var bgimg = $('.teeny-box').css("background-image");
      $('.bon-img').css({"background-image": bgimg,"background-position": "0px 0px"}).delay(2000).animate({opacity: 1},1000);
      $('.loaded').css("opacity", 1);
      var dyk = [
        "did you know:<br>bons are born with an extra ear on their forhead<br>eliciting a ceremonial removal at age 12",
        "did you know:<br>teeny bons are great for getting in hard to reach places",
        "did you know:<br>growing your own teeny bon is easy!<br>all you need is chips, salsa, and a lot of moxie"
      ];
      var random = Math.floor((Math.random() * dyk.length));
      $('.dyk').html(dyk[random]).delay(6500).animate({opacity: 1}, 500);
      $('html, body').css({
        overflow: 'hidden',
        height: '100%'
      });
      audio.play();
    }
  });

});











































/* hello */
