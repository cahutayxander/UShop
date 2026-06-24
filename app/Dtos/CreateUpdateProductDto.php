<?php

namespace App\Dtos;

class CreateUpdateProductDto
{
    public function __construct(
        public int $categoryId,
        public int $productSellerId,
        public string $name,
        public string $description,
        public bool $useWideDisplay,
        public float $regularPrice,
        public ?float $sellingPrice,
        public int $quantity,
    ) {}

    // public function toLivewire(): array
    // {
    //     return [
    //         'categoryId' => $this->categoryId,
    //         'productSellerId' => $this->productSellerId,
    //         'name' => $this->name,
    //         'description' => $this->description,
    //         'useWideDisplay' => $this->useWideDisplay,
    //         'regularPrice' => $this->regularPrice,
    //         'sellingPrice' => $this->sellingPrice,
    //         'quantity' => $this->quantity,
    //     ];
    // }

    // public static function fromLivewire($value): self
    // {
    //     return new static(
    //         categoryId: $value['categoryId'],
    //         productSellerId: $value['productSellerId'],
    //         name: $value['name'],
    //         description: $value['description'],
    //         useWideDisplay: $value['useWideDisplay'],
    //         regularPrice: $value['regularPrice'],
    //         sellingPrice: $value['sellingPrice'],
    //         quantity: $value['quantity'],
    //     );
    // }

    public static function fromArray(array $data): self
    {
        return new self(
            categoryId: (int) $data['categoryId'],
            productSellerId: (int) $data['productSellerId'],
            name: $data['name'],
            description: $data['description'],
            useWideDisplay: (bool) $data['useWideDisplay'],
            regularPrice: (float) $data['regularPrice'],
            sellingPrice: (float) $data['sellingPrice'],
            quantity: (int) $data['quantity']
        );
    }

    public function toArray(): array
    {
        return [
            'category_id' => $this->categoryId,
            'product_seller_id' => $this->productSellerId,
            'name' => $this->name,
            'description' => $this->description,
            'use_wide_display' => $this->useWideDisplay,
        ];
    }
}