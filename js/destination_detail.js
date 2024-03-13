// breakfast time
const bfast = document.getElementById("bfast");
const bfastDrop = document.getElementById("bfastDrop");

bfast.addEventListener('click', function(){
  bfastDrop.classList.toggle('is-active');
});

// lunch time
const lunch = document.getElementById("lunch");
const lunchDrop = document.getElementById("lunchDrop");

lunch.addEventListener('click', function(){
  lunchDrop.classList.toggle('is-active');
});

// dinner time
const dinner = document.getElementById("dinner");
const dinnerDrop = document.getElementById("dinnerDrop");

dinner.addEventListener('click', function(){
  dinnerDrop.classList.toggle('is-active');
});

