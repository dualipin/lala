<?php

namespace App\Livewire;

use App\Models\News;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class NewsList extends Component
{
    use WithPagination;

    #[Url(as: 'q')]
    public string $search = '';

    #[Url(as: 'categoria')]
    public ?string $selectedCategory = null;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingSelectedCategory(): void
    {
        $this->resetPage();
    }

    public function selectCategory(?string $category): void
    {
        $this->selectedCategory = $category;
        $this->resetPage();
    }

    public function render(): View
    {
        $categories = News::query()
            ->select('category')
            ->distinct()
            ->pluck('category');

        $news = News::query()
            ->when($this->search !== '', function ($q) {
                $term = '%'.$this->search.'%';
                $q->where(function ($sub) use ($term) {
                    $sub->where('title', 'like', $term)
                        ->orWhere('excerpt', 'like', $term)
                        ->orWhere('content', 'like', $term);
                });
            })
            ->when($this->selectedCategory, function ($q) {
                $q->where('category', $this->selectedCategory);
            })
            ->latest('published_at')
            ->paginate(6);

        $featured = News::query()
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        return view('livewire.news-list', [
            'news' => $news,
            'categories' => $categories,
            'featured' => $featured,
        ]);
    }
}
