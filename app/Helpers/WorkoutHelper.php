<?php

namespace App\Helpers;

class WorkoutHelper
{
    public static function translateLevel($level)
    {
        $levels = [
            'beginner' => 'Начинающий',
            'intermediate' => 'Любитель',
            'advanced' => 'Профессионал'
        ];

        return $levels[$level] ?? $level;
    }

    public static function translateType($type)
    {
        $types = [
            'full_body' => 'Все тело',
            'shoulders' => 'Плечи',
            'arms' => 'Руки',
            'back' => 'Спина',
            'abs' => 'Пресс',
            'legs_glutes' => 'Ноги и ягодицы',
            'strength' => 'Силовые',
            'cardio' => 'Кардио',
            'crossfit' => 'Кроссфит',
            'yoga' => 'Йога',
            'prenatal_yoga' => 'Йога для беременных',
            'pilates' => 'Пилатес',
            'previous' => 'Пред',
            'next' => 'След',
        ];

        return $types[$type] ?? $type;
    }
}
