<?php

namespace App\Filament\Widgets;

use App\Repositories\DashboardRepository;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [];
        $widgets = collect((new DashboardRepository)->getWidgets());
        return $widgets->map(function ($widget) {
            return Stat::make($widget->label ?? $widget->title, $widget->value ?? $widget->count)
                ->description($widget->description ?? null)
                ->descriptionIcon($widget->fi_icon ?? null)
                ->icon('fas-university' ?? $widget->fi_icon ?? null)
                ->color($widget->color ?? null);
        })->toArray();
    }
}
