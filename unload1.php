<title>Create Form</title>

</head>

<div class="container py-4">

  <!-- 1) Nav Tabs untuk berbagai kategori: All, Top Airing, Top Upcoming, Top TV, Top Movies, Top OVAs, Top ONAs, Top Specials, Most Popular, Most Favorited -->
  <ul class="nav nav-tabs mb-4" id="animeTabs">
    <li class="nav-item">
      <a class="nav-link active" href="#" data-category="all">All Anime</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-category="top_airing">Top Airing</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-category="top_upcoming">Top Upcoming</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-category="top_tv">Top TV Series</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-category="top_movies">Top Movies</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-category="top_ovas">Top OVAs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-category="top_onas">Top ONAs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-category="top_specials">Top Specials</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-category="most_popular">Most Popular</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-category="most_favorited">Most Favorited</a>
    </li>
  </ul>

  <!-- 2) Search dan Filter (opsional) -->
  <div class="row mb-4">
    <div class="col-md-6">
      <form id="searchForm" class="input-group">
        <input type="text" id="searchQ" class="form-control" placeholder="Cari judul anime…" />
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>
    <div class="col-md-3">
      <select id="typeFilter" class="form-select">
        <option value="">Filter by Type</option>
        <option value="TV">TV</option>
        <option value="Movie">Movie</option>
        <option value="OVA">OVA</option>
        <option value="ONA">ONA</option>
        <option value="Special">Special</option>
      </select>
    </div>
    <div class="col-md-3 text-end">
      <button id="btnReset" class="btn btn-secondary">Reset</button>
    </div>
  </div>

  <!-- 3) Kontainer Grid untuk Menampilkan Anime Cards -->
  <div class="row" id="animeGrid"></div>

  <!-- 4) Modal Bootstrap untuk Detail Anime -->
  <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="detailTitle" class="modal-title"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4 text-center">
              <img id="detailImg" class="img-fluid mb-3" alt="Cover Anime" />
            </div>
            <div class="col-md-8">
              <p><strong>Type:</strong> <span id="detailType"></span></p>
              <p><strong>Status:</strong> <span id="detailStatus"></span></p>
              <p><strong>Episodes:</strong> <span id="detailEps"></span></p>
              <hr />
              <p id="detailSynopsis"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- Akhir container -->

<script>
// Ambil elemen-elemen yang diperlukan
const tabs       = document.querySelectorAll('#animeTabs .nav-link');
const grid       = document.getElementById('animeGrid');
const modal      = new bootstrap.Modal(document.getElementById('detailModal'));
const searchForm = document.getElementById('searchForm');
const searchQ    = document.getElementById('searchQ');
const typeFilter = document.getElementById('typeFilter');
const btnReset   = document.getElementById('btnReset');

// 1) Fungsi render list anime ke dalam grid card Bootstrap
function renderList(list) {
  grid.innerHTML = '';
  if (!list || !list.length) {
    grid.innerHTML = '<p class="text-muted">No results.</p>';
    return;
  }
  list.forEach(a => {
    grid.insertAdjacentHTML('beforeend', `
      <div class="col-md-3 mb-4">
        <div class="card h-100 border-0 shadow-sm clickable" data-id="${a.anime_id}">
          <img src="${a.image_url}" class="card-img-top" alt="${a.title}" />
          <div class="card-body">
            <h6 class="card-title text-truncate">${a.title}</h6>
          </div>
        </div>
      </div>
    `);
  });
  attachDetailListener();
}

// 2) Tambahkan event listener ke setiap card agar memanggil detail
function attachDetailListener() {
  document.querySelectorAll('.clickable').forEach(el => {
    el.addEventListener('click', async () => {
      const id = el.dataset.id;
      try {
        const res = await fetch(`api/topanimeAPI.php?anime_id=${id}`);
        const d   = await res.json();
        if (!d.error) {
          // Isi konten modal dengan data
          document.getElementById('detailTitle').textContent   = d.title;
          document.getElementById('detailImg').src             = d.image_url;
          document.getElementById('detailType').textContent    = d.type;
          document.getElementById('detailStatus').textContent  = d.status;
          document.getElementById('detailEps').textContent     = d.total_eps;
          document.getElementById('detailSynopsis').textContent= d.synopsis;
          modal.show();
        }
      } catch(err) {
        console.error(err);
      }
    });
  });
}

// 3) Load “All Anime” pada awal
async function loadAll() {
  try {
    const res = await fetch('api/topanimeAPI.php');
    const data = await res.json();
    renderList(data);
  } catch(err) {
    console.error(err);
    grid.innerHTML = '<p class="text-danger">Failed to load data.</p>';
  }
}

// 4) Load daftar berdasarkan kategori (kategori sesuai data-category di tab)
async function loadByCategory(cat) {
  try {
    const res = await fetch(`api/anime_category.php?category=${cat}`);
    const data = await res.json();
    renderList(data);
  } catch(err) {
    console.error(err);
    grid.innerHTML = '<p class="text-danger">Failed to load data.</p>';
  }
}

// 5) Fungsi pencarian (search)
async function doSearch(q) {
  if (!q) return loadAll();
  try {
    const res = await fetch(`api/anime_search.php?q=${encodeURIComponent(q)}`);
    const data = await res.json();
    renderList(data);
  } catch(err) {
    console.error(err);
    grid.innerHTML = '<p class="text-danger">Search failed.</p>';
  }
}

// 6) Fungsi filter berdasarkan type
async function doFilter(type) {
  if (!type) return loadAll();
  try {
    const res = await fetch(`api/anime_filter.php?type=${encodeURIComponent(type)}`);
    const data = await res.json();
    renderList(data);
  } catch(err) {
    console.error(err);
    grid.innerHTML = '<p class="text-danger">Filter failed.</p>';
  }
}

// 7) Pasang event listener untuk tiap tab
tabs.forEach(tab => {
  tab.addEventListener('click', async (e) => {
    e.preventDefault();
    // Hapus active dari semua, lalu beri active pada yang diklik
    document.querySelector('#animeTabs .active').classList.remove('active');
    tab.classList.add('active');

    // Reset search dan filter bila berpindah tab
    searchQ.value    = '';
    typeFilter.value = '';

    // Load berdasarkan kategori
    const cat = tab.dataset.category;
    if (cat === 'all') {
      loadAll();
    } else {
      loadByCategory(cat);
    }
  });
});

// 8) Event listener untuk form Search
searchForm.addEventListener('submit', e => {
  e.preventDefault();
  const q = searchQ.value.trim();
  doSearch(q);
  // Hapus active dari tab apapun: karena kita override dengan hasil search
  document.querySelectorAll('#animeTabs .active').forEach(a => a.classList.remove('active'));
});

// 9) Event listener untuk dropdown Filter
typeFilter.addEventListener('change', () => {
  const t = typeFilter.value;
  doFilter(t);
  // Hapus active dari tab apapun: karena kita override dengan hasil filter
  document.querySelectorAll('#animeTabs .active').forEach(a => a.classList.remove('active'));
});

// 10) Event listener untuk tombol Reset
btnReset.addEventListener('click', () => {
  searchQ.value    = '';
  typeFilter.value = '';
  // Reset ke “All Anime” tab
  document.querySelectorAll('#animeTabs .active').forEach(a => a.classList.remove('active'));
  document.querySelector('#animeTabs a[data-category="all"]').classList.add('active');
  loadAll();
});

// Inisialisasi: muat semua anime pada pertama kali halaman dibuka
loadAll();
</script>
