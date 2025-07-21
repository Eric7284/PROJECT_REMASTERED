<div class="container text-justify border-top mb-3 border-bottom border-black">
  <div class="titles text-center text-sm-start"><h4>New Titles</h4></div>
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div class="col">
          <div class="row">
            <div class="image-container col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-5 text-center">
              <img src="images/142840.jpg" class="img-fluid"></div><!--style="min-width: 125px; max-width: 150px; width: 75%;"-->
            <div class="col-xxl-10 col-xl-9 col-lg-9 col-md-8 col-sm-7 text-justify">
              <h4>Chunniyou demo koi ga Shitai</h4>
            <p class="col-xl-12 col-sm-12 sinopsis" style="text-align: justify; border-bottom: 0px;">
              Everybody has had that stage in their life where they have thought themselves to be special, different from the masses of ordinary humans.
              They might go as far as seeing themselves capable of wielding mystical powers, or maybe even believe themselves to have descended from a fantasy realm.
              This "disease" is known as "chuunibyou" and is often the source of some of the most embarrassing moments of a person's life.
              For Yuuta Togashi, the scars that his chuunibyou has left behind are still fresh.
              <br>
              Having posed as the "Dark Flame Master" during his middle school years, he looks back at those times with extreme embarrassment,
              so much so that he decides to attend a high school far away where nobody will recognize him. Putting his dark history behind him,
              he longs to live a normal high school life.
              <br>
              Unfortunately, he hasn't escaped his past yet: enter Rikka Takanashi, Yuuta's new classmate and self-declared vessel of the "Wicked Eye."
              As this eccentric young girl crashes into Yuuta's life, his dream of an ordinary, chuunibyou-free life quickly crumbles away.
              In this hilarious and heartwarming story of a boy who just wants to leave his embarrassing memories behind, the delusions of old are far from a thing of the past.
            </p>
          </div>
          </div>
        </div>
    </div>
  <div class="carousel-item">
    <div class="col">
          <div class="row">
            <div class="image-container col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-5 text-center">
              <img src="images\144684.jpg" class="img-fluid"></div><!--style="min-width: 125px; max-width: 150px; width:75%;"-->
            <div class="col-xxl-10 col-xl-9 col-lg-9 col-md-8 col-sm-7 text-justify">
              <h4>Kimi wa Meido-sama.</h4>
            <p class="col-xl-12 col-sm-12 sinopsis" style="text-align: justify; border-bottom: 0px;">
              Everybody has had that stage in their life where they have thought themselves to be special, different from the masses of ordinary humans.
              They might go as far as seeing themselves capable of wielding mystical powers, or maybe even believe themselves to have descended from a fantasy realm.
              This "disease" is known as "chuunibyou" and is often the source of some of the most embarrassing moments of a person's life.
              For Yuuta Togashi, the scars that his chuunibyou has left behind are still fresh.
              <br>
              Having posed as the "Dark Flame Master" during his middle school years, he looks back at those times with extreme embarrassment,
              so much so that he decides to attend a high school far away where nobody will recognize him. Putting his dark history behind him,
              he longs to live a normal high school life.
              <br>
              Unfortunately, he hasn't escaped his past yet: enter Rikka Takanashi, Yuuta's new classmate and self-declared vessel of the "Wicked Eye."
              As this eccentric young girl crashes into Yuuta's life, his dream of an ordinary, chuunibyou-free life quickly crumbles away.
              In this hilarious and heartwarming story of a boy who just wants to leave his embarrassing memories behind, the delusions of old are far from a thing of the past.
            </p>
          </div>
          </div>
        </div>
    </div>
    <!-- <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div> -->
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  </div>

  <div class="tabsDays mt-2">
  <ul class="nav nav-tabs nav-fill">
  <li class="nav-item"><a class="nav-link" href="#" data-day="monday">Monday</a></li>
  <li class="nav-item"><a class="nav-link" href="#" data-day="tuesday">Tuesday</a></li>
  <li class="nav-item"><a class="nav-link" href="#" data-day="tuesday">Tuesday</a></li>
  <li class="nav-item"><a class="nav-link" href="#" data-day="tuesday">Wednesday</a></li>
  <li class="nav-item"><a class="nav-link" href="#" data-day="tuesday">Thursday</a></li>
  <li class="nav-item"><a class="nav-link" href="#" data-day="tuesday">Friday</a></li>
  <li class="nav-item"><a class="nav-link" href="#" data-day="tuesday">Saturday</a></li>
  <li class="nav-item"><a class="nav-link" href="#" data-day="tuesday">Sunday</a></li>
  <li class="nav-item"><a class="nav-link" href="#" data-day="tuesday">Random</a></li>
  <!-- dst. hingga sunday dan random -->
</ul>

<div id="anime-list">
  <script>
    document.querySelectorAll('.nav-link').forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    // Tandai tab aktif
    document.querySelectorAll('.nav-link').forEach(x => x.classList.remove('active'));
    this.classList.add('active');

    const day = this.dataset.day; // misal 'monday', 'tuesday', dst.
    fetch(`api/tablistHomeAPI.php`)
      .then(res => res.json())
      .then(data => {
        // data = array of anime untuk hari tsb.
        let html = '';
        data.forEach(item => {
          html += `
            <div class="anime-card">
              <img src="${item.image_url}" alt="${item.title}" />
              <h5>${item.title}</h5>
              <p>${item.synopsis ?? ''}</p>
            </div>
          `;
        });
        document.getElementById('anime-list').innerHTML = html;
      })
      .catch(err => console.error(err));
  });
});

  </script>
</div>

  <!-- <script>
   const fullText = document.getElementById("sinopsis").innerText;
   const maxChars = 300;  // misal 120 karakter

   let truncated = fullText;
   if (fullText.length > maxChars) {
     truncated = fullText.substring(0, maxChars - 3) + "...";
   }

   document.getElementById("sinopsis").innerText = truncated;
    </script> -->
    <script>
//       const truncateSinopsis = () => {
//   const maxChars = 300;
//   document.querySelectorAll(".sinopsis").forEach(el => {
//     const text = el.innerText.trim();
//     if (text.length > maxChars) el.innerText = text.substring(0, maxChars - 3) + "...";
//   });
// };

// document.addEventListener("DOMContentLoaded", () => {
//   truncateSinopsis();
//   const carousel = document.getElementById("myCarousel");
//   carousel.addEventListener("slid.bs.carousel", truncateSinopsis);
// });
document.addEventListener("DOMContentLoaded", () => {
  const maxChars = 270;
  document.querySelectorAll(".sinopsis").forEach(el => {
    const text = el.innerText.trim();
    if (text.length > maxChars) {
      el.innerText = text.substring(0, maxChars - 3) + "...";
    }
  });
});

    </script>
</div>