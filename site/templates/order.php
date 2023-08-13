<h1>Order <?= $page->invoiceNumber() ?></h1>
<p>Name: <?= $page->name() ?></p>
<p>Email: <?= $page->email() ?></p>
<?php snippet('cart', ['cart' => $page->cart()]) ?>


<?php
$cart = $page->cart();

$paymentIntent = $cart->getStripePaymentIntent();
$clientSecret = $paymentIntent->client_secret;

$kirby->session()->set('stripePaymentIntentId', $paymentIntent->id);

$data = [
    'paymentMethod' => 'credit-card',
    'email' => $page->email(),
    'name' => $page->name(),
  ];

  $stripePaymentIntentId = $kirby->session()->get('stripePaymentIntentId');
$data = array_merge($data, [
  'stripePaymentIntentId' => $stripePaymentIntentId,
]);
$redirect = merx()->initializePayment($data);

?>