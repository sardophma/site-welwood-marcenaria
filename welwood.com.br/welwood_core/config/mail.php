<?php
return [
  'host' => getenv('MAIL_HOST') ?: 'smtp.hostinger.com',
  'port' => (int)(getenv('MAIL_PORT') ?: 587),
  'username' => getenv('MAIL_USERNAME') ?: 'Pedro@welwood.com.br',
  'password' => getenv('MAIL_PASSWORD') ?: '',
  'from_address' => getenv('MAIL_FROM_ADDRESS') ?: 'Pedro@welwood.com.br',
  'from_name' => getenv('MAIL_FROM_NAME') ?: 'WelWood',
  'secure' => 'tls', // 'ssl' ou 'tls'
];
