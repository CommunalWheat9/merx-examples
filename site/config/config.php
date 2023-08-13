<?php
use Kirby\Exception\Exception;

return [
  'debug' => true,
  'ww.merx.gateways' => [
    'empty-gateway' => [],
  ],

  'ww.merx.stripe.test.publishable_key' => 'pk_test_51NeP1QBKageDrUwXSZlsQDezOyR8kEq7yXeiOnGh8vPcJ3ZoaHtuY7jbkKVEgqZNAA0w92leVx2C1GUliHlbpS8p00IjoREB5t',
  'ww.merx.stripe.test.secret_key' => 'sk_test_51NeP1QBKageDrUwXsoEAsSVJzFf1Lkyy0z5d8CxoBipx97mURWImowGLpkMxrsDVp7GrPRWmAa7kwz5YHRRzvRzZ00Jjcyl6Ua',
  'ww.merx.stripe.live.publishable_key' => 'pk_live_xxx…',
  'ww.merx.stripe.live.secret_key' => 'sk_live_xxx…',
  'ww.merx.paypal.sandbox.clientID' => 'xxx…',
  'ww.merx.paypal.sandbox.secret' => 'xxx…',
  'ww.merx.paypal.live.clientID' => 'xxx…',
  'ww.merx.paypal.live.secret' => 'xxx…',

  'routes' => [
    [
      'pattern' => 'add',
      'method' => 'post',
      'action'  => function () {
        $id = get('id');
        $quantity = get('quantity');
        try {
          cart()->add([
            'id' => $id,
            'quantity' => $quantity,
          ]);
          go('/');
        } catch (Exception $ex) {
          return $ex->getMessage();
        }
      },
    ],
  ],
];
