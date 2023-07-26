document.addEventListener('DOMContentLoaded', function () {
  const openModalButtons = document.querySelectorAll('.openModal');
  const modalTitle = document.querySelector('.modal-title');
  const modalBody = document.querySelector('.modal-body');
  const modalGithub = document.querySelector('.modal-github');
  const modalExtlink = document.querySelector('.modal-extlink');
  const modalImageContainer = document.querySelector('.modal-image-container');

  openModalButtons.forEach((button) => {
    button.addEventListener('click', function () {
      const title = this.getAttribute('data-title');
      const description = this.getAttribute('data-description');
      const github = this.getAttribute('data-github');
      const extlink = this.getAttribute('data-extlink');
      const image = this.getAttribute('data-image');

      modalTitle.innerHTML = title;
      modalBody.innerHTML = description;
      modalGithub.href = github;
      modalExtlink.href = extlink;
      modalImageContainer.src = './img/' + image;
      modalImageContainer.alt = title;
    });
  });
});
