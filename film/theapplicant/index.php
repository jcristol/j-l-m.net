<!doctype html>
<head>
  <meta name="author" content="Jake Martinez" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="/css/sass.scss" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css" />
  <script src="https://use.fontawesome.com/80ad235f22.js"></script>
  <title>The Applicant</title>
  <script src="https://use.fontawesome.com/80ad235f22.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://www.youtube.com/iframe_api"></script>
  <script src="/js/script.js"></script>
  <script>
  function onYouTubeIframeAPIReady() {
      player = new YT.Player('video', {
          height: '100%',
          width: '100%',
          videoId: null,
          events: {
              'onStateChange': onPlayerStateChange
          }
      });
  }
  </script>
</head>
<body id="films">

  <?php include '../../header.php'; ?>

  <a href="/films"><div class="back-button">&larr;</div></a>

  <div class="main-content">

    <div class="top-bar">The Applicant</div><!-- - - - - - - - - - - - - - - FILM TITLE-->

    <div class="left film">

      <div class="film-box_large">

        <div class="main-film">
          <div class="fg-video">
              <div id="video" width="100%" height="100%"></div>
          </div>

          <div class="info-btn"><i class="fa fa-angle-double-right info-btn-ct" aria-hidden="true"></i></div>
          <div class="overlay-info">
            <div class="summary">
              <span class="txt">
                STATUS: POST PRODUCTION
              </span>
            </div>
            <div class="crew">
              <table>
                <tr style="background-color:#f2f2f2;">
                  <td><b>Directed by</b></td>
                  <td>Jake Martinez</td>
                </tr>
                <tr>
                  <td><b>Produced by</b></td>
                  <td>Daniel Orr</td><td>Sarika Sabnis</td>
                </tr>
                <tr style="background-color:#f2f2f2;">
                  <td><b>Written by</b></td>
                  <td>Jake Martinez</td><td>Daniel Orr</td><td>Sarika Sabnis</td><td>Kyle Flynn</td>
                </tr>
                <tr>
                  <td><b>Photography by</b></td>
                  <td>Jesse Vise</td><td>Jake Martinez</td>
                </tr>
                <tr style="background-color:#f2f2f2;">
                  <td><b>Starring</b></td>
                  <td>Kyle Flynn</td><td>Ded</td>
                  <td>Grace Cruz</td><td>Bea</td>
                  <td>Aaron Mann</td><td>Ezra</td>
                  <td>Patrick SR</td><td>Nick</td>
                  <td>Caroline Wagner</td><td>Nora</td>
                </tr>
              </table>
            </div>
          </div>
        </div>

      </div>

      <div class="film-info">
        <div class="summary">
          <span class="txt">
            STATUS: POST PRODUCTION
          </span>
        </div>
        <div class="crew">
          <table>
            <tr style="background-color:#f2f2f2;">
              <td class="gray"><b>Directed by</b></td>
              <td class="blue">Jake Martinez</td>
            </tr>
            <tr>
              <td class="gray"><b>Produced by</b></td>
              <td class="blue">Daniel Orr, Sarika Sabnis</td>
            </tr>
            <tr style="background-color:#f2f2f2;">
              <td class="gray"><b>Written by</b></td>
              <td class="blue">Jake Martinez, Daniel Orr, Sarika Sabnis, Kyle Flynn</td>
            </tr>
            <tr>
              <td class="gray"><b>Photography by</b></td>
              <td class="blue">Jesse Vise<br>Jake Martinez</td>
            </tr>
          </table>
        </div>
      </div>

    </div>

  </div>


</body>
</html>
