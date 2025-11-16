<?php

namespace App\Filament\Widgets;

use App\Repositories\DashboardRepository;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    public static ?int $sort = 1;

    protected function getStats(): array
    {
        $widgets = collect((new DashboardRepository)->getWidgets());
        return $widgets->map(function ($widget) {
            return Stat::make($widget->label ?? $widget->title, rp($widget->count))
                ->description('Total Data')
                // ->descriptionIcon($widget->fi_icon ?? null)
                ->icon($widget->fi_icon ?? $widget->fi_icon ?? null)
                ->color($widget->bg ?? null)
                // ->descriptionIcon($widget->fi_icon ?? null)
                ->defaultColor('primary' ?? null)
                ->url($widget->route ?? null);
        })->toArray();
    }
}
