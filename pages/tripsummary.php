<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../assets/css/style.css" />

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />


  <title>OCULUS FLEET | GTEI Tugboat Fleet Management</title>

  <style>
    .schedule-container {
      position: relative;
      background-color: #fff;
      border-radius: 8px;
      padding: 30px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      margin-left: 250px;
      margin-right: 20px;
      margin-top: 25px;
    }

    .header {
      display: flex;
      gap: 33px;
      justify-content: end;
      font-weight: 600;
      margin-bottom: 50px;
    }

    .header div {
      text-align: center;
      width: 80px;

    }

    .tugboat-row {
      display: flex;
      align-items: center;
      border: 1px solid #ccc;
      border-radius: 6px;
      padding: 15px;
      margin-bottom: 15px;
      background-color: #fff;
    }

    .tugboat-info {
      display: flex;
      align-items: center;
      min-width: 180px;
      margin-right: 16px;
    }

    .tugboat-logo {
      width: 50px;
      height: 50px;
      object-fit: contain;
      margin-right: 10px;
    }

    .tugboat-name {
      min-width: 130px;
      font-weight: 600;
    }

    .status-bar {
      display: flex;
      gap: 8px;
      flex-wrap: nowrap;
      overflow-x: auto;
    }

    .status {
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 14px;
      white-space: nowrap;
      background-color: #d1d1d1;

    }

    .status.active {
      background-color: #22283B;
      color: white;
    }

    .status.empty {
      background-color: #f0f0f0;
      color: #888;
    }
  </style>

</head>

<body>

  <?php include "../sidebar.php"; ?>
 

  <main class="main-content position-relative border-radius-lg ">

    <div class="schedule-container">
      <div class="header-schedule">
        <div>Thu<br>08-Jan</div>
        <div>Fri<br>16-May</div>
        <div>Sat<br>17-May</div>
        <div>Sun<br>18-May</div>
        <div>Mon<br>19-May</div>
        <div>Tue<br>21-May</div>
        <div>Wed<br>22-May</div>
        <div>Thu<br>23-May</div>
        <div>Fri<br>24-May</div>
        <div>Sat<br>25-May</div>
        <div>Sun<br>26-May</div>
        <div>Mon<br>27-May</div>
      </div>


      <div class="tugboat-row">
        <div class="tugboat-info">
          <img src="../assets/img/tugboat.png" class="tugboat-logo" alt="Tugboat">
          <div class="tugboat-name">Tugboat GTEI 1</div>
        </div>
        <div class="status-bar">
          <div class="status active">Loading</div>
          <div class="status">Moving</div>
          <div class="status">Unloading</div>
          <div class="status">Return</div>
        </div>
      </div>

      <!-- Tugboat 2 -->
      <div class="tugboat-row">
        <div class="tugboat-info">
          <img src="../assets/img/tugboat.png" class="tugboat-logo" alt="Tugboat">
          <div class="tugboat-name">Tugboat GTEI 2</div>
        </div>
        <div class="status-bar">
          <div class="status active">Loading</div>
          <div class="status">Moving</div>
          <div class="status">Unloading</div>
          <div class="status">Return</div>
        </div>
      </div>

      <!-- Tugboat 3 -->
      <div class="tugboat-row">
        <div class="tugboat-info">
          <img src="../assets/img/tugboat.png" class="tugboat-logo" alt="Tugboat">
          <div class="tugboat-name">Tugboat GTEI 3</div>
        </div>
        <div class="status-bar">
          <div class="status empty">...</div>
          <div class="status">Unloading</div>
          <div class="status">Return</div>
        </div>
      </div>

      <!-- Tugboat 4 -->
      <div class="tugboat-row">
        <div class="tugboat-info">
          <img src="../assets/img/tugboat.png" class="tugboat-logo" alt="Tugboat">
          <div class="tugboat-name">Tugboat GTEI 4</div>
        </div>
        <div class="status-bar">
          <div class="status">Unloading</div>
          <div class="status">Return</div>
          <div class="status active" style="background-color: #4a4a4a;">Docking</div>
        </div>
      </div>
    </div>





    <div style="margin-bottom: 20px; margin-top: 20px; margin-left: 20px;">
      <select style="
        padding: 10px 16px;
        border-radius: 4px;
        border: 1px solid #ccc;
        width: 392px;
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
        background: white;
        color: #4B4B4B;
      ">
        <option>Tugboat GTEI 1</option>
        <option>Tugboat GTEI 2</option>
        <option>Tugboat GTEI 3</option>
      </select>
    </div>

    <div style="
    bottom: 20px;
    
    width: 100%;">

      <!-- Video Grid -->
      <div style="display: flex; flex-wrap: wrap; gap: 15px; margin-left: 20px;">
        <div>
          <div style="position: relative;"
            onclick="zoomVideo('https://www.w3schools.com/html/mov_bbb.mp4', 'Front Cam')">
            <div style="
        position: absolute;
        top: 8px;
        left: 8px;
        background: #22283B;
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
      ">
              Front Cam
            </div>
            <iframe width="390" height="250" src="https://www.youtube.com/embed/6giEyn-GPEQ?autoplay=1&mute=1"
              title="Front Cam" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen
              style="border-radius: 8px;">
            </iframe>
          </div>
        </div>

        <div>
          <div style="position: relative;"
            onclick="zoomVideo('https://www.w3schools.com/html/mov_bbb.mp4', 'Rear Cam')">
            <div style="
        position: absolute;
        top: 8px;
        left: 8px;
        background: #22283B;
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
      ">
              Rear Cam
            </div>
            <iframe width="390" height="250" src="https://www.youtube.com/embed/6giEyn-GPEQ?autoplay=1&mute=1"
              title="Front Cam" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen
              style="border-radius: 8px;">
            </iframe>
          </div>
        </div>

        <div>
          <div style="position: relative;"
            onclick="zoomVideo('https://www.w3schools.com/html/mov_bbb.mp4', 'Bridge Cam')">
            <div style="
        position: absolute;
        top: 8px;
        left: 8px;
        background: #22283B;
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
      ">
              Bridge Cam
            </div>
            <iframe width="390" height="250" src="https://www.youtube.com/embed/6giEyn-GPEQ?autoplay=1&mute=1"
              title="Front Cam" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen
              style="border-radius: 8px;">
            </iframe>
          </div>
        </div>

        <div>
          <div style="position: relative;"
            onclick="zoomVideo('https://www.w3schools.com/html/mov_bbb.mp4', 'Engine Room')">
            <div style="
        position: absolute;
        top: 8px;
        left: 8px;
        background: #22283B;
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
      ">
              Engine Room
            </div>
            <iframe width="390" height="250" src="https://www.youtube.com/embed/6giEyn-GPEQ?autoplay=1&mute=1"
              title="Front Cam" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen
              style="border-radius: 8px;">
            </iframe>
          </div>
        </div>
      </div>

      <!-- Zoomed Video Frame -->
      <div id="zoomed-video" style="margin-top: 24px; margin-left: 20px; margin-right: 20px;">
        <div style="position: relative;">
          <div style="
        position: absolute;
        top: 8px;
        left: 8px;
        background: #22283B;
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
      ">
            Zoom Camera
          </div>
          <video id="zoomPlayer" width="100%" height="500" controls autoplay muted style="border-radius: 8px;">
            <source src="https://www.youtube.com/embed/6giEyn-GPEQ?autoplay=1&mute=1" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
      </div>





  </main>

  <!--   Core JS Files   -->
  <script src="../assets/js/script.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <script>
    function zoomVideo(videoUrl, label) {
      const zoomPlayer = document.getElementById("zoomPlayer");
      zoomPlayer.src = videoUrl;

      const labelDiv = zoomPlayer.previousElementSibling;
      if (labelDiv) {
        labelDiv.textContent = label + " - Zoom Camera";
      }

      zoomPlayer.play();
    }
  </script>

</body>

</html>