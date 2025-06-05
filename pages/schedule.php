<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>OCULUS FLEET | GTEI Tugboat Fleet Management</title>
    <!--     Fonts and icons     -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />

    <!-- CSS Files -->
    <link
      id="pagestyle"
      href="../assets/css/argon-dashboard.css?v=2.1.0"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      crossorigin=""
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
      rel="stylesheet"
    />

    <style>
      .profile-badge {
        background-color: #ffffff; /* putih */
        border-radius: 999px;
        border: 2px solid #1a1a1a;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      }

      .schedule-container {
        background-color: #fff;
        border-radius: 8px;
        padding: 80px 40px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        margin-left: 20px;
        margin-right: 20px;
      }

      .timeline-container {
        display: flex;
        gap: 30px;
        align-items: flex-center;
      }

      .label-column {
        display: flex;
        flex-direction: column;
        gap: 100px; /* Sesuaikan agar sejajar dengan .time-slot */
        margin-top: 110px;
        
      }

      .tugboat-label {
        background-color: #e5e7fb;
        color: #22283b;
        padding: 14px 18px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        font-size: 18px;
        width: 100%;
        border: 2px solid #DFE0EF;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      .tugboat-label img {
        width: 50px;
        height: 30px;
        margin-right: 8px;
      }

      .timeline-grid {
        display: grid;
        grid-template-columns: repeat(5, 220px); /* 5 lokasi perjalanan */
        gap: 40px;
        
        
        
      }

      .timeline-column {
        background-color: #eee;
        border-radius: 12px;
        padding: 8px;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        min-height: auto;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        
      }

      .column-header {
        font-weight: 500;
        font-size: 16px;
        margin-bottom: 12px;
        margin-top: 12px;
        padding-bottom: 6px;
        width: 100%;
        text-align: start;
        border-bottom: 2px solid #222;
      }

      .time-slot {
        margin: 60px 0;
        font-size: 16px;
        color: #222;
        position: relative;
        width: 100%;
        text-align: center;
        height: 40px; /* Tambahkan tinggi tetap */
        line-height: 40px; /* Vertikal tengah */
        box-sizing: border-box; /* spacing antar waktu untuk sejajarkan dengan label */
        
      }

      .time-slot::after {
        content: "";
        position: absolute;
        left: 100%;
        top: 50%;
        transform: translateY(-50%);
        border-top: 2px dashed #999;
        width: 12px;
      }

      .timeline-row-end .time-slot::after {
        content: none;
      }
    </style>
  </head>

  <body style="background-color: #ecedf5" class="g-sidenav-show">
    <aside
      class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
      id="sidenav-main"
      style="background-color: #22283b"
    >
      <div class="sidenav-header mt-4">
        <i
          class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
          aria-hidden="true"
          id="iconSidenav"
        ></i>
        <a class="navbar-brand m-0" href="" target="_blank">
          <div class="d-flex justify-content-center">
            <img
              src="../assets/img/examples/logo-oculus.png"
              class="navbar-brand-img"
              alt="main_logo"
              style="
                width: 100%;
                height: auto;
                max-height: 250px;
                object-fit: contain;
              "
            />
          </div>
        </a>
      </div>
      <hr class="horizontal dark mt-0" />
      <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item" style="margin-bottom: 16px">
            <a class="nav-link" href="index.html">
              <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
              >
                <i
                  class="fas fa-th-large active opacity-10"
                  style="font-size: 23px"
                ></i>
              </div>
              <span class="nav-link-text ms-1" style="font-size: 23px"
                >Dashboard</span
              >
            </a>
          </li>
          <li class="nav-item" style="margin-bottom: 16px">
            <a class="nav-link" href="../pages/tripsummary.html">
              <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
              >
                <i
                  class="fas fa-window-maximize opacity-10"
                  style="font-size: 23px"
                ></i>
              </div>
              <span class="nav-link-text ms-1" style="font-size: 23px"
                >Trip Summary</span
              >
            </a>
          </li>
          <li class="nav-item" style="margin-bottom: 16px">
            <a class="nav-link" href="../pages/configuration.html">
              <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
              >
                <i
                  class="fas fa-sliders-h opacity-10"
                  style="font-size: 23px"
                ></i>
              </div>
              <span class="nav-link-text ms-1" style="font-size: 23px"
                >Configuration</span
              >
            </a>
          </li>
          <li class="nav-item" style="margin-bottom: 16px">
            <a class="nav-link active" href="../pages/schedule.html">
              <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
              >
                <i
                  class="fas fa-calendar-days active opacity-10"
                  style="font-size: 23px; color: #22283b"
                ></i>
              </div>
              <span class="nav-link-text ms-1" style="font-size: 23px"
                >Schedule</span
              >
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../pages/sign-up.html">
              <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
              >
                <i
                  class="fas fa-right-from-bracket opacity-10"
                  style="font-size: 23px"
                ></i>
              </div>
              <span class="nav-link-text ms-1" style="font-size: 23px"
                >Logout</span
              >
            </a>
          </li>
        </ul>
      </div>
    </aside>

    <main class="main-content position-relative border-radius-lg">
      <!-- Navbar -->
      <nav
        class="navbar navbar-main navbar-expand-lg px-0 shadow-none border-radius-xl"
        id="navbarBlur"
        data-scroll="false"
      >
        <div class="container-fluid py-1 px-3">
          <div
            class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4"
            id="navbar"
          >
            <div
              class="ms-md-auto pe-md-3 d-flex align-items-center position-relative"
            >
              <input
                type="text"
                class="form-control text-white text-lg pe-3"
                placeholder="Type here..."
                style="
                  background-color: #22283b;
                  border-radius: 999px;
                  border: none;
                  padding-top: 0.875rem;
                  padding-bottom: 0.875rem;
                "
              />
              <i
                class="fas fa-search position-absolute"
                style="right: 30px; color: white"
              ></i>
            </div>

            <div class="profile-badge">
              <div class="badge-content d-flex align-items-center px-4">
                <div class="profile-icon me-2">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    height="32"
                    viewBox="0 0 24 24"
                    width="32"
                    fill="#666"
                  >
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path
                      d="M12 12c2.7 0 4.9-2.2 4.9-4.9S14.7 2.2 12 2.2 7.1 4.4 7.1 7.1 9.3 12 12 12zm0 2c-3.3 0-9.8 1.7-9.8 5v2h19.6v-2c0-3.3-6.5-5-9.8-5z"
                    />
                  </svg>
                </div>
                <div class="profile-text">
                  <div style="font-weight: 600; color: #333">Jane Doe</div>
                  <div style="font-size: 0.9em; color: #888">Admin</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="schedule-container" style="margin-top: 25px">
        <div class="timeline-container">
          <!-- Tugboat Label Column -->
          <div class="label-column">
            <div class="tugboat-label">
              <img src="../assets/img/examples/tugboat.png" alt="Tugboat" />
              Tugboat GTEI 1
            </div>
            <div class="tugboat-label">
              <img src="../assets/img/examples/tugboat.png" alt="Tugboat" />
              Tugboat GTEI 2
            </div>
            <div class="tugboat-label">
              <img src="../assets/img/examples/tugboat.png" alt="Tugboat" />
              Tugboat GTEI 3
            </div>
          </div>

          <!-- Timeline Columns -->
          <div class="timeline-grid">
            <!-- Jetty Column -->
            <div class="timeline-column">
              <div class="column-header">Jetty</div>
              <div class="time-slot">09.00</div>
              <!-- GTEI 1 -->
              <div class="time-slot">08.21</div>
              <!-- GTEI 2 -->
              <div class="time-slot">08.21</div>
              <!-- GTEI 3 -->
            </div>

            <!-- Check Point 1 Column -->
            <div class="timeline-column">
              <div class="column-header">Check Point 1</div>
              <div class="time-slot">13.45</div>
              <!-- GTEI 1 -->
              <div class="time-slot">08.21</div>
              <!-- GTEI 2 -->
              <div class="time-slot">13.25</div>
              <!-- GTEI 3 -->
            </div>

            <!-- Check Point 2 Column -->
            <div class="timeline-column">
              <div class="column-header">Check Point 2</div>
              <div class="time-slot">15.20</div>
              <!-- GTEI 1 -->
              <div class="time-slot">12.35</div>
              <!-- GTEI 2 -->
              <div class="time-slot">14.13</div>
              <!-- GTEI 3 -->
            </div>

            <!-- Port Column -->
            <div class="timeline-column">
              <div class="column-header">Port</div>
              <div class="time-slot"></div>
              <!-- GTEI 1 -->
              <div class="time-slot">14.13</div>
              <!-- GTEI 2 -->
              <div class="time-slot"></div>
              <!-- GTEI 3 -->
            </div>

            <!-- Floating Crane Column -->
            <div class="timeline-column timeline-row-end">
              <div class="column-header">Floating Crane</div>
              <div class="time-slot"></div>
              <!-- GTEI 1 -->
              <div class="time-slot">19.40</div>
              <!-- GTEI 2 -->
              <div class="time-slot"></div>
              <!-- GTEI 3 -->
            </div>
          </div>
        </div>
      </div>
    </main>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
      var win = navigator.platform.indexOf("Win") > -1;
      if (win && document.querySelector("#sidenav-scrollbar")) {
        var options = {
          damping: "0.5",
        };
        Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
  </body>
</html>
