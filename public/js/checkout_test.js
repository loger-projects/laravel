var stripe = Stripe('pk_test_1NjfUjwr5dpRL1CXBQmQXozm');
var elements = stripe.elements();

const data = {
  iconStyle: 'solid',
  style: {
    base: {
      iconColor: '#8898AA',
      color: 'white',
      lineHeight: '36px',
      fontWeight: 300,
      fontFamily: '"Hellvetica Neue", Helvetica, sans-serif',
      fontSize: '19px',
      '::placeholder': {
        color: '#8898AA',
      }
    },
    invalid: {
      iconColor: '#e85746',
      color: '#e85746'
    }
  },
  classes: {
    focus: 'is-focused',
    empty: 'is-empty'
  }
};

var card = elements.create('card', data);
card.mount('#card-element');

var inputs = document.querySelectorAll('input.field');
Array.prototype.forEach.call(inputs, input => {
  input.addEventListener('focus', () => {
    input.classList.add('is-focused');
  });
  input.addEventListener('blur', () => {
    input.classList.remove('is-focused');
  });
  input.addEventListener('keyup', () => {
    if (input.value.length === 0) {
      input.classList.add('is-empty');
    } else {
      input.classList.remove('is-empty');
    }
  })
});

const setOutcome = result => {
  const successElement = document.querySelector('.success');
  const errorElement = document.querySelector('.error');
  successElement.classList.remove('visible');
  errorElement.classList.remove('visible');
  if (result.token) {
    successElement.querySelector('.token').textContent = result.token.id;
    successElement.classList.add('visible');
  } else if (result.error) {
    errorElement.textContent = result.error.message;
    errorElement.classList.add('visible');
  }
};

card.on('change', (event) => {
  setOutcome(event);
});

document.querySelector('form').addEventListener('submit', e => {
  e.preventDefault();
  const form = document.querySelector('form');
  const extraDetails = {
    name: form.querySelector('input[name=cardholder-name]').value,
  };
  stripe.createToken(card, extraDetails).then(setOutcome);
});