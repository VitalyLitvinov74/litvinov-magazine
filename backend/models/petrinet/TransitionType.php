<?php
declare(strict_types=1);

namespace app\models\petrinet;

enum TransitionType
{
    case Default;
    case Inhibitor;
}
