<?php
return [
  'recaptcha' => [
    'site_key' => getenv('RECAPTCHA_SITE_KEY') ?: '',
    'secret_key' => getenv('RECAPTCHA_SECRET_KEY') ?: '',
  ],
  'google' => [
    'client_id' => getenv('GOOGLE_CLIENT_ID') ?: '',
    'client_secret' => getenv('GOOGLE_CLIENT_SECRET') ?: '',
    'calendar_id' => getenv('GOOGLE_CALENDAR_ID') ?: '',
  ],
  'recaptcha' => [
'enabled' => (bool) getenv('RECAPTCHA_ENABLED') ?: true,
'site_key' => getenv('RECAPTCHA_SITE_KEY') ?: 'COLOQUE_SUA_CHAVE_SITE',
'secret' => getenv('RECAPTCHA_SECRET') ?: 'COLOQUE_SUA_CHAVE_SECRETA',
'score_min'=> 0.5,
    ],
];
