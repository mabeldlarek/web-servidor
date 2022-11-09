<?php

namespace app\models;

use app\models\ModelDAO;

class ImagemDAO extends ModelDAO
{

    public function __construct()
    {
        parent::__construct('imagem');
    }

    public function readByVeiculo(): bool|array|null
    {
        $images = parent::read();

        foreach ($images as $image) {
            $sorted[$image['id_veiculo']] = array($image['imagem'], $image['descricao'], $image['id_imagem']);
        }

        return $sorted;
    }

}
