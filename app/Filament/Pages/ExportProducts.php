<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;

class ExportProducts extends Page
{
    protected static string|null|BackedEnum $navigationIcon = 'heroicon-o-arrow-down-tray';
    protected string $view = 'filament.pages.export-products';

    public function exportCsv(): void
    {
        $data = DB::table('product_option_store as pos')
            ->leftJoin('products as p', 'p.id', '=', 'pos.product_id')
            ->leftJoin('options as o', 'o.id', '=', 'pos.option_id')
            ->select([
                'pos.product_id',
                'pos.option_id',
                'p.title',
                'o.height',
                'pos.code_1c',
            ])
            ->get();

        $filename = 'products_export.csv';
        $handle = fopen(storage_path("app/$filename"), 'w');
        fputcsv($handle, ['product_id', 'option_id', 'title', 'height', 'code_1c']);

        foreach ($data as $row) {
            fputcsv($handle, [
                $row->product_id,
                $row->option_id,
                $row->title,
                $row->height,
                $row->code_1c,
            ]);
        }

        fclose($handle);

        Notification::make()
            ->title("CSV выгружен: storage/app/$filename")
            ->success()
            ->send();
    }
}
