const repliesButton = document.querySelector('#replies_button')
const downIcon = document.querySelector('#down_icon')
const upIcon = document.querySelector('#up_icon')
const replyListContainer = document.querySelector('#reply_list_container')

const replyActionButton = document.querySelector('#reply_action_button')
const replyForm = document.querySelector('#reply_form')
const replyCancelActionButton = document.querySelector('#reply_cancel_action_button')

const replyToReplyActionButtons = document.querySelectorAll('#reply_to_reply_action_button')
const replyToReplyForms = document.querySelectorAll('#reply_to_reply_form')
const replyToReplyCancelActionButtons = document.querySelectorAll('#reply_to_reply_cancel_action_button')

const replyToButton = document.querySelectorAll('#reply_to_button')

const haveSameQuestionButton = document.querySelector('#have_same_question_button')

const statusSelect = document.querySelector('#status_select')

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

replyActionButton.addEventListener('click', () => {
  if (replyForm.classList.contains('hidden')) {
    window.scroll({top: replyActionButton.offsetTop, behavior: 'smooth'})
  }

  replyForm.classList.toggle('hidden')
})

replyCancelActionButton.addEventListener('click', () => {
  replyForm.classList.add('hidden')
})

replyToReplyActionButtons.forEach((button, index) => {
  button.addEventListener('click', (event) => {
    const form = [...replyToReplyForms].find(form => form.dataset.id == index)

    form.classList.toggle('hidden')

    window.scroll({top: button.offsetTop, behavior: 'smooth'})

  })
})

replyToReplyCancelActionButtons.forEach((button, index) => {
  button.addEventListener('click', () => {
    const form = [...replyToReplyForms].find(form => form.dataset.id == index)

    form.classList.add('hidden')
  })
})

replyToButton.forEach((button) => {
  button.addEventListener('click', () => {
    const showReplyId = document.querySelector(`#reply-${button.dataset.ticketReplyId}`)

    showReplyId.classList.toggle('hidden')
  })
})


haveSameQuestionButton.addEventListener('click', async () => {
  const ticketId = haveSameQuestionButton.dataset.ticketid
  const count = haveSameQuestionButton.dataset.count

  try {
    const {data} = await axios.post(`${APP_URL}/ticket/${ticketId}/same-question`)

    haveSameQuestionButton.textContent = haveSameQuestionButton.textContent.replace(count, data)
  } catch (error) {
    console.log(error)
  }
})


statusSelect.addEventListener('change', (event) => {
  event.target.form.submit()
})
