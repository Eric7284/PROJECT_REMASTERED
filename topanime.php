<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Top Anime Rankings</title>
  <style>
    
  </style>
</head>
<body class="bg-light text-dark">
  <div class="border-bottom">
    <div class="container py-4">
      <h1 class="h3 fw-bold mb-1">Top Anime Rankings</h1>
    </div>
  </div>

  <main class="container py-5">
    <!-- Filters -->
    <section class="mb-4">
      <div class="d-flex flex-wrap gap-2 justify-content-start">
        <button data-cat="all" class="btn btn-primary filter-btn">All Anime</button>
        <button data-cat="airing" class="btn btn-outline-secondary filter-btn">Top Airing</button>
        <button data-cat="upcoming" class="btn btn-outline-secondary filter-btn">Top Upcoming</button>
        <button data-cat="tv" class="btn btn-outline-secondary filter-btn">Top TV Series</button>
        <button data-cat="movie" class="btn btn-outline-secondary filter-btn">Top Movies</button>
        <button data-cat="ova" class="btn btn-outline-secondary filter-btn">Top OVA</button>
        <button data-cat="ona" class="btn btn-outline-secondary filter-btn">Top ONA</button>
        <button data-cat="special" class="btn btn-outline-secondary filter-btn">Top Specials</button>
      </div>
    </section>

    <!-- Anime List -->
    <section>
      <ul id="animeList" class="list-group"></ul>
      <nav id="paginationNav" aria-label="Page navigation" class="mt-4">
        <ul id="pagination" class="pagination justify-content-center"></ul>
      </nav>
    </section>
  </main>

  <script>
    const apiUrl = 'api/topanimeAPI.php';
    const itemsPerPage = 100;
    let currentCategory = 'all';
    let currentData = [];
    let currentPage = 1;

    const filterBtns = document.querySelectorAll('.filter-btn');
    const animeList = document.getElementById('animeList');
    const paginationContainer = document.getElementById('pagination');

    async function fetchAndRender() {
      animeList.innerHTML = '<li class="list-group-item text-center py-4"><div class="spinner-border"></div></li>';
      paginationContainer.innerHTML = '';
      currentPage = 1;
      try {
        const res = await fetch(`${apiUrl}?category=${currentCategory}&limit=10000`);
        const json = await res.json();
        if (json.success) {
          currentData = json[currentCategory] || json.data;
          renderPage();
        } else {
          animeList.innerHTML = `<li class="list-group-item text-danger">Error: ${json.error}</li>`;
        }
      } catch (err) {
        animeList.innerHTML = '<li class="list-group-item text-danger">Fetch error</li>';
      }
    }

    function renderPage() {
      const totalItems = currentData.length;
      const totalPages = Math.ceil(totalItems / itemsPerPage);
      const start = (currentPage - 1) * itemsPerPage;
      const end = start + itemsPerPage;
      const pageItems = currentData.slice(start, end);

      animeList.innerHTML = '';
      if (!pageItems.length) {
        animeList.innerHTML = '<li class="list-group-item text-center">No data available</li>';
      } else {
        pageItems.forEach((item, index) => {
          const rank = start + index + 1;
          const li = document.createElement('li');
          li.className = 'list-group-item d-flex align-items-start';
          li.innerHTML = `
            <div class="fw-bold me-3 align-self-start">${rank}</div>
            <div class="img-container me-3">
              <img src="${item.image_url}" alt="${item.title}">
            </div>
            <div class="ms-3 w-100 d-flex justify-content-between">
              <div>
                <h5 class="mb-1">    
                  <a href="index.php?page=detail&anime_id=${item.anime_id}" class="anime-link">${item.title}</a>
                </h5>
                ${item.subtitle ? `<div class="text-muted small mb-2">${item.subtitle}</div>` : ''}
                <div class="small text-muted mb-1"> <i class="bi bi-tv-fill"></i> ${item.type} • ${item.total_eps} eps </div>
                <div class="small text-muted mb-1"> <i class="bi bi-calendar-event"></i> ${item.aired_start_date} - ${item.aired_end_date} </div>
                <div class="small text-muted mb-1"> <i class="bi bi-star-fill"></i> Score: ${item.score} </div>
                <div class="small text-muted"> <i class="bi bi-building"></i> ${item.studio} </div>
              </div>
              <div class="text-end ms-3">
                <div class="small text-muted"><i class="bi bi-check-circle-fill"></i> ${item.status}</div>
              </div>
            </div>
          `;
          animeList.appendChild(li);
        });
      }

      paginationContainer.innerHTML = '';
      if (totalPages > 1) {
        for (let i = 1; i <= totalPages; i++) {
          const li = document.createElement('li');
          li.className = `page-item ${i === currentPage ? 'active' : ''}`;
          li.innerHTML = `<button class="page-link">${i}</button>`;
          li.querySelector('button').addEventListener('click', () => {
            currentPage = i;
            renderPage();
          });
          paginationContainer.appendChild(li);
        }
      }
    }

    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        filterBtns.forEach(b => b.classList.replace('btn-primary', 'btn-outline-secondary'));
        btn.classList.replace('btn-outline-secondary', 'btn-primary');
        currentCategory = btn.dataset.cat;
        fetchAndRender();
      });
    });
    document.addEventListener('DOMContentLoaded', fetchAndRender);
  </script>
</body>
</html>