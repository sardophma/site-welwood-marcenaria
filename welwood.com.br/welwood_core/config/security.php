<?php
return [
  'csrf' => [
    'enabled' => true,
    'token_key' => '_token',
  ],
  'rate_limit' => [
    'enabled' => true,
    'max_per_minute' => 30,
  ],
  'headers' => [
    'csp' => '', // pode configurar depois
  ],
];
