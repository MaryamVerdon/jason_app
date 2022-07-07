<?php

namespace App\Data;

use App\Entity\Information;
use Doctrine\DBAL\Types\JsonType;
use Symfony\Component\Validator\Constraints\Unique;

class SearchData
{
    /**
     * @var string
     */
    public $q = '';
    /**
     * @var null|integer
     */
    public $ageMax;

    /**
     * @var null|integer
     */
    public $ageMin;

    /**
     * @var null|string
     */
    public $roles;

    /**
     * @var null|string
     */
    public $rangs;
}
