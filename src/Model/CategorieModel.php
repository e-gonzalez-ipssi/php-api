<?php

namespace App\Model;

use Core\Model\DefaultModel;

/**
 * @method Categorie[] findAll()
 */
final class CategorieModel extends DefaultModel
{
    protected string $table = "categorie";
    protected string $entity = "Categorie";
}
