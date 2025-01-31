<?php

namespace App\Filament\Widgets;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\ChartWidget;
use App\Models\answer;
use Illuminate\Support\Facades\DB;
class AverageChart extends ChartWidget
{
    use InteractsWithPageFilters;
    protected static ?string $heading = 'Kepuasan';

    protected function getData(): array
    {
        $startDate = ! is_null($this->filters['startDate'] ?? null) ?
            Carbon::parse($this->filters['startDate']) :
            null;

            $endDate = ! is_null($this->filters['endDate'] ?? null) ?
            Carbon::parse($this->filters['endDate'])->endOfDay() :
            now();
        $data = DB::table('answers')->whereBetween('created_at' ,[$startDate, $endDate])
    ->select(DB::raw("
        AVG(CAST(REGEXP_REPLACE(SUBSTRING_INDEX(Answer_Question, ',', 1), '[^0-9]', '') AS DECIMAL)) as soal_1,
        AVG(SUBSTRING_INDEX(SUBSTRING_INDEX(Answer_Question, ',', 2), ',', -1)) as soal_2,
        AVG(SUBSTRING_INDEX(SUBSTRING_INDEX(Answer_Question, ',', 3), ',', -1)) as soal_3,
        AVG(SUBSTRING_INDEX(SUBSTRING_INDEX(Answer_Question, ',', 4), ',', -1)) as soal_4,
        AVG(SUBSTRING_INDEX(SUBSTRING_INDEX(Answer_Question, ',', 5), ',', -1)) as soal_5,
        AVG(SUBSTRING_INDEX(SUBSTRING_INDEX(Answer_Question, ',', 6), ',', -1)) as soal_6,
        AVG(SUBSTRING_INDEX(SUBSTRING_INDEX(Answer_Question, ',', 7), ',', -1)) as soal_7,
        AVG(SUBSTRING_INDEX(SUBSTRING_INDEX(Answer_Question, ',', 8), ',', -1)) as soal_8
    "))
    ->first();
    
    return [
        'datasets' => [
        [
            'label' => 'Rata-rata Kepuasan',
            'data' => [
                $data->soal_1, $data->soal_2, $data->soal_3, 
                $data->soal_4, $data->soal_5, $data->soal_6, 
                $data->soal_7, $data->soal_8
            ],
        ],
    ],
    'labels' => ['1', '2', '3', '4', '5', '6', '7','8'],

    ];
    }
    protected function getType(): string
    
    {
        return 'bar';
    }
}