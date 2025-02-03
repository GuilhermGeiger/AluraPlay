<?php

declare(strict_types=1);

namespace Alura\Mvc\Repository;
use Alura\Mvc\Entity\Video;
use PDO;

class VideoRepository
{
    public function __construct(private PDO $pdo)
    {  
    }

    public function add(Video $video): Video
    {
        $sql = 'INSERT INTO videos (titele, url) VALUES (?, ?)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $video->titele);
        $statement->bindValue(2, $video->url);

        $statement->execute();

        $id = $this->pdo->lastInsertId();

        $video->setId(intval($id));
        return $video;
    }

    public function remove(int $id): void
    {
        $sql = 'DELETE FROM videos WHERE id =?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
    }

    public function update(Video $video): void
    {
        $sql = 'UPDATE videos SET titele =?, url =? WHERE id =?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $video->titele);
        $statement->bindValue(2, $video->url);
        $statement->bindValue(3, $video->id, type: PDO::PARAM_INT);
    }

    /**
     * @return Video[]
     */
    public function all(): array
    {
        $videoList = $this->pdo
            ->query('SELECT * FROM videos;')
            ->fetchAll(\PDO::FETCH_ASSOC);

        return array_map(
            function (array $videoData) {
                $video = new Video($videoData['titele'], $videoData['url']);
                $video->setId($videoData['id']);

                return $video;
            },
            $videoList
        );
    }

    public function find(int $id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM videos WHERE id = ?;');
        $statement->bindValue(1, $id, \PDO::PARAM_INT);
        $statement->execute();

        return $this->hydrateVideo($statement->fetch(\PDO::FETCH_ASSOC));
    }

    private function hydrateVideo(array $videoData): Video
    {
        $video = new Video($videoData['url'], $videoData['titele']);
        $video->setId($videoData['id']);

        return $video;
    }
}
