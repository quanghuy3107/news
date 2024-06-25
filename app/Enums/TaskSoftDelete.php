<?php

namespace App\Enums;

enum TaskSoftDelete: int
{
    case Deleted = 1;
    case NotDeleted = 0;
}
