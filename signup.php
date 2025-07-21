<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Account</title>
</head>
<body>
  <div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="card shadow-sm" style="max-width:450px;width:100%">
      <div class="card-header text-center border-0 pt-4">
        <h3 class="fw-bold">Create Account</h3>
        <p class="text-muted">Sign up to get started with your account</p>
      </div>
      <div class="card-body px-4 py-4">
        <div id="alert-placeholder"></div>
        <form id="signup-form" class="needs-validation" novalidate>
          <!-- Username -->
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
              <input id="username" type="text" class="form-control" placeholder="Choose a username" required/>
              <div class="invalid-feedback">Please choose a username.</div>
            </div>
          </div>
          <!-- Password -->
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock"></i></span>
              <input id="password" type="password" class="form-control" placeholder="Create a password" required/>
              <button type="button" class="btn btn-outline-secondary" id="toggle-password">
                <i class="bi bi-eye" id="eye1"></i>
              </button>
              <div class="invalid-feedback">Password must be at least 6 characters.</div>
            </div>
            <div class="form-text">Password must be at least 6 characters long</div>
          </div>
          <!-- Confirm Password -->
          <div class="mb-4">
            <label for="confirm" class="form-label">Confirm Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock"></i></span>
              <input id="confirm" type="password" class="form-control" placeholder="Confirm your password" required/>
              <button type="button" class="btn btn-outline-secondary" id="toggle-confirm">
                <i class="bi bi-eye" id="eye2"></i>
              </button>
              <div class="invalid-feedback">Passwords do not match.</div>
            </div>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" id="submit-btn">Create Account</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
  (function(){
    const form      = document.getElementById('signup-form');
    const userFld   = document.getElementById('username');
    const pwdFld    = document.getElementById('password');
    const cfmFld    = document.getElementById('confirm');
    const togglePwd = document.getElementById('toggle-password');
    const toggleCfm = document.getElementById('toggle-confirm');
    const eye1      = document.getElementById('eye1');
    const eye2      = document.getElementById('eye2');
    const submitBtn = document.getElementById('submit-btn');
    const alertDiv  = document.getElementById('alert-placeholder');

    function showAlert(msg,type){
      const icon = type==='danger'?'exclamation-triangle':'check-circle';
      alertDiv.innerHTML =
        '<div class="alert alert-'+type+' d-flex align-items-center" role="alert">'+
          '<i class="bi bi-'+icon+' me-2"></i>'+
          '<div>'+msg+'</div>'+
        '</div>';
    }

    togglePwd.addEventListener('click',()=>{
      const isPwd = pwdFld.type==='password';
      pwdFld.type = isPwd?'text':'password';
      eye1.className = isPwd?'bi bi-eye-slash':'bi bi-eye';
    });
    toggleCfm.addEventListener('click',()=>{
      const isCfm = cfmFld.type==='password';
      cfmFld.type = isCfm?'text':'password';
      eye2.className = isCfm?'bi bi-eye-slash':'bi bi-eye';
    });

    form.addEventListener('submit',e=>{
      e.preventDefault();
      alertDiv.innerHTML = '';
      form.classList.remove('was-validated');
      if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return;
      }
      if (pwdFld.value.length < 6) {
        showAlert('Password must be at least 6 characters','danger');
        return;
      }
      if (pwdFld.value !== cfmFld.value) {
        showAlert('Passwords do not match','danger');
        return;
      }

      submitBtn.disabled = true;
      submitBtn.innerHTML =
        '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Creating Account...';

      fetch('api/userAuthAPI.php?action=signup',{
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body: JSON.stringify({
          username: userFld.value,
          password: pwdFld.value
        })
      })
      .then(r=>r.json())
      .then(data=>{
        if (data.success) {
          showAlert(data.message,'success');
          setTimeout(()=> window.location.href = '/PROJECT_REMASTERED/signup', 100)
        } else {
          showAlert(data.message,'danger');
        }
      })
      .catch(_=> showAlert('Server error, try again','danger'))
      .finally(()=>{
        submitBtn.disabled = false;
        submitBtn.textContent = 'Create Account';
      });
    });
  })();
  </script>
</body>
</html>