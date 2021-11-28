const repliesButton = document.querySelector('#replies_button')
const downIcon = document.querySelector('#down_icon')
const upIcon = document.querySelector('#up_icon')
const replyListContainer = document.querySelector('#reply_list_container')

repliesButton.addEventListener('click', () => {
  if (downIcon.classList.contains('hidden')) {
    downIcon.classList.remove('hidden')
    upIcon.classList.add('hidden')

    replyListContainer.classList.remove('hidden')
  } else {
    downIcon.classList.add('hidden')
    upIcon.classList.remove('hidden')

    replyListContainer.classList.add('hidden')
  }
})
