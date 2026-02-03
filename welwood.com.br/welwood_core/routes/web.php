<?php
return [
  'GET' => [
    '/'               => ['view' => 'public/home', 'title' => 'WelWood', 'description' => 'Móveis Planejados RJ'],
    '/servicos'       => ['view' => 'public/services', 'title' => 'Serviços', 'description' => 'Nossos Serviços'],
    
    // LINHA NOVA AQUI:
    '/sobre'          => ['view' => 'public/sobre', 'title' => 'Como Funciona — WelWood', 'description' => 'Entenda nosso processo.'],

    '/nossa-historia' => ['view' => 'public/about', 'title' => 'Nossa História', 'description' => 'Sobre nós'],
    '/portfolio'      => ['view' => 'public/portfolio', 'title' => 'Portfólio', 'description' => 'Projetos'],
    '/agendamento'    => ['view' => 'public/schedule', 'title' => 'Agendamento', 'description' => 'Agende visita'],
    '/contato'        => ['view' => 'public/contact', 'title' => 'Contato', 'description' => 'Fale conosco'],
  ],
];
