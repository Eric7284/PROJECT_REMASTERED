<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Top Anime Series</title>
  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <!-- Bootstrap Icons -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    rel="stylesheet"
  />
  <style>
    body {
      background-color: #1a1a1a;
      color: white;
    }
    .navbar {
      background-color: #2d2d2d;
    }
    .anime-popover {
      --bs-popover-max-width: 320px;
      --bs-popover-bg: #2d2d2d;
      --bs-popover-border-color: #495057;
      --bs-popover-header-bg: #2d2d2d;
      --bs-popover-body-color: #ffffff;
      --bs-popover-header-color: #ffffff;
    }
    .table-dark {
      --bs-table-bg: #1a1a1a;
      --bs-table-hover-bg: #2d2d2d;
    }
    .text-primary {
      color: #66b3ff !important;
    }
    .text-primary:hover {
      color: #4da6ff !important;
    }
  </style>
</head>
<body>
  <!-- Navigation Tabs -->
  <nav class="navbar navbar-expand-lg mb-4">
    <div class="container-fluid">
      <div class="d-flex flex-wrap gap-1" id="nav-tabs">
        <button
          class="btn btn-sm btn-primary me-1 mb-1"
          data-tab="All Anime"
        >
          All Anime
        </button>
        <button
          class="btn btn-sm btn-secondary me-1 mb-1"
          data-tab="Top Airing"
        >
          Top Airing
        </button>
        <button
          class="btn btn-sm btn-secondary me-1 mb-1"
          data-tab="Top Upcoming"
        >
          Top Upcoming
        </button>
        <button
          class="btn btn-sm btn-secondary me-1 mb-1"
          data-tab="Top TV Series"
        >
          Top TV Series
        </button>
        <button
          class="btn btn-sm btn-secondary me-1 mb-1"
          data-tab="Top Movies"
        >
          Top Movies
        </button>
        <button
          class="btn btn-sm btn-secondary me-1 mb-1"
          data-tab="Top OVAs"
        >
          Top OVAs
        </button>
        <button
          class="btn btn-sm btn-secondary me-1 mb-1"
          data-tab="Top ONAs"
        >
          Top ONAs
        </button>
        <button
          class="btn btn-sm btn-secondary me-1 mb-1"
          data-tab="Top Specials"
        >
          Top Specials
        </button>
        <button
          class="btn btn-sm btn-secondary me-1 mb-1"
          data-tab="Most Popular"
        >
          Most Popular
        </button>
        <button
          class="btn btn-sm btn-secondary me-1 mb-1"
          data-tab="Most Favorited"
        >
          Most Favorited
        </button>
      </div>
    </div>
  </nav>

  <!-- Banner -->
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="position-relative rounded overflow-hidden">
          <img
            src="https://via.placeholder.com/1200x200/2d2d2d/ffffff?text=Anime+Collaboration+Banner"
            alt="Anime Collaboration Banner"
            class="w-100"
            style="height: 200px; object-fit: cover"
          />
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="container-fluid pb-5">
    <div class="row mb-4">
      <div class="col-12 d-flex justify-content-between align-items-center">
        <h1 class="h2 mb-0">Top Anime Series</h1>
        <small class="text-muted">Updated twice a day. (How do we rank shows?)</small>
      </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">
      <table class="table table-dark table-hover">
        <thead style="background-color: #2d2d2d">
          <tr>
            <th scope="col" style="width: 80px">Rank</th>
            <th scope="col" style="width: 50%">Title</th>
            <th scope="col" style="width: 120px">Score</th>
            <th scope="col" style="width: 120px">Your Score</th>
            <th scope="col" style="width: 150px">Status</th>
          </tr>
        </thead>
        <tbody>
          <!-- Anime Row 1 -->
          <tr style="background-color: #1a1a1a">
            <td class="align-middle">
              <span class="h3 fw-bold text-muted">1</span>
            </td>
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <img
                  src="https://via.placeholder.com/50x75/444/fff?text=Frieren"
                  alt="Sousou no Frieren"
                  width="50"
                  height="75"
                  class="rounded me-3 flex-shrink-0"
                />
                <div class="flex-grow-1">
                  <h6
                    class="mb-1 text-primary position-relative"
                    data-bs-toggle="popover"
                    data-bs-placement="right"
                    data-bs-trigger="hover"
                    data-bs-html="true"
                    data-bs-content='
                      <div class="p-2">
                        <h6 class="fw-bold mb-2">Sousou no Frieren (2023)</h6>
                        <p class="small mb-2">
                          During their decade-long quest to defeat the Demon King, the members of the hero&apos;s party—Himmel himself, the priest Heiter, the dwarf warrior Eisen, and the elven mage Frieren—forge bonds through adventures and battles...
                        </p>
                        <div class="small">
                          <div><strong>Genres:</strong> Adventure, Drama, Fantasy</div>
                          <div><strong>Demographic:</strong> Shounen</div>
                          <div><strong>Status:</strong> Finished Airing</div>
                          <div><strong>Type:</strong> TV</div>
                          <div><strong>Episodes:</strong> 28</div>
                          <div><strong>Score:</strong> 9.3 (scored by 668,145 users)</div>
                          <div><strong>Ranked:</strong> #1</div>
                          <div><strong>Popularity:</strong> #142</div>
                          <div><strong>Members:</strong> 1,131,686</div>
                        </div>
                      </div>
                    '
                    style="cursor: pointer"
                  >
                    Sousou no Frieren
                  </h6>
                  <div class="small text-muted">
                    <span class="badge bg-secondary me-2">TV</span>2023 • 28 eps
                  </div>
                  <div class="small text-muted">1,131,686 members</div>
                </div>
              </div>
            </td>
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <i class="bi bi-star-fill text-warning me-1"></i>
                <span class="h5 mb-0 fw-bold">9.3</span>
              </div>
            </td>
            <td class="align-middle">
              <span class="text-muted">N/A</span>
            </td>
            <td class="align-middle">
              <button class="btn btn-primary btn-sm">
                <i class="bi bi-plus me-1"></i>Add to My List
              </button>
            </td>
          </tr>

          <!-- Anime Row 2 -->
          <tr style="background-color: #1a1a1a">
            <td class="align-middle">
              <span class="h3 fw-bold text-muted">2</span>
            </td>
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <img
                  src="https://via.placeholder.com/50x75/444/fff?text=FMA"
                  alt="Fullmetal Alchemist: Brotherhood"
                  width="50"
                  height="75"
                  class="rounded me-3 flex-shrink-0"
                />
                <div class="flex-grow-1">
                  <h6
                    class="mb-1 text-primary position-relative"
                    data-bs-toggle="popover"
                    data-bs-placement="right"
                    data-bs-trigger="hover"
                    data-bs-html="true"
                    data-bs-content='
                      <div class="p-2">
                        <h6 class="fw-bold mb-2">Fullmetal Alchemist: Brotherhood (2009-2010)</h6>
                        <p class="small mb-2">
                          After a horrific alchemy experiment goes wrong in the Elric household, brothers Edward and Alphonse are left in a catastrophic new reality.
                        </p>
                        <div class="small">
                          <div><strong>Genres:</strong> Action, Adventure, Drama, Fantasy</div>
                          <div><strong>Demographic:</strong> Shounen</div>
                          <div><strong>Status:</strong> Finished Airing</div>
                          <div><strong>Type:</strong> TV</div>
                          <div><strong>Episodes:</strong> 64</div>
                          <div><strong>Score:</strong> 9.1 (scored by 1,852,345 users)</div>
                          <div><strong>Ranked:</strong> #2</div>
                          <div><strong>Popularity:</strong> #1</div>
                          <div><strong>Members:</strong> 3,527,720</div>
                        </div>
                      </div>
                    '
                    style="cursor: pointer"
                  >
                    Fullmetal Alchemist: Brotherhood
                  </h6>
                  <div class="small text-muted">
                    <span class="badge bg-secondary me-2">TV</span>2009-2010 • 64 eps
                  </div>
                  <div class="small text-muted">3,527,720 members</div>
                </div>
              </div>
            </td>
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <i class="bi bi-star-fill text-warning me-1"></i>
                <span class="h5 mb-0 fw-bold">9.1</span>
              </div>
            </td>
            <td class="align-middle">
              <span class="text-muted">N/A</span>
            </td>
            <td class="align-middle">
              <button class="btn btn-primary btn-sm">
                <i class="bi bi-plus me-1"></i>Add to My List
              </button>
            </td>
          </tr>

          <!-- Anime Row 3 -->
          <tr style="background-color: #1a1a1a">
            <td class="align-middle">
              <span class="h3 fw-bold text-muted">3</span>
            </td>
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <img
                  src="https://via.placeholder.com/50x75/444/fff?text=Steins;Gate"
                  alt="Steins;Gate"
                  width="50"
                  height="75"
                  class="rounded me-3 flex-shrink-0"
                />
                <div class="flex-grow-1">
                  <h6
                    class="mb-1 text-primary position-relative"
                    data-bs-toggle="popover"
                    data-bs-placement="right"
                    data-bs-trigger="hover"
                    data-bs-html="true"
                    data-bs-content='
                      <div class="p-2">
                        <h6 class="fw-bold mb-2">Steins;Gate (2011)</h6>
                        <p class="small mb-2">
                          The self-proclaimed mad scientist Rintarou Okabe rents out a room in a rickety old building in Akihabara, where he indulges himself in his hobby of inventing prospective "future gadgets".
                        </p>
                        <div class="small">
                          <div><strong>Genres:</strong> Drama, Sci-Fi, Suspense</div>
                          <div><strong>Demographic:</strong> Seinen</div>
                          <div><strong>Status:</strong> Finished Airing</div>
                          <div><strong>Type:</strong> TV</div>
                          <div><strong>Episodes:</strong> 24</div>
                          <div><strong>Score:</strong> 9.07 (scored by 1,245,678 users)</div>
                          <div><strong>Ranked:</strong> #3</div>
                          <div><strong>Popularity:</strong> #3</div>
                          <div><strong>Members:</strong> 2,702,003</div>
                        </div>
                      </div>
                    '
                    style="cursor: pointer"
                  >
                    Steins;Gate
                  </h6>
                  <div class="small text-muted">
                    <span class="badge bg-secondary me-2">TV</span>2011 • 24 eps
                  </div>
                  <div class="small text-muted">2,702,003 members</div>
                </div>
              </div>
            </td>
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <i class="bi bi-star-fill text-warning me-1"></i>
                <span class="h5 mb-0 fw-bold">9.07</span>
              </div>
            </td>
            <td class="align-middle">
              <span class="text-muted">N/A</span>
            </td>
            <td class="align-middle">
              <button class="btn btn-primary btn-sm">
                <i class="bi bi-plus me-1"></i>Add to My List
              </button>
            </td>
          </tr>

          <!-- Anime Row 4 -->
          <tr style="background-color: #1a1a1a">
            <td class="align-middle">
              <span class="h3 fw-bold text-muted">4</span>
            </td>
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <img
                  src="https://via.placeholder.com/50x75/444/fff?text=SNK+S3"
                  alt="Shingeki no Kyojin Season 3 Part 2"
                  width="50"
                  height="75"
                  class="rounded me-3 flex-shrink-0"
                />
                <div class="flex-grow-1">
                  <h6
                    class="mb-1 text-primary position-relative"
                    data-bs-toggle="popover"
                    data-bs-placement="right"
                    data-bs-trigger="hover"
                    data-bs-html="true"
                    data-bs-content='
                      <div class="p-2">
                        <h6 class="fw-bold mb-2">Shingeki no Kyojin Season 3 Part 2 (2019)</h6>
                        <p class="small mb-2">
                          Seeking to restore humanity’s diminishing hope, the Survey Corps embark on a mission to retake Wall Maria.
                        </p>
                        <div class="small">
                          <div><strong>Genres:</strong> Action, Drama, Fantasy, Military</div>
                          <div><strong>Demographic:</strong> Shounen</div>
                          <div><strong>Status:</strong> Finished Airing</div>
                          <div><strong>Type:</strong> TV</div>
                          <div><strong>Episodes:</strong> 10</div>
                          <div><strong>Score:</strong> 9.05 (scored by 1,123,456 users)</div>
                          <div><strong>Ranked:</strong> #4</div>
                          <div><strong>Popularity:</strong> #8</div>
                          <div><strong>Members:</strong> 2,169,353</div>
                        </div>
                      </div>
                    '
                    style="cursor: pointer"
                  >
                    Shingeki no Kyojin Season 3 Part 2
                  </h6>
                  <div class="small text-muted">
                    <span class="badge bg-secondary me-2">TV</span>2019 • 10 eps
                  </div>
                  <div class="small text-muted">2,169,353 members</div>
                </div>
              </div>
            </td>
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <i class="bi bi-star-fill text-warning me-1"></i>
                <span class="h5 mb-0 fw-bold">9.05</span>
              </div>
            </td>
            <td class="align-middle">
              <span class="text-muted">N/A</span>
            </td>
            <td class="align-middle">
              <button class="btn btn-primary btn-sm">
                <i class="bi bi-plus me-1"></i>Add to My List
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Load More -->
    <div class="text-center mt-4">
      <button class="btn btn-outline-light">Next 50 →</button>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    defer
  ></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Initialize popovers
      var popoverTriggerList = [].slice.call(
        document.querySelectorAll("[data-bs-toggle='popover']")
      );
      popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl, {
          container: "body",
          customClass: "anime-popover",
        });
      });

      // Tab switching logic
      var tabsContainer = document.getElementById("nav-tabs");
      var buttons = tabsContainer.querySelectorAll("button");
      buttons.forEach(function (btn) {
        btn.addEventListener("click", function () {
          buttons.forEach(function (other) {
            other.classList.replace("btn-primary", "btn-secondary");
          });
          this.classList.replace("btn-secondary", "btn-primary");
          // Optionally, filter table rows based on this.dataset.tab
          // For now, it only updates active styling.
        });
      });
    });
  </script>
</body>
</html>
