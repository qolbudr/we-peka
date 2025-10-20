<?php

namespace App\Enums;

enum EvaluationCriteriaCategory: string
{
    case SANGATRENDAH = 'sangat_rendah';
    case RENDAH = 'rendah';
    case SEDANG = 'sedang';
    case TINGGI = 'tinggi';
    case SANGATTINGGI = 'sangat_tinggi';
}
