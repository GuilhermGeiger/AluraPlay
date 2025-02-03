<?php

declare(strict_types=1);

return [
    'GET|/' => 'Alura\Mvc\Controller\VideoListController::class',
    'GET|/new-video' => 'Alura\Mvc\Controller\VideoFormController::class',
    'POST|/new-video' => 'Alura\Mvc\Controller\NewVideoController::class',
    'GET|/edit-video' => 'Alura\Mvc\Controller\VideoFormController::class',
    'POST|/edit-video' => 'Alura\Mvc\Controller\EditVideoController::class',
    'GET|/remove-video' => 'Alura\Mvc\Controller\DeleteVideoController::class',
];

