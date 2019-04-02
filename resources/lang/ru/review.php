<?php

use App\Classes\ReviewStatusEnum;

return [
    'status' => [
        ReviewStatusEnum::NEW => 'новый',
        ReviewStatusEnum::APPROVED => 'одобрен',
        ReviewStatusEnum::NOT_APPROVED => 'не одобрен'
    ],
];
