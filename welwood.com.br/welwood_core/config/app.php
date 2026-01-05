<?php
return [
  'site_name' => 'WelWood',
  'base_url'  => getenv('APP_URL') ?: 'https://welwood.com.br',
  'email'     => 'contato@welwood.com.br',
  'phone'     => '+55 (21) 96866-1598',
  'whatsapp'  => '5521968661598', // apenas dígitos
  'locale'    => 'pt_BR',
  'timezone'  => getenv('APP_TIMEZONE') ?: 'America/Sao_Paulo',
];
