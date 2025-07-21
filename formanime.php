<html>
<head>
  <title>Create Anime</title>
</head>
<body>
  <div class="container text-justify mb-3">
    <h2 class="mt-2 text-center">Create Anime</h2>
    <div id="toastContainer"class="toast-container position-fixed top-0 end-0 p-3"style="z-index: 1055;"></div>
    <form id="animeForm">
      <div class="row">
        <div class="col">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
        </div>
        <div class="col">
          <label for="type" class="form-label">Select Type</label>
          <select class="form-select" id="type" name="type" required>
            <option value="" disabled selected>Select Type</option>
            <option value="TV">TV</option>
            <option value="Movie">Movie</option>
            <option value="OVA">OVA</option>
            <option value="ONA">ONA</option>
            <option value="Special">Special</option>
            <option value="TV Special">TV Special</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="related_anime" class="form-label">Related Anime</label>
          <input type="text" class="form-control"name="related_anime_ids[]"id="relatedAnimeSelect"list="animeList"autocomplete="off">
          <datalist id="animeList">

          </datalist>
        </div>
        <div class="col">
          <label for="relationTypeSelect" class="form-label">Tipe Relasi</label>
          <select class="form-select" name="relation_type_id" id="relationTypeSelect">

          </select>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="status" class="form-label">Status</label>
          <select class="form-select" id="status" name="status" required>
            <option value="" disabled selected>Select Status</option>
            <option value="Airing">Airing</option>
            <option value="Completed">Completed</option>
            <option value="Upcoming">Upcoming</option>
            <option value="Cancelled">Cancelled</option>
            <option value="Not Aired Yet">Not Aired Yet</option>
          </select>
        </div>
        <div class="col">
          <label for="total_eps" class="form-label">Total Episodes</label>
          <input type="number" class="form-control" id="total_eps" name="total_eps" min="1" placeholder="Total Episodes" required>
        </div>
      </div>
      <div class="mb-3">
        <label for="synopsis" class="form-label">Synopsis</label>
        <textarea class="form-control" id="synopsis" name="synopsis" rows="3" required></textarea>
      </div>
      <div class="mb-3">
        <label for="image_url" class="form-label">Image URL</label>
        <input type="url" class="form-control" id="image_url" name="image_url">
      </div>
      <div class="row">
        <div class="col">
          <label for="aired_start_date" class="form-label">Aired Start Date</label>
          <input type="date" class="form-control" id="aired_start_date" name="aired_start_date"/>
        </div>
        <div class="col">
          <label for="aired_end_date" class="form-label">Aired End Date</label>
          <input type="date" class="form-control" id="aired_end_date" name="aired_end_date"/>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="season" class="form-label">Season</label>
          <select class="form-select" id="season" name="season" required>
            <option value=""disabled selected>Pilih Season</option>
            <option value="Winter">Winter</option>
            <option value="Spring">Spring</option>
            <option value="Summer">Summer</option>
            <option value="Fall">Fall</option>
          </select>
        </div>
        <div class="col">
          <label for="season_year" class="form-label">Season Year</label>
          <input type="number" class="form-control" id="season_year" name="season_year" required/>
        </div>
        <div class="col">
          <label for="broadcast_day" class="form-label">Broadcast Day</label>
          <select class="form-select" id="broadcast_day" name="broadcast_day">
            <option value=""disabled selected>Pilih Broadcast Day</option>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
            <option value="Random">Random</option>
          </select>
        </div>
        <div class="col">
          <label for="broadcast_time" class="form-label">Broadcast Time</label>
          <input type="time" class="form-control" id="broadcast_time" name="broadcast_time"/>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <label for="source" class="form-label">Source</label>
          <select class="form-select" id="source" name="source">
            <option value=""disabled selected>Pilih Source</option>
            <option value="Manga">Manga</option>
            <option value="Light Novel">Light Novel</option>
            <option value="Novel">Novel</option>
            <option value="Game">Game</option>
            <option value="Original">Original</option>
            <option value="Music">Music</option>
            <option value="4-koma Manga">4-koma Manga</option>
            <option value="Card Game">Card Game</option>
            <option value="Visual Novel">Visual Novel</option>
            <option value="Web Manga">Web Manga</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="col-4">
          <label for="demographic" class="form-label">Demographic</label>
          <select class="form-select" id="demographic" name="demographic">
            <option value=""disabled selected>Pilih Demographic</option>
            <option value="Shounen">Shounen</option>
            <option value="Shoujo">Shoujo</option>
            <option value="Seinen">Seinen</option>
            <option value="Josei">Josei</option>
            <option value="Kids">Kids</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="col-4">
          <label for="content_rating" class="form-label">Content Rating</label>
          <select class="form-select" id="content_rating" name="content_rating">
            <option value=""disabled selected>Pilih Content Rating</option>
            <option value="G - All Ages">G - All Ages</option>
            <option value="PG - Children">PG - Children</option>
            <option value="PG-13 - Teens 13 or older">PG-13 - Teens 13 or older</option>
            <option value="R - 17+ (violence & profanity)">R - 17+ (violence & profanity)</option>
            <option value="R+ - Mild Nudity">R+ - Mild Nudity</option>
            <option value="Rx - Hentai">Rx - Hentai</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="genre_ids" class="form-label">Genres</label>
          <select class="form-select" id="genre_ids" name="genre_ids[]"  multiple required>

          </select>
        </div>
      <div class="col">
        <label for="voice_actor_ids" class="form-label">Voice Actors</label>
        <select class="form-select" id="voice_actor_ids" name="voice_actor_ids[]" multiple required>

        </select>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="studio_ids" class="form-label">Studios</label>
        <select class="form-multi-select"id="studio_ids"name="studio_ids[]"multiple required>

        </select>
      </div>
      <div class="col">
        <label for="characters" class="form-label">Character</label>
        <select class="form-select" id="characters" name="characters[]" multiple required>

        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary mt-4 mb-4">Create Anime</button>
  </form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const genreSelect = document.getElementById('genre_ids');
  const actorSelect = document.getElementById('voice_actor_ids');
  const studioSelect = document.getElementById('studio_ids');
  const charactersSelect = document.getElementById('characters');
  const alertPlaceholder = document.getElementById('toastContainer');
  
  function showToast(message, type = 'success', delay = 2500) {
    const container = document.getElementById('toastContainer');
    const toastId   = 'toast' + Date.now();
    const html = `
    <div id="${toastId}" class="toast text-bg-${type} border-0" role="alert"aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
    <div class="toast-body">${message}</div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto"data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="progress" style="height: 4px;">
    <div class="progress-bar bg-light" role="progressbar"style="width:100%; animation:progress-bar-shrink ${delay}ms linear forwards;"aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
    </div>
    </div>
    </div>`;
    
    container.insertAdjacentHTML('beforeend', html);
    const el = document.getElementById(toastId);
    const bsToast = new bootstrap.Toast(el, { autohide: true, delay });
    el.addEventListener('hidden.bs.toast', () => el.remove());
    bsToast.show();
  }
  function fetchList(endpoint) {
    fetch(`api/formanimeAPI.php?action=${endpoint}`)
    .then(r => r.json())
    .then(json => {
      if (!json.success) throw new Error(json.message);
      const choicesData = json.data.map(data => ({value: data.id,label: data.name
      }));
      if (endpoint === 'get_studios') {
        studioChoices.setChoices(choicesData, 'value', 'label', true);
      }
      else if (endpoint === 'get_genres') {
        genreChoices.setChoices(choicesData, 'value', 'label', true);
      }
      else if (endpoint === 'get_voice_actors') {
        VAChoices.setChoices(choicesData, 'value', 'label', true);
      }
      else if (endpoint === 'get_characters') {
        charactersChoices.setChoices(choicesData, 'value', 'label', true);
      }else {
        console.warn(`Unknown endpoint: ${endpoint}`);
        console.error(`Error fetch ${endpoint}:`, resJson.message);
        showToast(`Gagal memuat <b>${endpoint}</b>`, 'danger');
      }
    }).catch(err => {
      console.error(err);
      showToast(`Terjadi error pada fetch <b>${endpoint}</b>`, 'danger');
    })
  };
  
  fetchList('get_genres', genreSelect)
  fetchList('get_voice_actors', actorSelect)
  fetchList('get_studios', studioSelect)
  fetchList('get_characters', charactersSelect)
  const studioChoices = new Choices(studioSelect, {
    removeItemButton: true,    // tampilkan tombol × pada tiap tag
    searchEnabled: true,       // tampilkan kolom search
    placeholder: true,
    placeholderValue: 'Pilih studio...',
    addItemfilter: null,
    resetScrollPosition: true,
    noResultsText: 'Well, You search word not found something',
    searchChoices: true
  });
  const genreChoices = new Choices(genreSelect, {
    removeItemButton: true,    // tampilkan tombol × pada tiap tag
    searchEnabled: true,       // tampilkan kolom search
    placeholder: true,
    placeholderValue: 'Pilih studio...'
  });
  const charactersChoices = new Choices(charactersSelect, {
    removeItemButton: true,    // tampilkan tombol × pada tiap tag
    searchEnabled: true,       // tampilkan kolom search
    placeholder: true,
    placeholderValue: 'Pilih studio...'
  });
  const VAChoices = new Choices(actorSelect, {
    removeItemButton: true,    // tampilkan tombol × pada tiap tag
    searchEnabled: true,       // tampilkan kolom search
    placeholder: true,
    placeholderValue: 'Pilih studio...'
  });
  
  const form = document.getElementById('animeForm');
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    const fd = new FormData(form);
    
    console.log("FormData yang akan dikirim:");
    for (let [key, value] of fd.entries()) {
      console.log(`${key}: ${value}`);
    }
    
    fetch('api/formanimeAPI.php?action=create_anime', {
      method: 'POST',
      body: fd
    })
    .then(res => res.json())
    .then(json => {
      if (json.success) {
        showToast(`🎉 ${json.message} (ID: ${json.anime_id})`, 'success');
        form.reset();
      } else {
        showToast(`❌ Gagal simpan: ${json.message}`, 'danger');
      }
    })
    .catch(err => {
      console.error(err);
      showToast('❌ Terjadi error saat menghubungi server.', 'danger');
    });
  });
});

const relatedSearchInput = document.getElementById('relatedSearch');
const animeDatalist = document.getElementById('animeList');
const relatedTypeSelect = document.getElementById('relationTypeSelect');
const relatedContainer = document.getElementById('relatedContainer');
const relatedItems = [];
let animeData = []; //Output [{id, name}, ...]
let titleToIdMap = {}; //Output { "judul anime": id, ... }
function fetchAllAnime() {
        fetch('api/formanimeAPI.php?action=get_all_anime')
          .then(res => res.json())
          .then(json => {
            if (json.success && Array.isArray(json.data)) {
              animeData = json.data;
              animeData.forEach(item => {
                titleToIdMap[item.name] = item.id;
              });
              
              //Isi datalist <option> untuk live search
              animeDatalist.innerHTML = ''; // Kosongkan dulu
              animeData.forEach(item => {
                const opt = document.createElement('option');
                opt.text = item.name
                opt.value = item.id; // Set value ke nama anime
                animeDatalist.appendChild(opt);
              });
            } else {
              console.error('Error fetching anime data:', json.message);
              showToast('Gagal memuat daftar anime', 'danger');
            }
          })
          .catch(err => {
            console.error('Fetch error when pull from API Case get_all_anime:', err);
            showToast('Terjadi kesalahan saat mengambil data dari API get_all_anime', 'danger');
          });
        }
        //Panggil fetchAllAnime untuk mengisi data awal
        fetchAllAnime();

        fetch('api/formanimeAPI.php?action=get_relation_types')
        .then(res => res.json())
        .then(json => {
          if (json.success){
            const sel = document.getElementById('relationTypeSelect');
            json.data.forEach(rt => {
              const opt = document.createElement('option');
              opt.value = rt.id;
              opt.text = rt.name;
              sel.appendChild(opt);
            });
          }
        });
      //Hidden input untuk related_ids[] dan relation relation_types[]
      const hiddenId = document.createElement('input');
      const hiddenType = document.createElement('input');
      hiddenId.type = 'hidden';
      hiddenId.name = 'related_anime_ids[]';
      hiddenId.value = animeId; // ID anime
      hiddenType.type = 'hidden';
      hiddenType.name = 'relation_type_id[]';
      hiddenType.value = relationType; // Tipe relasi
  </script>
  </body>
</html>