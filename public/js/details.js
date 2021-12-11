/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/details.js ***!
  \*********************************/
var repliesButton = document.querySelector('#replies_button');
var downIcon = document.querySelector('#down_icon');
var upIcon = document.querySelector('#up_icon');
var replyListContainer = document.querySelector('#reply_list_container');
var replyActionButton = document.querySelector('#reply_action_button');
var replyForm = document.querySelector('#reply_form');
var replyCancelActionButton = document.querySelector('#reply_cancel_action_button');
repliesButton.addEventListener('click', function () {
  if (downIcon.classList.contains('hidden')) {
    downIcon.classList.remove('hidden');
    upIcon.classList.add('hidden');
    replyListContainer.classList.remove('hidden');
  } else {
    downIcon.classList.add('hidden');
    upIcon.classList.remove('hidden');
    replyListContainer.classList.add('hidden');
  }
});
replyActionButton.addEventListener('click', function () {
  replyForm.classList.remove('hidden');
});
replyCancelActionButton.addEventListener('click', function () {
  replyForm.classList.add('hidden');
});
/******/ })()
;