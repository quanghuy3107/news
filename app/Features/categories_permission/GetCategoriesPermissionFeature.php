<?php

namespace App\Features\categories_permission;

use App\Actions\categories_permission\GetCategoryPermissionAction;
use App\Transformers\CategoriesPermissionTransformer;

class GetCategoriesPermissionFeature
{
    public function __construct(
        protected GetCategoryPermissionAction $getCategoryPermissionAction,
        protected CategoriesPermissionTransformer $categoriesPermissionTransformer
    )
    {
    }

    public function getCategoryPermissionFeature(): \Illuminate\Support\Collection
    {
        return $this->categoriesPermissionTransformer->getCategoryPermissionTransformer();
    }

    public function handle(): void
    {
        $data = $this->getCategoryPermissionAction->handle();
        $this->categoriesPermissionTransformer->setCategoryPermissionTransformer($data);
    }
}
