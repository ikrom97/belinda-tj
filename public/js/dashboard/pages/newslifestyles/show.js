const formEl = document.querySelector('.form-dash');
const photoChooserEl = formEl.querySelector('input[name="img"]');
const photoPreviewEl = document.querySelector('img');
const simditors = formEl.querySelectorAll('textarea');
const submitEl = document.querySelector('[data-action="submit"]');

simditors.forEach((simditor) => {
  const simdit = new Simditor({
    textarea: simditor,
    toolbar: [
      'title',
      'bold',
      'italic',
      'underline',
      'strikethrough',
      'ol',
      'ul',
      'indent',
      'outdent',
      'alignment',
    ]
  });

  simdit.body[0].classList.add('form-dash__field', 'form-dash__field--text', 'content');
});

const pristine = window.Pristine(formEl, {
  classTo: 'form-dash__element',
  errorClass: 'form-dash__element--invalid',
  successClass: 'form-dash__element--valid',
  errorTextParent: 'form-dash__element',
  errorTextTag: 'span',
  errorTextClass: 'form-dash__error'
}, true);

photoChooserEl.addEventListener('change', (evt) => {
  const file = evt.target.files[0];

  photoPreviewEl.src = URL.createObjectURL(file);
  evt.target.nextElementSibling.value = file.name;
});

formEl.addEventListener('submit', (evt) => evt.preventDefault());
submitEl.addEventListener('click', () => {
  const isValid = pristine.validate();

  if (isValid) {
    formEl.submit();
  }
});
