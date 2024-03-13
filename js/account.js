//for account's personal info dropdown
const piBtn = document.getElementById("personalInfo");
const piConts = document.getElementById("piContents");
const piaccs = document.getElementById("piaccsHR");
const picont = document.getElementById("picontHR");

piBtn.addEventListener('click', function(){
  piConts.classList.toggle('is-active');
  piaccs.classList.toggle('is-active');
  picont.classList.toggle('is-active');
});

//for account's login and security info dropdown
const lsBtn = document.getElementById("loginSecurity");
const lsConts = document.getElementById("lsContents");
const lsaccs = document.getElementById("lsaccsHR");
const lscont = document.getElementById("lscontHR");

lsBtn.addEventListener('click', function(){
  lsBtn.classList.toggle('is-active');
  lsConts.classList.toggle('is-active');
  lsaccs.classList.toggle('is-active');
  lscont.classList.toggle('is-active');
});

//for account's payment dropdown
const pBtn = document.getElementById("payments");
const pConts = document.getElementById("pContents");
const paccs = document.getElementById("paccsHR");
const pcont = document.getElementById("pcontHR");

pBtn.addEventListener('click', function(){
  pBtn.classList.toggle('is-active');
  pConts.classList.toggle('is-active');
  paccs.classList.toggle('is-active');
  pcont.classList.toggle('is-active');
});

//for account's notification dropdown
const nBtn = document.getElementById("notifications");
const nConts = document.getElementById("nContents");
const naccs = document.getElementById("naccsHR");
const ncont = document.getElementById("ncontHR");

nBtn.addEventListener('click', function(){
  nBtn.classList.toggle('is-active');
  nConts.classList.toggle('is-active');
  naccs.classList.toggle('is-active');
  ncont.classList.toggle('is-active');
});

//for account's privacy and sharing dropdown
const psBtn = document.getElementById("privacySharing");
const psConts = document.getElementById("psContents");
const psaccs = document.getElementById("psaccsHR");
const pscont = document.getElementById("pscontHR");

psBtn.addEventListener('click', function(){
  psBtn.classList.toggle('is-active');
  psConts.classList.toggle('is-active');
  psaccs.classList.toggle('is-active');
  pscont.classList.toggle('is-active');
});

//for account's global preferences dropdown
const gpBtn = document.getElementById("globalPreferences");
const gpConts = document.getElementById("gpContents");
const gpaccs = document.getElementById("gpaccsHR");
const gpcont = document.getElementById("gpcontHR");

gpBtn.addEventListener('click', function(){
  gpBtn.classList.toggle('is-active');
  gpConts.classList.toggle('is-active');
  gpaccs.classList.toggle('is-active');
  gpcont.classList.toggle('is-active');
});

//for account's referal credit and coupon dropdown
const rccBtn = document.getElementById("referral");
const rccConts = document.getElementById("rccContents");
const rccaccs = document.getElementById("rccaccsHR");
const rcccont = document.getElementById("rcccontHR");

rccBtn.addEventListener('click', function(){
  rccBtn.classList.toggle('is-active');
  rccConts.classList.toggle('is-active');
  rccaccs.classList.toggle('is-active');
  rcccont.classList.toggle('is-active');
});