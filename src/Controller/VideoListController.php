<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;
use PDO;

class VideoListController
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $videoList = $this->videoRepository->all();
        require_once __DIR__. '/../../view/video-list.php';
    }
}
