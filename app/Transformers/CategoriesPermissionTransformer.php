<?php

namespace App\Transformers;



use Illuminate\Support\Collection;

class CategoriesPermissionTransformer
{
    private Collection $dataCategoryPermission;

    public function setCategoryPermissionTransformer(Collection $categoryPermission) : void
    {
        $this->dataCategoryPermission = $categoryPermission;
    }

    public function getCategoryPermissionTransformer(): Collection
    {
        return $this->dataCategoryPermission;
    }
}
