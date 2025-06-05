<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="assets/css/style.css" />

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />


    <title>OCULUS FLEET | GTEI Tugboat Fleet Management</title>
</head>

<body>

    <?php include "sidebar.php"; ?>
    <div id="map"></div>
    <?php include "header.php"; ?>

    <main class="main-content position-relative border-radius-lg">

        <div class="sidebar-search-tugboat">
            <i class='bx bx-chevron-right hide-sidebar'></i>
            <div class="search-bar-tugboat">
                <div class="mb-3">
                    <input type="text" class="form-control border-radius-2xl border-2"
                        placeholder="by Nomor Kendaraan / ID" />
                </div>
            </div>
            <div class="d-flex flex-column tugboat-list">
                <!-- Fleet cards will be inserted dynamically -->
            </div>
            <div id="record-info" class="record-tugboat">
                <div><small>7 records found</small></div>
                <div><strong>of 7 Tugboats</strong></div>
            </div>
        </div>

        <div class="video-container">
            <div>
                <select id="tugboat-select" class="form-select-tugboat">
                    <option value="">Pilih Tugboat</option>
                </select>
            </div>

            <!-- Video Grid -->
            <div class="video-grid">

                <div style="position: relative"
                    onclick="zoomVideo('https://www.w3schools.com/html/mov_bbb.mp4', 'Front Cam')">
                    <div class="video-label">
                        Front Cam
                    </div>
                    <iframe src="https://www.youtube.com/embed/6giEyn-GPEQ?autoplay=1&mute=1" title="Front Cam"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                    </iframe>
                </div>



                <div style="position: relative"
                    onclick="zoomVideo('https://www.w3schools.com/html/mov_bbb.mp4', 'Rear Cam')">
                    <div class="video-label">
                        Rear Cam
                    </div>
                    <iframe src="https://www.youtube.com/embed/6giEyn-GPEQ?autoplay=1&mute=1" title="Front Cam"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                    </iframe>
                </div>



                <div style="position: relative"
                    onclick="zoomVideo('https://www.w3schools.com/html/mov_bbb.mp4', 'Bridge Cam')">
                    <div class="video-label">
                        Bridge Cam
                    </div>
                    <iframe src="https://www.youtube.com/embed/6giEyn-GPEQ?autoplay=1&mute=1" title="Front Cam"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                    </iframe>
                </div>



                <div style="position: relative"
                    onclick="zoomVideo('https://www.w3schools.com/html/mov_bbb.mp4', 'Engine Room')">
                    <div class="video-label">
                        Engine Room
                    </div>
                    <iframe src="https://www.youtube.com/embed/6giEyn-GPEQ?autoplay=1&mute=1" title="Front Cam"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                    </iframe>
                </div>
            </div>


            <!-- Modal Zoom -->
            <div class="modal" id="videoModal">
                <div class="modal-content">
                    <button class="close-btn" onclick="closeModal()"></button>
                    <video id="modalVideo" src="" controls autoplay></video>
                </div>
            </div>


        </div>
    </main>

    <script>
        document.querySelector('.hide-sidebar').addEventListener('click', function () {
            document.querySelector('.sidebar-search-tugboat').classList.toggle('collapsed');
        });
    </script>

    <script>
        function zoomVideo(videoSrc, label) {
            const modal = document.getElementById("videoModal");
            const modalVideo = document.getElementById("modalVideo");
            modal.style.display = "flex";
            modalVideo.src = videoSrc;
            modalVideo.play();
        }

        function closeModal() {
            const modal = document.getElementById("videoModal");
            const modalVideo = document.getElementById("modalVideo");
            modalVideo.pause();
            modalVideo.src = "";
            modal.style.display = "none";
        }

        // Close modal if clicked outside content
        window.onclick = function (event) {
            const modal = document.getElementById("videoModal");
            if (event.target === modal) {
                closeModal();
            }
        };
    </script>


    <script src="assets/js/script.js"></script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

    <script>
        const apiKey = "46e83f19b2e3244bbe77f80885ca3c2b";
        const map = L.map("map", {
            center: [-3.1, 114.65],
            zoom: 9,
            zoomControl: false // Supaya kita bisa pindahkan posisi zoom control
        });

        // Tambahkan tile dasar
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "&copy; OpenStreetMap contributors",
        }).addTo(map);

        // Tambahkan kontrol zoom ke kanan atas
        L.control.zoom({ position: "topright" }).addTo(map);


        // Weather overlay layers
        const clouds = L.tileLayer(
            `https://tile.openweathermap.org/map/clouds_new/{z}/{x}/{y}.png?appid=${apiKey}`,
            {
                opacity: 1.0,
                attribution:
                    '&copy; <a href="https://openweathermap.org/">OpenWeatherMap</a>',
            }
        );

        const precipitation = L.tileLayer(
            `https://tile.openweathermap.org/map/precipitation_new/{z}/{x}/{y}.png?appid=${apiKey}`,
            {
                opacity: 1.0,
            }
        );

        const rain = L.tileLayer(
            `https://tile.openweathermap.org/map/rain_new/{z}/{x}/{y}.png?appid=${apiKey}`,
            {
                opacity: 1.0,
            }
        );

        const snow = L.tileLayer(
            `https://tile.openweathermap.org/map/snow_new/{z}/{x}/{y}.png?appid=${apiKey}`,
            {
                opacity: 1.0,
            }
        );

        const temp = L.tileLayer(
            `https://tile.openweathermap.org/map/temp_new/{z}/{x}/{y}.png?appid=${apiKey}`,
            {
                opacity: 0.5,
            }
        );

        const wind = L.tileLayer(
            `https://tile.openweathermap.org/map/wind_new/{z}/{x}/{y}.png?appid=${apiKey}`,
            {
                opacity: 1.0,
            }
        );

        // Layer Groups
        const overlays = {
            Clouds: clouds,
            Precipitation: precipitation,
            Rain: rain,
            Snow: snow,
            Temperature: temp,
            Wind: wind,
        };

        L.control
            .layers(null, overlays, {
                collapsed: true,
                position: "topright", // atau "topleft", "topright", "bottomright"
            })
            .addTo(map);

        const tugboats = [
            {
                id: "TUGBOAT GTEI 1",
                image: "assets/img/tugboat.png",
                status: "Moving",
                speed: "3.5 Knots",
                heading: "190",
                coords: [-2.979758, 114.770769],
            },
            {
                id: "TUGBOAT GTEI 2",
                image: "assets/img/tugboat.png",
                status: "Moving",
                speed: "3.5 Knots",
                heading: "190",
                coords: [-3.28953, 114.56758],
            },
            {
                id: "TUGBOAT GTEI 3",
                image: "assets/img/tugboat.png",
                status: "Moving",
                speed: "3.5 Knots",
                heading: "190",
                coords: [-3.40984, 114.49331],
            },
            {
                id: "TUGBOAT GTEI 4",
                image: "assets/img/tugboat.png",
                status: "Moving",
                speed: "3.5 Knots",
                heading: "190",
                coords: [-3.6818, 114.4418],
            },
            {
                id: "TUGBOAT GTEI 5",
                image: "assets/img/tugboat.png",
                status: "Moving",
                speed: "3.5 Knots",
                heading: "190",
                coords: [-10.17422, 123.622091],
            },
            {
                id: "TUGBOAT GTEI 6",
                image: "assets/img/tugboat.png",
                status: "Moving",
                speed: "3.5 Knots",
                heading: "190",
                coords: [-6.2711281704409245, 107.65769652872076],
            },
            {
                id: "TUGBOAT GTEI 7",
                image: "assets/img/tugboat.png",
                status: "Moving",
                speed: "3.5 Knots",
                heading: "190",
                coords: [-7.789476, 110.396235],
            },
        ];

        const cardContainer = document.querySelector(".d-flex.flex-column");

        // Buat fleet card dan simpan semua marker
        const markers = [];

        const customIcon = L.icon({
            iconUrl: "assets/img/tugboat.png",
            iconSize: [50, 35],
            iconAnchor: [20, 20],
            popupAnchor: [0, -20],
        });

        function renderFleetCards() {
            tugboats.forEach((tugboat) => {
                const card = document.createElement("div");
                card.classList.add("fleet-item");
                card.innerHTML = `
      <div class="fleet-card ">
    <div class="fleet-icon">
      <img src="${tugboat.image}" alt="Tugboat Icon" />
    </div>
    <div class="fleet-details">
      <div class="fleet-header">
        <span class="fleet-title">${tugboat.id}</span>
        <span class="fleet-online">Online</span>
      </div>
      <div class="fleet-info-line">Status <span>${tugboat.status}</span></div>
      <div class="fleet-info-line">Speed <span>${tugboat.speed}</span></div>
      <div class="fleet-info-line">Heading <span>${tugboat.heading}</span></div>
    </div>
  </div>
    `;
                cardContainer.appendChild(card);

                const marker = L.marker(tugboat.coords, { icon: customIcon }).addTo(
                    map
                ).bindPopup(`
      <div style="text-align:center">
        <img src="${tugboat.image}" alt="tugboat" style="width:60px;"><br>
        <strong>${tugboat.id}</strong><br>
        <small>${tugboat.status}</small><br>
        <small>${tugboat.speed}</small><br>
        <small>${tugboat.heading}</small><br>
      </div>
    `);
                markers.push({ id: tugboat.id, marker, card });
            });
        }

        function populateSelectDropdown() {
            const select = document.getElementById("tugboat-select");
            tugboats.forEach((tugboat) => {
                const option = document.createElement("option");
                option.value = tugboat.id;
                option.textContent = tugboat.id;
                select.appendChild(option);
            });
        }

        renderFleetCards();
        populateSelectDropdown();

        const inputElement = document.querySelector(
            'input[placeholder="by Nomor Kendaraan / ID"]'
        );

        inputElement.addEventListener("input", function () {
            const searchTerm = this.value.trim().toUpperCase();

            // Hapus semua marker
            markers.forEach((item) => {
                map.removeLayer(item.marker);
                const fleetCard = item.card.querySelector(".fleet-card");
                fleetCard.classList.remove("highlight");
            });

            if (searchTerm === "") {
                // Jika input kosong: tampilkan semua marker & zoom out agar semua kelihatan
                const bounds = L.latLngBounds([]);
                markers.forEach((item) => {
                    item.marker.addTo(map);
                    item.card.style.display = "block"; // Tampilkan semua card
                    bounds.extend(item.marker.getLatLng());
                });
                map.fitBounds(bounds); // Zoom out agar semua marker terlihat
                updateRecordInfo(tugboats.length, tugboats.length);
                return;
            }

            let matchCount = 0;

            markers.forEach((item) => {
                if (item.id.toUpperCase().includes(searchTerm)) {
                    item.marker.addTo(map).openPopup();
                    item.card.style.display = "block";
                    const fleetCard = item.card.querySelector(".fleet-card");
                    fleetCard.classList.add("highlight");
                    matchCount++;
                } else {
                    item.card.style.display = "none";
                }
            });

            updateRecordInfo(matchCount, tugboats.length);

            if (!anyMatch) {
                map.setView([-3.1, 114.65], 9); // Default view kalau tidak ditemukan
            }

            const found = tugboats.find((tugboat) =>
                tugboat.id.includes(searchTerm)
            );
            if (found) {
                const result = markers.find((m) => m.id === found.id);
                result.marker.addTo(map).openPopup();

                const fleetCard = result.card.querySelector(".fleet-card");
                fleetCard.classList.add("highlight");

                fleetCard.scrollIntoView({ behavior: "smooth", block: "center" });
                map.setView(found.coords, 15);
            }
        });

        function updateRecordInfo(visibleCount, totalCount) {
            const recordInfo = document.getElementById("record-info");
            recordInfo.innerHTML = `<small>${visibleCount} records found</small><br /><strong>of ${totalCount} Tugboats</strong>`;
        }
    </script>


</body>

</html>