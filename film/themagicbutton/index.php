<!DOCTYPE html>
<head>
  <meta name="author" content="Jake Martinez" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="/css/sass.scss" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css" />
  <script src="https://use.fontawesome.com/80ad235f22.js"></script>
  <title>The Magic Button</title>
  <script src="https://use.fontawesome.com/80ad235f22.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://www.youtube.com/iframe_api"></script>
  <script src="/js/script.js"></script>
  <script>
  function onYouTubeIframeAPIReady() {
      player = new YT.Player('video', {
          height: '100%',
          width: '100%',
          videoId: 'SU3jnX9hERY',
          events: {
              'onStateChange': onPlayerStateChange
          }
      });
  }
  </script>
</head>
<body id="films">

  <?php include '../../header.php'; ?>

  <a href="../"><div class="back-button">&larr;</div></a>

  <div class="main-content">

    <div class="top-bar">The Magic Button</div><!-- - - - - - - - - - - - - - - FILM TITLE-->

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
                The Button does not regret it's transgressions, and this sentence is long now.
              </span>
            </div>
            <div class="crew">
              <table>
                <tr style="background-color:#f2f2f2;">
                  <td>Directed by</td>
                  <td>Joe Fisher<br></td>
                </tr>
                <tr>
                  <td>Produced by</td>
                  <td>Meredith Ball</td>
                </tr>
                <tr style="background-color:#f2f2f2;">
                  <td>Written by</td>
                  <td>Joe Fisher</td>
                </tr>
                <tr>
                  <td>Photography by</td>
                  <td>Jake Martinez</td>
                </tr>
              </table>
            </div>
          </div>

        </div>
      </div>

      <div class="film-info">
        <div class="summary">
          <span class="txt">
            The Button does not regret it's transgressions, and this sentence is long now.
          </span>
        </div>
        <div class="crew">
          <table>
            <tr style="background-color:#f2f2f2;">
              <td>Directed by</td>
              <td>Joe Fisher<br></td>
            </tr>
            <tr>
              <td>Produced by</td>
              <td>Meredith Ball</td>
            </tr>
            <tr style="background-color:#f2f2f2;">
              <td>Written by</td>
              <td>Joe Fisher</td>
            </tr>
            <tr>
              <td>Photography by</td>
              <td>Jake Martinez</td>
            </tr>
          </table>
        </div>
      </div>
    </div>

  </div>

</body>
</html>
