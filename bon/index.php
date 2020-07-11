<!DOCTYPE html>
<head>
  <meta name="author" content="Jake Martinez" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="../css/sass.scss" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css" />
  <script src="https://use.fontawesome.com/80ad235f22.js"></script>
  <title>choose yer bonnie</title>
  <script src="https://use.fontawesome.com/80ad235f22.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>

<!--


                              ,oooooo888888888oooooo.
                         .oo88^^^^^^            ^^^^^Y8o.
                      .dP'                              `Yb.
                    dP'                                   `Yb
                  .dP'                                     `Yb.
                 dP'                                         `Yb
                d8                                             8b
               ,8P                                             `8b
               88'                                              88
               88                                               88
               dP                                               88
              d8'                                               88
              8P                                               ,dY
            ,dP                                                88'
           CP   ,,.....                ,,.....                 88
           `b,d8P'^^^'Y8b           ,d8P'^^^'Y8b.             ,dY
            dP'         `Yb        dP'         `Yb            88'
           dP             Yb      dP             Yb           88
          dP     db        Yb    dP     db        Yb         ,dY
          88     YP        88    88     YP        88         88'
          Yb               dP    Yb               dP         88
           Yb             dP      Yb             dP         ,dY
          dP`Yb.       ,dP'        `Yb.       ,dP'          88'
         CCo_ `YbooooodP'            `YbooooodP'            88
          dP"oo_    ,dP            Ybo__                    88
         88    "ooodP'                ""88oooooP'           88
          Yb .ood""                                        ,dY
          ,dP"                                             88'
        ,dP'                                               88
       dP'    ,dP'     ,dP       ,dP'      .bmw.           88
      d8     dP       dP        dP        o88888b          88
      88    dP       dP       ,dP       o8888888P          88
      Y8.   88      88       d8P       o8888888P          ,dY
      `8b   Yb      88       88       ,8888888P           88'
       88    Yb     Y8.      88       888888P'            88
       88    `8b    `8b      88       88                 ,dY
       88     88     88      Yb.      Yb                 88'
       Y8.   ,Y8    ,Y8      ,88      ,8b                88
        `"ooo"`"oooo" `"ooooo" `8boooooP                ,8Y
            88boo__      """       """  ____oooooooo888888
           dP  ^^""ooooooooo..oooooo"""^^^^^             88
           88               88                           88
           88               88                           88
           Yboooo__         88          ____oooooooo88888P
             ^^^"""ooooooooo''oooooo"""^^^^^

-->

<body>

  <audio class="record" onloadeddata="loaded()" autoplay>
    <source src="" type="audio/mpeg">
  </audio>

  <div class="bon">
    <div class="bon-img"></div>

    <span class="bon-title">choose yer bon <sup style="color:#b00000;"><small>beta</small></sup></span><br>
    <span class="chosen-bon"></span><br>
    <p class="loaded" style="opacity:0;color:#888;"></p><br>
    <div class="dyk">
    </div>

    <div class="bon-container">

      <div onclick="choose_bon('sleepy', 'ch', '-25px', '-50px')" class="bon-box sleepy-box" style="background-image:url('bons/sleepy.PNG');">
        <div class="overbon-color sleepy"  style="background-color: rgba(0, 127, 255, .45);"></div>
        <span class="overbon">sleepy</span>
      </div>
      <div class="bon-box commie-box" style="background-image:url('bons/commie.PNG');">
        <div class="overbon-color commie" style="background-color: rgba(171,31,45,.45);"></div>
        <span class="overbon">commie</span>
      </div>
      <div class="bon-box turkey-box" style="background-image:url('bons/turkey.PNG');">
        <div class="overbon-color turkey" style="background: rgba(255, 157, 0, .45);"></div>
        <span class="overbon">turkey</span>
      </div>

      <br>

      <div class="bon-box pom-box" style="background-image:url('bons/sitty.PNG');">
        <div class="overbon-color pom" style="background: rgb(170, 0, 255, .45);"></div>
        <span class="overbon">pomegranatey</span>
      </div>
      <div class="bon-box blur-box" style="background-image:url('bons/blurry.PNG');">
        <div class="overbon-color blur" style="background: rgba(0,0,0,.45);"></div>
      <span class="overbon">blurry</span>
      </div>
      <div class="bon-box teeny-box" style="background-image:url('bons/teeny.PNG');">
        <div class="overbon-color teeny" style="background: rgba(50, 255, 207, .45);"></div>
        <span class="overbon">teeny</span>
      </div>

    </div>

  </div>

  <script src="/js/script.js"></script>


</body>
</html>
