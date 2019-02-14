import { createDecipher } from "crypto";
import { promises } from "fs";

const stripe = Stripe('pk_test_1NjfUjwr5dpRL1CXBQmQXozm');
const elements = stripe.elements();

const style = {
    base: {
        // StripeElement style
        color: '#32325d',
        fontSize: '16px',
        lineHeight: '18px',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        '::placeholder': {
            color: '#aab7c4'
        }
    }
}

// create an instance of the card elements
const card = elements.create('cart', {style})

// add the instance of the card element into card-elment div
card.mount('#card-element')

// for validating user's input
card.addEventListener('change', ({error}) => {
    const displayError = document.getElementById('card-errors');
    if (error) {
        displayError.textContent = error.message;
    } else {
        displayError.textContent = '';
    }
})

// detail => token => sends token to Stripe => (error) ? prevent submit : next step;
const form = document.getElementById('payment-form')
form.addEventListener('submit', async (event) => {
    event.preventDefault();
    const {token, error} = await stripe.createToken(card);
    if (error) {
      const errorElement = document.getElementById('card-errors');
      errorElement.textContent = error.message;
    } else {
      stripeTokenHandler(token);
    }
})

// Create a token or display an error when the form is submitted.
const form = document.getElementById('payment-form');
form.addEventListener('submit', async (event) => {
  event.preventDefault();

  const {token, error} = await stripe.createToken(card);

  if (error) {
    // Inform the customer that there was an error.
    const errorElement = document.getElementById('card-errors');
    errorElement.textContent = error.message;
  } else {
    // Send the token to your server.
    stripeTokenHandler(token);
  }
});

const newPro = new Promise((resolve, reject) => {
  if (resolve) {
    return 'arguments'
  }
  if (reject) {
    return 'arguments';
  }
});