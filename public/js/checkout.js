var stripe = Stripe('pk_test_1NjfUjwr5dpRL1CXBQmQXozm');
var elements = stripe.elements();

const data = {
    iconStyle: 'solid',
    style: {
        base: {
            iconColor: '#8898AA',
            color: 'white',
            lineHeight: '36px',
            '::placeholder': {
                color: '#8898AA',
            },
        },
        invalid: {
            iconColor: '#e85746',
            color: '#e85746',
        }
    },
    classes: {
        focus: 'is-focused',
        empty: 'is-empty',
    },
}

const card = elements.create('card', data);

card.mount('#card-elements');

var inputs = document.querySelectorAll('input.field');

Array.prototype.forEach.call(inputs, input => {
    input.addEventListener('focus', () => {
        input.classList.add('is-focused');
    });
    input.addEventListener('blur', () => {
        input.classList.remove('is-focused');
    });
    input.addEventListener('keyup', () => {
        if(input.value) {
            input.classList.remove('is-empty');
        } else {
            input.classList.add('is-empty');
        }
    });
});

// handle error
card.addEventListener('change', ({error}) => {
    const errorElement = document.getElementById('errorMessage');
    const errorWrap = document.getElementById('errorWrap');
    if(error) {
        errorElement.textContent = errorElement.message;
        errorWrap.classList.remove('d-none');
    } else {
        errorElement.textContent = '';
        errorWrap.classList.add('d-none');
    }
});

const form = document.getElementById('payment-form');

form.addEventListener('submit', async (event) => {
    event.preventDefault();
    const {token, error} = await stripe.createToken(card);
    if (error) {
        // Inform error
        const errorElement = document.getElementById('errorMessage');
        errorElement.textContent = error.message;
    } else {
        stripeTokenHandler(token);
    }
});

const stripeTokenHandler = (token) => {
    // Insert the token ID into the form so it gets submitted to the server
    const hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}