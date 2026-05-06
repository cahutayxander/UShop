<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Interfaces\CategoryInterface;

new class extends Component
{
    protected CategoryInterface $categoryRepository;

    public function boot(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    #[Computed]
    public function categories()
    {
        return $this->categoryRepository->all();
    }
};
?>

<section class="rounded-3xl bg-white p-5 shadow-sm sm:p-6">
    <div class="mb-5 flex flex-col justify-between gap-2 sm:flex-row sm:items-end">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-orange-500">Browse</p>
            <h2 class="text-2xl font-black tracking-tight">Categories</h2>
        </div>
        <a href="#" class="text-sm font-semibold text-orange-600 hover:text-orange-700">View all categories</a>
    </div>

    <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-6">
        @foreach ($this->categories as $category)
            <a
                href="/category/{{ $category->id }}"
                wire:navigate
                class="group rounded-2xl border border-slate-200 bg-slate-50 p-4 text-center transition hover:-translate-y-1 hover:border-orange-200 hover:bg-orange-50 hover:shadow-sm"
            >
                <div class="mx-auto mb-3 grid size-12 place-items-center rounded-2xl bg-orange-100 text-orange-600 transition group-hover:bg-orange-500 group-hover:text-white">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <span class="text-sm font-bold">{{ $category->name }}</span>
            </a>
        @endforeach
    </div>
</section>