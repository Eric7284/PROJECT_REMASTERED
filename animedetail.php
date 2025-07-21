<head><title>Anime Details</title></head>
<body class="bg-light">
    <div class="container py-4">
        <!-- Header -->
        <header class="mb-4">
            <h1 class="fw-bold " id="anime-title"></h1>
        </header>
        <div class="row g-4">
            <!-- Left Column: Poster and Info -->
            <div class="col-lg-4">
                <!-- Poster -->
                <div class="card section-card mb-4"><img src="" id="anime-image" class="img-fluid rounded-start"></div>
                <!-- Information Card -->
                <div class="card section-card mb-4">
                    <div class="card-header"><h5 class="card-title mb-0">Details</h5></div>
                    <div class="card-body">
                        <ul class="list-unstyled small text-muted mb-0">
                            <li class="d-flex align-items-center mb-2">
                                <i class="bi bi-tv info-icon text-primary"></i>
                                <strong>Type:</strong> <span class="ms-1" id="anime-type"></span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bi bi-film info-icon text-primary"></i>
                                <strong>Episodes:</strong> <span class="ms-1" id="anime-episodes"></span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bi bi-calendar info-icon text-primary"></i>
                                <strong>Status:</strong> <span class="ms-1" id="anime-status"></span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bi bi-calendar-date info-icon text-primary"></i>
                                <strong>Aired:</strong> <span class="ms-1" id="anime-start-date"></span> - <span id="anime-end-date"></span>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-people info-icon text-primary mt-1"></i>
                                <div>
                                    <strong>Producers:</strong><span class="ms-1"> - </span>
                                </div>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-people info-icon text-primary mt-1"></i>
                                <div>
                                    <strong>Season:</strong><span class="ms-1" id="anime-season"></span>
                                </div>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-building info-icon text-primary mt-1"></i>
                                <div>
                                    <strong>Licensors:</strong><span class="ms-1"> - </span>
                                </div>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-camera-video info-icon text-primary mt-1"></i>
                                <div>
                                    <strong>Studios:</strong><span class="ms-1" id="anime-studios"></span>
                                </div>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-book info-icon text-primary mt-1"></i>
                                <div>
                                    <strong>Source:</strong><span class="ms-1" id="anime-source"></span>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bi bi-shield info-icon text-primary"></i>
                                <strong>Rating:</strong><span class="ms-1" id="anime-rating"></span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bi bi-clock info-icon text-primary"></i>
                                <strong>Duration:</strong><span class="ms-1">24 min. per ep.</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bi bi-broadcast info-icon text-primary"></i>
                                <strong>Broadcast:</strong> <span class="ms-1" id="anime-broadcast"></span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bi bi-star-fill info-icon text-warning"></i>
                                <strong>Score:</strong> <span class="ms-1" id="anime-score"></span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="bi bi-bar-chart info-icon text-primary"></i>
                                <strong>Popularity:</strong> <span class="ms-1" id="anime-popularity"></span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-people info-icon text-primary"></i>
                                <strong>Members:</strong> <span class="ms-1"> - </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Genres Card -->
                <div class="card section-card">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Genres</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2" id="genres-container">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Column: Content -->
            <div class="col-lg-8">
                <!-- Synopsis -->
                <div class="card section-card mb-4">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Synopsis</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-muted lh-lg" id="anime-synopsis"></p>
                    </div>
                </div>
                <!-- Characters & Voice Actors -->
                <div class="card section-card mb-4">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Characters</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 horizontal-scroll" id="characters">
                        </div>
                    </div>
                </div>
                <div class="card section-card mb-4">
                    <div class="card-header">
                        <h4 class="card-title mb-0" >Voice Actors</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 horizontal-scroll" id="voice_actor">
                        </div>
                    </div>
                </div>
                <!-- Related Anime -->
                <div class="card section-card mb-4">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Related Anime</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 horizontal-scroll" id="related-row">
                        </div>
                    </div>
                </div>
                <!-- Image Gallery -->
                <div class="card section-card mb-4">
                    <div class="card-header">
                        <h4 class="card-title mb-0"><i class="bi bi-images me-2"></i>Gallery</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3" id="gallery-container"></div>
                    </div>
                </div>
                <!-- Opening Themes -->
                <div class="card section-card mb-4">
                    <div class="card-header"><h4 class="card-title mb-0">Opening Themes</h4></div>
                    <div class="card-body">
                        <ul class="row row-cols-1 row-cols-md-2 g-3 list-unstyled" id="opening-themes-list">
                        </ul>
                    </div>
                </div>
                <!-- Ending Themes -->
                <div class="card section-card mb-4">
                    <div class="card-header"><h4 class="card-title mb-0">Ending Themes</h4></div>
                    <div class="card-body">
                        <ul class="row row-cols-1 row-cols-md-2 g-3 list-unstyled" id="ending-themes-list">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Modal -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="galleryModalLabel">Gallery Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
        <img src="" id="modal-image" class="img-fluid rounded">
      </div>
            </div>
        </div>
    </div>
</body>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const animeId = params.get('anime_id');
    if (!animeId) {
        console.error('Parameter id tidak ditemukan di URL');return;
    }
    fetch(`api/animedetailAPI.php?anime_id=${encodeURIComponent(animeId)}`)
    .then(res => res.json())
    .then(json => {
        if (!json.success) {
            console.error('API error:', json.error);
            return;
        }
        console.log(json)
        const anime = json.data;
        console.log(anime)
        
        document.getElementById('anime-title').textContent       = anime.title;
        document.getElementById('anime-season').textContent      = anime.season;
        document.getElementById('anime-image').src               = anime.image_url;
        document.getElementById('anime-type').textContent        = anime.type;
        document.getElementById('anime-episodes').textContent    = anime.total_eps;
        document.getElementById('anime-status').textContent      = anime.status;
        document.getElementById('anime-start-date').textContent  = anime.aired_start_date;
        document.getElementById('anime-end-date').textContent    = anime.aired_end_date;
        document.getElementById('anime-synopsis').textContent    = anime.synopsis;
        document.getElementById('anime-source').textContent      = anime.source;
        document.getElementById('anime-rating').textContent      = anime.content_rating;
        document.getElementById('anime-broadcast').textContent   = anime.broadcast_time;
        document.getElementById('anime-score').textContent       = anime.score      != null ? anime.score : '-';
        document.getElementById('anime-popularity').textContent  = anime.popularity != null ? anime.popularity : '-';

        document.getElementById('anime-studios').textContent =
        Array.isArray(anime.studios)
        ? anime.studios.map(s => s.name).join(', ')
        : '';
        
        const genresContainer = document.getElementById('genres-container');
        genresContainer.innerHTML = '';
        (anime.genres || []).forEach(g => {
            const badge = document.createElement('span');
            badge.className = 'badge bg-secondary genre-badge';
            badge.textContent = g.name;
            genresContainer.appendChild(badge);
        });
        
        const relatedRow = document.getElementById('related-row');
        relatedRow.innerHTML = '';
        (anime.related_anime || []).forEach(anime => {
            const col = document.createElement('div');
            col.className = 'col-md-3 col-6 mb-4';
            col.innerHTML = `<div class="card h-100">
            <img src="${anime.related_image}" class="card-img-top" alt="${anime.related_title}">
            <div class="card-body">
            <h6 class="card-title"><a href="index.php?page=detail&anime_id=${anime.related_anime_id}"class="anime-link">${anime.related_title}</a></h6>
            <p class="small text-muted mb-0">${anime.relation_name}</p>
            </div>
            </div>`;
            relatedRow.appendChild(col);
        });
        
        const charWrap = document.getElementById('characters');
        charWrap.innerHTML = '';
        (anime.characters || []).forEach(ch => {
            const col = document.createElement('div');
            col.className = 'col-md-3';
            col.innerHTML = `
            <div class="card character-card h-100">
            <div class="card-body p-3">
            <div class="d-flex gap-3">
            <img src="${ch.img_url}" alt="${ch.name}" class="character-image rounded" width="80" height="120">
            <div class="flex-grow-1">
            <h6 class="fw-semibold mb-1">${ch.name}</h6>
            <p class="small text-muted mb-2">${ch.role}</p>
            </div>
            </div>
            </div>
            </div>`;
            charWrap.appendChild(col);
        });
        
        const VAWrap = document.getElementById('voice_actor');
        VAWrap.innerHTML = '';
        (anime.voice_actors || []).forEach(va => {
            const col = document.createElement('div');
            col.className = 'col-md-3';
            col.innerHTML = `
            <div class="card character-card h-100">
            <div class="card-body p-3">
            <div class="d-flex gap-3">
            <img src="${va.img_url}" class="character-image rounded" width="80" height="120">
            <div class="flex-grow-1">
            <h6 class="fw-semibold mb-1">${va.full_name}</h6>
            <p class="small text-muted mb-2">${va.language}</p>
            </div>
            </div>
            </div>
            </div>`;
            VAWrap.appendChild(col);
        });

        const gallery = document.getElementById('gallery-container');
        gallery.innerHTML = '';
        (anime.gallery_detail || []).forEach(img => {
            const col = document.createElement('div');
            col.className = img.col_classes || 'col-5 col-md-2 col-sm-3';
            col.innerHTML = `
            <div class="gallery-container position-relative">
            <img src="${img.image_url}"class="gallery-item rounded width="80" height="120"" data-bs-toggle="modal" data-bs-target="#galleryModal">
            <div class="gallery-overlay rounded">
            <div class="small fw-semibold">${img.title}</div>
            </div>
            </div>`;
            gallery.appendChild(col);
        });
        
        const openingList = document.getElementById('opening-themes-list');
        if (openingList && Array.isArray(anime.opening)) {
            openingList.innerHTML = anime.opening.map(theme => `
            <li class="mb-1">
            <div class="fw-medium"><a href="${theme.url_theme}"target="_blank" rel="noopener noreferrer">"${theme.title}"</a></div> 
            <div class="small text-muted">by ${theme.artist}</div>
            <div class="small text-muted">Episodes: ${theme.eps_start}–${theme.eps_end}</div>
            </li>`).join('');
        };

        const endingList = document.getElementById('ending-themes-list');
        if (endingList && Array.isArray(anime.ending)) {
            endingList.innerHTML = anime.ending.map(theme => `
            <li class="mb-3">
            <div class="fw-medium"><a href="${theme.url_theme}"target="_blank" rel="noopener noreferrer">"${theme.title}"</a></div>
            <div class="small text-muted">by ${theme.artist}</div>
            <div class="small text-muted">Episodes: ${theme.eps_start}–${theme.eps_end}</div>
            </li>`).join('');
        }
        
        const modalImage = document.getElementById('modal-image');
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.addEventListener('click', () => {
                modalImage.src = item.src;
                modalImage.alt = item.alt || '';
            });
        });
    })
    .catch(err => console.error('Fetch error:', err));
    });
</script>
</html>