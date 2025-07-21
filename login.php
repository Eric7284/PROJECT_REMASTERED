<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign In</title>
</head>
<body>
  <div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="card shadow-sm" style="max-width:400px;width:100%">
      <div class="card-header text-center border-0 pt-4">
        <h3 class="fw-bold">Sign In</h3>
        <p class="text-muted">Enter your credentials to access your account</p>
      </div>
      <div class="card-body px-4 py-4">
        <div id="alert-placeholder"></div>
        <form id="login-form" class="needs-validation" novalidate>
          <!-- Username -->
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
              <input id="username" type="text" class="form-control" placeholder="Enter your username" required/>
              <div class="invalid-feedback">Please enter your username.</div>
            </div>
          </div>
          <!-- Password -->
          <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock"></i></span>
              <input id="password" type="password" class="form-control" placeholder="Enter your password" required/>
              <button type="button" class="btn btn-outline-secondary" id="toggle-password">
                <i class="bi bi-eye" id="eye-icon"></i>
              </button>
              <div class="invalid-feedback">Please enter your password.</div>
            </div>
          </div>
          <div class="d-grid gap-2">
            <p class="text-center"><a href="/PROJECT_REMASTERED/promote">Force ADMINISTRATOR Role Update</a></p>
            <button type="submit" class="btn btn-primary" id="submit-btn">Sign In</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
  (function(){
    const form      = document.getElementById('login-form');
    const userFld   = document.getElementById('username');
    const pwdFld    = document.getElementById('password');
    const toggleBtn = document.getElementById('toggle-password');
    const eyeIcon   = document.getElementById('eye-icon');
    const submitBtn = document.getElementById('submit-btn');
    const alertDiv  = document.getElementById('alert-placeholder');

    function showAlert(msg,type){
      const icon = type==='danger' ? 'exclamation-triangle' : 'check-circle';
      alertDiv.innerHTML =
        '<div class="alert alert-'+type+' d-flex align-items-center" role="alert">'+
          '<i class="bi bi-'+icon+' me-2"></i>'+
          '<div>'+msg+'</div>'+
        '</div>';
    }

    // toggle password visibility
    toggleBtn.addEventListener('click', ()=>{
      const isPwd = pwdFld.type === 'password';
      pwdFld.type = isPwd ? 'text' : 'password';
      eyeIcon.className = isPwd ? 'bi bi-eye-slash' : 'bi bi-eye';
    });

    form.addEventListener('submit', e => {
      e.preventDefault();
      alertDiv.innerHTML = '';
      form.classList.remove('was-validated');
      if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return;
      }

      submitBtn.disabled = true;
      submitBtn.innerHTML =
        '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Signing In...';

      fetch('api/userAuthAPI.php?action=login', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
          username: userFld.value,
          password: pwdFld.value
        })
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          showAlert(data.message, 'success');
          // redirect ke home.php setelah 1.5 detik
          setTimeout(() => window.location.href = '/PROJECT_REMASTERED/home', 100);
        } else {
          showAlert(data.message, 'danger');
        }
      })
      .catch(() => showAlert('Server error, try again', 'danger'))
      .finally(() => {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Sign In';
      });
    });
  })();
  </script>
</body>
</html>