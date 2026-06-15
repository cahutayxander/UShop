<?php

class CreateProductDto
{
    public function __construct(
        public int $categoryId,
        public int $productSellerId,
        public string $name,
        public string $description,
        public bool $useWideDisplay,
        public float $regularPrice,
        public int $quantity,
        public ?float $sellingPrice,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['category_id'],
            $data['product_seller_id'],
            $data['name'],
            $data['description'],
            $data['use_wide_display'],
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