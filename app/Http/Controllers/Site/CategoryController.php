<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Contracts\CategoryContract;
use Cart;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function show($slug)
    {
        $category = $this->categoryRepository->findBySlug($slug);
        $cartItems = \Cart::getContent();

        return view('site.pages.category', compact('category','cartItems'));
    }
}
