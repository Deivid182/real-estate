document.addEventListener("DOMContentLoaded", () => {
  addEventListeners()
})

const addEventListeners = () => {

  const mobileMenu = document.querySelector('.mobile-menu')
  mobileMenu.addEventListener('click', toggleNav)
}

const toggleNav = () => {
  const nav = document.querySelector('.nav')
  nav.classList.toggle('active-nav')
}