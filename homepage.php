  <html>
  <head><title>Anime Titles with Bootstrap</title></head>
  <body>
      <div class="container py-4">
          <h1 class="fs-2 fw-bold mb-4 pb-2 border-bottom">New Titles</h1>
          <!-- Carousel Section -->
          <div id="animeCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">

          </div>   
        <button class="carousel-control-prev"type="button"data-bs-target="#animeCarousel"data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next"type="button"data-bs-target="#animeCarousel"data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- Content Navigation Section -->
      <div class="card bg-body border-0 shadow-sm mb-4">
        <div class="card-body">
          <div class="text-center mb-3">
            <h3 class="fs-5 fw-semibold mb-2">Browse Content</h3>
            <p class="text-body-secondary small">Select a day to view scheduled releases</p>
          </div>
          <div class="bg-body p-3 rounded">
            <ul class="nav nav-pills justify-content-center flex-wrap gap-2"id="dayNav">
              <li class="nav-item">
                <button class="nav-link rounded-pill px-3 py-1 d-flex align-items-center gap-2 active"data-day="Monday">
                  <i class="bi bi-calendar"></i><span>Monday</span>
                </button>
              </li>
              <li class="nav-item">
                <button class="nav-link rounded-pill px-3 py-1 d-flex align-items-center gap-2"data-day="Tuesday">
                  <i class="bi bi-calendar"></i><span>Tuesday</span>
                </button>
              </li>
              <li class="nav-item">
                <button class="nav-link rounded-pill px-3 py-1 d-flex align-items-center gap-2"data-day="Wednesday">
                  <i class="bi bi-calendar"></i><span>Wednesday</span>
                </button>
              </li>
              <li class="nav-item">
                <button class="nav-link rounded-pill px-3 py-1 d-flex align-items-center gap-2"data-day="Thursday">
                  <i class="bi bi-calendar"></i><span>Thursday</span>
                </button>
              </li>
              <li class="nav-item">
                <button class="nav-link rounded-pill px-3 py-1 d-flex align-items-center gap-2"data-day="Friday">
                  <i class="bi bi-calendar"></i><span>Friday</span>
                </button>
              </li>
              <li class="nav-item">
                <button class="nav-link rounded-pill px-3 py-1 d-flex align-items-center gap-2"data-day="Saturday">
                  <i class="bi bi-calendar"></i><span>Saturday</span>
                </button>
              </li>
              <li class="nav-item">
                <button class="nav-link rounded-pill px-3 py-1 d-flex align-items-center gap-2"data-day="Sunday">
                  <i class="bi bi-calendar"></i><span>Sunday</span>
                </button>
              </li>
              <li class="nav-item">
                <button class="nav-link rounded-pill px-3 py-1 d-flex align-items-center gap-2"data-day="Random">
                  <i class="bi bi-shuffle"></i><span>Random</span>
                </button>
              </li>
            </ul>
          </div>
          <div class="mt-3 text-center">
            <p class="text-secondary small">Currently viewing:<span id="currentDay" class="fw-semibold">Monday</span></p>
          </div>
        </div>
      </div>

      <!-- tab content -->
  <div class="tab-content" id="scheduleContent">
    <div class="tab-pane fade show active" id="tab-Monday" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab-Tuesday" role="tabpanel"></div>
    <!-- … dst. s/d Sunday … -->
  </div>
      <div class="container py-4">
    <!-- Monday -->
    <div class="schedule-day active" id="Monday">
      <div class="schedule-heading">Monday Schedule</div>
    </div>
    <!-- Tuesday -->
    <div class="schedule-day" id="Tuesday">
      <div class="schedule-heading">Tuesday Schedule</div>
    </div>
    <!-- Wednesday -->
    <div class="schedule-day" id="Wednesday">
      <div class="schedule-heading">Wednesday Schedule</div>
    </div>
    <!-- Thursday -->
    <div class="schedule-day" id="Thursday">
      <div class="schedule-heading">Thursday Schedule</div>
    </div>
    <!-- Friday -->
    <div class="schedule-day" id="Friday">
      <div class="schedule-heading">Friday Schedule</div>
    </div>
    <!-- Saturday -->
    <div class="schedule-day" id="Saturday">
      <div class="schedule-heading">Saturday Schedule</div>
    </div>
    <!-- Sunday -->
    <div class="schedule-day" id="Sunday">
      <div class="schedule-heading">Sunday Schedule</div>
    </div>
    <!-- Random -->
    <div class="schedule-day" id="Random">
      <div class="schedule-heading">Random Picks</div>
    </div>
  </div>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
      fetch('api/homepageAPI.php?action=get_carousel')
        .then(res => res.json())
        .then(json => {
          if (!json.success) return;
          const inner = document.querySelector('#animeCarousel .carousel-inner');
          inner.innerHTML = ''; 
          json.carousel.forEach((anime, idx) => {
            const item = document.createElement('div');
            item.classList.add('carousel-item');
            if (idx === 0) item.classList.add('active');
            item.innerHTML = `
            <div class="row align-items-center gx-3">
            <!-- Mobile: title + image (stacked) -->
            <div class="col-12 d-block d-md-none text-center py-3">
            <h5 class="mb-1">
            <a href="index.php?page=detail&anime_id=${anime.anime_id}">
            ${anime.title}</a>
            </h5>
            <img src="${anime.image_url}"class="img-fluid mb-2"alt="${anime.title}">
            </div>
            <!-- Desktop: image (2 cols) -->
            <div class="col-md-3 d-none d-md-block">
            <div class="ratio">
            <img src="${anime.image_url}"class="img-fluid rounded"alt="${anime.title}">
            </div>
            </div>
            <!-- Desktop: title + synopsis (10 cols) -->
            <div class="col-md-9 d-none d-md-block">
            <h5 class="mb-1"><a href="index.php?page=detail&anime_id=${anime.anime_id}">${anime.title}</a></h5>
            <p class="mb-0">${anime.synopsis}</p>
            </div>
            </div>
            </div>`;
            inner.appendChild(item);
          });
        })
        .catch(console.error);
        
      // — Fetch & Render Weekly Schedule — 
  const params = new URLSearchParams(window.location.search);
  const id = params.get('id'); // <-- Di sinilah ID-nya ditangkap!
      fetch('api/homepageAPI.php?action=get_schedule')
        .then(res => res.json())
        .then(json => {
          if (!json.success) return;
          Object.entries(json.schedule).forEach(([day, list]) => {
            const container = document.getElementById(day);  // cocok dengan <div id="Monday">, "Tuesday", dll.
            if (!container) return;
            // Simpan heading tanpa mengubah class/design
            const headingHTML = container.querySelector('.schedule-heading').outerHTML;
            container.innerHTML = headingHTML;

            if (list.length) {
              list.forEach(anime => {
                container.innerHTML += `
                  <div class="row schedule-item">
                    <div class="col-4 col-md-2">
                      <div class="image-box" id=image-box-preview>
                        <img src="${anime.image_url}" class="img-fluid" alt="${anime.title}">
                      </div>
                    </div>
                    <div class="col-8 col-md-10 details">
                      <div class="anime-title"><a href="index.php?page=detail&anime_id=${anime.anime_id}">
                      ${anime.title}</div>
                      <div class="time-info"><i class="bi bi-clock"></i> ${anime.broadcast_time}</div>
                      <div class="description">${anime.synopsis}</div>
                    </div>
                  </div>
                  <hr class="schedule-divider"/>
                `;
              });
            } else {
              container.innerHTML += `
                <div class="text-center text-secondary mb-4">
                  Belum ada jadwal anime untuk hari ${day}.
                </div>
              `;
            }
          });
        })
        .catch(console.error);

        // --- Bagian Day Navigation ---
        const dayNavButtons = document.querySelectorAll("#dayNav button");
        const currentDayEl = document.getElementById("currentDay");
        const scheduleDays = document.querySelectorAll(".schedule-day");

        dayNavButtons.forEach((btn) => {
          btn.addEventListener("click", function () {
            // Reset semua tombol nav ke keadaan 'tidak aktif'
            dayNavButtons.forEach((b) => {
              b.classList.remove("active");
            });

            // Tandai tombol yang diklik sebagai 'active'
            const selectedDay = btn.getAttribute("data-day");
            btn.classList.add("active");

            // Update teks “Currently viewing”
            currentDayEl.textContent = selectedDay;

            // 4) Sembunyikan semua konten schedule-day, lalu tampilkan yang sesuai
          scheduleDays.forEach((container) => {
            if (container.id === selectedDay) {
              container.classList.add("active");
            } else {
              container.classList.remove("active");
            }
          });
          });
        });
      });
    </script>
  </body>
  </html>