/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/details.js ***!
  \*********************************/
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var repliesButton = document.querySelector('#replies_button');
var downIcon = document.querySelector('#down_icon');
var upIcon = document.querySelector('#up_icon');
var replyListContainer = document.querySelector('#reply_list_container');
var replyActionButton = document.querySelector('#reply_action_button');
var replyForm = document.querySelector('#reply_form');
var replyCancelActionButton = document.querySelector('#reply_cancel_action_button');
var replyToReplyActionButtons = document.querySelectorAll('#reply_to_reply_action_button');
var replyToReplyForms = document.querySelectorAll('#reply_to_reply_form');
var replyToReplyCancelActionButtons = document.querySelectorAll('#reply_to_reply_cancel_action_button');
var replyToButton = document.querySelectorAll('#reply_to_button');
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
  if (replyForm.classList.contains('hidden')) {
    window.scroll({
      top: replyActionButton.offsetTop,
      behavior: 'smooth'
    });
  }

  replyForm.classList.toggle('hidden');
});
replyCancelActionButton.addEventListener('click', function () {
  replyForm.classList.add('hidden');
});
replyToReplyActionButtons.forEach(function (button, index) {
  button.addEventListener('click', function (event) {
    var form = _toConsumableArray(replyToReplyForms).find(function (form) {
      return form.dataset.id == index;
    });

    form.classList.toggle('hidden');
    window.scroll({
      top: button.offsetTop,
      behavior: 'smooth'
    });
  });
});
replyToReplyCancelActionButtons.forEach(function (button, index) {
  button.addEventListener('click', function () {
    var form = _toConsumableArray(replyToReplyForms).find(function (form) {
      return form.dataset.id == index;
    });

    form.classList.add('hidden');
  });
});
replyToButton.forEach(function (button) {
  button.addEventListener('click', function () {
    var showReplyId = document.querySelector("#reply-".concat(button.dataset.ticketReplyId));
    showReplyId.classList.toggle('hidden');
  });
});
/******/ })()
;