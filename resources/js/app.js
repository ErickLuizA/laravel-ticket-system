require('./bootstrap');

const userAvatarButton = document.querySelector('#user_avatar_button')
const userAvatarPopup = document.querySelector('#user_avatar_popup')
const navbarUl = document.querySelector('#navbar_ul')

userAvatarButton?.addEventListener('click', (event) => {
  userAvatarPopup?.classList.toggle('hidden')
})

navbarUl.addEventListener('click', (event) => {
  event.stopPropagation()
})

document.addEventListener('click', (event) => {
  userAvatarPopup?.classList.add('hidden')
})
