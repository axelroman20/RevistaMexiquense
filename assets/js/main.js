if(document.querySelector('#login-btn-open-popup')){
  var btnOpenPopupLogin = document.querySelector('#login-btn-open-popup'),
  overlayLogin = document.querySelector('#login-overlay'),
  popupLogin = document.querySelector('#login-popup'),
  btnClosePopupLogin = document.querySelector('#login-btn-close-popup');


  btnOpenPopupLogin.addEventListener('click', function(){
    overlayLogin.classList.add('active');
    popupLogin.classList.add('active');
  });

  btnClosePopupLogin.addEventListener('click', function(){
    overlayLogin.classList.remove('active');
    popupLogin.classList.remove('active');
  });
}

if(document.querySelector('#register-btn-open-popup')){
  var btnOpenPopupRegister = document.querySelector('#register-btn-open-popup'),
  overlayRegister = document.querySelector('#register-overlay'),
  popupRegister = document.querySelector('#register-popup'),
  btnClosePopupRegister = document.querySelector('#register-btn-close-popup');

  btnOpenPopupRegister.addEventListener('click', function(){
    overlayLogin.classList.remove('active');
    popupLogin.classList.remove('active');
    overlayRegister.classList.add('active');
    popupRegister.classList.add('active');
  });

  btnClosePopupRegister.addEventListener('click', function(){
    overlayRegister.classList.remove('active');
    popupRegister.classList.remove('active');
  });
}
