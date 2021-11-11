<?php

// namespace App\Exports;

// use App\Models\Product;
// use Maatwebsite\Excel\Concerns\FromCollection;

// class ProductsExport implements FromCollection
// {
//     public function collection()
//     {
//         return Product::all();
//     }
// }


/*
namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromQuery, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'User',
            'Date',
        ];
    }

    public function query()
    {
        return Product::query()->where('category_id', 1);
    }
}
*/

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Product;

class ProductsExport implements FromCollection, WithMapping, WithHeadings
{    
	public function collection()
    {
        return Product::with('brand')->get();
    }

    public function map($product): array
    {
    	if ( isset($product->brand->name) ) {
    		$t = $product->brand->name;
    	} else {
    		$t = '';
    	}

        return [
            $product->id,
            $product->name,
            $t,
            $product->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Brand',
            'Date',
        ];
    }
}