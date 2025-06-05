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
            <a class="nav-link active" href="../pages/configuration.html">
              <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
              >
                <i
                  class="fas fa-sliders-h active opacity-10"
                  style="font-size: 23px; color: #22283b"
                ></i>
              </div>
              <span class="nav-link-text ms-1" style="font-size: 23px"
                >Configuration</span
              >
            </a>
          </li>
          <li class="nav-item" style="margin-bottom: 16px">
            <a class="nav-link" href="../pages/schedule.html">
              <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
              >
                <i
                  class="fas fa-calendar-days opacity-10"
                  style="font-size: 23px"
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

      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th
                          class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                        >
                          Author
                        </th>
                        <th
                          class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                        >
                          Function
                        </th>
                        <th
                          class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                        >
                          Status
                        </th>
                        <th
                          class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                        >
                          Employed
                        </th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img
                                src="../assets/img/team-2.jpg"
                                class="avatar avatar-sm me-3"
                                alt="user1"
                              />
                            </div>
                            <div
                              class="d-flex flex-column justify-content-center"
                            >
                              <h6 class="mb-0 text-sm">John Michael</h6>
                              <p class="text-xs text-secondary mb-0">
                                john@creative-tim.com
                              </p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Manager</p>
                          <p class="text-xs text-secondary mb-0">
                            Organization
                          </p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success"
                            >Online</span
                          >
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"
                            >23/04/18</span
                          >
                        </td>
                        <td class="align-middle">
                          <a
                            href="javascript:;"
                            class="text-secondary font-weight-bold text-xs"
                            data-toggle="tooltip"
                            data-original-title="Edit user"
                          >
                            Edit
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img
                                src="../assets/img/team-3.jpg"
                                class="avatar avatar-sm me-3"
                                alt="user2"
                              />
                            </div>
                            <div
                              class="d-flex flex-column justify-content-center"
                            >
                              <h6 class="mb-0 text-sm">Alexa Liras</h6>
                              <p class="text-xs text-secondary mb-0">
                                alexa@creative-tim.com
                              </p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">
                            Programator
                          </p>
                          <p class="text-xs text-secondary mb-0">Developer</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-secondary"
                            >Offline</span
                          >
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"
                            >11/01/19</span
                          >
                        </td>
                        <td class="align-middle">
                          <a
                            href="javascript:;"
                            class="text-secondary font-weight-bold text-xs"
                            data-toggle="tooltip"
                            data-original-title="Edit user"
                          >
                            Edit
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img
                                src="../assets/img/team-4.jpg"
                                class="avatar avatar-sm me-3"
                                alt="user3"
                              />
                            </div>
                            <div
                              class="d-flex flex-column justify-content-center"
                            >
                              <h6 class="mb-0 text-sm">Laurent Perrier</h6>
                              <p class="text-xs text-secondary mb-0">
                                laurent@creative-tim.com
                              </p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Executive</p>
                          <p class="text-xs text-secondary mb-0">Projects</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success"
                            >Online</span
                          >
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"
                            >19/09/17</span
                          >
                        </td>
                        <td class="align-middle">
                          <a
                            href="javascript:;"
                            class="text-secondary font-weight-bold text-xs"
                            data-toggle="tooltip"
                            data-original-title="Edit user"
                          >
                            Edit
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img
                                src="../assets/img/team-3.jpg"
                                class="avatar avatar-sm me-3"
                                alt="user4"
                              />
                            </div>
                            <div
                              class="d-flex flex-column justify-content-center"
                            >
                              <h6 class="mb-0 text-sm">Michael Levi</h6>
                              <p class="text-xs text-secondary mb-0">
                                michael@creative-tim.com
                              </p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">
                            Programator
                          </p>
                          <p class="text-xs text-secondary mb-0">Developer</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success"
                            >Online</span
                          >
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"
                            >24/12/08</span
                          >
                        </td>
                        <td class="align-middle">
                          <a
                            href="javascript:;"
                            class="text-secondary font-weight-bold text-xs"
                            data-toggle="tooltip"
                            data-original-title="Edit user"
                          >
                            Edit
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img
                                src="../assets/img/team-2.jpg"
                                class="avatar avatar-sm me-3"
                                alt="user5"
                              />
                            </div>
                            <div
                              class="d-flex flex-column justify-content-center"
                            >
                              <h6 class="mb-0 text-sm">Richard Gran</h6>
                              <p class="text-xs text-secondary mb-0">
                                richard@creative-tim.com
                              </p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Manager</p>
                          <p class="text-xs text-secondary mb-0">Executive</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-secondary"
                            >Offline</span
                          >
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"
                            >04/10/21</span
                          >
                        </td>
                        <td class="align-middle">
                          <a
                            href="javascript:;"
                            class="text-secondary font-weight-bold text-xs"
                            data-toggle="tooltip"
                            data-original-title="Edit user"
                          >
                            Edit
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img
                                src="../assets/img/team-4.jpg"
                                class="avatar avatar-sm me-3"
                                alt="user6"
                              />
                            </div>
                            <div
                              class="d-flex flex-column justify-content-center"
                            >
                              <h6 class="mb-0 text-sm">Miriam Eric</h6>
                              <p class="text-xs text-secondary mb-0">
                                miriam@creative-tim.com
                              </p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">
                            Programtor
                          </p>
                          <p class="text-xs text-secondary mb-0">Developer</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-secondary"
                            >Offline</span
                          >
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"
                            >14/09/20</span
                          >
                        </td>
                        <td class="align-middle">
                          <a
                            href="javascript:;"
                            class="text-secondary font-weight-bold text-xs"
                            data-toggle="tooltip"
                            data-original-title="Edit user"
                          >
                            Edit
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
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
